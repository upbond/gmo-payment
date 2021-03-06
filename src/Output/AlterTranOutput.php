<?php

namespace Gineign\GmoPayment\Output;

/**
 * <b>取引変更 出力パラメータクラス</b>
 *
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.01
 * @created 07-01-2008 00:00:00
 */
class AlterTranOutput extends BaseOutput
{

    /**
     * @var string 取引ID
     *
     */
    private $accessId;

    /**
     * @var string 取引パスワード
     */
    private $accessPass;

    /**
     * @var string カード会社略称
     */
    private $cardName;

    /**
     * @var string カード会社承認番号
     *
     */
    private $approve;

    /**
     * @var string トランザクションID
     *
     */
    private $tranId;

    /**
     * @var string 決済日付(yyyyMMddHHmmss)
     *
     */
    private $tranDate;

    /**
     * @var string 仕向先カード会社コード
     */
    private $forward;

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
        $this->setAccessId($params->get('AccessID'));
        $this->setAccessPass($params->get('AccessPass'));
        $this->setCardName($params->get('CardName'));
        $this->setForward($params->get('Forward'));
        $this->setApprovalNo($params->get('Approve'));
        $this->setTranId($params->get('TranID'));
        $this->setTranDate($params->get('TranDate'));
    }

    /**
     * 承認番号設定
     *
     * @param string $approve 承認番号
     */
    public function setApprovalNo($approve)
    {
        $this->approve = $approve;
    }

    /**
     * @return string カード会社略称
     * @deprecated
     * カード会社略称取得
     */
    public function getCardName()
    {
        return $this->cardName;
    }

    /**
     * @param string $cardName カード会社略称
     * @deprecated
     * カード会社略称設定
     *
     */
    public function setCardName($cardName)
    {
        $this->cardName = $cardName;
    }

    /**
     * AlterTranOutput文字列表現取得
     * <p>
     *  現在の各パラメータを、パラメータ名=値&パラメータ名=値の形式で取得します。
     * </p>
     * @return string 出力パラメータの文字列表現
     */
    public function toString()
    {
        $str = 'AccessID=' . $this->getAccessId();
        $str .= '&';
        $str .= 'AccessPass=' . $this->getAccessPass();
        $str .= '&';
        $str .= 'Forward=' . $this->getForward();
        $str .= '&';
        $str .= 'Approve=' . $this->getApprovalNo();
        $str .= '&';
        $str .= 'TranID=' . $this->getTranId();
        $str .= '&';
        $str .= 'TranDate=' . $this->getTranDate();

        if ($this->isErrorOccurred()) {
            // エラー文字列を連結して返す
            $errString = parent::toString();
            $str .= '&' . $errString;
        }
        return $str;
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
     *
     * @param string $accessId 取引ID
     */
    public function setAccessId($accessId)
    {
        $this->accessId = $accessId;
    }

    /**
     * 取引パスワード取得
     * @return string 取引パスワード
     */
    public function getAccessPass()
    {
        return $this->accessPass;
    }

    /**
     * 取引パスワード設定
     *
     * @param string $accessPass 取引パスワード
     */
    public function setAccessPass($accessPass)
    {
        $this->accessPass = $accessPass;
    }

    /**
     * 仕向先カード会社コード取得
     * @return string カード会社コード
     */
    public function getForward()
    {
        return $this->forward;
    }

    /**
     * 仕向先カード会社設定
     *
     * @param string $forward 仕向先カード会社コード
     */
    public function setForward($forward)
    {
        $this->forward = $forward;
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
     * トランザクションID取得
     * @return string トランザクションID
     */
    public function getTranId()
    {
        return $this->tranId;
    }

    /**
     * トランザクションID設定
     *
     * @param string $tranId トランザクションID
     */
    public function setTranId($tranId)
    {
        $this->tranId = $tranId;
    }

    /**
     * 決済日付取得
     * @return string 決済日付(yyyyMMddHHmmss形式)
     */
    public function getTranDate()
    {
        return $this->tranDate;
    }

    /**
     * 決済日付設定
     *
     * @param string $tranDate 決済日付(yyyyMMddHHmmss形式)
     */
    public function setTranDate($tranDate)
    {
        $this->tranDate = $tranDate;
    }
}

?>
