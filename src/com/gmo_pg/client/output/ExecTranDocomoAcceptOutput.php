<?php
namespace Gineign\GmoPayment\Output;
use Gineign\GmoPayment\Output\BaseOutput;
/**
 * <b>ドコモ払い_随時決済決済実行　出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 */
class ExecTranDocomoAcceptOutput extends BaseOutput {

	/**
	 * @var string アクセスID
	 */
	private $accessID;
	/**
	 * @var string トークン
	 */
	private $token;
	/**
	 * @var string 支払手続き開始IFのURL
	 */
	private $startURL;
	/**
	 * @var string 支払開始期限日時
	 */
	private $startLimitDate;


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
		$this->setAccessID($params->get('AccessID'));
		$this->setToken($params->get('Token'));
		$this->setStartURL($params->get('StartURL'));
		$this->setStartLimitDate($params->get('StartLimitDate'));

	}

	/**
	 * アクセスID取得
	 * @return string アクセスID
	 */
	public function getAccessID() {
		return $this->accessID;
	}
	/**
	 * トークン取得
	 * @return string トークン
	 */
	public function getToken() {
		return $this->token;
	}
	/**
	 * 支払手続き開始IFのURL取得
	 * @return string 支払手続き開始IFのURL
	 */
	public function getStartURL() {
		return $this->startURL;
	}
	/**
	 * 支払開始期限日時取得
	 * @return string 支払開始期限日時
	 */
	public function getStartLimitDate() {
		return $this->startLimitDate;
	}

	/**
	 * アクセスID設定
	 *
	 * @param string $accessID
	 */
	public function setAccessID($accessID) {
		$this->accessID = $accessID;
	}
	/**
	 * トークン設定
	 *
	 * @param string $token
	 */
	public function setToken($token) {
		$this->token = $token;
	}
	/**
	 * 支払手続き開始IFのURL設定
	 *
	 * @param string $startURL
	 */
	public function setStartURL($startURL) {
		$this->startURL = $startURL;
	}
	/**
	 * 支払開始期限日時設定
	 *
	 * @param string $startLimitDate
	 */
	public function setStartLimitDate($startLimitDate) {
		$this->startLimitDate = $startLimitDate;
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
		$str .= 'AccessID=' . $this->encodeStr($this->getAccessID());
		$str .='&';
		$str .= 'Token=' . $this->encodeStr($this->getToken());
		$str .='&';
		$str .= 'StartURL=' . $this->encodeStr($this->getStartURL());
		$str .='&';
		$str .= 'StartLimitDate=' . $this->encodeStr($this->getStartLimitDate());


	    if ($this->isErrorOccurred()) {
            // エラー文字列を連結して返す
            $errString = parent::toString();
            $str .= '&' . $errString;
        }

        return $str;
	}

}
?>
