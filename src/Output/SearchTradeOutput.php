<?php

namespace Gineign\GmoPayment\Output;

/**
 * <b>取引照会　出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 01-01-2008 00:00:00
 */
class SearchTradeOutput extends BaseOutput
{

    /**
     * @var string オーダーID
     */
    private $orderId;

    /**
     * @var string 取引ステータス
     */
    private $status;

    /**
     * @var string 処理日時
     */
    private $processDate;

    /**
     * @var string 処理区分
     */
    private $jobCd;

    /**
     * @var string 取引ID
     */
    private $accessId;

    /**
     * @var string 取引パスワード
     */
    private $accessPass;

    /**
     * @var  string 商品コード
     */
    private $itemCode;

    /**
     * @var integer 利用金額
     */
    private $amount;

    /**
     * @var integer 税送料
     */
    private $tax;

    /**
     * @var string サイトID
     */
    private $siteId;

    /**
     * @var string 会員ID
     */
    private $memberId;

    /**
     * @var string カード番号
     */
    private $cardNo;

    /**
     * @var string カード有効期限
     */
    private $expire;

    /**
     * @var string 支払い方法
     */
    private $method;

    /**
     * @var integer 支払回数
     */
    private $payTimes;

    /**
     * @var string 仕向先コード
     */
    private $forward;

    /**
     * @var string トランザクションID
     */
    private $tranId;

    /**
     * @var string 承認番号
     */
    private $approve;

    /**
     * @var string 加盟店自由項目1
     */
    private $clientField1;

    /**
     * @var string 加盟店自由項目2
     */
    private $clientField2;

    /**
     * @var string 加盟店自由項目3
     */
    private $clientField3;

    /**
     * コンストラクタ
     *
     * @param IgnoreCaseMap $params 出力パラメータ
     */
    public function __construct($params = null)
    {
        parent::__construct($params);

        // 引数が無い場合は戻る
        if (is_null($params)) {
            return;
        }

        // マップの展開
        $this->setOrderId($params->get('OrderID'));
        $this->setStatus($params->get('Status'));
        $this->setProcessDate($params->get('ProcessDate'));
        $this->setJobCd($params->get('JobCd'));
        $this->setAccessId($params->get('AccessID'));
        $this->setAccessPass($params->get('AccessPass'));
        $this->setItemCode($params->get('ItemCode'));
        $tmp = $params->get('Amount');
        if (!is_null($tmp) && 0 != strlen($tmp)) {
            // 数値の場合のみ値をセットする
            $this->setAmount(is_numeric($tmp) ? $tmp : null);
        }
        $tmp = $params->get('Tax');
        if (!is_null($tmp) && 0 != strlen($tmp)) {
            // 数値の場合のみ値をセットする
            $this->setTax(is_numeric($tmp) ? $tmp : null);
        }
        $this->setSiteId($params->get('SiteID'));
        $this->setMemberId($params->get('MemberID'));
        $this->setCardNo($params->get('CardNo'));
        $this->setExpire($params->get('Expire'));
        $this->setMethod($params->get('Method'));
        $times = $params->get('PayTimes');
        if (!is_null($times) && 0 != strlen($times)) {
            // 数値の場合のみ値をセットする
            $this->setPayTimes(is_numeric($times) ? $times : null);
        }
        $this->setForward($params->get('Forward'));
        $this->setTranId($params->get('TranID'));
        $this->setApprovalNo($params->get('Approve'));
        $this->setClientField1($params->get('ClientField1'));
        $this->setClientField2($params->get('ClientField2'));
        $this->setClientField3($params->get('ClientField3'));

    }

    /**
     * 承認番号設定
     * @param string $approve 承認番号
     */
    public function setApprovalNo($approve)
    {
        $this->approve = $approve;
    }

    /**
     * 文字列表現
     * <p>
     *  現在の各パラメータを、パラメータ名=値&パラメータ名=値の形式で取得します。
     * </p>
     * @return string 出力パラメータの文字列表現
     */
    public function toString()
    {
        $str = 'OrderID=' . $this->getOrderId();
        $str .= '&';
        $str .= 'Status=' . $this->getStatus();
        $str .= '&';
        $str .= 'ProcessDate=' . $this->getProcessDate();
        $str .= '&';
        $str .= 'JobCd=' . $this->getJobCd();
        $str .= '&';
        $str .= 'AccessID=' . $this->getAccessId();
        $str .= '&';
        $str .= 'AccessPass=' . $this->getAccessPass();
        $str .= '&';
        $str .= 'ItemCode=' . $this->getItemCode();
        $str .= '&';
        $str .= 'Amount=' . $this->getAmount();
        $str .= '&';
        $str .= 'Tax=' . $this->getTax();
        $str .= '&';
        $str .= 'SiteID=' . $this->getSiteId();
        $str .= '&';
        $str .= 'MemberID=' . $this->getMemberId();
        $str .= '&';
        $str .= 'CardNo=' . $this->getCardNo();
        $str .= '&';
        $str .= 'Expire=' . $this->getExpire();
        $str .= '&';
        $str .= 'Method=' . $this->getMethod();
        $str .= '&';
        $str .= 'PayTimes=' . $this->getPayTimes();
        $str .= '&';
        $str .= 'Forward=' . $this->getForward();
        $str .= '&';
        $str .= 'TranID=' . $this->getTranId();
        $str .= '&';
        $str .= 'Approve=' . $this->getApprovalNo();
        $str .= '&';
        $str .= 'ClientField1=' . $this->getClientField1();
        $str .= '&';
        $str .= 'ClientField2=' . $this->getClientField2();
        $str .= '&';
        $str .= 'ClientField3=' . $this->getClientField3();

        if ($this->isErrorOccurred()) {
            // エラー文字列を連結して返す
            $errString = parent::toString();
            $str .= '&' . $errString;
        }

        return $str;
    }

    /**
     * オーダーID取得
     * @return string オーダーID
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * オーダーID設定
     * @param string $orderId オーダーID
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * ステータス取得
     * @return string ステータス
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * ステータス設定
     * @param string $status ステータス
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * 処理日時取得
     * @return string 処理日時
     */
    public function getProcessDate()
    {
        return $this->processDate;
    }

    /**
     * 処理日時設定
     * @param string $processDate 処理日時
     */
    public function setProcessDate($processDate)
    {
        $this->processDate = $processDate;
    }

    /**
     * 処理区分取得
     * @return string 処理区分
     */
    public function getJobCd()
    {
        return $this->jobCd;
    }

    /**
     * 処理区分設定
     * @param string $jobCd 処理区分
     */
    public function setJobCd($jobCd)
    {
        $this->jobCd = $jobCd;
    }

    /**
     * 取引ID取得
     * @return string 取引ID
     */
    public function getAccessId()
    {
        return $this->accessId;
    }

    /**
     * 取引ID設定
     * @param string $accessId 取引ID
     */
    public function setAccessId($accessId)
    {
        $this->accessId = $accessId;
    }

    /**
     * 取引パスワード取得
     * @return strig 取引パスワード
     */
    public function getAccessPass()
    {
        return $this->accessPass;
    }

    /**
     * 取引パスワード設定
     * @param string $accessPass 取引パスワード
     */
    public function setAccessPass($accessPass)
    {
        $this->accessPass = $accessPass;
    }

    /**
     * 商品コード取得
     * @return string 商品コード
     */
    public function getItemCode()
    {
        return $this->itemCode;
    }

    /**
     * 商品コード設定
     * @param string $itemCode 商品コード
     */
    public function setItemCode($itemCode)
    {
        $this->itemCode = $itemCode;
    }

    /**
     * 利用金額取得
     * @return integer 利用金額
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * 利用金額設定
     * @param string $amount 利用金額
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * 税送料取得
     * @return integer 税送料
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * 税送料設定
     * @param string $tax 税送料
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
    }

    /**
     * サイトID取得
     * @return string サイトID
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * サイトID設定
     * @param string $siteId サイトID
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
    }

    /**
     * 会員ID
     * @return string 会員ID
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * 会員ID設定
     * @param string $memberId 会員ID
     */
    public function setMemberId($memberId)
    {
        $this->memberId = $memberId;
    }

    /**
     * カード番号取得
     * @return string カード番号(下4桁表示、以外マスク)
     */
    public function getCardNo()
    {
        return $this->cardNo;
    }

    /**
     * カード番号設定
     * @param string $cardNo カード番号(下4桁表示、以外マスク)
     */
    public function setCardNo($cardNo)
    {
        $this->cardNo = $cardNo;
    }

    /**
     * カード有効期限取得
     * @return string カード有効期限
     */
    public function getExpire()
    {
        return $this->expire;
    }

    /**
     * カード有効期限設定
     * @param string $expire カード有効期限
     */
    public function setExpire($expire)
    {
        $this->expire = $expire;
    }

    /**
     * 支払い方法取得
     * @return string 支払方法コード
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * 支払い方法設定
     * @param string $method 支払方法コード
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * 支払回数取得
     * @return integer 支払回数
     */
    public function getPayTimes()
    {
        return $this->payTimes;
    }

    /**
     * 支払回数設定
     * @param string $payTimes 支払回数
     */
    public function setPayTimes($payTimes)
    {
        $this->payTimes = $payTimes;
    }

    /**
     * 仕向先コード取得
     * @return string 仕向先コード
     */
    public function getForward()
    {
        return $this->forward;
    }

    /**
     * 仕向先コード設定
     * @param string $forward 仕向け先コード
     */
    public function setForward($forward)
    {
        $this->forward = $forward;
    }

    /**
     * トランザクションID取得
     * @return　string トランザクションID
     */
    public function getTranId()
    {
        return $this->tranId;
    }

    /**
     * トランザクションID設定
     * @param string $tranId トランザクションID
     */
    public function setTranId($tranId)
    {
        $this->tranId = $tranId;
    }

    /**
     * 承認番号取得
     * @return string 承認番号
     */
    public function getApprovalNo()
    {
        return $this->approve;
    }

    /**
     * 加盟店自由項目1取得
     * @return string 加盟店自由項目1
     */
    public function getClientField1()
    {
        return $this->clientField1;
    }

    /**
     * 加盟店自由項目1設定
     * @param string $clientField1 加盟店自由項目1
     */
    public function setClientField1($clientField1)
    {
        $this->clientField1 = $clientField1;
    }

    /**
     * 加盟店自由項目2取得
     * @return string 加盟店自由項目2
     */
    public function getClientField2()
    {
        return $this->clientField2;
    }

    /**
     * 加盟店自由項目2設定
     * @param string $clientField2 加盟店自由項目2
     */
    public function setClientField2($clientField2)
    {
        $this->clientField2 = $clientField2;
    }

    /**
     * 加盟店自由項目3取得
     * @return string 加盟店自由項目3
     */
    public function getClientField3()
    {
        return $this->clientField3;
    }

    /**
     * 加盟店自由項目3設定
     * @param string $clientField3 加盟店自由項目3
     */
    public function setClientField3($clientField3)
    {
        $this->clientField3 = $clientField3;
    }

}

?>
