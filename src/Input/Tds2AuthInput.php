<?php

namespace Gineign\GmoPayment\Input;

use Gineign\GmoPayment\Input\BaseInput;

#require_once 'com/gmo_pg/client/input/BaseInput.php';
/**
 * <b>Tds2Auth 3DS2.0 authentication execution</b>
 *
 * @package com.gmo_pg.client
 * @subpackage input
 * @see inputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 08-18-2020 00:00:00
 */
class Tds2AuthInput extends BaseInput {

	/**
	 * @var string 取引ID
	 */
	private $accessID;

	/**
	 * @var string 取引パスワード
	 */
	private $accessPass;

	/**
	 * 3DS 2.0 authentication parameters
	 */

	private $tds2Param;

	/**
	 * コンストラクタ
	 *
	 * @param array $params 入力パラメータ
	 */
	public function __construct($params = null) {
		parent::__construct($params);
	}

	/**
	 * デフォルト値を設定する
	 */
	public function setDefaultValues() {
	    // ※デフォルト値無しの為何もしない
	}

	/**
	 * 入力パラメータ群の値を設定する
	 *
	 * @param IgnoreCaseMap $params 入力パラメータ
	 */
	public function setInputValues($params) {
	    // 入力パラメータが無い(=null)場合は設定処理を行わない。
	    if (is_null($params)) {
	        return;
	    }

	    // 各項目の設定
	    $this->setAccessID($this->getStringValue($params, 'AccessID', $this->getAccessID()));
	    $this->setAccessPass($this->getStringValue($params, 'AccessPass', $this->getAccessPass()));
		$this->setTds2Param($this->getStringValue($params, 'Tds2Param', $this->getTds2Param()));
	}

	/**
	 * 取引ID取得
	 * @return string 取引ID
	 */
	public function getAccessID() {
		return $this->accessID;
	}

	/**
	 * 取引パスワード取得
	 * @return string 取引パスワード
	 */
	public function getAccessPass() {
		return $this->accessPass;
	}

	public function getTds2Param() {
		return $this->tds2Param;
	}

	/**
	 * 取引ID設定
	 * @param string $accessID
	 */
	public function setAccessID($accessID) {
		$this->accessID = $accessID;
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

	public function setTds2Param($tds2Param) {
		$this->tds2Param = $tds2Param;
	}

	/**
	 * 文字列表現
	 * URLのパラメータ文字列の形式の文字列を生成する
	 * @return string 接続文字列
	 */
	public function toString() {
	    $str  = 'AccessID=' . $this->encodeStr($this->getAccessID());
	    $str .= '&';
	    $str .= 'AccessPass=' . $this->encodeStr($this->getAccessPass());
		$str .= '&';
	    $str .= 'Tds2Param=' . $this->encodeStr($this->getTds2Param());

	    return $str;
	}
}
?>