<?php
namespace Gineign\GmoPayment\Output;
use Gineign\GmoPayment\Output\BaseOutput;
/**
 * <b>PGプリカチャージ状態照会　出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 */
class SearchChargeStatusOutput extends BaseOutput {

	/**
	 * @var string 取引ID
	 */
	private $accessID;
	/**
	 * @var string 取引パスワード
	 */
	private $accessPass;
	/**
	 * @var string オーダーID 
	 */
	private $orderID;
	/**
	 * @var string ステータス
	 */
	private $status;
	/**
	 * @var bigDecimal 金額
	 */
	private $amount;
	/**
	 * @var string 決済日付
	 */
	private $tranDate;
	/**
	 * @var string プリカ番号
	 */
	private $precaNo;
	/**
	 * @var integer プリカ履歴連番
	 */
	private $precaSeq;
	/**
	 * @var string バリュー有効期限
	 */
	private $expireDate;
	/**
	 * @var string チャージタイプ
	 */
	private $chargeType;
	/**
	 * @var string 仕向先コード
	 */
	private $forward;
	/**
	 * @var string 承認番号
	 */
	private $approve;
	/**
	 * @var string 支払先コンビニコード
	 */
	private $cvsCode;
	/**
	 * @var string 確認番号
	 */
	private $cvsConfNo;
	/**
	 * @var string 受付番号
	 */
	private $cvsReceiptNo;
	/**
	 * @var string 支払期限日時
	 */
	private $paymentTerm;
	/**
	 * @var string 払込票URL
	 */
	private $receiptURL;
	/**
	 * @var string お客様番号
	 */
	private $custID;
	/**
	 * @var string 収納機関番号
	 */
	private $bkCode;
	/**
	 * @var string 確認番号
	 */
	private $confNo;
	/**
	 * @var string 金融機関選択画面URL
	 */
	private $payeasyPaymentURL;
	/**
	 * @var string 入金確定日時
	 */
	private $finishDate;


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
		$this->setAccessPass($params->get('AccessPass'));
		$this->setOrderID($params->get('OrderID'));
		$this->setStatus($params->get('Status'));
		$this->setAmount($params->get('Amount'));
		$this->setTranDate($params->get('TranDate'));
		$this->setPrecaNo($params->get('PrecaNo'));
		$this->setPrecaSeq($params->get('PrecaSeq'));
		$this->setExpireDate($params->get('ExpireDate'));
		$this->setChargeType($params->get('ChargeType'));
		$this->setForward($params->get('Forward'));
		$this->setApprove($params->get('Approve'));
		$this->setCvsCode($params->get('CvsCode'));
		$this->setCvsConfNo($params->get('CvsConfNo'));
		$this->setCvsReceiptNo($params->get('CvsReceiptNo'));
		$this->setPaymentTerm($params->get('PaymentTerm'));
		$this->setReceiptURL($params->get('ReceiptURL'));
		$this->setCustID($params->get('CustID'));
		$this->setBkCode($params->get('BkCode'));
		$this->setConfNo($params->get('ConfNo'));
		$this->setPayeasyPaymentURL($params->get('PayeasyPaymentURL'));
		$this->setFinishDate($params->get('FinishDate'));

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
	/**
	 * オーダーID 取得
	 * @return string オーダーID 
	 */
	public function getOrderID() {
		return $this->orderID;
	}
	/**
	 * ステータス取得
	 * @return string ステータス
	 */
	public function getStatus() {
		return $this->status;
	}
	/**
	 * 金額取得
	 * @return bigDecimal 金額
	 */
	public function getAmount() {
		return $this->amount;
	}
	/**
	 * 決済日付取得
	 * @return string 決済日付
	 */
	public function getTranDate() {
		return $this->tranDate;
	}
	/**
	 * プリカ番号取得
	 * @return string プリカ番号
	 */
	public function getPrecaNo() {
		return $this->precaNo;
	}
	/**
	 * プリカ履歴連番取得
	 * @return integer プリカ履歴連番
	 */
	public function getPrecaSeq() {
		return $this->precaSeq;
	}
	/**
	 * バリュー有効期限取得
	 * @return string バリュー有効期限
	 */
	public function getExpireDate() {
		return $this->expireDate;
	}
	/**
	 * チャージタイプ取得
	 * @return string チャージタイプ
	 */
	public function getChargeType() {
		return $this->chargeType;
	}
	/**
	 * 仕向先コード取得
	 * @return string 仕向先コード
	 */
	public function getForward() {
		return $this->forward;
	}
	/**
	 * 承認番号取得
	 * @return string 承認番号
	 */
	public function getApprove() {
		return $this->approve;
	}
	/**
	 * 支払先コンビニコード取得
	 * @return string 支払先コンビニコード
	 */
	public function getCvsCode() {
		return $this->cvsCode;
	}
	/**
	 * 確認番号取得
	 * @return string 確認番号
	 */
	public function getCvsConfNo() {
		return $this->cvsConfNo;
	}
	/**
	 * 受付番号取得
	 * @return string 受付番号
	 */
	public function getCvsReceiptNo() {
		return $this->cvsReceiptNo;
	}
	/**
	 * 支払期限日時取得
	 * @return string 支払期限日時
	 */
	public function getPaymentTerm() {
		return $this->paymentTerm;
	}
	/**
	 * 払込票URL取得
	 * @return string 払込票URL
	 */
	public function getReceiptURL() {
		return $this->receiptURL;
	}
	/**
	 * お客様番号取得
	 * @return string お客様番号
	 */
	public function getCustID() {
		return $this->custID;
	}
	/**
	 * 収納機関番号取得
	 * @return string 収納機関番号
	 */
	public function getBkCode() {
		return $this->bkCode;
	}
	/**
	 * 確認番号取得
	 * @return string 確認番号
	 */
	public function getConfNo() {
		return $this->confNo;
	}
	/**
	 * 金融機関選択画面URL取得
	 * @return string 金融機関選択画面URL
	 */
	public function getPayeasyPaymentURL() {
		return $this->payeasyPaymentURL;
	}
	/**
	 * 入金確定日時取得
	 * @return string 入金確定日時
	 */
	public function getFinishDate() {
		return $this->finishDate;
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
	 * 取引パスワード設定
	 *
	 * @param string $accessPass
	 */
	public function setAccessPass($accessPass) {
		$this->accessPass = $accessPass;
	}
	/**
	 * オーダーID 設定
	 *
	 * @param string $orderID
	 */
	public function setOrderID($orderID) {
		$this->orderID = $orderID;
	}
	/**
	 * ステータス設定
	 *
	 * @param string $status
	 */
	public function setStatus($status) {
		$this->status = $status;
	}
	/**
	 * 金額設定
	 *
	 * @param bigDecimal $amount
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
	}
	/**
	 * 決済日付設定
	 *
	 * @param string $tranDate
	 */
	public function setTranDate($tranDate) {
		$this->tranDate = $tranDate;
	}
	/**
	 * プリカ番号設定
	 *
	 * @param string $precaNo
	 */
	public function setPrecaNo($precaNo) {
		$this->precaNo = $precaNo;
	}
	/**
	 * プリカ履歴連番設定
	 *
	 * @param integer $precaSeq
	 */
	public function setPrecaSeq($precaSeq) {
		$this->precaSeq = $precaSeq;
	}
	/**
	 * バリュー有効期限設定
	 *
	 * @param string $expireDate
	 */
	public function setExpireDate($expireDate) {
		$this->expireDate = $expireDate;
	}
	/**
	 * チャージタイプ設定
	 *
	 * @param string $chargeType
	 */
	public function setChargeType($chargeType) {
		$this->chargeType = $chargeType;
	}
	/**
	 * 仕向先コード設定
	 *
	 * @param string $forward
	 */
	public function setForward($forward) {
		$this->forward = $forward;
	}
	/**
	 * 承認番号設定
	 *
	 * @param string $approve
	 */
	public function setApprove($approve) {
		$this->approve = $approve;
	}
	/**
	 * 支払先コンビニコード設定
	 *
	 * @param string $cvsCode
	 */
	public function setCvsCode($cvsCode) {
		$this->cvsCode = $cvsCode;
	}
	/**
	 * 確認番号設定
	 *
	 * @param string $cvsConfNo
	 */
	public function setCvsConfNo($cvsConfNo) {
		$this->cvsConfNo = $cvsConfNo;
	}
	/**
	 * 受付番号設定
	 *
	 * @param string $cvsReceiptNo
	 */
	public function setCvsReceiptNo($cvsReceiptNo) {
		$this->cvsReceiptNo = $cvsReceiptNo;
	}
	/**
	 * 支払期限日時設定
	 *
	 * @param string $paymentTerm
	 */
	public function setPaymentTerm($paymentTerm) {
		$this->paymentTerm = $paymentTerm;
	}
	/**
	 * 払込票URL設定
	 *
	 * @param string $receiptURL
	 */
	public function setReceiptURL($receiptURL) {
		$this->receiptURL = $receiptURL;
	}
	/**
	 * お客様番号設定
	 *
	 * @param string $custID
	 */
	public function setCustID($custID) {
		$this->custID = $custID;
	}
	/**
	 * 収納機関番号設定
	 *
	 * @param string $bkCode
	 */
	public function setBkCode($bkCode) {
		$this->bkCode = $bkCode;
	}
	/**
	 * 確認番号設定
	 *
	 * @param string $confNo
	 */
	public function setConfNo($confNo) {
		$this->confNo = $confNo;
	}
	/**
	 * 金融機関選択画面URL設定
	 *
	 * @param string $payeasyPaymentURL
	 */
	public function setPayeasyPaymentURL($payeasyPaymentURL) {
		$this->payeasyPaymentURL = $payeasyPaymentURL;
	}
	/**
	 * 入金確定日時設定
	 *
	 * @param string $finishDate
	 */
	public function setFinishDate($finishDate) {
		$this->finishDate = $finishDate;
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
		$str .= 'AccessPass=' . $this->encodeStr($this->getAccessPass());
		$str .='&';
		$str .= 'OrderID=' . $this->encodeStr($this->getOrderID());
		$str .='&';
		$str .= 'Status=' . $this->encodeStr($this->getStatus());
		$str .='&';
		$str .= 'Amount=' . $this->encodeStr($this->getAmount());
		$str .='&';
		$str .= 'TranDate=' . $this->encodeStr($this->getTranDate());
		$str .='&';
		$str .= 'PrecaNo=' . $this->encodeStr($this->getPrecaNo());
		$str .='&';
		$str .= 'PrecaSeq=' . $this->encodeStr($this->getPrecaSeq());
		$str .='&';
		$str .= 'ExpireDate=' . $this->encodeStr($this->getExpireDate());
		$str .='&';
		$str .= 'ChargeType=' . $this->encodeStr($this->getChargeType());
		$str .='&';
		$str .= 'Forward=' . $this->encodeStr($this->getForward());
		$str .='&';
		$str .= 'Approve=' . $this->encodeStr($this->getApprove());
		$str .='&';
		$str .= 'CvsCode=' . $this->encodeStr($this->getCvsCode());
		$str .='&';
		$str .= 'CvsConfNo=' . $this->encodeStr($this->getCvsConfNo());
		$str .='&';
		$str .= 'CvsReceiptNo=' . $this->encodeStr($this->getCvsReceiptNo());
		$str .='&';
		$str .= 'PaymentTerm=' . $this->encodeStr($this->getPaymentTerm());
		$str .='&';
		$str .= 'ReceiptURL=' . $this->encodeStr($this->getReceiptURL());
		$str .='&';
		$str .= 'CustID=' . $this->encodeStr($this->getCustID());
		$str .='&';
		$str .= 'BkCode=' . $this->encodeStr($this->getBkCode());
		$str .='&';
		$str .= 'ConfNo=' . $this->encodeStr($this->getConfNo());
		$str .='&';
		$str .= 'PayeasyPaymentURL=' . $this->encodeStr($this->getPayeasyPaymentURL());
		$str .='&';
		$str .= 'FinishDate=' . $this->encodeStr($this->getFinishDate());


	    if ($this->isErrorOccurred()) {
            // エラー文字列を連結して返す
            $errString = parent::toString();
            $str .= '&' . $errString;
        }

        return $str;
	}

}
?>
