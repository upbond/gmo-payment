<?php
namespace Gineign\GmoPayment\Output;
use Gineign\GmoPayment\Output\BaseOutput;
/**
 * <b>不正防止実行　出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 */
class ExecFraudScreeningOutput extends BaseOutput {

	/**
	 * @var string ReD Request ID
	 */
	private $redReqId;
	/**
	 * @var string Order/TransactionID
	 */
	private $redOrdId;
	/**
	 * @var string Status code
	 */
	private $redStatCd;
	/**
	 * @var string ReD Shield Status Code
	 */
	private $redFraudStatCd;
	/**
	 * @var string ReD Shield Response Code
	 */
	private $redFraudRspCd;
	/**
	 * @var string ReD Shield Response Message
	 */
	private $redFraudRspMsg;
	/**
	 * @var string ReD Shield Transaction ID
	 */
	private $redFraudRecId;

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
		$this->setRedReqId($params->get('RED_REQ_ID'));
		$this->setRedOrdId($params->get('RED_ORD_ID'));
		$this->setRedStatCd($params->get('RED_STAT_CD'));
		$this->setRedFraudStatCd($params->get('RED_FRAUD_STAT_CD'));
		$this->setRedFraudRspCd($params->get('RED_FRAUD_RSP_CD'));
		$this->setRedFraudRspMsg($params->get('RED_FRAUD_RSP_MSG'));
		$this->setRedFraudRecId($params->get('RED_FRAUD_REC_ID'));

	}

	/**
	 * ReD Request ID取得
	 * @return string ReD Request ID
	 */
	public function getRedReqId() {
		return $this->redReqId;
	}
	/**
	 * Order/TransactionID取得
	 * @return string Order/TransactionID
	 */
	public function getRedOrdId() {
		return $this->redOrdId;
	}
	/**
	 * Status code取得
	 * @return string Status code
	 */
	public function getRedStatCd() {
		return $this->redStatCd;
	}
	/**
	 * ReD Shield Status Code取得
	 * @return string ReD Shield Status Code
	 */
	public function getRedFraudStatCd() {
		return $this->redFraudStatCd;
	}
	/**
	 * ReD Shield Response Code取得
	 * @return string ReD Shield Response Code
	 */
	public function getRedFraudRspCd() {
		return $this->redFraudRspCd;
	}
	/**
	 * ReD Shield Response Message取得
	 * @return string ReD Shield Response Message
	 */
	public function getRedFraudRspMsg() {
		return $this->redFraudRspMsg;
	}
	/**
	 * ReD Shield Transaction ID取得
	 * @return string ReD Shield Transaction ID
	 */
	public function getRedFraudRecId() {
		return $this->redFraudRecId;
	}

	/**
	 * ReD Request ID設定
	 *
	 * @param string $redReqId
	 */
	public function setRedReqId($redReqId) {
		$this->redReqId = $redReqId;
	}
	/**
	 * Order/TransactionID設定
	 *
	 * @param string $redOrdId
	 */
	public function setRedOrdId($redOrdId) {
		$this->redOrdId = $redOrdId;
	}
	/**
	 * Status code設定
	 *
	 * @param string $redStatCd
	 */
	public function setRedStatCd($redStatCd) {
		$this->redStatCd = $redStatCd;
	}
	/**
	 * ReD Shield Status Code設定
	 *
	 * @param string $redFraudStatCd
	 */
	public function setRedFraudStatCd($redFraudStatCd) {
		$this->redFraudStatCd = $redFraudStatCd;
	}
	/**
	 * ReD Shield Response Code設定
	 *
	 * @param string $redFraudRspCd
	 */
	public function setRedFraudRspCd($redFraudRspCd) {
		$this->redFraudRspCd = $redFraudRspCd;
	}
	/**
	 * ReD Shield Response Message設定
	 *
	 * @param string $redFraudRspMsg
	 */
	public function setRedFraudRspMsg($redFraudRspMsg) {
		$this->redFraudRspMsg = $redFraudRspMsg;
	}
	/**
	 * ReD Shield Transaction ID設定
	 *
	 * @param string $redFraudRecId
	 */
	public function setRedFraudRecId($redFraudRecId) {
		$this->redFraudRecId = $redFraudRecId;
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
		$str .= 'RedReqId=' . $this->encodeStr($this->getRedReqId());
		$str .='&';
		$str .= 'RedOrdId=' . $this->encodeStr($this->getRedOrdId());
		$str .='&';
		$str .= 'RedStatCd=' . $this->encodeStr($this->getRedStatCd());
		$str .='&';
		$str .= 'RedFraudStatCd=' . $this->encodeStr($this->getRedFraudStatCd());
		$str .='&';
		$str .= 'RedFraudRspCd=' . $this->encodeStr($this->getRedFraudRspCd());
		$str .='&';
		$str .= 'RedFraudRspMsg=' . $this->encodeStr($this->getRedFraudRspMsg());
		$str .='&';
		$str .= 'RedFraudRecId=' . $this->encodeStr($this->getRedFraudRecId());


	    if ($this->isErrorOccurred()) {
            // エラー文字列を連結して返す
            $errString = parent::toString();
            $str .= '&' . $errString;
        }

        return $str;
	}

}
?>
