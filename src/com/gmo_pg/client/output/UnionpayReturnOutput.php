<?php
namespace Gineign\GmoPayment\Output;
use Gineign\GmoPayment\Output\BaseOutput;
/**
 * <b>ネット銀聯返品　出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 */
class UnionpayReturnOutput extends BaseOutput {

	/**
	 * @var string オーダーID
	 */
	private $orderID;
	/**
	 * @var string 現状態
	 */
	private $status;
	/**
	 * @var integer 利用金額
	 */
	private $amount;
	/**
	 * @var integer 税送料
	 */
	private $tax;
	/**
	 * @var integer 返品金額
	 */
	private $cancelAmount;
	/**
	 * @var integer 返品税送料
	 */
	private $cancelTax;


	/**
	 * コンストラクタ
	 *
	 * @param IgnoreCaseMap $params  出力パラメータ
	 */
	public function __construct($params = null) {
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
		$this->setCancelAmount($params->get('CancelAmount'));
		$this->setCancelTax($params->get('CancelTax'));

	}

	/**
	 * オーダーID取得
	 * @return string オーダーID
	 */
	public function getOrderID() {
		return $this->orderID;
	}
	/**
	 * 現状態取得
	 * @return string 現状態
	 */
	public function getStatus() {
		return $this->status;
	}
	/**
	 * 利用金額取得
	 * @return integer 利用金額
	 */
	public function getAmount() {
		return $this->amount;
	}
	/**
	 * 税送料取得
	 * @return integer 税送料
	 */
	public function getTax() {
		return $this->tax;
	}
	/**
	 * 返品金額取得
	 * @return integer 返品金額
	 */
	public function getCancelAmount() {
		return $this->cancelAmount;
	}
	/**
	 * 返品税送料取得
	 * @return integer 返品税送料
	 */
	public function getCancelTax() {
		return $this->cancelTax;
	}

	/**
	 * オーダーID設定
	 *
	 * @param string $orderID
	 */
	public function setOrderID($orderID) {
		$this->orderID = $orderID;
	}
	/**
	 * 現状態設定
	 *
	 * @param string $status
	 */
	public function setStatus($status) {
		$this->status = $status;
	}
	/**
	 * 利用金額設定
	 *
	 * @param integer $amount
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
	}
	/**
	 * 税送料設定
	 *
	 * @param integer $tax
	 */
	public function setTax($tax) {
		$this->tax = $tax;
	}
	/**
	 * 返品金額設定
	 *
	 * @param integer $cancelAmount
	 */
	public function setCancelAmount($cancelAmount) {
		$this->cancelAmount = $cancelAmount;
	}
	/**
	 * 返品税送料設定
	 *
	 * @param integer $cancelTax
	 */
	public function setCancelTax($cancelTax) {
		$this->cancelTax = $cancelTax;
	}

	/**
	 * 文字列表現
	 * <p>
	 *  現在の各パラメータを、パラメータ名=値&パラメータ名=値の形式で取得します。
	 * </p>
	 * @return string 出力パラメータの文字列表現
	 */
	public function toString() {
		$str ='';
		$str .= 'OrderID=' . $this->encodeStr($this->getOrderID());
		$str .='&';
		$str .= 'Status=' . $this->encodeStr($this->getStatus());
		$str .='&';
		$str .= 'Amount=' . $this->encodeStr($this->getAmount());
		$str .='&';
		$str .= 'Tax=' . $this->encodeStr($this->getTax());
		$str .='&';
		$str .= 'CancelAmount=' . $this->encodeStr($this->getCancelAmount());
		$str .='&';
		$str .= 'CancelTax=' . $this->encodeStr($this->getCancelTax());


	    if ($this->isErrorOccurred()) {
            // エラー文字列を連結して返す
            $errString = parent::toString();
            $str .= '&' . $errString;
        }

        return $str;
	}

}
?>
