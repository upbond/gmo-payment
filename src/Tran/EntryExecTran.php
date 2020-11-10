<?php
namespace Gineign\GmoPayment\Tran;

use Gineign\GmoPayment\Common\Gmopg_Log;
use Gineign\GmoPayment\Common\RedirectUtil;
use Gineign\GmoPayment\Input\AcsParam;
use Gineign\GmoPayment\Input\TdVerifyInput;
use Gineign\GmoPayment\Output\EntryExecTranOutput;

/**
 * <b>取引登録・決済一括実行　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 01-01-2008 00:00:00
 */
class EntryExecTran
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
     * 登録・決済を実行する
     *
     * @param EntryExecTranInput $input 入力パラメータ
     * @return  EntryExecTranOutput 登録・決済出力パラメータ
     * @exception GPayException
     */
    public function exec(&$input)
    {
        // 取引登録入力パラメータを取得
        $entryTranInput =& $input->getEntryTranInput();
        // 決済実行入力パラメータを取得
        $execTranInput =& $input->getExecTranInput();

        // 登録・決済出力パラメータを生成
        $output = new EntryExecTranOutput();

        // 取引ID、取引パスワードを取得
        $accessId = $execTranInput->getAccessId();
        $accessPass = $execTranInput->getAccessPass();

        // 取引ID、取引パスワードが設定されていないとき
        if (is_null($accessId) || 0 == strlen($accessId) || is_null($accessPass)) {
            // 取引登録を実行
            $this->log->debug("取引登録実行");
            $entryTran = new EntryTran();
            $entryTranOutput = $entryTran->exec($entryTranInput);

            if ($this->errorTrap($entryTran)) {
                return $output;
            }

            // 取引ID、取引パスワードを決済実行用のパラメータに設定
            $accessId = $entryTranOutput->getAccessId();
            $accessPass = $entryTranOutput->getAccessPass();
            $execTranInput->setAccessId($accessId);
            $execTranInput->setAccessPass($accessPass);

            $output->setEntryTranOutput($entryTranOutput);
        }

        $this->log->debug("取引ID : [$accessId]  取引パスワード : [$accessPass]");

        // 取引登録でエラーが起きたとき決済を実行せずに戻る
        if ($output->isEntryErrorOccurred()) {
            $this->log->debug("<<<取引登録失敗>>>");
            return $output;
        }

        // 決済実行
        $this->log->debug("決済実行");
        $execTran = new ExecTran();
        $execTranOutput = $execTran->exec($execTranInput);

        $output->setExecTranOutput($execTranOutput);

        $this->errorTrap($execTran);

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

    /**
     * リダイレクトページの内容を作成する
     *
     * @param string $pagePath 雛形となるページファイルへのパス
     * @param EntryExecTranOutput $execResult 登録・決済の実行結果出力パラメータ（EntryExecTranOutput）
     * @param string $termUrl パスワード認証後のリダイレクト先URL
     * @param string $encode 雛形ページファイルの文字コード
     * @return  string リダイレクトページの内容
     * @exception GPayException
     */
    public function createRedirectPage($pagePath, $execResult, $termUrl, $encode = null)
    {
        // 登録・決済の実行結果とリダイレクト先URLからACSパラメータを生成
        $param = new AcsParam();
        $param->setAcsUrl($execResult->getAcsUrl());
        $param->setMd($execResult->getMd());
        $param->setPaReq($execResult->getPaReq());
        $param->setTermUrl($termUrl);

        // リダイレクトページの内容を作成
        $redirectUtil = new RedirectUtil();
        $page = $redirectUtil->createRedirectPage($pagePath, $param, $encode);

        $this->errorTrap($redirectUtil);

        return $page;
    }

    /**
     * 3D認証実行する
     *
     * @param string $paRes 3Dセキュア認証結果
     * @param string $md 取引ID
     * @return  TdVerifyOutput 3D決済認証出力パラメータ
     * @exception GPayException
     */
    public function requestTdVerify($paRes, $md)
    {
        // 3D決済認証入力パラメータを生成
        $input = new TdVerifyInput();
        $input->setPaRes($paRes);
        $input->setMd($md);

        // 3D決済認証を実行
        $tran = new TdVerify();
        $output = $tran->exec($input);

        $this->errorTrap($tran);

        return $output;
    }

}

?>
