<?php

namespace Gineign\GmoPayment\Input;

/**
 * <b>取引照会　入力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage input
 * @see inputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 01-01-2008 00:00:00
 */
class SearchTradeInput extends BaseInput
{

    /**
     * @var ショップID GMOPG発行の、加盟店識別ID
     */
    private $shopId;

    /**
     * @var string ショップパスワード
     */
    private $shopPass;

    /**
     * @var string オーダーID 加盟店様が発番する、取引のID
     */
    private $orderId;

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
     * デフォルト値を設定する
     */
    public function setDefaultValues()
    {
    }

    /**
     * 入力パラメータ群の値を設定する
     *
     * @param IgnoreCaseMap params 入力パラメータ
     */
    public function setInputValues($params)
    {
        // 入力パラメータがnullの場合は設定処理を行わない
        if (is_null($params)) {
            return;
        }

        // 各項目の設定(CardSeqは値が数値でないものは無効とする)
        $this->setShopId($this->getStringValue($params, 'ShopID', $this->getShopId()));
        $this->setShopPass($this->getStringValue($params, 'ShopPass', $this->getShopPass()));
        $this->setOrderId($this->getStringValue($params, 'OrderID', $this->getOrderId()));

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
     * @param string $shopId ショップID
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
     * @param string $shopPass ショップパスワード
     */
    public function setShopPass($shopPass)
    {
        $this->shopPass = $shopPass;
    }

    /**
     * オーダーID
     * @return string オーダーID
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * オーダーID設定
     *
     * @param string $orderId オーダーID
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * 文字列表現
     * URLのパラメータ文字列の形式の文字列を生成する
     * @return string 接続文字列表現
     */
    public function toString()
    {

        $str = 'ShopID=' . $this->encodeStr($this->getShopId());
        $str .= '&';
        $str .= 'ShopPass=' . $this->encodeStr($this->getShopPass());
        $str .= '&';
        $str .= 'OrderID=' . $this->encodeStr($this->getOrderId());

        return $str;
    }

}

?>
