<?php

namespace Gineign\GmoPayment\Input;

/**
 * <b>コンビニ取引登録　入力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage input
 * @see inputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 03-07-2008 00:00:00
 */
class EntryTranCvsInput extends BaseInput
{


    /**
     * @var string GMO-PGが発行する、PGマルチペイメントサービス中で加盟店様を識別するID
     */
    private $shopId;

    /**
     * @var string ショップIDと対になるパスワード
     */
    private $shopPass;

    /**
     * @var string 加盟店様が発行する、オーダー取引を識別するID
     */
    private $orderId;

    /**
     * @var integer $amount
     */
    private $amount;

    /**
     * @var integer $tax
     */
    private $tax;


    /**
     * コンストラクタ
     *
     * @param array $params 入力パラメータ
     */
    public function __construct($params = null)
    {
        parent::__construct($params);
    }

    /**
     * デフォルト値設定
     */
    public function setDefaultValues()
    {

    }

    /**
     * 入力パラメータ群の値を設定する
     *
     * @param IgnoreCaseMap $params 入力パラメータ
     */
    public function setInputValues($params)
    {
        // 入力パラメータがnullの場合は設定処理を行わない
        if (is_null($params)) {
            return;
        }

        // 各項目の設定(Amount,Taxは値が数値でないものは無効とする)
        $this->setShopId($this->getStringValue($params, 'ShopID', $this->getShopId()));
        $this->setShopPass($this->getStringValue($params, 'ShopPass', $this->getShopPass()));
        $this->setOrderId($this->getStringValue($params, 'OrderID', $this->getOrderId()));
        $this->setAmount($this->getIntegerValue($params, 'Amount', $this->getAmount()));
        $this->setTax($this->getIntegerValue($params, 'Tax', $this->getTax()));

    }

    /**
     * ショップID取得
     * @return string ショップID
     */
    public function getShopId()
    {
        return $this->shopId;
    }

    /**
     * ショップID設定
     *
     * @param string $shopId
     */
    public function setShopId($shopId)
    {
        $this->shopId = $shopId;
    }

    /**
     * ショップパスワード取得
     * @return string ショップパスワード
     */
    public function getShopPass()
    {
        return $this->shopPass;
    }

    /**
     * ショップパスワード設定
     *
     * @param string $shopPass
     */
    public function setShopPass($shopPass)
    {
        $this->shopPass = $shopPass;
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
     *
     * @param string $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
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
     *
     * @param integer $amount
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
     *
     * @param integer $tax
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
    }

    /**
     * 文字列表現
     * @return string 接続文字列表現
     */
    public function toString()
    {
        $str = '';
        $str .= 'ShopID=' . $this->encodeStr($this->getShopId());
        $str .= '&';
        $str .= 'ShopPass=' . $this->encodeStr($this->getShopPass());
        $str .= '&';
        $str .= 'OrderID=' . $this->encodeStr($this->getOrderId());
        $str .= '&';
        $str .= 'Amount=' . $this->encodeStr($this->getAmount());
        $str .= '&';
        $str .= 'Tax=' . $this->encodeStr($this->getTax());

        return $str;
    }


}

?>
