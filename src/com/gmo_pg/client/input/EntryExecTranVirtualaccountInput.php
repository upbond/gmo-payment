<?php
namespace Gineign\GmoPayment\Input;
use Gineign\GmoPayment\Input\EntryTranVirtualaccountInput;
use Gineign\GmoPayment\Input\ExecTranVirtualaccountInput;
/**
 * <b>銀行振込(バーチャル口座)登録・決済一括実行　入力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage input
 * @see inputPackageInfo.php
 * @author GMO PaymentGateway
 */
class EntryExecTranVirtualaccountInput {

	/**
	 * @var EntryTranVirtualaccountInput 銀行振込(バーチャル口座)登録入力パラメータ
	 */
	private $entryTranVirtualaccountInput;/* @var $entryTranInput EntryTranVirtualaccountInput */

	/**
	 * @var ExecTranVirtualaccountInput 銀行振込(バーチャル口座)実行入力パラメータ
	 */
	private $execTranVirtualaccountInput;/* @var $execTranInput ExecTranVirtualaccountInput */

	/**
	 * コンストラクタ
	 *
	 * @param array $params    入力パラメータ
	 */
	public function __construct($params = null) {
		$this->entryTranVirtualaccountInput = new EntryTranVirtualaccountInput($params);
		$this->execTranVirtualaccountInput = new ExecTranVirtualaccountInput($params);
	}

	/**
	 * 銀行振込(バーチャル口座)取引登録入力パラメータ取得
	 *
	 * @return EntryTranVirtualaccountInput 取引登録時パラメータ
	 */
	public function &getEntryTranVirtualaccountInput() {
		return $this->entryTranVirtualaccountInput;
	}

	/**
	 * 銀行振込(バーチャル口座)実行入力パラメータ取得
	 * @return ExecTranVirtualaccountInput 決済実行時パラメータ
	 */
	public function &getExecTranVirtualaccountInput() {
		return $this->execTranVirtualaccountInput;
	}

	/**
	 * ショップID取得
	 * @return string ショップID
	 */
	public function getShopID() {
		return $this->entryTranVirtualaccountInput->getShopID();

	}
	/**
	 * ショップパスワード取得
	 * @return string ショップパスワード
	 */
	public function getShopPass() {
		return $this->entryTranVirtualaccountInput->getShopPass();

	}
	/**
	 * オーダーID取得
	 * @return string オーダーID
	 */
	public function getOrderID() {
		return $this->entryTranVirtualaccountInput->getOrderID();

	}
	/**
	 * 利用料金取得
	 * @return integer 利用料金
	 */
	public function getAmount() {
		return $this->entryTranVirtualaccountInput->getAmount();
	}
	/**
	 * 税送料取得
	 * @return integer 税送料
	 */
	public function getTax() {
		return $this->entryTranVirtualaccountInput->getTax();
	}
	/**
	 * 取引ID取得
	 * @return string 取引ID
	 */
	public function getAccessID() {
		return $this->execTranVirtualaccountInput->getAccessID();
	}
	/**
	 * 取引パスワード取得
	 * @return string 取引パスワード
	 */
	public function getAccessPass() {
		return $this->execTranVirtualaccountInput->getAccessPass();
	}
	/**
	 * 取引有効日数取得
	 * @return integer 取引有効日数
	 */
	public function getTradeDays() {
		return $this->execTranVirtualaccountInput->getTradeDays();
	}
	/**
	 * 取引事由取得
	 * @return string 取引事由
	 */
	public function getTradeReason() {
		return $this->execTranVirtualaccountInput->getTradeReason();
	}
	/**
	 * 振込依頼者氏名取得
	 * @return string 振込依頼者氏名
	 */
	public function getTradeClientName() {
		return $this->execTranVirtualaccountInput->getTradeClientName();
	}
	/**
	 * 振込依頼者メールアドレス取得
	 * @return string 振込依頼者メールアドレス
	 */
	public function getTradeClientMailaddress() {
		return $this->execTranVirtualaccountInput->getTradeClientMailaddress();
	}
	/**
	 * 加盟店自由項目１取得
	 * @return string 加盟店自由項目１
	 */
	public function getClientField1() {
		return $this->execTranVirtualaccountInput->getClientField1();
	}
	/**
	 * 加盟店自由項目２取得
	 * @return string 加盟店自由項目２
	 */
	public function getClientField2() {
		return $this->execTranVirtualaccountInput->getClientField2();
	}
	/**
	 * 加盟店自由項目３取得
	 * @return string 加盟店自由項目３
	 */
	public function getClientField3() {
		return $this->execTranVirtualaccountInput->getClientField3();
	}

	/**
	 * 銀行振込(バーチャル口座)取引登録入力パラメータ設定
	 *
	 * @param EntryTranVirtualaccountInput entryTranVirtualaccountInput  取引登録入力パラメータ
	 */
	public function setEntryTranVirtualaccountInput(&$entryTranVirtualaccountInput) {
		$this->entryTranVirtualaccountInput = $entryTranVirtualaccountInput;
	}

	/**
	 * 銀行振込(バーチャル口座)実行入力パラメータ設定
	 *
	 * @param ExecTranVirtualaccountInput  execTranVirtualaccountInput   決済実行入力パラメータ
	 */
	public function setExecTranVirtualaccountInput(&$execTranVirtualaccountInput) {
		$this->execTranVirtualaccountInput = $execTranVirtualaccountInput;
	}

	/**
	 * ショップID設定
	 *
	 * @param string $shopID
	 */
	public function setShopID($shopID) {
		$this->entryTranVirtualaccountInput->setShopID($shopID);
		$this->execTranVirtualaccountInput->setShopID($shopID);

	}
	/**
	 * ショップパスワード設定
	 *
	 * @param string $shopPass
	 */
	public function setShopPass($shopPass) {
		$this->entryTranVirtualaccountInput->setShopPass($shopPass);
		$this->execTranVirtualaccountInput->setShopPass($shopPass);

	}
	/**
	 * オーダーID設定
	 *
	 * @param string $orderID
	 */
	public function setOrderID($orderID) {
		$this->entryTranVirtualaccountInput->setOrderID($orderID);
		$this->execTranVirtualaccountInput->setOrderID($orderID);

	}
	/**
	 * 利用料金設定
	 *
	 * @param integer $amount
	 */
	public function setAmount($amount) {
		$this->entryTranVirtualaccountInput->setAmount($amount);
	}
	/**
	 * 税送料設定
	 *
	 * @param integer $tax
	 */
	public function setTax($tax) {
		$this->entryTranVirtualaccountInput->setTax($tax);
	}
	/**
	 * 取引ID設定
	 *
	 * @param string $accessID
	 */
	public function setAccessID($accessID) {
		$this->execTranVirtualaccountInput->setAccessID($accessID);
	}
	/**
	 * 取引パスワード設定
	 *
	 * @param string $accessPass
	 */
	public function setAccessPass($accessPass) {
		$this->execTranVirtualaccountInput->setAccessPass($accessPass);
	}
	/**
	 * 取引有効日数設定
	 *
	 * @param integer $tradeDays
	 */
	public function setTradeDays($tradeDays) {
		$this->execTranVirtualaccountInput->setTradeDays($tradeDays);
	}
	/**
	 * 取引事由設定
	 *
	 * @param string $tradeReason
	 */
	public function setTradeReason($tradeReason) {
		$this->execTranVirtualaccountInput->setTradeReason($tradeReason);
	}
	/**
	 * 振込依頼者氏名設定
	 *
	 * @param string $tradeClientName
	 */
	public function setTradeClientName($tradeClientName) {
		$this->execTranVirtualaccountInput->setTradeClientName($tradeClientName);
	}
	/**
	 * 振込依頼者メールアドレス設定
	 *
	 * @param string $tradeClientMailaddress
	 */
	public function setTradeClientMailaddress($tradeClientMailaddress) {
		$this->execTranVirtualaccountInput->setTradeClientMailaddress($tradeClientMailaddress);
	}
	/**
	 * 加盟店自由項目１設定
	 *
	 * @param string $clientField1
	 */
	public function setClientField1($clientField1) {
		$this->execTranVirtualaccountInput->setClientField1($clientField1);
	}
	/**
	 * 加盟店自由項目２設定
	 *
	 * @param string $clientField2
	 */
	public function setClientField2($clientField2) {
		$this->execTranVirtualaccountInput->setClientField2($clientField2);
	}
	/**
	 * 加盟店自由項目３設定
	 *
	 * @param string $clientField3
	 */
	public function setClientField3($clientField3) {
		$this->execTranVirtualaccountInput->setClientField3($clientField3);
	}

}
?>
