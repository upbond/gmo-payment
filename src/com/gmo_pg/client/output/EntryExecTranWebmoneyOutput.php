<?php
namespace Gineign\GmoPayment\Output;
use Gineign\GmoPayment\Output\EntryTranWebmoneyOutput;
use Gineign\GmoPayment\Output\ExecTranWebmoneyOutput;

/**
 * <b>Webmoney取引登録・決済一括実行  出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 04-08-2010
 */
class EntryExecTranWebmoneyOutput {

	/**
	 * @var EntryTranWebmoneyOutput Webmoney取引登録出力パラメタ
	 */
	private $entryTranWebmoneyOutput;

	/**
	 * @var ExecTranWebmoneyOutput Webmoney決済実行出力パラメタ
	 */
	private $execTranWebmoneyOutput;

	/**
	 * コンストラクタ
	 * @param IgnoreCaseMap $params    入力パラメータ
	 */
	public function __construct($params = null) {
		$this->entryTranWebmoneyOutput = new EntryTranWebmoneyOutput($params);
		$this->execTranWebmoneyOutput = new ExecTranWebmoneyOutput($params);
	}

	/**
	 * Webmoney取引登録出力パラメタ取得
	 * @return EntryTranWebmoneyOutput Webmoney取引登録出力パラメタ
	 */
	public function getEntryTranWebmoneyOutput(){
		return $this->entryTranWebmoneyOutput;
	}

	/**
	 * Webmoney決済実行出力パラメタ取得
	 * @return ExecTranWebmoneyOutput Webmoney決済実行出力パラメタ
	 */
	public function getExecTranWebmoneyOutput(){
		return $this->execTranWebmoneyOutput;
	}

	/**
	 * オーダID取得
	 * @return string オーダID
	 */
	public function getOrderId(){
		return $this->entryTranWebmoneyOutput->getOrderId();
	}

	/**
	 * アクセスID取得
	 * @return string アクセスID
	 */
	public function getAccessId(){
		return $this->entryTranWebmoneyOutput->getAccessId();
	}

	/**
	 * アクセスパス取得
	 * @return string アクセスパス
	 */
	public function getAccessPass(){
		return $this->entryTranWebmoneyOutput->getAccessPass();
	}

	/**
	 * 支払期限日時取得
	 * @return string 支払期限日時
	 */
	public function getPaymentTerm(){
		return $this->execTranWebmoneyOutput->getPaymentTerm();
	}

	/**
	 * 決済日付取得
	 * @return string 決済日付
	 */
	public function getTranDate(){
		return $this->execTranWebmoneyOutput->getTranDate();
	}

	/**
	 * MD5ハッシュ取得
	 * @return string MD5ハッシュ
	 */
	public function getCheckString(){
		return $this->execTranWebmoneyOutput->getCheckString();
	}

	/**
	 * 加盟店自由項目1取得
	 * @return string 加盟店自由項目1
	 */
	public function getClientField1(){
		return $this->execTranWebmoneyOutput->getClientField1();
	}

	/**
	 * 加盟店自由項目2取得
	 * @return string 加盟店自由項目2
	 */
	public function getClientField2(){
		return $this->execTranWebmoneyOutput->getClientField2();
	}

	/**
	 * 加盟店自由項目3取得
	 * @return string 加盟店自由項目3
	 */
	public function getClientField3(){
		return $this->execTranWebmoneyOutput->getClientField3();
	}

	/**
	 * Webmoney取引登録出力パラメータ設定
	 *
	 * @param EntryTranWebmoneyOutput  $entryTranWebmoneyOutput Webmoney取引登録出力パラメータ
	 */
	public function setEntryTranWebmoneyOutput( $entryTranWebmoneyOutput ){
		$this->entryTranWebmoneyOutput = $entryTranWebmoneyOutput;
	}

	/**
	 * Webmoney決済実行パラメータ設定
	 *
	 * @param ExecTranWebmoneyOutput  $execTranWebmoneyOutput Webmoney取引登録出力パラメータ
	 */
	public function setExecTranWebmoneyOutput( $execTranWebmoneyOutput ){
		$this->execTranWebmoneyOutput = $execTranWebmoneyOutput;
	}

	/**
	 * オーダID設定
	 * @param $orderId オーダID
	 */
	public function setOrderId( $orderId ){
		$this->entryTranWebmoneyOutput->setOrderId($orderId);
		$this->execTranWebmoneyOutput->setOrderId($orderId);
	}

	/**
	 * アクセスID設定
	 * @param $accessId アクセスID
	 */
	public function setAccessId( $accessId ){
		$this->entryTranWebmoneyOutput->setAccessId($accessId);
	}

	/**
	 * アクセスパス設定
	 * @param $accessPass アクセスパス
	 * @return unknown_type
	 */
	public function setAccessPass( $accessPass ){
		$this->entryTranWebmoneyOutput->setAccessPass($accessPass);
	}

	/**
	 * 支払期限日時設定
	 *
	 * @param string $paymentTerm 支払期限日時
	 */
	public function setPaymentTerm( $paymentTerm ) {
		$this->execTranWebmoneyOutput->setPaymentTerm($paymentTerm);
	}

	/**
	 * 決済日付設定
	 *
	 * @param string $tranDate 決済日付
	 */
	public function setTranDate( $tranDate ) {
		$this->execTranWebmoneyOutput->setTranDate($tranDate);
	}

	/**
	 * MD5ハッシュ設定
	 *
	 * @param string $checkString MD5ハッシュ
	 */
	public function setCheckString( $checkString ) {
		$this->execTranWebmoneyOutput->setCheckString($checkString);
	}

	/**
	 * 加盟店自由項目1設定
	 * @param $clientField1 加盟店自由項目1
	 */
	public function setClientField1( $clientField1 ){
		$this->execTranWebmoneyOutput->setClientField1($clientField1);
	}

	/**
	 * 加盟店自由項目2設定
	 * @param $clientField2 加盟店自由項目2
	 */
	public function setClientField2( $clientField2 ){
		$this->execTranWebmoneyOutput->setClientField2($clientField2);
	}

	/**
	 * 加盟店自由項目3設定
	 * @param $clientField3 加盟店自由項目3
	 */
	public function setClientField3( $clientField3 ){
		$this->execTranWebmoneyOutput->setClientField3($clientField3);
	}

	/**
	 * Webmoney取引登録エラーリスト取得
	 * @return  array エラーリスト
	 */
	public function &getEntryErrList() {
		return $this->entryTranWebmoneyOutput->getErrList();
	}

	/**
	 * Webmoney決済実行エラーリスト取得
	 * @return array エラーリスト
	 */
	public function &getExecErrList() {
		return $this->execTranWebmoneyOutput->getErrList();
	}

	/**
	 * Webmoney取引登録エラー発生判定
	 * @return boolean Webmoney取引登録時エラー有無(true=エラー発生)
	 */
	public function isEntryErrorOccurred() {
		$entryErrList =& $this->entryTranWebmoneyOutput->getErrList();
		return 0 < count($entryErrList);
	}

	/**
	 * Webmoney決済実行エラー発生判定
	 * @return boolean 決済実行時エラー有無(true=エラー発生)
	 */
	public function isExecErrorOccurred() {
		$execErrList =& $this->execTranWebmoneyOutput->getErrList();
		return 0 < count($execErrList);
	}

	/**
	 * エラー発生判定
	 * @return boolean エラー発生有無(true=エラー発生)
	 */
	public function isErrorOccurred() {
		return $this->isEntryErrorOccurred() || $this->isExecErrorOccurred();
	}



}