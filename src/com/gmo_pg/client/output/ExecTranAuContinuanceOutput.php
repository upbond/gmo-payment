<?php
namespace Gineign\GmoPayment\Output;
use Gineign\GmoPayment\Output\BaseOutput;
/**
 * <b>auかんたん決済継続課金決済実行　出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 2013/06/05
 */
class ExecTranAuContinuanceOutput extends BaseOutput {

	/**
	 * @var string 取引ID
	 */
	private $accessID;

	/**
	 * @var string 決済トークン
	 */
	private $token;

	/**
	 * @var string 呼び出しURL
	 */
	private $startURL;

	/**
	 * @var string 該当トークンの有効期限 YYYYMMDDHHMM
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
	 * 取引ID取得
	 * @return string 取引ID
	 */
	public function getAccessID() {
		return $this->accessID;
	}

	/**
	 * 決済トークン取得
	 * @return string 決済トークン
	 */
	public function getToken() {
		return $this->token;
	}

	/**
	 * 呼び出しURL取得
	 * @return string 呼び出しURL
	 */
	public function getStartURL() {
		return $this->startURL;
	}

	/**
	 * 該当トークンの有効期限 YYYYMMDDHHMM取得
	 * @return string 該当トークンの有効期限 YYYYMMDDHHMM
	 */
	public function getStartLimitDate() {
		return $this->startLimitDate;
	}

	/**
	 * 取引ID設定
	 *
	 * @param string $accessID
	 */
	public function setAccessID($accessID) {
		$this->accessID = $accessID;
	}

	/**
	 * 決済トークン設定
	 *
	 * @param string $token
	 */
	public function setToken($token) {
		$this->token = $token;
	}

	/**
	 * 呼び出しURL設定
	 *
	 * @param string $startURL
	 */
	public function setStartURL($startURL) {
		$this->startURL = $startURL;
	}

	/**
	 * 該当トークンの有効期限 YYYYMMDDHHMM設定
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
	    $str .= '&';
	    $str .= 'Token=' . $this->encodeStr($this->getToken());
	    $str .= '&';
	    $str .= 'StartURL=' . $this->encodeStr($this->getStartURL());
	    $str .= '&';
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