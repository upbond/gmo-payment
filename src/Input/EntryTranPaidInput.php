<?php
namespace Gineign\GmoPayment\Input;

/**
 * <b>Paid取引登録　入力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage input
 * @see inputPackageInfo.php
 * @author GMO PaymentGateway
 */
class EntryTranPaidInput extends BaseInput
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
     * @var string オーダーID
     */
    private $orderID;
    /**
     * @var bigDecimal 利用金額
     */
    private $amount;
    /**
     * @var bigDecimal 税送料
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

        $this->setShopID($this->getStringValue($params, 'ShopID', $this->getShopID()));
        $this->setShopPass($this->getStringValue($params, 'ShopPass', $this->getShopPass()));
        $this->setOrderID($this->getStringValue($params, 'OrderID', $this->getOrderID()));
        $this->setAmount($this->getStringValue($params, 'Amount', $this->getAmount()));
        $this->setTax($this->getStringValue($params, 'Tax', $this->getTax()));

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
     * @return bigDecimal 利用金額
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * 利用金額設定
     *
     * @param bigDecimal $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * 税送料取得
     * @return bigDecimal 税送料
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * 税送料設定
     *
     * @param bigDecimal $tax
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
        $str .= 'ShopID=' . $this->encodeStr($this->getShopID());
        $str .= '&';
        $str .= 'ShopPass=' . $this->encodeStr($this->getShopPass());
        $str .= '&';
        $str .= 'OrderID=' . $this->encodeStr($this->getOrderID());
        $str .= '&';
        $str .= 'Amount=' . $this->encodeStr($this->getAmount());
        $str .= '&';
        $str .= 'Tax=' . $this->encodeStr($this->getTax());

        return $str;
    }


}

?>
