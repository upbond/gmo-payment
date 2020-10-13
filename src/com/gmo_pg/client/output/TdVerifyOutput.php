<?php
namespace Gineign\GmoPayment\Output;
use Gineign\GmoPayment\Output\BaseOutput;
/**
 * <b>3D認証後決済　出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 01-01-2008 00:00:00
 */
class TdVerifyOutput extends BaseOutput {

    /**
     * @var string オーダーID
     */
    private $orderId;

    /**
	 * @var string 仕向先コード
	 */
	private $forward;

    /**
     * @var string カード会社略称（SUMITOMO固定）
     */
    private $cardName;

    /**
     * @var integer 支払回数
     */
    private $payTimes;

    /**
     * @var string 支払方法
     */
    private $method;

    /**
	 * @var string 承認番号
	 */
	private $approve;

    /**
     * @var string トランザクションID
     */
    private $transactionId;

    /**
     * @var string 決済日付（yyyyMMddHHmmss書式）
     */
    private $tranDate;

    /**
     * @var string MD5ハッシュ（orderIdからtranDate + ショップパスワードのMD5ハッシュ）
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
        $this->setForward($params->get('Forward'));
        $this->setOrderId($params->get('OrderID'));
        $this->setCardName($params->get('CardName'));
        $this->setMethod($params->get('Method'));

        $times = $params->get('PayTimes');
        if (!is_null($times) && 0 != strlen($times)) {
            // 数値の場合のみ値をセットする
            $this->setPayTimes(is_numeric($times) ? $times : null);
        }

        $this->setTranId( $params->get('TranID') );
        $this->setTranDate($params->get('TranDate'));
        $this->setApprovalNo($params->get('Approve'));
        $this->setCheckString($params->get('CheckString'));

        $this->setClientField1($params->get('ClientField1'));
        $this->setClientField2($params->get('ClientField2'));
        $this->setClientField3($params->get('ClientField3'));
    }

    /**
     * オーダーID取得
     * @return string オーダーID
     */
    public function getOrderId() {
        return $this->orderId;
    }

    /**
     * カード会社略称取得
     * @return string カード会社略称
     */
    public function getCardName() {
        return $this->cardName;
    }

    /**
     * 仕向先カード会社コード取得
     * @reutrn string 仕向先カード会社コード
     */
    public function getForward(){
    	return $this->forward;
    }

    /**
     * 決済日付取得
     * @return string 決済日付(yyyyMMddHHmmdd形式)
     */
    public function getTranDate() {
        return $this->tranDate;
    }

    /**
     * 承認番号取得
     * @return string 承認番号
     */
    public function getApprovalNo(){
    	return $this->approve;
    }

    /**
     * トランザクションID取得
     * @return string トランザクションID
     */
    public function getTranId(){
    	return $this->transactionId;
    }

    /**
     * 支払回数取得
     * @return integer 支払回数
     */
    public function getPayTimes() {
        return $this->payTimes;
    }

    /**
     * 支払い方法取得
     * @return string 支払方法コード
     */
    public function getMethod() {
        return $this->method;
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
     * オーダーID設定
     *
     * @param string $orderId オーダーID
     */
    public function setOrderId($orderId) {
        $this->orderId = $orderId;
    }

    /**
     * 仕向先カード会社コード設定
     * @param string $forward 仕向先カード会社コード
     */
    public function setForward( $forward ){
    	$this->forward = $forward;
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
     * 支払回数設定
     *
     * @param integer $payTimes 支払回数
     */
    public function setPayTimes($payTimes) {
        $this->payTimes = $payTimes;
    }

    /**
     * 支払い方法設定
     *
     * @param string $method 支払方法コード
     */
    public function setMethod($method) {
        $this->method = $method;
    }

    /**
     * トランザクションID設定
     * @param string $tranID トランザクションID
     */
    public function setTranId( $tranID ){
    	$this->transactionId = $tranID;
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
     * 承認番号設定
     * @param string $approvalNo 承認番号
     */
    public function setApprovalNo( $approvalNo ){
    	$this->approve = $approvalNo;
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
     * TdVerifyOutputの文字列表現
	 * <p>
	 *  現在の各パラメータを、パラメータ名=値&パラメータ名=値の形式で取得します。
	 * </p>
	 * @return string 出力パラメータの文字列表現
     */
    public function toString() {
        $str  = 'OrderID=' . $this->getOrderId();
        $str .= '&';
        $str .= 'CardName=' . $this->getCardName();
        $str .= '&';
        $str .= 'Forward=' . $this->getForward();
        $str .= '&';
        $str .= 'Method=' . $this->getMethod();
        $str .= '&';
        $str .= 'PayTimes=' . $this->getPayTimes();
        $str .= '&';
        $str .= 'TranID=' . $this->getTranId();
        $str .= '&';
        $str .= 'TranDate=' . $this->getTranDate();
        $str .= '&';
        $str .= 'Approve=' . $this->getApprovalNo();
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
        return $str;
    }
}
?>