<?php
namespace Gineign\GmoPayment\Tran;

use Gineign\GmoPayment\Output\EntryExecTranRecruitContinuanceOutput;

/**
 * <b>リクルートかんたん支払い継続課金登録・決済一括実行　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class EntryExecTranRecruitContinuance
{
    /**
     * @var Gmopg_Log ログ
     */
    private $log;

    /**
     * @var GPayException 例外
     */
    private $exception;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->log = new Gmopg_Log(get_class($this));
    }

    /**
     * 例外の発生を判定する
     *
     * @return  boolean 判定結果(true=エラーアリ)
     */
    public function isExceptionOccured()
    {
        return false == is_null($this->exception);
    }

    /**
     * 例外を返す
     *
     * @return  GPayException 例外
     */
    public function &getException()
    {
        return $this->exception;
    }

    /**
     * リクルートかんたん支払い継続課金登録・決済を実行する
     *
     * @param EntryExecTranRecruitContinuanceInput $input リクルートかんたん支払い継続課金登録・決済入力パラメータ
     * @return  EntryExecTranRecruitContinuanceOutput リクルートかんたん支払い継続課金登録・決済出力パラメータ
     * @exception GPayException
     */
    public function exec(&$input)
    {
        // リクルートかんたん支払い継続課金取引登録入力パラメータを取得
        $entryTranRecruitContinuanceInput =& $input->getEntryTranRecruitContinuanceInput();
        // リクルートかんたん支払い継続課金決済実行入力パラメータを取得
        $execTranRecruitContinuanceInput =& $input->getExecTranRecruitContinuanceInput();

        // リクルートかんたん支払い継続課金登録・決済出力パラメータを生成
        $output = new EntryExecTranRecruitContinuanceOutput();

        // 取引ID、取引パスワードを取得
        $accessId = $execTranRecruitContinuanceInput->getAccessId();
        $accessPass = $execTranRecruitContinuanceInput->getAccessPass();

        // 取引ID、取引パスワードが設定されていないとき
        if (is_null($accessId) || 0 == strlen($accessId) || is_null($accessPass)) {
            // リクルートかんたん支払い継続課金取引登録を実行
            $this->log->debug("リクルートかんたん支払い継続課金取引登録実行");
            $entryTranRecruitContinuance = new EntryTranRecruitContinuance();
            $entryTranRecruitContinuanceOutput = $entryTranRecruitContinuance->exec($entryTranRecruitContinuanceInput);

            if ($this->errorTrap($entryTranRecruitContinuance)) {
                return $output;
            }

            // 取引ID、取引パスワードを決済実行用のパラメータに設定
            $accessId = $entryTranRecruitContinuanceOutput->getAccessId();
            $accessPass = $entryTranRecruitContinuanceOutput->getAccessPass();
            $execTranRecruitContinuanceInput->setAccessId($accessId);
            $execTranRecruitContinuanceInput->setAccessPass($accessPass);

            $output->setEntryTranRecruitContinuanceOutput($entryTranRecruitContinuanceOutput);
        }

        $this->log->debug("取引ID : [$accessId]  取引パスワード : [$accessPass]");

        // 取引登録でエラーが起きたとき決済を実行せずに戻る
        if ($output->isEntryErrorOccurred()) {
            $this->log->debug("<<<取引登録失敗>>>");
            return $output;
        }

        // 決済実行
        $this->log->debug("決済実行");
        $execTranRecruitContinuance = new ExecTranRecruitContinuance();
        $execTranRecruitContinuanceOutput = $execTranRecruitContinuance->exec($execTranRecruitContinuanceInput);

        $output->setExecTranRecruitContinuanceOutput($execTranRecruitContinuanceOutput);

        $this->errorTrap($execTranRecruitContinuance);

        return $output;
    }

    /**
     * 例外の発生を判定する
     *
     * @param mixed $target 判定対象
     */
    private function errorTrap(&$target)
    {
        if (is_null($target->getException())) {
            return false;
        }
        $this->exception = $target->getException();
        return true;
    }


}

?>
