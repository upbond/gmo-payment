<?php

namespace Gineign\GmoPayment\Output;

use Gineign\GmoPayment\Output\EntryTranOutput;
use Gineign\GmoPayment\Output\ExecTranOutput;

/*require_once 'com/gmo_pg/client/output/EntryTranOutput.php';
require_once 'com/gmo_pg/client/output/ExecTranOutput.php';*/

/**
 * <b>取引登録・決済一括実行  出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 01-01-2008 00:00:00
 */
class EntryExecTranOutput
{

    /**
     * @var EntryTranOutput 取引登録出力パラメータ
     */
    private $entryTranOutput;

    /**
     * @var ExecTranOutput 決済実行出力パラメータ
     */
    private $execTranOutput;/*@var $execTranOutput ExecTranOutput */

    /**
     * コンストラクタ
     *
     * @param IgnoreCaseMap $params 入力パラメータ
     */
    public function __construct($params = null)
    {
        $this->entryTranOutput = new EntryTranOutput($params);
        $this->execTranOutput = new ExecTranOutput($params);
    }

    /**
     * 取引登録出力パラメータ取得
     * @return EntryTranOutput 取引登録出力パラメータ
     */
    public function &getEntryTranOutput()
    {
        return $this->entryTranOutput;
    }

    /**
     * 決済実行出力パラメータ取得
     * @return ExecTranOutput 決済実行出力パラメータ
     */
    public function &getExecTranOutput()
    {
        return $this->execTranOutput;
    }

    /**
     * 取引パスワード取得
     * @return string 取引パスワード
     */
    public function getAccessPass()
    {
        return $this->entryTranOutput->getAccessPass();
    }

    /**
     * 取引ID取得
     * @return string 取引ID
     */
    public function getAccessId()
    {
        return $this->entryTranOutput->getAccessId();
    }

    /**
     * 支払い方法取得
     * @return string 支払方法
     */
    public function getMethod()
    {
        return $this->execTranOutput->getMethod();
    }

    /**
     * オーダーID取得
     * @return string オーダーID
     */
    public function getOrderId()
    {
        return $this->execTranOutput->getOrderId();
    }

    /**
     * カード会社略称取得
     * @return string カード会社名
     */
    public function getCardName()
    {
        return $this->execTranOutput->getCardName();
    }

    /**
     * 仕向先コード取得
     * @return string 仕向先コード
     */
    public function getForward()
    {
        return $this->execTranOutput->getForward();
    }

    /**
     * 承認番号取得
     * @return string 承認番号
     */
    public function getApprovalNo()
    {
        return $this->execTranOutput->getApprovalNo();
    }

    /**
     * 3Dセキュアフラグ取得
     * @return string 3Dセキュアフラグ
     */
    public function getSecureFlag()
    {
        return $this->execTranOutput->getSecureFlag();
    }

    /**
     * 支払回数取得
     * @return integer 支払回数
     */
    public function getPayTimes()
    {
        return $this->execTranOutput->getPayTimes();
    }

    /**
     * トランザクションID取得
     * @return string トランザクションID
     */
    public function getTranId()
    {
        return $this->execTranOutput->getTranId();
    }

    /**
     * 決済日付取得
     * @return string 決済日付
     */
    public function getTranDate()
    {
        return $this->execTranOutput->getTranDate();
    }

    /**
     * MD5ハッシュ取得
     * @return string チェック文字列
     */
    public function getCheckString()
    {
        return $this->execTranOutput->getCheckString();
    }

    /**
     * 加盟店自由項目1取得
     * @return string 加盟店自由項目1
     */
    public function getClientField1()
    {
        return $this->execTranOutput->getClientField1();
    }

    /**
     * 加盟店自由項目2取得
     * @return string 加盟店自由項目2
     */
    public function getClientField2()
    {
        return $this->execTranOutput->getClientField2();
    }

    /**
     * 加盟店自由項目3取得
     * @return string 加盟店自由項目3
     */
    public function getClientField3()
    {
        return $this->execTranOutput->getClientField3();
    }

    /**
     * ACS（発行元カード会社）URL取得
     * @return string AcsURL
     */
    public function getAcsUrl()
    {
        return $this->execTranOutput->getAcsUrl();
    }

    /**
     * 3Dセキュア認証要求電文取得
     * @return string 3Dセキュア認証要求電文
     */
    public function getPaReq()
    {
        return $this->execTranOutput->getPaReq();
    }

    /**
     * 取引ID取得
     * @return strign 取引ID
     */
    public function getMd()
    {
        return $this->execTranOutput->getMd();
    }

    /**
     * ActiveServerへのリダイレクトURL取得
     */
    public function getRedirectUrl()
    {
        return $this->execTranOutput->getRedirectUrl();
    }

    /**
     * 取引登録出力パラメータ設定
     *
     * @param EntryTranOutput $entryTranOutput 取引登録出力パラメータ
     */
    public function setEntryTranOutput(&$entryTranOutput)
    {
        $this->entryTranOutput = $entryTranOutput;
    }

    /**
     * 決済実行出力パラメータ設定
     *
     * @param ExecTranOutput $execTranOutput 決済実行出力パラメータ
     */
    public function setExecTranOutput(&$execTranOutput)
    {
        $this->execTranOutput = $execTranOutput;
    }

    /**
     * 取引ID設定
     *
     * @param string accessId 取引ID
     */
    public function setAccessId($accessId)
    {
        $this->entryTranOutput->setAccessId($accessId);
    }

    /**
     * 取引パスワード設定
     *
     * @param string accessPass 取引パスワード
     */
    public function setAccessPass($accessPass)
    {
        $this->entryTranOutput->setAccessPass($accessPass);
    }

    /**
     * オーダーID設定
     *
     * @param string $orderId オーダーID
     */
    public function setOrderId($orderId)
    {
        $this->execTranOutput->setOrderId($orderId);
    }

    /**
     * カード会社略称設定
     *
     * @param string $cardName カード会社略称
     */
    public function setCardName($cardName)
    {
        $this->execTranOutput->setCardName($cardName);
    }

    /**
     * 仕向先コード設定
     * @param string $forward 仕向先コード
     */
    public function setForward($forward)
    {
        $this->execTranOutput->setForward($forward);
    }

    /**
     * 承認番号設定
     * @param string $approvalNo 承認番号
     */
    public function setApprovalNo($approvalNo)
    {
        $this->execTranOutput->setApprovalNo($approvalNo);
    }

    /**
     * 3Dセキュアフラグ設定
     * @param string $flag 3Dセキュアフラグ
     */
    public function setSecureFlag($flag)
    {
        $this->execTranOutput->setSecureFlag($flag);
    }

    /**
     * 支払い方法設定
     *
     * @param string $method 支払方法
     */
    public function setMethod($method)
    {
        $this->execTranOutput->setMethod($method);
    }

    /**
     * 支払回数設定
     *
     * @param integer $payTimes 支払回数
     */
    public function setPayTimes($payTimes)
    {
        $this->execTranOutput->setPayTimes($payTimes);
    }

    /**
     * トランザクションID設定
     * @param string $tranID
     */
    public function setTranId($tranID)
    {
        $this->execTranOutput->setTranId($tranID);
    }

    /**
     * 決済日付設定
     *
     * @param string $tranDate 決済日付
     */
    public function setTranDate($tranDate)
    {
        $this->execTranOutput->setTranDate($tranDate);
    }

    /**
     * MD5ハッシュ設定
     *
     * @param string $checkString チェック文字列
     */
    public function setCheckString($checkString)
    {
        $this->execTranOutput->setCheckString($checkString);
    }

    /**
     * 加盟店自由項目1設定
     *
     * @param string $clientField1 加盟店自由項目1
     */
    public function setClientField1($clientField1)
    {
        $this->execTranOutput->setClientField1($clientField1);
    }

    /**
     * 加盟店自由項目2設定
     *
     * @param string $clientField2 加盟店自由項目2
     */
    public function setClientField2($clientField2)
    {
        $this->execTranOutput->setClientField2($clientField2);
    }

    /**
     * 加盟店自由項目3設定
     *
     * @param string $clientField3 加盟店自由項目3
     */
    public function setClientField3($clientField3)
    {
        $this->execTranOutput->setClientField3($clientField3);
    }

    /**
     * ACS（発行元カード会社）URL設定
     *
     * @param string $acsUrl AcsURL
     */
    public function setAcsUrl($acsUrl)
    {
        $this->execTranOutput->setAcsUrl($acsUrl);
    }

    /**
     * 3Dセキュア認証要求電文設定
     *
     * @param string $paReq 3Dセキュア認証要求電文
     */
    public function setPaReq($paReq)
    {
        $this->execTranOutput->setPaReq($paReq);
    }

    /**
     * 取引ID設定
     *
     * @param string $md 取引ID
     */
    public function setMd($md)
    {
        $this->execTranOutput->setMd($md);
    }

    /**
     * ActiveServerへのリダイレクトURLを設定
     */
    public function setRedirectUrl($redirectUrl)
    {
        $this->execTranOutput->setRedirectUrl($redirectUrl);
    }

    /**
     * 取引登録エラーリスト取得
     * @return  array エラーリスト
     */
    public function &getEntryErrList()
    {
        return $this->entryTranOutput->getErrList();
    }

    /**
     * 決済実行エラーリスト取得
     * @return array エラーリスト
     */
    public function &getExecErrList()
    {
        return $this->execTranOutput->getErrList();
    }

    /**
     * 取引登録エラー発生判定
     * @return boolean 取引登録時エラー有無(true=エラー発生)
     */
    public function isEntryErrorOccurred()
    {
        $entryErrList =& $this->entryTranOutput->getErrList();
        return 0 < count($entryErrList);
    }

    /**
     * 決済実行エラー発生判定
     * @return boolean 決済実行時エラー有無(true=エラー発生)
     */
    public function isExecErrorOccurred()
    {
        $execErrList =& $this->execTranOutput->getErrList();
        return 0 < count($execErrList);
    }

    /**
     * エラー発生判定
     * @return boolean エラー発生有無(true=エラー発生)
     */
    public function isErrorOccurred()
    {
        return $this->isEntryErrorOccurred() || $this->isExecErrorOccurred();
    }

    /**
     * 3Dセキュア判定
     * @return boolean 3Dセキュア実行要否フラグ(true=3Dセキュア実行要)
     */
    public function isTdSecure()
    {
        return $this->execTranOutput->isTdSecure();
    }

    /**
     * 3Dセキュア2.0判定
     * @return boolean 3Dセキュア2.0実行要否フラグ(true=3Dセキュア2.0実行要)
     */
    public function isTdSecure2()
    {
        return $this->execTranOutput->isTdSecure2();
    }
}

?>