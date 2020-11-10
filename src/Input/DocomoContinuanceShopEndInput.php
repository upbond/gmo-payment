<?php
namespace Gineign\GmoPayment\Input;

/**
 * <b>ドコモ継続決済　継続課金終了(加盟店)　入力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage input
 * @see inputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 2012/08/21
 */
class DocomoContinuanceShopEndInput extends BaseInput
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
     * @var string 利用金額
     */
    private $amount;

    /**
     * @var string 税送料
     */
    private $tax;

    /**
     * @var string 退会月利用料無料区分
     */
    private $lastMonthFreeFlag;

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
        $this->setAmount($this->getStringValue($params, 'Amount', $this->getAmount()));
        $this->setTax($this->getStringValue($params, 'Tax', $this->getTax()));
        $this->setLastMonthFreeFlag($this->getStringValue($params, 'LastMonthFreeFlag', $this->getLastMonthFreeFlag()));
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
     * 退会月利用料無料区分
     * @return string 退会月利用料無料区分
     */
    public function getLastMonthFreeFlag()
    {
        return $this->lastMonthFreeFlag;
    }

    /**
     * 退会月利用料無料区分設定
     *
     * @param integer $lastMonthFreeFlag
     */
    public function setLastMonthFreeFlag($lastMonthFreeFlag)
    {
        $this->lastMonthFreeFlag = $lastMonthFreeFlag;
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
        $str .= 'Amount=' . $this->encodeStr($this->getAmount());
        $str .= '&';
        $str .= 'Tax=' . $this->encodeStr($this->getTax());
        $str .= '&';
        $str .= 'LastMonthFreeFlag=' . $this->encodeStr($this->getLastMonthFreeFlag());
        return $str;
    }


}

?>
