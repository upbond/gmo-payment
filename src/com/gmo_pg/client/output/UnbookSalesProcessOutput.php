<?php
namespace Gineign\GmoPayment\Output;
use Gineign\GmoPayment\Output\BaseOutput;
/**
 * <b>実売予約キャンセル　出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 10-22-2012 00:00:00
 */
class UnbookSalesProcessOutput extends BaseOutput {

	/**
	 * @var string 取引ID
	 */
	private $accessId;

	/**
	 * @var string 取引パスワード
	 */
	private $accessPass;

	/**
	 * @var string 予約情報バージョン
	 */
	private $bookingInfoVersion;

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
        $this->setAccessId($params->get('AccessID'));
        $this->setAccessPass($params->get('AccessPass'));
        $this->setBookingInfoVersion($params->get('BookingInfoVersion'));
	}

	/**
	 * 取引ID取得
	 * @return string 取引ID
	 */
	public function getAccessId() {
		return $this->accessId;
	}

	/**
	 * 取引パスワード取得
	 * @return string 取引パスワード
	 */
	public function getAccessPass() {
		return $this->accessPass;
	}

	/**
	 * 予約情報バージョン取得
	 * @return string 予約情報バージョン
	 */
	public function getBookingInfoVersion() {
		return $this->bookingInfoVersion;
	}

	/**
	 * 取引ID設定
	 *
	 * @param string $accessId 取引ID
	 */
	public function setAccessId($accessId) {
		$this->accessId = $accessId;
	}

	/**
	 * 取引パスワード設定
	 *
	 * @param string $accessPass 取引パスワード
	 */
	public function setAccessPass($accessPass) {
		$this->accessPass = $accessPass;
	}

	/**
	 * 予約情報バージョン設定
	 *
	 * @param string $bookingInfoVersion 予約情報バージョン
	 */
	public function setBookingInfoVersion($bookingInfoVersion) {
		$this->bookingInfoVersion = $bookingInfoVersion;
	}

	/**
	 * 文字列表現
	 * <p>
	 *  現在の各パラメータを、パラメータ名=値&パラメータ名=値の形式で取得します。
	 * </p>
	 * @return string 出力パラメータの文字列表現
	 */
	public function toString() {
	    $str  = 'AccessID=' . $this->getAccessId();
	    $str .= '&';
	    $str .= 'AccessPass=' . $this->getAccessPass();
	    $str .= '&';
	    $str .= 'BookingInfoVersion=' . $this->getBookingInfoVersion();

	    if ($this->isErrorOccurred()) {
            // エラー文字列を連結して返す
            $errString = parent::toString();
            $str .= '&' . $errString;
        }

        return $str;
	}

}
?>