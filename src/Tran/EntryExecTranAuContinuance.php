<?php

namespace Gineign\GmoPayment\Tran;

use Gineign\GmoPayment\Output\EntryExecTranAuContinuanceOutput;

/**
 * <b>auかんたん決済継続課金登録・決済一括実行　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 2012/02/15
 */
class EntryExecTranAuContinuance
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
     * auかんたん決済継続課金登録・決済を実行する
     *
     * @param EntryExecTranAuContinuanceInput $input auかんたん決済継続課金登録・決済入力パラメータ
     * @return  EntryExecTranAuContinuanceOutput auかんたん決済継続課金登録・決済出力パラメータ
     * @exception GPayException
     */
    public function exec(&$input)
    {
        // auかんたん決済継続課金取引登録入力パラメータを取得
        $entryTranAuContinuanceInput =& $input->getEntryTranAuContinuanceInput();
        // auかんたん決済継続課金決済実行入力パラメータを取得
        $execTranAuContinuanceInput =& $input->getExecTranAuContinuanceInput();

        // auかんたん決済継続課金登録・決済出力パラメータを生成
        $output = new EntryExecTranAuContinuanceOutput();

        // 取引ID、取引パスワードを取得
        $accessId = $execTranAuContinuanceInput->getAccessId();
        $accessPass = $execTranAuContinuanceInput->getAccessPass();

        // 取引ID、取引パスワードが設定されていないとき
        if (is_null($accessId) || 0 == strlen($accessId) || is_null($accessPass)) {
            // auかんたん決済継続課金取引登録を実行
            $this->log->debug("auかんたん決済継続課金取引登録実行");
            $entryTranAuContinuance = new EntryTranAuContinuance();
            $entryTranAuContinuanceOutput = $entryTranAuContinuance->exec($entryTranAuContinuanceInput);

            if ($this->errorTrap($entryTranAuContinuance)) {
                return $output;
            }

            // 取引ID、取引パスワードを決済実行用のパラメータに設定
            $accessId = $entryTranAuContinuanceOutput->getAccessId();
            $accessPass = $entryTranAuContinuanceOutput->getAccessPass();
            $execTranAuContinuanceInput->setAccessId($accessId);
            $execTranAuContinuanceInput->setAccessPass($accessPass);

            $output->setEntryTranAuContinuanceOutput($entryTranAuContinuanceOutput);
        }

        $this->log->debug("取引ID : [$accessId]  取引パスワード : [$accessPass]");

        // 取引登録でエラーが起きたとき決済を実行せずに戻る
        if ($output->isEntryErrorOccurred()) {
            $this->log->debug("<<<取引登録失敗>>>");
            return $output;
        }

        // 決済実行
        $this->log->debug("決済実行");
        $execTranAuContinuance = new ExecTranAuContinuance();
        $execTranAuContinuanceOutput = $execTranAuContinuance->exec($execTranAuContinuanceInput);

        $output->setExecTranAuContinuanceOutput($execTranAuContinuanceOutput);

        $this->errorTrap($execTranAuContinuance);

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
