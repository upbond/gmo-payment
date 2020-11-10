<?php
namespace Gineign\GmoPayment\Input;

/**
 * <b>ソフトバンクケータイ支払い決済取消　入力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage input
 * @see inputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 2012/10/18
 */
class SbCancelInput extends BaseInput
{

    /**
     * @var string ショップID
     */
    private $shopID;

    /**
     * @var string ショップパスワード
     */
    private $shopPass;

    /**
     * @var string 取引ID
     */
    private $accessID;

    /**
     * @var string 取引パスワード
     */
    private $accessPass;

    /**
     * @var string オーダーID
     */
    private $orderID;

    /**
     * @var integer キャンセル金額
     */
    private $cancelAmount;

    /**
     * @var integer キャンセル税送料
     */
    private $cancelTax;


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

        $this->setShopID($this->getStringValue($params, 'ShopID', $this->getShopID()));
        $this->setShopPass($this->getStringValue($params, 'ShopPass', $this->getShopPass()));
        $this->setAccessID($this->getStringValue($params, 'AccessID', $this->getAccessID()));
        $this->setAccessPass($this->getStringValue($params, 'AccessPass', $this->getAccessPass()));
        $this->setOrderID($this->getStringValue($params, 'OrderID', $this->getOrderID()));
        $this->setCancelAmount($this->getIntegerValue($params, 'CancelAmount', $this->getCancelAmount()));
        $this->setCancelTax($this->getIntegerValue($params, 'CancelTax', $this->getCancelTax()));
    }

    /**
     * ショップID取得
     * @return string ショップID
     */
    public function getShopID()
    {
        return $this->shopID;
    }

    /**
     * ショップID設定
     *
     * @param string $shopID
     */
    public function setShopID($shopID)
    {
        $this->shopID = $shopID;
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
     * 取引ID取得
     * @return string 取引ID
     */
    public function getAccessID()
    {
        return $this->accessID;
    }

    /**
     * 取引ID設定
     *
     * @param string $accessID
     */
    public function setAccessID($accessID)
    {
        $this->accessID = $accessID;
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
     * @param string $accessPass
     */
    public function setAccessPass($accessPass)
    {
        $this->accessPass = $accessPass;
    }

    /**
     * オーダーID取得
     * @return string オーダーID
     */
    public function getOrderID()
    {
        return $this->orderID;
    }

    /**
     * オーダーID設定
     *
     * @param string $orderID
     */
    public function setOrderID($orderID)
    {
        $this->orderID = $orderID;
    }

    /**
     * キャンセル金額取得
     * @return integer キャンセル金額
     */
    public function getCancelAmount()
    {
        return $this->cancelAmount;
    }

    /**
     * キャンセル金額設定
     *
     * @param integer $cancelAmount
     */
    public function setCancelAmount($cancelAmount)
    {
        $this->cancelAmount = $cancelAmount;
    }

    /**
     * キャンセル税送料取得
     * @return integer キャンセル税送料
     */
    public function getCancelTax()
    {
        return $this->cancelTax;
    }

    /**
     * キャンセル税送料設定
     *
     * @param integer $cancelTax
     */
    public function setCancelTax($cancelTax)
    {
        $this->cancelTax = $cancelTax;
    }

    /**
     * 文字列表現
     * @return string 接続文字列表現
     */
    public function toString()
    {
        $str = '';
        $str .= 'ShopID=' . $this->encodeStr($this->getShopID());
        $str .= '&';
        $str .= 'ShopPass=' . $this->encodeStr($this->getShopPass());
        $str .= '&';
        $str .= 'AccessID=' . $this->encodeStr($this->getAccessID());
        $str .= '&';
        $str .= 'AccessPass=' . $this->encodeStr($this->getAccessPass());
        $str .= '&';
        $str .= 'OrderID=' . $this->encodeStr($this->getOrderID());
        $str .= '&';
        $str .= 'CancelAmount=' . $this->encodeStr($this->getCancelAmount());
        $str .= '&';
        $str .= 'CancelTax=' . $this->encodeStr($this->getCancelTax());
        return $str;
    }


}

?>
