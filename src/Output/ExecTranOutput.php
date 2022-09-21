<?php
namespace Gineign\GmoPayment\Output;

use Gineign\GmoPayment\Output\BaseOutput;

/*require_once ('com/gmo_pg/client/output/BaseOutput.php');*/
/**
 * <b>決済実行　出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 01-01-2008 00:00:00
 */
class ExecTranOutput extends BaseOutput {

	/**
	 * @var string 3Dセキュアフラグ '1'=3Dセキュア続行 '0'=3Dセキュア必要なし
	 */
	private $acs;

	/**
	 * @var string オーダーID
	 */
	private $orderId;

	/**
	 * @var string カード会社略称（SUMITOMO固定）
	 */
	private $cardName;

	/**
	 * @var string 仕向先コード 決済を仕向けたカード会社コード
	 */
	private $forward;

	/**
	 * @var string カード会社承認番号
	 */
	private $approve;

	/**
	 * @var string 支払方法
	 */
	private $method;

	/**
	 * @var integer 支払回数
	 */
	private $payTimes;

	/**
	 * @var string トランザクションID
	 */
	private $transactionId;

	/**
	 * @var string 決済日付（yyyyMMddHHmmss）
	 */
	private $tranDate;

	/**
	 * @var string MD5ハッシュ（orderId～tranDate + ショップパスワードのMD5ハッシュ）
	 */
	private $checkString;

	/**
	 * @var string 加盟店自由項目1
	 */
	private $clientField1;

	/**
	 * @var string 加盟店自由項目2
	 */
	private $clientField2;

	/**
	 * @var string 加盟店自由項目3
	 */
	private $clientField3;

	/**
	 * @var string ACS（発行元カード会社）URL
	 */
	private $acsUrl;

	/**
	 * @var string 3Dセキュア認証要求電文
	 */
	private $paReq;

	/**
	 * @var string 取引ID
	 */
	private $md;

	/**
	 * @var string ActiveServerへのリダイレクトURL
	 */
	private $redirectUrl;

	/**
	 * コンストラクタ
	 *
	 * @param IgnoreCaseMap $params 出力パラメータ
	 */
	public function __construct($params = null) {
		parent::__construct($params);

		// 引数が無い場合は戻る
        if (is_null($params)) {
            return;
        }
        // マップの展開
        $this->setOrderId($params->get('OrderID'));
        $this->setCardName($params->get('CardName'));
        $this->setForward($params->get('Forward'));
        $this->setMethod($params->get('Method'));
        $times = $params->get('PayTimes');
        if (!is_null($times) && 0 != strlen($times)) {
            // 数値の場合のみ値をセットする
            $this->setPayTimes(is_numeric($times) ? $times : null);
        }
        $this->setTranId($params->get('TranID'));
        $this->setApprovalNo($params->get('Approve'));
        $this->setSecureFlag($params->get('Acs'));
        $this->setTranDate($params->get('TranDate'));
        $this->setCheckString($params->get('CheckString'));
        $this->setClientField1($params->get('ClientField1'));
        $this->setClientField2($params->get('ClientField2'));
        $this->setClientField3($params->get('ClientField3'));

        // 3Dセキュア設定部分
        $this->setAcsUrl($params->get('AcsUrl'));
        $this->setPaReq($params->get('PaReq'));
        $this->setMd($params->get('MD'));

        // 3Dセキュア2.0設定部分
        $this->setRedirectUrl($params->get('RedirectUrl'));
	}

	/**
	 * オーダーID取得
	 * @return string オーダーID
	 */
	public function getOrderId() {
		return $this->orderId;
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
	public function getApprovalNo() {
		return $this->approve;
	}

	/**
	 * 3Dセキュアフラグ取得
	 * @return string 3Dセキュアフラグ
	 */
	public function getSecureFlag(){
		return $this->acs;
	}

	/**
	 * トランザクションID取得
	 * @return string トランザクションID
	 */
	public function getTranId() {
		return $this->transactionId;
	}

	/**
	 * カード会社略称取得
	 * @return string カード会社略称
	 */
	public function getCardName() {
		return $this->cardName;
	}

	/**
	 * 支払い方法取得
	 * @return string 支払方法コード
	 */
	public function getMethod() {
		return $this->method;
	}

	/**
	 * 支払回数取得
	 * @return integer 支払回数
	 */
	public function getPayTimes() {
		return $this->payTimes;
	}

	/**
	 * 決済日付取得
	 * @return string 決済日付(yyyyMMddHHmmss形式)
	 */
	public function getTranDate() {
		return $this->tranDate;
	}

	/**
	 * MD5ハッシュ取得
	 * @return string MD5ハッシュ
	 */
	public function getCheckString() {
		return $this->checkString;
	}

	/**
	 * 加盟店自由項目1取得
	 * @return string 加盟店自由項目1
	 */
	public function getClientField1() {
		return $this->clientField1;
	}

	/**
	 * 加盟店自由項目2取得
	 * @return string 加盟店自由項目2
	 */
	public function getClientField2() {
		return $this->clientField2;
	}

	/**
	 * 加盟店自由項目3取得
	 * @return string 加盟店自由項目3
	 */
	public function getClientField3() {
		return $this->clientField3;
	}

	/**
	 * ACS（発行元カード会社）URL取得
	 * @return string ACS（発行元カード会社）URL(AcsUrl)
	 */
	public function getAcsUrl() {
		return $this->acsUrl;
	}

	/**
	 * 3Dセキュア認証要求電文取得
	 * @return string 3Dセキュア認証要求電文(PaReq)
	 */
	public function getPaReq() {
		return $this->paReq;
	}

	/**
	 * 取引ID取得
	 * @return string 取引ID
	 */
	public function getMd() {
		return $this->md;
	}

	/**
	 * ActiveServerへのリダイレクトURL取得
	 * @return string ActiveServerへのリダイレクトURL
	 */
	public function getRedirectUrl() {
	    return $this->redirectUrl;
	}

	/**
	 * オーダーID設定
	 *
	 * @param string $orderId オーダーID
	 */
	public function setOrderId($orderId) {
		$this->orderId = $orderId;
	}

	/**
	 * カード会社略称設定
	 *
	 * @param string $cardName カード会社略称
	 */
	public function setCardName($cardName) {
		$this->cardName = $cardName;
	}

	/**
	 * 支払い方法設定
	 *
	 * @param string $method 支払い方法
	 */
	public function setMethod($method) {
		$this->method = $method;
	}

	/**
	 * 支払回数設定
	 *
	 * @param integer $payTimes 支払回数
	 */
	public function setPayTimes($payTimes) {
		$this->payTimes = $payTimes;
	}

	/**
	 * 決済日付設定
	 *
	 * @param string $tranDate 決済日付(yyyyMMddHHmmss形式)
	 */
	public function setTranDate($tranDate) {
		$this->tranDate = $tranDate;
	}

	/**
	 * MD5ハッシュ設定
	 *
	 * @param string $checkString MD5ハッシュ
	 */
	public function setCheckString($checkString) {
		$this->checkString = $checkString;
	}

	/**
	 * 加盟店自由項目1設定
	 *
	 * @param string $clientField1 加盟店自由項目1
	 */
	public function setClientField1($clientField1) {
		$this->clientField1 = $clientField1;
	}

	/**
	 * 加盟店自由項目2設定
	 *
	 * @param string $clientField2 加盟店自由項目2
	 */
	public function setClientField2($clientField2) {
		$this->clientField2 = $clientField2;
	}

	/**
	 * 加盟店自由項目3設定
	 *
	 * @param string $clientField3 加盟店自由項目3
	 */
	public function setClientField3($clientField3) {
		$this->clientField3 = $clientField3;
	}

	/**
	 * ACS（発行元カード会社）URL設定
	 *
	 * @param string $acsUrl ACS（発行元カード会社）URL
	 */
	public function setAcsUrl($acsUrl) {
		$this->acsUrl = $acsUrl;
	}

	/**
	 * 3Dセキュア認証要求電文設定
	 *
	 * @param string $paReq 3Dセキュア認証要求電文
	 */
	public function setPaReq($paReq) {
		$this->paReq = $paReq;
	}

	/**
	 * 取引ID設定
	 *
	 * @param string $md 取引ID
	 */
	public function setMd($md) {
		$this->md = $md;
	}

	/**
	 * 仕向先コード設定
	 * @param string $仕向先コード
	 */
	public function setForward( $forward ) {
		$this->forward = $forward;
	}

	/**
	 * 承認番号設定
	 * @param string $approve 承認番号
	 */
	public function setApprovalNo( $approve ) {
		$this->approve = $approve;
	}

	/**
	 * 3Dセキュアフラグ設定
	 * @param string $flag 3Dセキュアフラグ
	 */
	public function setSecureFlag( $flag ){
		$this->acs = $flag;
	}

	/**
	 * トランザクションID設定
	 * @param string $id トランザクションID
	 */
	public function setTranId( $id ) {
		$this->transactionId = $id;
	}

	/**
	 * ActiveServerへのリダイレクトURL設定
	 * @param string $id トランザクションID
	 */
	public function setRedirectUrl( $redirectUrl ) {
	    $this->redirectUrl = $redirectUrl;
	}

	/**
	 * 3Dセキュア判定
	 * @return boolean 3Dセキュア続行要否(true=認証ページへのリダイレクトの必要あり)
	 */
	public function isTdSecure() {
	    return is_null($this->getAcsUrl()) ? false : true;
	}

	/**
	 * 3Dセキュア2.0判定
	 * @return boolean 3Dセキュア2.0続行要否(true=認証ページへのリダイレクトの必要あり)
	 */
	public function isTdSecure2() {
	    return is_null($this->getRedirectUrl()) ? false : true;
	}

	/**
	 * 文字列表現
	 * <p>
	 *  現在の各パラメータを、パラメータ名=値&パラメータ名=値の形式で取得します。
	 * </p>
	 * @return 出力パラメータ文字列表現
	 */
	public function toString() {
	    $str  = 'OrderID=' . $this->getOrderId();
        $str .= '&';
        $str .= 'CardName=' . $this->getCardName();
        $str .= '&';
        $str .= 'Method=' . $this->getMethod();
        $str .= '&';
        $str .= 'PayTimes=' . $this->getPayTimes();
        $str .= '&';
        $str .= 'TranDate=' . $this->getTranDate();
        $str .= '&';
        $str .= 'CheckString=' . $this->getCheckString();
        $str .= '&';
        $str .= 'ClientField1=' . $this->getClientField1();
        $str .= '&';
        $str .= 'ClientField2=' . $this->getClientField2();
        $str .= '&';
        $str .= 'ClientField3=' . $this->getClientField3();

        if ($this->isErrorOccurred()) {
            // エラー文字列を連結して返す
            $errString = parent::toString();
            $str .= '&' . $errString;
        }
        $str .= '&';

        // 3Dセキュア
        $str .= 'AcsUrl=' . $this->getAcsUrl();
        $str .= '&';
        $str .= 'PaReq=' . $this->getPaReq();
        $str .= '&';
        $str .= 'MD=' . $this->getMd();

        // 3Dセキュア2.0
        $str .= '&';
        $str .= 'RedirectUrl=' . $this->getRedirectUrl();

        return $str;
	}

}
?>