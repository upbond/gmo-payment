<?php
namespace Gineign\GmoPayment\Output;
use Gineign\GmoPayment\Output\BaseOutput;
/**
 * <b>自動売上自動売上定義金額変更　出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 */
class ChangeRecurringOutput extends BaseOutput {

	/**
	 * @var string ショップID
	 */
	private $shopID;
	/**
	 * @var string 自動売上ID
	 */
	private $recurringID;
	/**
	 * @var integer 利用金額
	 */
	private $amount;
	/**
	 * @var integer 税送料
	 */
	private $tax;
	/**
	 * @var string 課金日
	 */
	private $chargeDay;
	/**
	 * @var string 課金月
	 */
	private $chargeMonth;
	/**
	 * @var string 課金開始日
	 */
	private $chargeStartDate;
	/**
	 * @var string 課金停止日
	 */
	private $chargeStopDate;
	/**
	 * @var string 次回課金日
	 */
	private $nextChargeDate;
	/**
	 * @var string 課金手段
	 */
	private $method;
	/**
	 * @var string カード番号
	 */
	private $cardNo;
	/**
	 * @var string カード有効期限
	 */
	private $expire;
	/**
	 * @var string サイトID
	 */
	private $siteID;
	/**
	 * @var string 会員ID
	 */
	private $memberID;
	/**
	 * @var string 通帳記載内容
	 */
	private $printStr;


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
		$this->setShopID($params->get('ShopID'));
		$this->setRecurringID($params->get('RecurringID'));
		$this->setAmount($params->get('Amount'));
		$this->setTax($params->get('Tax'));
		$this->setChargeDay($params->get('ChargeDay'));
		$this->setChargeMonth($params->get('ChargeMonth'));
		$this->setChargeStartDate($params->get('ChargeStartDate'));
		$this->setChargeStopDate($params->get('ChargeStopDate'));
		$this->setNextChargeDate($params->get('NextChargeDate'));
		$this->setMethod($params->get('Method'));
		$this->setCardNo($params->get('CardNo'));
		$this->setExpire($params->get('Expire'));
		$this->setSiteID($params->get('SiteID'));
		$this->setMemberID($params->get('MemberID'));
		$this->setPrintStr($params->get('PrintStr'));

	}

	/**
	 * ショップID取得
	 * @return string ショップID
	 */
	public function getShopID() {
		return $this->shopID;
	}
	/**
	 * 自動売上ID取得
	 * @return string 自動売上ID
	 */
	public function getRecurringID() {
		return $this->recurringID;
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
	 * 課金日取得
	 * @return string 課金日
	 */
	public function getChargeDay() {
		return $this->chargeDay;
	}
	/**
	 * 課金月取得
	 * @return string 課金月
	 */
	public function getChargeMonth() {
		return $this->chargeMonth;
	}
	/**
	 * 課金開始日取得
	 * @return string 課金開始日
	 */
	public function getChargeStartDate() {
		return $this->chargeStartDate;
	}
	/**
	 * 課金停止日取得
	 * @return string 課金停止日
	 */
	public function getChargeStopDate() {
		return $this->chargeStopDate;
	}
	/**
	 * 次回課金日取得
	 * @return string 次回課金日
	 */
	public function getNextChargeDate() {
		return $this->nextChargeDate;
	}
	/**
	 * 課金手段取得
	 * @return string 課金手段
	 */
	public function getMethod() {
		return $this->method;
	}
	/**
	 * カード番号取得
	 * @return string カード番号
	 */
	public function getCardNo() {
		return $this->cardNo;
	}
	/**
	 * カード有効期限取得
	 * @return string カード有効期限
	 */
	public function getExpire() {
		return $this->expire;
	}
	/**
	 * サイトID取得
	 * @return string サイトID
	 */
	public function getSiteID() {
		return $this->siteID;
	}
	/**
	 * 会員ID取得
	 * @return string 会員ID
	 */
	public function getMemberID() {
		return $this->memberID;
	}
	/**
	 * 通帳記載内容取得
	 * @return string 通帳記載内容
	 */
	public function getPrintStr() {
		return $this->printStr;
	}

	/**
	 * ショップID設定
	 *
	 * @param string $shopID
	 */
	public function setShopID($shopID) {
		$this->shopID = $shopID;
	}
	/**
	 * 自動売上ID設定
	 *
	 * @param string $recurringID
	 */
	public function setRecurringID($recurringID) {
		$this->recurringID = $recurringID;
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
	 * 課金日設定
	 *
	 * @param string $chargeDay
	 */
	public function setChargeDay($chargeDay) {
		$this->chargeDay = $chargeDay;
	}
	/**
	 * 課金月設定
	 *
	 * @param string $chargeMonth
	 */
	public function setChargeMonth($chargeMonth) {
		$this->chargeMonth = $chargeMonth;
	}
	/**
	 * 課金開始日設定
	 *
	 * @param string $chargeStartDate
	 */
	public function setChargeStartDate($chargeStartDate) {
		$this->chargeStartDate = $chargeStartDate;
	}
	/**
	 * 課金停止日設定
	 *
	 * @param string $chargeStopDate
	 */
	public function setChargeStopDate($chargeStopDate) {
		$this->chargeStopDate = $chargeStopDate;
	}
	/**
	 * 次回課金日設定
	 *
	 * @param string $nextChargeDate
	 */
	public function setNextChargeDate($nextChargeDate) {
		$this->nextChargeDate = $nextChargeDate;
	}
	/**
	 * 課金手段設定
	 *
	 * @param string $method
	 */
	public function setMethod($method) {
		$this->method = $method;
	}
	/**
	 * カード番号設定
	 *
	 * @param string $cardNo
	 */
	public function setCardNo($cardNo) {
		$this->cardNo = $cardNo;
	}
	/**
	 * カード有効期限設定
	 *
	 * @param string $expire
	 */
	public function setExpire($expire) {
		$this->expire = $expire;
	}
	/**
	 * サイトID設定
	 *
	 * @param string $siteID
	 */
	public function setSiteID($siteID) {
		$this->siteID = $siteID;
	}
	/**
	 * 会員ID設定
	 *
	 * @param string $memberID
	 */
	public function setMemberID($memberID) {
		$this->memberID = $memberID;
	}
	/**
	 * 通帳記載内容設定
	 *
	 * @param string $printStr
	 */
	public function setPrintStr($printStr) {
		$this->printStr = $printStr;
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
		$str .= 'ShopID=' . $this->encodeStr($this->getShopID());
		$str .='&';
		$str .= 'RecurringID=' . $this->encodeStr($this->getRecurringID());
		$str .='&';
		$str .= 'Amount=' . $this->encodeStr($this->getAmount());
		$str .='&';
		$str .= 'Tax=' . $this->encodeStr($this->getTax());
		$str .='&';
		$str .= 'ChargeDay=' . $this->encodeStr($this->getChargeDay());
		$str .='&';
		$str .= 'ChargeMonth=' . $this->encodeStr($this->getChargeMonth());
		$str .='&';
		$str .= 'ChargeStartDate=' . $this->encodeStr($this->getChargeStartDate());
		$str .='&';
		$str .= 'ChargeStopDate=' . $this->encodeStr($this->getChargeStopDate());
		$str .='&';
		$str .= 'NextChargeDate=' . $this->encodeStr($this->getNextChargeDate());
		$str .='&';
		$str .= 'Method=' . $this->encodeStr($this->getMethod());
		$str .='&';
		$str .= 'CardNo=' . $this->encodeStr($this->getCardNo());
		$str .='&';
		$str .= 'Expire=' . $this->encodeStr($this->getExpire());
		$str .='&';
		$str .= 'SiteID=' . $this->encodeStr($this->getSiteID());
		$str .='&';
		$str .= 'MemberID=' . $this->encodeStr($this->getMemberID());
		$str .='&';
		$str .= 'PrintStr=' . $this->encodeStr($this->getPrintStr());


	    if ($this->isErrorOccurred()) {
            // エラー文字列を連結して返す
            $errString = parent::toString();
            $str .= '&' . $errString;
        }

        return $str;
	}

}
?>
