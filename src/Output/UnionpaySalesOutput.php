<?php
namespace Gineign\GmoPayment\Output;

/**
 * <b>ネット銀聯売上確定　出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 */
class UnionpaySalesOutput extends BaseOutput
{

    /**
     * @var string オーダーID
     */
    private $orderID;
    /**
     * @var string 現状態
     */
    private $status;
    /**
     * @var integer 利用料金
     */
    private $amount;
    /**
     * @var integer 税送料
     */
    private $tax;


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
        $this->setOrderID($params->get('OrderID'));
        $this->setStatus($params->get('Status'));
        $this->setAmount($params->get('Amount'));
        $this->setTax($params->get('Tax'));

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
        $str = '';
        $str .= 'OrderID=' . $this->encodeStr($this->getOrderID());
        $str .= '&';
        $str .= 'Status=' . $this->encodeStr($this->getStatus());
        $str .= '&';
        $str .= 'Amount=' . $this->encodeStr($this->getAmount());
        $str .= '&';
        $str .= 'Tax=' . $this->encodeStr($this->getTax());


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
     * 現状態取得
     * @return string 現状態
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * 現状態設定
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * 利用料金取得
     * @return integer 利用料金
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * 利用料金設定
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

}

?>
