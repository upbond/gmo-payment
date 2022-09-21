<?php

namespace Gineign\GmoPayment\Input;

use Gineign\GmoPayment\Input\BaseInput;

#require_once 'com/gmo_pg/client/input/BaseInput.php';
/**
 * <b>決済実行　入力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage input
 * @see inputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 01-01-2008 00:00:00
 */
class ExecTranInput extends BaseInput {

	/**
	 * @var string 取引ID。GMO-PGが払い出した、取引を特定するID
	 */
	private $accessId;

	/**
	 * @var string 取引パスワード。取引IDと対になるパスワード
	 */
	private $accessPass;

	/**
	 * @var string オーダーID。加盟店様が発番した、取引を表すID
	 */
	private $orderId;

	/**
	 * @var string 支払方法
	 */
	private $method;

	/**
	 * @var integer 支払回数
	 */
	private $payTimes;

	/**
	 * @var string カード番号
	 */
	private $cardNo;

	/**
	 * @var string トークン
	 */
	private $token;

	/**
	 * @var string サイトID
	 */
	private $siteId;

	/**
	 * @var string サイトパスワード
	 */
	private $sitePass;

	/**
	 * @var string 会員ID
	 */
	private $memberId;

	/**
	 * @var string カード連番モード
	 */
	private $seqMode;

	/**
	 * @var integer 登録カード連番
	 */
	private $cardSeq;

	/**
	 * @var string カードパスワード
	 */
	private $cardPass;

	/**
	 * @var string 有効期限
	 */
	private $expire;

	/**
	 * @var string セキュリティコード
	 */
	private $securityCode;

	/**
	 * @var string HTTP_ACCEPT
	 */
	private $httpAccept;

	/**
	 * @var string HTTP_USER_AGENT
	 */
	private $httpUserAgent;

	/**
	 * @var string 加盟店自由項目1
	 */
	private $clientField1;

	/**
	 * @var string 加盟店自由項目
	 */
	private $clientField2;

	/**
	 * @var string 加盟店自由項目3
	 */
	private $clientField3;

	/**
	 * @var string 加盟店自由項目返却フラグ
	 */
	private $clientFieldFlag;

	/**
     * @var string 使用端末情報
     */
    private $deviceCategory;

    /**
     * @var string 利用明細に記載される文言
     */
    private $displayInfo;

    /**
     * @var string トークンタイプ
     */
    private $tokenType;

	/**
     * @var string 加盟店戻りURL
     */
    private $retUrl;

    /**
     * @var string モバイルアプリモード
     */
    private $appMode;

	private $tds2ChallengeIndType;


    /**
     * @var string コールバック方法
     */
    private $callbackType;

    /**
     * @var string カード会員最終更新日
     */
    private $tds2ChAccChange;

    /**
     * @var string カード会員作成日
     */
    private $tds2ChAccDate;

    /**
     * @var string カード会員パスワード変更日
     */
    private $tds2ChAccPwChange;

    /**
     * @var integer 過去6ヶ月間の購入回数
     */
    private $tds2NbPurchaseAccount;

    /**
     * @var string カード登録日
     */
    private $tds2PaymentAccAge;

    /**
     * @var integer 過去24時間のカード追加の試行回数
     */
    private $tds2ProvisionAttemptsDay;

    /**
     * @var string 配送先住所の初回使用日
     */
    private $tds2ShipAddressUsage;

    /**
     * @var string カード会員名と配送先名の一致/不一致
     */
    private $tds2ShipNameInd;

    /**
     * @var string カード会員の不審行為情報
     */
    private $tds2SuspiciousAccActivity;

    /**
     * @var integer 過去24時間の取引回数
     */
    private $tds2TxnActivityDay;

    /**
     * @var integer 前年の取引回数
     */
    private $tds2TxnActivityYear;

    /**
     * @var string ログイン証跡
     */
    private $tds2ThreeDSReqAuthData;

    /**
     * @var string ログイン方法
     */
    private $tds2ThreeDSReqAuthMethod;

    /**
     * @var string ログイン日時
     */
    private $tds2ThreeDSReqAuthTimestamp;

    /**
     * @var string 請求先住所と配送先住所の一致/不一致
     */
    private $tds2AddrMatch;

    /**
     * @var string 請求先住所の都市
     */
    private $tds2BillAddrCity;

    /**
     * @var string 請求先住所の国番号
     */
    private $tds2BillAddrCountry;

    /**
     * @var string 請求先住所の区域部分の１行目
     */
    private $tds2BillAddrLine1;

    /**
     * @var string 請求先住所の区域部分の２行目
     */
    private $tds2BillAddrLine2;

    /**
     * @var string 請求先住所の区域部分の３行目
     */
    private $tds2BillAddrLine3;

    /**
     * @var string 請求先住所の郵便番号
     */
    private $tds2BillAddrPostCode;

    /**
     * @var string 請求先住所の州または都道府県番号
     */
    private $tds2BillAddrState;

    /**
     * @var string カード会員のメールアドレス
     */
    private $tds2Email;

    /**
     * @var string 自宅電話の国コード
     */
    private $tds2HomePhoneCC;

    /**
     * @var string 自宅電話番号
     */
    private $tds2HomePhoneSubscriber;

    /**
     * @var string 携帯電話の国コード
     */
    private $tds2MobilePhoneCC;

    /**
     * @var string 携帯電話番号
     */
    private $tds2MobilePhoneSubscriber;

    /**
     * @var string 職場電話の国コード
     */
    private $tds2WorkPhoneCC;

    /**
     * @var string 職場電話番号
     */
    private $tds2WorkPhoneSubscriber;

    /**
     * @var string 配送先住所の都市
     */
    private $tds2ShipAddrCity;

    /**
     * @var string 配送先住所の国番号
     */
    private $tds2ShipAddrCountry;

    /**
     * @var string 配送先住所の区域部分の１行目
     */
    private $tds2ShipAddrLine1;

    /**
     * @var string 配送先住所の区域部分の２行目
     */
    private $tds2ShipAddrLine2;

    /**
     * @var string 配送先住所の区域部分の３行目
     */
    private $tds2ShipAddrLine3;

    /**
     * @var string 配送先住所の郵便番号
     */
    private $tds2ShipAddrPostCode;

    /**
     * @var string 配送先住所の州または都道府県番号
     */
    private $tds2ShipAddrState;

    /**
     * @var string 納品先電子メールアドレス
     */
    private $tds2DeliveryEmailAddress;

    /**
     * @var string 商品納品時間枠
     */
    private $tds2DeliveryTimeframe;

    /**
     * @var string プリペイドカードまたはギフトカードの総購入金額
     */
    private $tds2GiftCardAmount;

    /**
     * @var integer 購入されたプリペイドカードまたはギフトカード の総数
     */
    private $tds2GiftCardCount;

    /**
     * @var string 購入されたプリペイドカードまたはギフトカードの通貨コード
     */
    private $tds2GiftCardCurr;

    /**
     * @var string 商品の発売予定日
     */
    private $tds2PreOrderDate;

    /**
     * @var string 商品の販売時期情報
     */
    private $tds2PreOrderPurchaseInd;

    /**
     * @var string 商品の注文情報
     */
    private $tds2ReorderItemsInd;

    /**
     * @var string 取引の配送方法
     */
    private $tds2ShipInd;

    /**
     * @var string 継続課金の期限
     */
    private $tds2RecurringExpiry;

    /**
     * @var integer 継続課金の課金最小間隔日数
     */
    private $tds2RecurringFrequency;



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
	    // 加盟店自由項目返却フラグ(固定値)
        $this->clientFieldFlag = "1";
        // 使用端末情報(固定値)
        $this->deviceCategory = "0";
	}

	/**
	 * 入力パラメータ群の値を設定する
	 *
	 * @param IgnoreCaseMap $params 入力パラメータ
	 */
	public function setInputValues($params) {
		// 入力パラメータがnullの場合は設定処理を行わない
	    if (is_null($params)) {
	        return;
	    }


	    // 各項目の設定(PayTimesは値が数値でないものは無効とする)
        $this->setAccessId($this->getStringValue($params, 'AccessID', $this->getAccessId()));
	    $this->setAccessPass($this->getStringValue($params, 'AccessPass', $this->getAccessPass()));
	    $this->setOrderId($this->getStringValue($params, 'OrderID', $this->getOrderId()));
	    $this->setMethod($this->getStringValue($params, 'Method', $this->getMethod()));
	    $this->setPayTimes($this->getIntegerValue($params, 'PayTimes', $this->getPayTimes()));
	    $this->setCardNo($this->getStringValue($params, 'CardNo', $this->getCardNo()));
	    $this->setToken($this->getStringValue($params, 'Token', $this->getToken()));
	    $this->setSiteId($this->getStringValue($params, 'SiteID',$this->getSiteId()));
	    $this->setSitePass($this->getStringValue($params , 'SitePass' , $this->getSitePass()));
	    $this->setMemberId($this->getStringValue($params,'MemberID',$this->getMemberId()));
	    $this->setSeqMode($this->getStringValue($params,'SeqMode',$this->getSeqMode()));
	    $this->setCardSeq($this->getIntegerValue($params,'CardSeq',$this->getCardSeq()));
		$this->setCardPass($this->getStringValue($params,'CardPass',$this->getCardPass()));
	    $this->setExpire($this->getStringValue($params, 'Expire', $this->getExpire()));
	    $this->setSecurityCode($this->getStringValue($params, 'SecurityCode', $this->getSecurityCode()));
	    $this->setHttpAccept($this->getStringValue($params, 'HttpAccept', $this->getHttpAccept()));
	    $this->setHttpUserAgent($this->getStringValue($params, 'HttpUserAgent', $this->getHttpUserAgent()));
	    $this->setClientField1($this->getStringValue($params, 'ClientField1', $this->getClientField1()));
	    $this->setClientField2($this->getStringValue($params, 'ClientField2', $this->getClientField2()));
	    $this->setClientField3($this->getStringValue($params, 'ClientField3', $this->getClientField3()));
	    $this->setDisplayInfo($this->getStringValue($params, 'DisplayInfo', $this->getDisplayInfo()));
	    $this->setTokenType($this->getStringValue($params, 'TokenType', $this->getTokenType()));
	    $this->setRetUrl($this->getStringValue($params, 'RetUrl', $this->getRetUrl()));
		$this->setTds2ChallengeIndType($this->getStringValue($params, 'Tds2ChallengeIndType', $this->getTds2ChallengeIndType()));
	    $this->setAppMode($this->getStringValue($params, 'AppMode', $this->getAppMode()));
	    $this->setCallbackType($this->getStringValue($params, 'CallbackType', $this->getCallbackType()));
	    $this->setTds2ChAccChange($this->getStringValue($params, 'Tds2ChAccChange', $this->getTds2ChAccChange()));
	    $this->setTds2ChAccDate($this->getStringValue($params, 'Tds2ChAccDate', $this->getTds2ChAccDate()));
	    $this->setTds2ChAccPwChange($this->getStringValue($params, 'Tds2ChAccPwChange', $this->getTds2ChAccPwChange()));
	    $this->setTds2NbPurchaseAccount($this->getIntegerValue($params, 'Tds2NbPurchaseAccount', $this->getTds2NbPurchaseAccount()));
	    $this->setTds2PaymentAccAge($this->getStringValue($params, 'Tds2PaymentAccAge', $this->getTds2PaymentAccAge()));
	    $this->setTds2ProvisionAttemptsDay($this->getIntegerValue($params, 'Tds2ProvisionAttemptsDay', $this->getTds2ProvisionAttemptsDay()));
	    $this->setTds2ShipAddressUsage($this->getStringValue($params, 'Tds2ShipAddressUsage', $this->getTds2ShipAddressUsage()));
	    $this->setTds2ShipNameInd($this->getStringValue($params, 'Tds2ShipNameInd', $this->getTds2ShipNameInd()));
	    $this->setTds2SuspiciousAccActivity($this->getStringValue($params, 'Tds2SuspiciousAccActivity', $this->getTds2SuspiciousAccActivity()));
	    $this->setTds2TxnActivityDay($this->getIntegerValue($params, 'Tds2TxnActivityDay', $this->getTds2TxnActivityDay()));
	    $this->setTds2TxnActivityYear($this->getIntegerValue($params, 'Tds2TxnActivityYear', $this->getTds2TxnActivityYear()));
	    $this->setTds2ThreeDSReqAuthData($this->getStringValue($params, 'Tds2ThreeDSReqAuthData', $this->getTds2ThreeDSReqAuthData()));
	    $this->setTds2ThreeDSReqAuthMethod($this->getStringValue($params, 'Tds2ThreeDSReqAuthMethod', $this->getTds2ThreeDSReqAuthMethod()));
	    $this->setTds2ThreeDSReqAuthTimestamp($this->getStringValue($params, 'Tds2ThreeDSReqAuthTimestamp', $this->getTds2ThreeDSReqAuthTimestamp()));
	    $this->setTds2AddrMatch($this->getStringValue($params, 'Tds2AddrMatch', $this->getTds2AddrMatch()));
	    $this->setTds2BillAddrCity($this->getStringValue($params, 'Tds2BillAddrCity', $this->getTds2BillAddrCity()));
	    $this->setTds2BillAddrCountry($this->getStringValue($params, 'Tds2BillAddrCountry', $this->getTds2BillAddrCountry()));
	    $this->setTds2BillAddrLine1($this->getStringValue($params, 'Tds2BillAddrLine1', $this->getTds2BillAddrLine1()));
	    $this->setTds2BillAddrLine2($this->getStringValue($params, 'Tds2BillAddrLine2', $this->getTds2BillAddrLine2()));
	    $this->setTds2BillAddrLine3($this->getStringValue($params, 'Tds2BillAddrLine3', $this->getTds2BillAddrLine3()));
	    $this->setTds2BillAddrPostCode($this->getStringValue($params, 'Tds2BillAddrPostCode', $this->getTds2BillAddrPostCode()));
	    $this->setTds2BillAddrState($this->getStringValue($params, 'Tds2BillAddrState', $this->getTds2BillAddrState()));
	    $this->setTds2Email($this->getStringValue($params, 'Tds2Email', $this->getTds2Email()));
	    $this->setTds2HomePhoneCC($this->getStringValue($params, 'Tds2HomePhoneCC', $this->getTds2HomePhoneCC()));
	    $this->setTds2HomePhoneSubscriber($this->getStringValue($params, 'Tds2HomePhoneSubscriber', $this->getTds2HomePhoneSubscriber()));
	    $this->setTds2MobilePhoneCC($this->getStringValue($params, 'Tds2MobilePhoneCC', $this->getTds2MobilePhoneCC()));
	    $this->setTds2MobilePhoneSubscriber($this->getStringValue($params, 'Tds2MobilePhoneSubscriber', $this->getTds2MobilePhoneSubscriber()));
	    $this->setTds2WorkPhoneCC($this->getStringValue($params, 'Tds2WorkPhoneCC', $this->getTds2WorkPhoneCC()));
	    $this->setTds2WorkPhoneSubscriber($this->getStringValue($params, 'Tds2WorkPhoneSubscriber', $this->getTds2WorkPhoneSubscriber()));
	    $this->setTds2ShipAddrCity($this->getStringValue($params, 'Tds2ShipAddrCity', $this->getTds2ShipAddrCity()));
	    $this->setTds2ShipAddrCountry($this->getStringValue($params, 'Tds2ShipAddrCountry', $this->getTds2ShipAddrCountry()));
	    $this->setTds2ShipAddrLine1($this->getStringValue($params, 'Tds2ShipAddrLine1', $this->getTds2ShipAddrLine1()));
	    $this->setTds2ShipAddrLine2($this->getStringValue($params, 'Tds2ShipAddrLine2', $this->getTds2ShipAddrLine2()));
	    $this->setTds2ShipAddrLine3($this->getStringValue($params, 'Tds2ShipAddrLine3', $this->getTds2ShipAddrLine3()));
	    $this->setTds2ShipAddrPostCode($this->getStringValue($params, 'Tds2ShipAddrPostCode', $this->getTds2ShipAddrPostCode()));
	    $this->setTds2ShipAddrState($this->getStringValue($params, 'Tds2ShipAddrState', $this->getTds2ShipAddrState()));
	    $this->setTds2DeliveryEmailAddress($this->getStringValue($params, 'Tds2DeliveryEmailAddress', $this->getTds2DeliveryEmailAddress()));
	    $this->setTds2DeliveryTimeframe($this->getStringValue($params, 'Tds2DeliveryTimeframe', $this->getTds2DeliveryTimeframe()));
	    $this->setTds2GiftCardAmount($this->getStringValue($params, 'Tds2GiftCardAmount', $this->getTds2GiftCardAmount()));
	    $this->setTds2GiftCardCount($this->getIntegerValue($params, 'Tds2GiftCardCount', $this->getTds2GiftCardCount()));
	    $this->setTds2GiftCardCurr($this->getStringValue($params, 'Tds2GiftCardCurr', $this->getTds2GiftCardCurr()));
	    $this->setTds2PreOrderDate($this->getStringValue($params, 'Tds2PreOrderDate', $this->getTds2PreOrderDate()));
	    $this->setTds2PreOrderPurchaseInd($this->getStringValue($params, 'Tds2PreOrderPurchaseInd', $this->getTds2PreOrderPurchaseInd()));
	    $this->setTds2ReorderItemsInd($this->getStringValue($params, 'Tds2ReorderItemsInd', $this->getTds2ReorderItemsInd()));
	    $this->setTds2ShipInd($this->getStringValue($params, 'Tds2ShipInd', $this->getTds2ShipInd()));
	    $this->setTds2RecurringExpiry($this->getStringValue($params, 'Tds2RecurringExpiry', $this->getTds2RecurringExpiry()));
	    $this->setTds2RecurringFrequency($this->getIntegerValue($params, 'Tds2RecurringFrequency', $this->getTds2RecurringFrequency()));
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
	 * オーダーID取得
	 * @return string オーダーID
	 */
	public function getOrderId() {
		return $this->orderId;
	}

	/**
	 * 支払回数取得
	 * @return integer 支払回数
	 */
	public function getPayTimes() {
		return $this->payTimes;
	}

	/**
	 * カード番号取得
	 * @return string カード番号
	 */
	public function getCardNo() {
		return $this->cardNo;
	}

	/**
	 * トークン取得
	 * @return string トークン
	 */
	public function getToken() {
		return $this->token;
	}

	/**
	 * サイトID取得
	 * @return string サイトID
	 */
	public function getSiteId(){
		return $this->siteId;
	}

	/**
	 * サイトパスワード取得
	 * @return string サイトパスワード
	 */
	public function getSitePass() {
		return $this->sitePass;
	}

	/**
	 * 会員ID取得
	 * @return string 会員ID
	 */
	public function getMemberId(){
		return $this->memberId;
	}

	/**
	 * カード連番指定モード取得
	 * @return string カード連番指定モード
	 */
	public function getSeqMode(){
		return $this->seqMode;
	}

	/**
	 * 登録カード連番取得
	 * @return integer 登録カード連番
	 */
	public function getCardSeq(){
		return $this->cardSeq;
	}

	/**
	 * カードパスワード取得
	 * @return string カードパスワード
	 */
	public function getCardPass(){
		return $this->cardPass;
	}

	/**
	 * 支払い方法取得
	 * @return string 支払方法
	 */
	public function getMethod() {
		return $this->method;
	}

	/**
	 * 有効期限取得
	 * @return string 有効期限(YYMM)
	 */
	public function getExpire() {
		return $this->expire;
	}

	/**
	 * セキュリティコード取得
	 * @return string セキュリティコード
	 */
	public function getSecurityCode() {
		return $this->securityCode;
	}

	/**
	 * HTTP_ACCEPT取得
	 * @return string HTTP_ACCEPT
	 */
	public function getHttpAccept() {
		return $this->httpAccept;
	}

	/**
	 * HTTP_USER_AGENT取得
	 * @return string HTTP_USER_AGENT
	 */
	public function getHttpUserAgent() {
		return $this->httpUserAgent;
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
	 * 利用明細に記載される文言取得
	 * @return string 利用明細に記載される文言
	 */
	public function getDisplayInfo() {
		return $this->displayInfo;
	}

	/**
	 * トークンタイプ取得
	 * @return string トークンタイプ
	 */
	public function getTokenType() {
		return $this->tokenType;
	}

	/**
	 * 加盟店戻りURL取得
	 * @return string 加盟店戻りURL
	 */
	public function getRetUrl() {
	    return $this->retUrl;
	}

	/**
	 * モバイルアプリモード取得
	 * @return string モバイルアプリモード
	 */
	public function getAppMode() {
	    return $this->appMode;
	}

	public function getTds2ChallengeIndType() {
	    return $this->tds2ChallengeIndType;
	}

	/**
	 * コールバック方法取得
	 * @return string コールバック方法
	 */
	public function getCallbackType() {
	    return $this->callbackType;
	}

	/**
	 * カード会員最終更新日取得
	 * @return string カード会員最終更新日
	 */
	public function getTds2ChAccChange() {
	    return $this->tds2ChAccChange;
	}

	/**
	 * カード会員作成日取得
	 * @return string カード会員作成日
	 */
	public function getTds2ChAccDate() {
	    return $this->tds2ChAccDate;
	}

	/**
	 * カード会員パスワード変更日取得
	 * @return string カード会員パスワード変更日
	 */
	public function getTds2ChAccPwChange() {
	    return $this->tds2ChAccPwChange;
	}

	/**
	 * 過去6ヶ月間の購入回数取得
	 * @return integer 過去6ヶ月間の購入回数
	 */
	public function getTds2NbPurchaseAccount() {
	    return $this->tds2NbPurchaseAccount;
	}

	/**
	 * カード登録日取得
	 * @return string カード登録日
	 */
	public function getTds2PaymentAccAge() {
	    return $this->tds2PaymentAccAge;
	}

	/**
	 * 過去24時間のカード追加の試行回数取得
	 * @return integer 過去24時間のカード追加の試行回数
	 */
	public function getTds2ProvisionAttemptsDay() {
	    return $this->tds2ProvisionAttemptsDay;
	}

	/**
	 * 配送先住所の初回使用日取得
	 * @return string 配送先住所の初回使用日
	 */
	public function getTds2ShipAddressUsage() {
	    return $this->tds2ShipAddressUsage;
	}

	/**
	 * カード会員名と配送先名の一致/不一致取得
	 * @return string カード会員名と配送先名の一致/不一致
	 */
	public function getTds2ShipNameInd() {
	    return $this->tds2ShipNameInd;
	}

	/**
	 * カード会員の不審行為情報取得
	 * @return string カード会員の不審行為情報
	 */
	public function getTds2SuspiciousAccActivity() {
	    return $this->tds2SuspiciousAccActivity;
	}

	/**
	 * 過去24時間の取引回数取得
	 * @return integer 過去24時間の取引回数
	 */
	public function getTds2TxnActivityDay() {
	    return $this->tds2TxnActivityDay;
	}

	/**
	 * 前年の取引回数取得
	 * @return integer 前年の取引回数
	 */
	public function getTds2TxnActivityYear() {
	    return $this->tds2TxnActivityYear;
	}

	/**
	 * ログイン証跡取得
	 * @return string ログイン証跡
	 */
	public function getTds2ThreeDSReqAuthData() {
	    return $this->tds2ThreeDSReqAuthData;
	}

	/**
	 * ログイン方法取得
	 * @return string ログイン方法
	 */
	public function getTds2ThreeDSReqAuthMethod() {
	    return $this->tds2ThreeDSReqAuthMethod;
	}

	/**
	 * ログイン日時取得
	 * @return string ログイン日時
	 */
	public function getTds2ThreeDSReqAuthTimestamp() {
	    return $this->tds2ThreeDSReqAuthTimestamp;
	}

	/**
	 * 請求先住所と配送先住所の一致/不一致取得
	 * @return string 請求先住所と配送先住所の一致/不一致
	 */
	public function getTds2AddrMatch() {
	    return $this->tds2AddrMatch;
	}

	/**
	 * 請求先住所の都市取得
	 * @return string 請求先住所の都市
	 */
	public function getTds2BillAddrCity() {
	    return $this->tds2BillAddrCity;
	}

	/**
	 * 請求先住所の国番号取得
	 * @return string 請求先住所の国番号
	 */
	public function getTds2BillAddrCountry() {
	    return $this->tds2BillAddrCountry;
	}

	/**
	 * 請求先住所の区域部分の１行目取得
	 * @return string 請求先住所の区域部分の１行目
	 */
	public function getTds2BillAddrLine1() {
	    return $this->tds2BillAddrLine1;
	}

	/**
	 * 請求先住所の区域部分の２行目取得
	 * @return string 請求先住所の区域部分の２行目
	 */
	public function getTds2BillAddrLine2() {
	    return $this->tds2BillAddrLine2;
	}

	/**
	 * 請求先住所の区域部分の３行目取得
	 * @return string 請求先住所の区域部分の３行目
	 */
	public function getTds2BillAddrLine3() {
	    return $this->tds2BillAddrLine3;
	}

	/**
	 * 請求先住所の郵便番号取得
	 * @return string 請求先住所の郵便番号
	 */
	public function getTds2BillAddrPostCode() {
	    return $this->tds2BillAddrPostCode;
	}

	/**
	 * 請求先住所の州または都道府県番号取得
	 * @return string 請求先住所の州または都道府県番号
	 */
	public function getTds2BillAddrState() {
	    return $this->tds2BillAddrState;
	}

	/**
	 * カード会員のメールアドレス取得
	 * @return string カード会員のメールアドレス
	 */
	public function getTds2Email() {
	    return $this->tds2Email;
	}

	/**
	 * 自宅電話の国コード取得
	 * @return string 自宅電話の国コード
	 */
	public function getTds2HomePhoneCC() {
	    return $this->tds2HomePhoneCC;
	}

	/**
	 * 自宅電話番号取得
	 * @return string 自宅電話番号
	 */
	public function getTds2HomePhoneSubscriber() {
	    return $this->tds2HomePhoneSubscriber;
	}

	/**
	 * 携帯電話の国コード取得
	 * @return string 携帯電話の国コード
	 */
	public function getTds2MobilePhoneCC() {
	    return $this->tds2MobilePhoneCC;
	}

	/**
	 * 携帯電話番号取得
	 * @return string 携帯電話番号
	 */
	public function getTds2MobilePhoneSubscriber() {
	    return $this->tds2MobilePhoneSubscriber;
	}

	/**
	 * 職場電話の国コード取得
	 * @return string 職場電話の国コード
	 */
	public function getTds2WorkPhoneCC() {
	    return $this->tds2WorkPhoneCC;
	}

	/**
	 * 職場電話番号取得
	 * @return string 職場電話番号
	 */
	public function getTds2WorkPhoneSubscriber() {
	    return $this->tds2WorkPhoneSubscriber;
	}

	/**
	 * 配送先住所の都市取得
	 * @return string 配送先住所の都市
	 */
	public function getTds2ShipAddrCity() {
	    return $this->tds2ShipAddrCity;
	}

	/**
	 * 配送先住所の国番号取得
	 * @return string 配送先住所の国番号
	 */
	public function getTds2ShipAddrCountry() {
	    return $this->tds2ShipAddrCountry;
	}

	/**
	 * 配送先住所の区域部分の１行目取得
	 * @return string 配送先住所の区域部分の１行目
	 */
	public function getTds2ShipAddrLine1() {
	    return $this->tds2ShipAddrLine1;
	}

	/**
	 * 配送先住所の区域部分の２行目取得
	 * @return string 配送先住所の区域部分の２行目
	 */
	public function getTds2ShipAddrLine2() {
	    return $this->tds2ShipAddrLine2;
	}

	/**
	 * 配送先住所の区域部分の３行目取得
	 * @return string 配送先住所の区域部分の３行目
	 */
	public function getTds2ShipAddrLine3() {
	    return $this->tds2ShipAddrLine3;
	}

	/**
	 * 配送先住所の郵便番号取得
	 * @return string 配送先住所の郵便番号
	 */
	public function getTds2ShipAddrPostCode() {
	    return $this->tds2ShipAddrPostCode;
	}

	/**
	 * 配送先住所の州または都道府県番号取得
	 * @return string 配送先住所の州または都道府県番号
	 */
	public function getTds2ShipAddrState() {
	    return $this->tds2ShipAddrState;
	}

	/**
	 * 納品先電子メールアドレス取得
	 * @return string 納品先電子メールアドレス
	 */
	public function getTds2DeliveryEmailAddress() {
	    return $this->tds2DeliveryEmailAddress;
	}

	/**
	 * 商品納品時間枠取得
	 * @return string 商品納品時間枠
	 */
	public function getTds2DeliveryTimeframe() {
	    return $this->tds2DeliveryTimeframe;
	}

	/**
	 * プリペイドカードまたはギフトカードの総購入金額取得
	 * @return string プリペイドカードまたはギフトカードの総購入金額
	 */
	public function getTds2GiftCardAmount() {
	    return $this->tds2GiftCardAmount;
	}

	/**
	 * 購入されたプリペイドカードまたはギフトカード の総数取得
	 * @return integer 購入されたプリペイドカードまたはギフトカード の総数
	 */
	public function getTds2GiftCardCount() {
	    return $this->tds2GiftCardCount;
	}

	/**
	 * 購入されたプリペイドカードまたはギフトカードの通貨コード取得
	 * @return string 購入されたプリペイドカードまたはギフトカードの通貨コード
	 */
	public function getTds2GiftCardCurr() {
	    return $this->tds2GiftCardCurr;
	}

	/**
	 * 商品の発売予定日取得
	 * @return string 商品の発売予定日
	 */
	public function getTds2PreOrderDate() {
	    return $this->tds2PreOrderDate;
	}

	/**
	 * 商品の販売時期情報取得
	 * @return string 商品の販売時期情報
	 */
	public function getTds2PreOrderPurchaseInd() {
	    return $this->tds2PreOrderPurchaseInd;
	}

	/**
	 * 商品の注文情報取得
	 * @return string 商品の注文情報
	 */
	public function getTds2ReorderItemsInd() {
	    return $this->tds2ReorderItemsInd;
	}

	/**
	 * 取引の配送方法取得
	 * @return string 取引の配送方法
	 */
	public function getTds2ShipInd() {
	    return $this->tds2ShipInd;
	}

	/**
	 * 継続課金の期限取得
	 * @return string 継続課金の期限
	 */
	public function getTds2RecurringExpiry() {
	    return $this->tds2RecurringExpiry;
	}

	/**
	 * 継続課金の課金最小間隔日数取得
	 * @return integer 継続課金の課金最小間隔日数
	 */
	public function getTds2RecurringFrequency() {
	    return $this->tds2RecurringFrequency;
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
	 * 取引パスワードを設定
	 *
	 * @param string $accessPass 取引パスワード
	 */
	public function setAccessPass($accessPass) {
		$this->accessPass = $accessPass;
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
	 * カード番号設定
	 *
	 * @param string $cardNo カード番号
	 */
	public function setCardNo($cardNo) {
		$this->cardNo = $cardNo;
	}

	/**
	 *トークン設定
	 *
	 * @param string $token トークン
	 */
	public function setToken($token) {
		$this->token = $token;
	}

	/**
	 * サイトID設定
	 * @param string $siteId サイトID
	 */
	public function setSiteId($siteId){
		$this->siteId = $siteId;
	}

	/**
	 * サイトパスワード設定
	 *
	 * @param string $sitePass サイトパスワード
	 */
	public function setSitePass($sitePass) {
		$this->sitePass = $sitePass;
	}

	/**
	 * 会員ID設定
	 *
	 * @param string $memberId 会員ID
	 */
	public function setMemberId($memberId){
		$this->memberId = $memberId;
	}

	/**
	 * カード連番指定モード設定
	 * @param string $seqMode カード連番指定モード
	 */
	public function setSeqMode($seqMode){
		$this->seqMode = $seqMode;
	}

	/**
	 * 登録カード連番設定
	 * @param integer $cardSeq 登録カード連番
	 */
	public function setCardSeq($cardSeq){
		$this->cardSeq = $cardSeq;
	}

	/**
	 * カードパスワード設定
	 * @param string $cardPass カードパスワード
	 */
	public function setCardPass($cardPass){
		$this->cardPass=$cardPass;
	}

	/**
	 * 有効期限設定
	 *
	 * @param string $expire 有効期限(YYMM)
	 */
	public function setExpire($expire) {
		$this->expire = $expire;
	}

	/**
	 * セキュリティコード設定
	 *
	 * @param string $securityCode セキュリティコード
	 */
	public function setSecurityCode($securityCode) {
		$this->securityCode = $securityCode;
	}

	/**
	 * HTTP_ACCEPT設定
	 *
	 * @param string $httpAccept HTTP_ACCEPT
	 */
	public function setHttpAccept($httpAccept) {
		$this->httpAccept = $httpAccept;
	}

	/**
	 * HTTP_USER_AGENT設定
	 *
	 * @param string $httpUserAgent HTTP_USER_AGENT
	 */
	public function setHttpUserAgent($httpUserAgent) {
		$this->httpUserAgent = $httpUserAgent;
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
	 * 利用明細に記載される文言設定
	 *
	 * @param string $clientField3 利用明細に記載される文言
	 */
	public function setDisplayInfo($displayInfo) {
		$this->displayInfo = $displayInfo;
	}

	/**
	 * トークンタイプ設定
	 *
	 * @param string $tokneType トークンタイプ
	 */
	public function setTokenType($tokneType) {
		$this->tokenType = $tokneType;
	}

	/**
	 * 加盟店戻りURL設定
	 *
	 * @param string $retUrl 加盟店戻りURL
	 */
	public function setRetUrl($retUrl) {
	    $this->retUrl = $retUrl;
	}

	/**
	 * モバイルアプリモード設定
	 *
	 * @param string $appMode モバイルアプリモード
	 */
	public function setAppMode($appMode) {
	    $this->appMode = $appMode;
	}

	public function setTds2ChallengeIndType($tds2ChallengeIndType) {
	    $this->tds2ChallengeIndType = $tds2ChallengeIndType;
	}

	/**
	 * コールバック方法設定
	 *
	 * @param string $callbackType コールバック方法
	 */
	public function setCallbackType($callbackType) {
	    $this->callbackType = $callbackType;
	}

	/**
	 * カード会員最終更新日設定
	 *
	 * @param string $tds2ChAccChange カード会員最終更新日
	 */
	public function setTds2ChAccChange($tds2ChAccChange) {
	    $this->tds2ChAccChange = $tds2ChAccChange;
	}

	/**
	 * カード会員作成日設定
	 *
	 * @param string $tds2ChAccDate カード会員作成日
	 */
	public function setTds2ChAccDate($tds2ChAccDate) {
	    $this->tds2ChAccDate = $tds2ChAccDate;
	}

	/**
	 * カード会員パスワード変更日設定
	 *
	 * @param string $tds2ChAccPwChange カード会員パスワード変更日
	 */
	public function setTds2ChAccPwChange($tds2ChAccPwChange) {
	    $this->tds2ChAccPwChange = $tds2ChAccPwChange;
	}

	/**
	 * 過去6ヶ月間の購入回数設定
	 *
	 * @param integer $tds2NbPurchaseAccount 過去6ヶ月間の購入回数
	 */
	public function setTds2NbPurchaseAccount($tds2NbPurchaseAccount) {
	    $this->tds2NbPurchaseAccount = $tds2NbPurchaseAccount;
	}

	/**
	 * カード登録日設定
	 *
	 * @param string $tds2PaymentAccAge カード登録日
	 */
	public function setTds2PaymentAccAge($tds2PaymentAccAge) {
	    $this->tds2PaymentAccAge = $tds2PaymentAccAge;
	}

	/**
	 * 過去24時間のカード追加の試行回数設定
	 *
	 * @param integer $tds2ProvisionAttemptsDay 過去24時間のカード追加の試行回数
	 */
	public function setTds2ProvisionAttemptsDay($tds2ProvisionAttemptsDay) {
	    $this->tds2ProvisionAttemptsDay = $tds2ProvisionAttemptsDay;
	}

	/**
	 * 配送先住所の初回使用日設定
	 *
	 * @param string $tds2ShipAddressUsage 配送先住所の初回使用日
	 */
	public function setTds2ShipAddressUsage($tds2ShipAddressUsage) {
	    $this->tds2ShipAddressUsage = $tds2ShipAddressUsage;
	}

	/**
	 * カード会員名と配送先名の一致/不一致設定
	 *
	 * @param string $tds2ShipNameInd カード会員名と配送先名の一致/不一致
	 */
	public function setTds2ShipNameInd($tds2ShipNameInd) {
	    $this->tds2ShipNameInd = $tds2ShipNameInd;
	}

	/**
	 * カード会員の不審行為情報設定
	 *
	 * @param string $tds2SuspiciousAccActivity カード会員の不審行為情報
	 */
	public function setTds2SuspiciousAccActivity($tds2SuspiciousAccActivity) {
	    $this->tds2SuspiciousAccActivity = $tds2SuspiciousAccActivity;
	}

	/**
	 * 過去24時間の取引回数設定
	 *
	 * @param integer $tds2TxnActivityDay 過去24時間の取引回数
	 */
	public function setTds2TxnActivityDay($tds2TxnActivityDay) {
	    $this->tds2TxnActivityDay = $tds2TxnActivityDay;
	}

	/**
	 * 前年の取引回数設定
	 *
	 * @param integer $tds2TxnActivityYear 前年の取引回数
	 */
	public function setTds2TxnActivityYear($tds2TxnActivityYear) {
	    $this->tds2TxnActivityYear = $tds2TxnActivityYear;
	}

	/**
	 * ログイン証跡設定
	 *
	 * @param string $tds2ThreeDSReqAuthData ログイン証跡
	 */
	public function setTds2ThreeDSReqAuthData($tds2ThreeDSReqAuthData) {
	    $this->tds2ThreeDSReqAuthData = $tds2ThreeDSReqAuthData;
	}

	/**
	 * ログイン方法設定
	 *
	 * @param string $tds2ThreeDSReqAuthMethod ログイン方法
	 */
	public function setTds2ThreeDSReqAuthMethod($tds2ThreeDSReqAuthMethod) {
	    $this->tds2ThreeDSReqAuthMethod = $tds2ThreeDSReqAuthMethod;
	}

	/**
	 * ログイン日時設定
	 *
	 * @param string $tds2ThreeDSReqAuthTimestamp ログイン日時
	 */
	public function setTds2ThreeDSReqAuthTimestamp($tds2ThreeDSReqAuthTimestamp) {
	    $this->tds2ThreeDSReqAuthTimestamp = $tds2ThreeDSReqAuthTimestamp;
	}

	/**
	 * 請求先住所と配送先住所の一致/不一致設定
	 *
	 * @param string $tds2AddrMatch 請求先住所と配送先住所の一致/不一致
	 */
	public function setTds2AddrMatch($tds2AddrMatch) {
	    $this->tds2AddrMatch = $tds2AddrMatch;
	}

	/**
	 * 請求先住所の都市設定
	 *
	 * @param string $tds2BillAddrCity 請求先住所の都市
	 */
	public function setTds2BillAddrCity($tds2BillAddrCity) {
	    $this->tds2BillAddrCity = $tds2BillAddrCity;
	}

	/**
	 * 請求先住所の国番号設定
	 *
	 * @param string $tds2BillAddrCountry 請求先住所の国番号
	 */
	public function setTds2BillAddrCountry($tds2BillAddrCountry) {
	    $this->tds2BillAddrCountry = $tds2BillAddrCountry;
	}

	/**
	 * 請求先住所の区域部分の１行目設定
	 *
	 * @param string $tds2BillAddrLine1 請求先住所の区域部分の１行目
	 */
	public function setTds2BillAddrLine1($tds2BillAddrLine1) {
	    $this->tds2BillAddrLine1 = $tds2BillAddrLine1;
	}

	/**
	 * 請求先住所の区域部分の２行目設定
	 *
	 * @param string $tds2BillAddrLine2 請求先住所の区域部分の２行目
	 */
	public function setTds2BillAddrLine2($tds2BillAddrLine2) {
	    $this->tds2BillAddrLine2 = $tds2BillAddrLine2;
	}

	/**
	 * 請求先住所の区域部分の３行目設定
	 *
	 * @param string $tds2BillAddrLine3 請求先住所の区域部分の３行目
	 */
	public function setTds2BillAddrLine3($tds2BillAddrLine3) {
	    $this->tds2BillAddrLine3 = $tds2BillAddrLine3;
	}

	/**
	 * 請求先住所の郵便番号設定
	 *
	 * @param string $tds2BillAddrPostCode 請求先住所の郵便番号
	 */
	public function setTds2BillAddrPostCode($tds2BillAddrPostCode) {
	    $this->tds2BillAddrPostCode = $tds2BillAddrPostCode;
	}

	/**
	 * 請求先住所の州または都道府県番号設定
	 *
	 * @param string $tds2BillAddrState 請求先住所の州または都道府県番号
	 */
	public function setTds2BillAddrState($tds2BillAddrState) {
	    $this->tds2BillAddrState = $tds2BillAddrState;
	}

	/**
	 * カード会員のメールアドレス設定
	 *
	 * @param string $tds2Email カード会員のメールアドレス
	 */
	public function setTds2Email($tds2Email) {
	    $this->tds2Email = $tds2Email;
	}

	/**
	 * 自宅電話の国コード設定
	 *
	 * @param string $tds2HomePhoneCC 自宅電話の国コード
	 */
	public function setTds2HomePhoneCC($tds2HomePhoneCC) {
	    $this->tds2HomePhoneCC = $tds2HomePhoneCC;
	}

	/**
	 * 自宅電話番号設定
	 *
	 * @param string $tds2HomePhoneSubscriber 自宅電話番号
	 */
	public function setTds2HomePhoneSubscriber($tds2HomePhoneSubscriber) {
	    $this->tds2HomePhoneSubscriber = $tds2HomePhoneSubscriber;
	}

	/**
	 * 携帯電話の国コード設定
	 *
	 * @param string $tds2MobilePhoneCC 携帯電話の国コード
	 */
	public function setTds2MobilePhoneCC($tds2MobilePhoneCC) {
	    $this->tds2MobilePhoneCC = $tds2MobilePhoneCC;
	}

	/**
	 * 携帯電話番号設定
	 *
	 * @param string $tds2MobilePhoneSubscriber 携帯電話番号
	 */
	public function setTds2MobilePhoneSubscriber($tds2MobilePhoneSubscriber) {
	    $this->tds2MobilePhoneSubscriber = $tds2MobilePhoneSubscriber;
	}

	/**
	 * 職場電話の国コード設定
	 *
	 * @param string $tds2WorkPhoneCC 職場電話の国コード
	 */
	public function setTds2WorkPhoneCC($tds2WorkPhoneCC) {
	    $this->tds2WorkPhoneCC = $tds2WorkPhoneCC;
	}

	/**
	 * 職場電話番号設定
	 *
	 * @param string $tds2WorkPhoneSubscriber 職場電話番号
	 */
	public function setTds2WorkPhoneSubscriber($tds2WorkPhoneSubscriber) {
	    $this->tds2WorkPhoneSubscriber = $tds2WorkPhoneSubscriber;
	}

	/**
	 * 配送先住所の都市設定
	 *
	 * @param string $tds2ShipAddrCity 配送先住所の都市
	 */
	public function setTds2ShipAddrCity($tds2ShipAddrCity) {
	    $this->tds2ShipAddrCity = $tds2ShipAddrCity;
	}

	/**
	 * 配送先住所の国番号設定
	 *
	 * @param string $tds2ShipAddrCountry 配送先住所の国番号
	 */
	public function setTds2ShipAddrCountry($tds2ShipAddrCountry) {
	    $this->tds2ShipAddrCountry = $tds2ShipAddrCountry;
	}

	/**
	 * 配送先住所の区域部分の１行目設定
	 *
	 * @param string $tds2ShipAddrLine1 配送先住所の区域部分の１行目
	 */
	public function setTds2ShipAddrLine1($tds2ShipAddrLine1) {
	    $this->tds2ShipAddrLine1 = $tds2ShipAddrLine1;
	}

	/**
	 * 配送先住所の区域部分の２行目設定
	 *
	 * @param string $tds2ShipAddrLine2 配送先住所の区域部分の２行目
	 */
	public function setTds2ShipAddrLine2($tds2ShipAddrLine2) {
	    $this->tds2ShipAddrLine2 = $tds2ShipAddrLine2;
	}

	/**
	 * 配送先住所の区域部分の３行目設定
	 *
	 * @param string $tds2ShipAddrLine3 配送先住所の区域部分の３行目
	 */
	public function setTds2ShipAddrLine3($tds2ShipAddrLine3) {
	    $this->tds2ShipAddrLine3 = $tds2ShipAddrLine3;
	}

	/**
	 * 配送先住所の郵便番号設定
	 *
	 * @param string $tds2ShipAddrPostCode 配送先住所の郵便番号
	 */
	public function setTds2ShipAddrPostCode($tds2ShipAddrPostCode) {
	    $this->tds2ShipAddrPostCode = $tds2ShipAddrPostCode;
	}

	/**
	 * 配送先住所の州または都道府県番号設定
	 *
	 * @param string $tds2ShipAddrState 配送先住所の州または都道府県番号
	 */
	public function setTds2ShipAddrState($tds2ShipAddrState) {
	    $this->tds2ShipAddrState = $tds2ShipAddrState;
	}

	/**
	 * 納品先電子メールアドレス設定
	 *
	 * @param string $tds2DeliveryEmailAddress 納品先電子メールアドレス
	 */
	public function setTds2DeliveryEmailAddress($tds2DeliveryEmailAddress) {
	    $this->tds2DeliveryEmailAddress = $tds2DeliveryEmailAddress;
	}

	/**
	 * 商品納品時間枠設定
	 *
	 * @param string $tds2DeliveryTimeframe 商品納品時間枠
	 */
	public function setTds2DeliveryTimeframe($tds2DeliveryTimeframe) {
	    $this->tds2DeliveryTimeframe = $tds2DeliveryTimeframe;
	}

	/**
	 * プリペイドカードまたはギフトカードの総購入金額設定
	 *
	 * @param string $tds2GiftCardAmount プリペイドカードまたはギフトカードの総購入金額
	 */
	public function setTds2GiftCardAmount($tds2GiftCardAmount) {
	    $this->tds2GiftCardAmount = $tds2GiftCardAmount;
	}

	/**
	 * 購入されたプリペイドカードまたはギフトカード の総数設定
	 *
	 * @param integer $tds2GiftCardCount 購入されたプリペイドカードまたはギフトカード の総数
	 */
	public function setTds2GiftCardCount($tds2GiftCardCount) {
	    $this->tds2GiftCardCount = $tds2GiftCardCount;
	}

	/**
	 * 購入されたプリペイドカードまたはギフトカードの通貨コード設定
	 *
	 * @param string $tds2GiftCardCurr 購入されたプリペイドカードまたはギフトカードの通貨コード
	 */
	public function setTds2GiftCardCurr($tds2GiftCardCurr) {
	    $this->tds2GiftCardCurr = $tds2GiftCardCurr;
	}

	/**
	 * 商品の発売予定日設定
	 *
	 * @param string $tds2PreOrderDate 商品の発売予定日
	 */
	public function setTds2PreOrderDate($tds2PreOrderDate) {
	    $this->tds2PreOrderDate = $tds2PreOrderDate;
	}

	/**
	 * 商品の販売時期情報設定
	 *
	 * @param string $tds2PreOrderPurchaseInd 商品の販売時期情報
	 */
	public function setTds2PreOrderPurchaseInd($tds2PreOrderPurchaseInd) {
	    $this->tds2PreOrderPurchaseInd = $tds2PreOrderPurchaseInd;
	}

	/**
	 * 商品の注文情報設定
	 *
	 * @param string $tds2ReorderItemsInd 商品の注文情報
	 */
	public function setTds2ReorderItemsInd($tds2ReorderItemsInd) {
	    $this->tds2ReorderItemsInd = $tds2ReorderItemsInd;
	}

	/**
	 * 取引の配送方法設定
	 *
	 * @param string $tds2ShipInd 取引の配送方法
	 */
	public function setTds2ShipInd($tds2ShipInd) {
	    $this->tds2ShipInd = $tds2ShipInd;
	}

	/**
	 * 継続課金の期限設定
	 *
	 * @param string $tds2RecurringExpiry 継続課金の期限
	 */
	public function setTds2RecurringExpiry($tds2RecurringExpiry) {
	    $this->tds2RecurringExpiry = $tds2RecurringExpiry;
	}

	/**
	 * 継続課金の課金最小間隔日数設定
	 *
	 * @param integer $tds2RecurringFrequency 継続課金の課金最小間隔日数
	 */
	public function setTds2RecurringFrequency($tds2RecurringFrequency) {
	    $this->tds2RecurringFrequency = $tds2RecurringFrequency;
	}


	/**
	 * 文字列表現
	 * URLのパラメータ文字列の形式の文字列を生成する
	 * @return string 接続文字列表現
	 */
	public function toString() {

	    $str  = 'AccessID=' . $this->encodeStr($this->getAccessId());
	    $str .= '&';
	    $str .= 'AccessPass=' . $this->encodeStr($this->getAccessPass());
	    $str .= '&';
	    $str .= 'OrderID=' . $this->encodeStr($this->getOrderId());
	    $str .= '&';
	    $str .= 'Method=' . $this->encodeStr($this->getMethod());
	    $str .= '&';
	    $str .= 'PayTimes=' . $this->encodeStr($this->getPayTimes());
	    $str .= '&';
	    $str .= 'CardNo=' . $this->encodeStr($this->getCardNo());
	    $str .= '&';
	    $str .= 'Token=' . $this->encodeStr($this->getToken());
	    $str .= '&';
	    $str .= 'SiteID=' . $this->encodeStr($this->getSiteId());
	    $str .= '&';
	    $str .= 'SitePass=' . $this->encodeStr($this->getSitePass());
	    $str .= '&';
	    $str .= 'MemberID=' . $this->encodeStr($this->getMemberId());
	    $str .= '&';
	    $str .= 'SeqMode=' . $this->encodeStr($this->getSeqMode());
	    $str .= '&';
	    $str .= 'CardSeq=' . $this->encodeStr($this->getCardSeq());
	    $str .= '&';
	    $str .= 'CardPass=' . $this->encodeStr($this->getCardPass());
	    $str .= '&';
	    $str .= 'Expire=' . $this->encodeStr($this->getExpire());
	    $str .= '&';
	    $str .= 'SecurityCode=' . $this->encodeStr($this->getSecurityCode());
	    $str .= '&';
	    $str .= 'HttpAccept=' . $this->encodeStr($this->getHttpAccept());
	    $str .= '&';
	    $str .= 'HttpUserAgent=' . $this->encodeStr($this->getHttpUserAgent());
	    $str .= '&';
	    $str .= 'ClientField1=' . $this->encodeStr($this->getClientField1());
	    $str .= '&';
	    $str .= 'ClientField2=' . $this->encodeStr($this->getClientField2());
	    $str .= '&';
	    $str .= 'ClientField3=' . $this->encodeStr($this->getClientField3());
	    $str .= '&';
	    $str .= 'ClientFieldFlag=' . $this->clientFieldFlag;
	    $str .= '&';
	    $str .= 'DeviceCategory=' . $this->deviceCategory;
	    $str .= '&';
	    $str .= 'DisplayInfo=' . $this->encodeStr($this->getDisplayInfo());
	    $str .= '&';
	    $str .= 'TokenType=' . $this->encodeStr($this->getTokenType());
	    $str .= '&';
	    $str .= 'RetUrl=' . $this->encodeStr($this->getRetUrl());
	    $str .= '&';
	    $str .= 'AppMode=' . $this->encodeStr($this->getAppMode());
	    $str .= '&';
		$str .= 'Tds2ChallengeIndType=' . $this->encodeStr($this->getTds2ChallengeIndType());
	    $str .= '&';
	    $str .= 'CallbackType=' . $this->encodeStr($this->getCallbackType());
	    $str .= '&';
	    $str .= 'Tds2ChAccChange=' . $this->encodeStr($this->getTds2ChAccChange());
	    $str .= '&';
	    $str .= 'Tds2ChAccDate=' . $this->encodeStr($this->getTds2ChAccDate());
	    $str .= '&';
	    $str .= 'Tds2ChAccPwChange=' . $this->encodeStr($this->getTds2ChAccPwChange());
	    $str .= '&';
	    $str .= 'Tds2NbPurchaseAccount=' . $this->encodeStr($this->getTds2NbPurchaseAccount());
	    $str .= '&';
	    $str .= 'Tds2PaymentAccAge=' . $this->encodeStr($this->getTds2PaymentAccAge());
	    $str .= '&';
	    $str .= 'Tds2ProvisionAttemptsDay=' . $this->encodeStr($this->getTds2ProvisionAttemptsDay());
	    $str .= '&';
	    $str .= 'Tds2ShipAddressUsage=' . $this->encodeStr($this->getTds2ShipAddressUsage());
	    $str .= '&';
	    $str .= 'Tds2ShipNameInd=' . $this->encodeStr($this->getTds2ShipNameInd());
	    $str .= '&';
	    $str .= 'Tds2SuspiciousAccActivity=' . $this->encodeStr($this->getTds2SuspiciousAccActivity());
	    $str .= '&';
	    $str .= 'Tds2TxnActivityDay=' . $this->encodeStr($this->getTds2TxnActivityDay());
	    $str .= '&';
	    $str .= 'Tds2TxnActivityYear=' . $this->encodeStr($this->getTds2TxnActivityYear());
	    $str .= '&';
	    $str .= 'Tds2ThreeDSReqAuthData=' . $this->encodeStr($this->getTds2ThreeDSReqAuthData());
	    $str .= '&';
	    $str .= 'Tds2ThreeDSReqAuthMethod=' . $this->encodeStr($this->getTds2ThreeDSReqAuthMethod());
	    $str .= '&';
	    $str .= 'Tds2ThreeDSReqAuthTimestamp=' . $this->encodeStr($this->getTds2ThreeDSReqAuthTimestamp());
	    $str .= '&';
	    $str .= 'Tds2AddrMatch=' . $this->encodeStr($this->getTds2AddrMatch());
	    $str .= '&';
	    $str .= 'Tds2BillAddrCity=' . $this->encodeStr($this->getTds2BillAddrCity());
	    $str .= '&';
	    $str .= 'Tds2BillAddrCountry=' . $this->encodeStr($this->getTds2BillAddrCountry());
	    $str .= '&';
	    $str .= 'Tds2BillAddrLine1=' . $this->encodeStr($this->getTds2BillAddrLine1());
	    $str .= '&';
	    $str .= 'Tds2BillAddrLine2=' . $this->encodeStr($this->getTds2BillAddrLine2());
	    $str .= '&';
	    $str .= 'Tds2BillAddrLine3=' . $this->encodeStr($this->getTds2BillAddrLine3());
	    $str .= '&';
	    $str .= 'Tds2BillAddrPostCode=' . $this->encodeStr($this->getTds2BillAddrPostCode());
	    $str .= '&';
	    $str .= 'Tds2BillAddrState=' . $this->encodeStr($this->getTds2BillAddrState());
	    $str .= '&';
	    $str .= 'Tds2Email=' . $this->encodeStr($this->getTds2Email());
	    $str .= '&';
	    $str .= 'Tds2HomePhoneCC=' . $this->encodeStr($this->getTds2HomePhoneCC());
	    $str .= '&';
	    $str .= 'Tds2HomePhoneSubscriber=' . $this->encodeStr($this->getTds2HomePhoneSubscriber());
	    $str .= '&';
	    $str .= 'Tds2MobilePhoneCC=' . $this->encodeStr($this->getTds2MobilePhoneCC());
	    $str .= '&';
	    $str .= 'Tds2MobilePhoneSubscriber=' . $this->encodeStr($this->getTds2MobilePhoneSubscriber());
	    $str .= '&';
	    $str .= 'Tds2WorkPhoneCC=' . $this->encodeStr($this->getTds2WorkPhoneCC());
	    $str .= '&';
	    $str .= 'Tds2WorkPhoneSubscriber=' . $this->encodeStr($this->getTds2WorkPhoneSubscriber());
	    $str .= '&';
	    $str .= 'Tds2ShipAddrCity=' . $this->encodeStr($this->getTds2ShipAddrCity());
	    $str .= '&';
	    $str .= 'Tds2ShipAddrCountry=' . $this->encodeStr($this->getTds2ShipAddrCountry());
	    $str .= '&';
	    $str .= 'Tds2ShipAddrLine1=' . $this->encodeStr($this->getTds2ShipAddrLine1());
	    $str .= '&';
	    $str .= 'Tds2ShipAddrLine2=' . $this->encodeStr($this->getTds2ShipAddrLine2());
	    $str .= '&';
	    $str .= 'Tds2ShipAddrLine3=' . $this->encodeStr($this->getTds2ShipAddrLine3());
	    $str .= '&';
	    $str .= 'Tds2ShipAddrPostCode=' . $this->encodeStr($this->getTds2ShipAddrPostCode());
	    $str .= '&';
	    $str .= 'Tds2ShipAddrState=' . $this->encodeStr($this->getTds2ShipAddrState());
	    $str .= '&';
	    $str .= 'Tds2DeliveryEmailAddress=' . $this->encodeStr($this->getTds2DeliveryEmailAddress());
	    $str .= '&';
	    $str .= 'Tds2DeliveryTimeframe=' . $this->encodeStr($this->getTds2DeliveryTimeframe());
	    $str .= '&';
	    $str .= 'Tds2GiftCardAmount=' . $this->encodeStr($this->getTds2GiftCardAmount());
	    $str .= '&';
	    $str .= 'Tds2GiftCardCount=' . $this->encodeStr($this->getTds2GiftCardCount());
	    $str .= '&';
	    $str .= 'Tds2GiftCardCurr=' . $this->encodeStr($this->getTds2GiftCardCurr());
	    $str .= '&';
	    $str .= 'Tds2PreOrderDate=' . $this->encodeStr($this->getTds2PreOrderDate());
	    $str .= '&';
	    $str .= 'Tds2PreOrderPurchaseInd=' . $this->encodeStr($this->getTds2PreOrderPurchaseInd());
	    $str .= '&';
	    $str .= 'Tds2ReorderItemsInd=' . $this->encodeStr($this->getTds2ReorderItemsInd());
	    $str .= '&';
	    $str .= 'Tds2ShipInd=' . $this->encodeStr($this->getTds2ShipInd());
	    $str .= '&';
	    $str .= 'Tds2RecurringExpiry=' . $this->encodeStr($this->getTds2RecurringExpiry());
	    $str .= '&';
	    $str .= 'Tds2RecurringFrequency=' . $this->encodeStr($this->getTds2RecurringFrequency());

	    return $str;
	}
}
?>