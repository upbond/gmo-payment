<?php
namespace Gineign\GmoPayment\Input;

use  Gineign\GmoPayment\Input\EntryTranInput;
use  Gineign\GmoPayment\Input\ExecTranInput;

/*require_once 'com/gmo_pg/client/input/EntryTranInput.php';
require_once 'com/gmo_pg/client/input/ExecTranInput.php';*/

/**
 * <b>登録・決済一括実行　入力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage input
 * @see inputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 01-01-2008 00:00:00
 */
class EntryExecTranInput
{

    /**
     * @var EntryTranInput 取引登録入力パラメータ
     */
    private $entryTranInput;
    /* @var $entryTranInput EntryTranInput */

    /**
     * @var ExecTranInput 決済実行入力パラメータ
     */
    private $execTranInput;
    /* @var $execTranInput ExecTranInput */

    /**
     * コンストラクタ
     *
     * @param array $params 入力パラメータ
     */
    public function __construct($params = null)
    {
        $this->entryTranInput = new EntryTranInput($params);
        $this->execTranInput = new ExecTranInput($params);
    }

    /**
     * 取引登録入力パラメータ取得
     *
     * @return EntryTranInput 取引登録時パラメータ
     */
    public function &getEntryTranInput()
    {
        return $this->entryTranInput;
    }

    /**
     * 決済実行入力パラメータ取得
     * @return ExecTranInput 決済実行時パラメータ
     */
    public function &getExecTranInput()
    {
        return $this->execTranInput;
    }

    /**
     * ショップID取得
     * @return string ショップID
     */
    public function getShopId()
    {
        return $this->entryTranInput->getShopId();
    }

    /**
     * ショップパスワード取得
     * @return string ショップパスワード
     */
    public function getShopPass()
    {
        return $this->entryTranInput->getShopPass();
    }

    /**
     * オーダーID取得
     * @return string オーダーID
     */
    public function getOrderId()
    {
        return $this->entryTranInput->getOrderId();
    }

    /**
     * 処理区分取得
     * @return string 処理区分
     */
    public function getJobCd()
    {
        return $this->entryTranInput->getJobCd();
    }

    /**
     * 商品コード取得
     * @return string 商品コード
     */
    public function getItemCode()
    {
        return $this->entryTranInput->getItemCode();
    }

    /**
     * 利用金額取得
     * @return integer 利用金額
     */
    public function getAmount()
    {
        return $this->entryTranInput->getAmount();
    }

    /**
     * 税送料取得
     * @return integer 税送料
     */
    public function getTax()
    {
        return $this->entryTranInput->getTax();
    }

    /**
     * 3Dセキュア使用フラグ取得
     * @return string 3Dセキュア使用フラグ
     */
    public function getTdFlag()
    {
        return $this->entryTranInput->getTdFlag();
    }

    /**
     * 3Dセキュア表示店舗名取得
     * @return string 3Dセキュア表示店舗名
     */
    public function getTdTenantName()
    {
        return $this->entryTranInput->getTdTenantName();
    }

    /**
     * 3DS2.0非対応時取り扱い取得
     * @return string 3DS2.0非対応時取り扱い
     */
    public function getTds2Type()
    {
        return $this->entryTranInput->getTds2Type();
    }

    /**
     * 3DS必須タイプ
     * @return string 3DS必須タイプ
     */
    public function getTdRequired()
    {
        return $this->entryTranInput->getTdRequired();
    }

    /**
     * 取引ID取得
     * @return string 取引ID
     */
    public function getAccessId()
    {
        return $this->execTranInput->getAccessId();
    }

    /**
     * 取引パスワード取得
     * @return string 取引パスワード
     */
    public function getAccessPass()
    {
        return $this->execTranInput->getAccessPass();
    }

    /**
     * 支払い方法取得
     * @return string 支払方法
     */
    public function getMethod()
    {
        return $this->execTranInput->getMethod();
    }

    /**
     * 支払回数取得
     * @return integer 支払回数
     */
    public function getPayTimes()
    {
        return $this->execTranInput->getPayTimes();
    }

    /**
     * カード番号取得
     * @return string カード番号
     */
    public function getCardNo()
    {
        return $this->execTranInput->getCardNo();
    }

    /**
     * 有効期限取得
     * @return string 有効期限
     */
    public function getExpire()
    {
        return $this->execTranInput->getExpire();
    }

    /**
     * サイトID取得
     * @return string サイトID
     */
    public function getSiteId()
    {
        return $this->execTranInput->getSiteId();
    }

    /**
     * サイトパスワード取得
     * @return string サイトパスワード
     */
    public function getSitePass()
    {
        return $this->execTranInput->getSitePass();
    }

    /**
     * 会員ID取得
     * @return string 会員ID
     */
    public function getMemberId()
    {
        return $this->execTranInput->getMemberId();
    }

    /**
     * カード登録連番取得
     * @return integer カード登録連番
     */
    public function getCardSeq()
    {
        return $this->execTranInput->getCardSeq();
    }

    /**
     * カード連番モード取得
     * @return string カード連番モード
     */
    public function getSeqMode()
    {
        return $this->execTranInput->getSeqMode();
    }

    /**
     * カードパスワード取得
     * @return string カードパスワード
     */
    public function getCardPass()
    {
        return $this->execTranInput->getCardPass();
    }

    /**
     * セキュリティコード取得
     * @return string セキュリティコード
     */
    public function getSecurityCode()
    {
        return $this->execTranInput->getSecurityCode();
    }

    /**
     * HTTP_ACCEPT取得
     * @return string HTTP_ACCEPT
     */
    public function getHttpAccept()
    {
        return $this->execTranInput->getHttpAccept();
    }

    /**
     * HTTP_USER_AGENT取得
     * @return string HTTP_USER_AGENT
     */
    public function getHttpUserAgent()
    {
        return $this->execTranInput->getHttpUserAgent();
    }

    /**
     * 加盟店自由項目1取得
     * @return string 加盟店自由項目1
     */
    public function getClientField1()
    {
        return $this->execTranInput->getClientField1();
    }

    /**
     * 加盟店自由項目2取得
     * @return string 加盟店自由項目2
     */
    public function getClientField2()
    {
        return $this->execTranInput->getClientField2();
    }

    /**
     * 加盟店自由項目3取得
     * @return string 加盟店自由項目3
     */
    public function getClientField3()
    {
        return $this->execTranInput->getClientField3();
    }

    /**
     * 利用明細に記載される文言取得
     * @return string 利用明細に記載される文言
     */
    public function getDisplayInfo()
    {
        return $this->execTranInput->getDisplayInfo();
    }

    /**
     * トークンタイプ取得
     * @return string トークンタイプ
     */
    public function getTokenType()
    {
        return $this->execTranInput->getTokenType();
    }

    /**
     * 加盟店戻りURL取得
     * @return string 加盟店戻りURL
     */
    public function getRetUrl()
    {
        return $this->execTranInput->getRetUrl();
    }

    /**
     * モバイルアプリモード取得
     * @return string モバイルアプリモード
     */
    public function getAppMode()
    {
        return $this->execTranInput->getAppMode();
    }

        /**
     * 3DS2.0 authentication challenge request type
     */
    public function getTds2ChallengeIndType()
    {
        return $this->execTranInput->getTds2ChallengeIndType();
    }

    /**
     * コールバック方法取得
     * @return string コールバック方法
     */
    public function getCallbackType()
    {
        return $this->execTranInput->getCallbackType();
    }

    /**
     * カード会員最終更新日取得
     * @return string カード会員最終更新日
     */
    public function getTds2ChAccChange()
    {
        return $this->execTranInput->getTds2ChAccChange();
    }

    /**
     * カード会員作成日取得
     * @return string カード会員作成日
     */
    public function getTds2ChAccDate()
    {
        return $this->execTranInput->getTds2ChAccDate();
    }

    /**
     * カード会員パスワード変更日取得
     * @return string カード会員パスワード変更日
     */
    public function getTds2ChAccPwChange()
    {
        return $this->execTranInput->getTds2ChAccPwChange();
    }

    /**
     * 過去6ヶ月間の購入回数取得
     * @return integer 過去6ヶ月間の購入回数
     */
    public function getTds2NbPurchaseAccount()
    {
        return $this->execTranInput->getTds2NbPurchaseAccount();
    }

    /**
     * カード登録日取得
     * @return string カード登録日
     */
    public function getTds2PaymentAccAge()
    {
        return $this->execTranInput->getTds2PaymentAccAge();
    }

    /**
     * 過去24時間のカード追加の試行回数取得
     * @return integer 過去24時間のカード追加の試行回数
     */
    public function getTds2ProvisionAttemptsDay()
    {
        return $this->execTranInput->getTds2ProvisionAttemptsDay();
    }

    /**
     * 配送先住所の初回使用日取得
     * @return string 配送先住所の初回使用日
     */
    public function getTds2ShipAddressUsage()
    {
        return $this->execTranInput->getTds2ShipAddressUsage();
    }

    /**
     * カード会員名と配送先名の一致/不一致取得
     * @return string カード会員名と配送先名の一致/不一致
     */
    public function getTds2ShipNameInd()
    {
        return $this->execTranInput->getTds2ShipNameInd();
    }

    /**
     * カード会員の不審行為情報取得
     * @return string カード会員の不審行為情報
     */
    public function getTds2SuspiciousAccActivity()
    {
        return $this->execTranInput->getTds2SuspiciousAccActivity();
    }

    /**
     * 過去24時間の取引回数取得
     * @return integer 過去24時間の取引回数
     */
    public function getTds2TxnActivityDay()
    {
        return $this->execTranInput->getTds2TxnActivityDay();
    }

    /**
     * 前年の取引回数取得
     * @return integer 前年の取引回数
     */
    public function getTds2TxnActivityYear()
    {
        return $this->execTranInput->getTds2TxnActivityYear();
    }

    /**
     * ログイン証跡取得
     * @return string ログイン証跡
     */
    public function getTds2ThreeDSReqAuthData()
    {
        return $this->execTranInput->getTds2ThreeDSReqAuthData();
    }

    /**
     * ログイン方法取得
     * @return string ログイン方法
     */
    public function getTds2ThreeDSReqAuthMethod()
    {
        return $this->execTranInput->getTds2ThreeDSReqAuthMethod();
    }

    /**
     * ログイン日時取得
     * @return string ログイン日時
     */
    public function getTds2ThreeDSReqAuthTimestamp()
    {
        return $this->execTranInput->getTds2ThreeDSReqAuthTimestamp();
    }

    /**
     * 請求先住所と配送先住所の一致/不一致取得
     * @return string 請求先住所と配送先住所の一致/不一致
     */
    public function getTds2AddrMatch()
    {
        return $this->execTranInput->getTds2AddrMatch();
    }

    /**
     * 請求先住所の都市取得
     * @return string 請求先住所の都市
     */
    public function getTds2BillAddrCity()
    {
        return $this->execTranInput->getTds2BillAddrCity();
    }

    /**
     * 請求先住所の国番号取得
     * @return string 請求先住所の国番号
     */
    public function getTds2BillAddrCountry()
    {
        return $this->execTranInput->getTds2BillAddrCountry();
    }

    /**
     * 請求先住所の区域部分の１行目取得
     * @return string 請求先住所の区域部分の１行目
     */
    public function getTds2BillAddrLine1()
    {
        return $this->execTranInput->getTds2BillAddrLine1();
    }

    /**
     * 請求先住所の区域部分の２行目取得
     * @return string 請求先住所の区域部分の２行目
     */
    public function getTds2BillAddrLine2()
    {
        return $this->execTranInput->getTds2BillAddrLine2();
    }

    /**
     * 請求先住所の区域部分の３行目取得
     * @return string 請求先住所の区域部分の３行目
     */
    public function getTds2BillAddrLine3()
    {
        return $this->execTranInput->getTds2BillAddrLine3();
    }

    /**
     * 請求先住所の郵便番号取得
     * @return string 請求先住所の郵便番号
     */
    public function getTds2BillAddrPostCode()
    {
        return $this->execTranInput->getTds2BillAddrPostCode();
    }

    /**
     * 請求先住所の州または都道府県番号取得
     * @return string 請求先住所の州または都道府県番号
     */
    public function getTds2BillAddrState()
    {
        return $this->execTranInput->getTds2BillAddrState();
    }

    /**
     * カード会員のメールアドレス取得
     * @return string カード会員のメールアドレス
     */
    public function getTds2Email()
    {
        return $this->execTranInput->getTds2Email();
    }

    /**
     * 自宅電話の国コード取得
     * @return string 自宅電話の国コード
     */
    public function getTds2HomePhoneCC()
    {
        return $this->execTranInput->getTds2HomePhoneCC();
    }

    /**
     * 自宅電話番号取得
     * @return string 自宅電話番号
     */
    public function getTds2HomePhoneSubscriber()
    {
        return $this->execTranInput->getTds2HomePhoneSubscriber();
    }

    /**
     * 携帯電話の国コード取得
     * @return string 携帯電話の国コード
     */
    public function getTds2MobilePhoneCC()
    {
        return $this->execTranInput->getTds2MobilePhoneCC();
    }

    /**
     * 携帯電話番号取得
     * @return string 携帯電話番号
     */
    public function getTds2MobilePhoneSubscriber()
    {
        return $this->execTranInput->getTds2MobilePhoneSubscriber();
    }

    /**
     * 職場電話の国コード取得
     * @return string 職場電話の国コード
     */
    public function getTds2WorkPhoneCC()
    {
        return $this->execTranInput->getTds2WorkPhoneCC();
    }

    /**
     * 職場電話番号取得
     * @return string 職場電話番号
     */
    public function getTds2WorkPhoneSubscriber()
    {
        return $this->execTranInput->getTds2WorkPhoneSubscriber();
    }

    /**
     * 配送先住所の都市取得
     * @return string 配送先住所の都市
     */
    public function getTds2ShipAddrCity()
    {
        return $this->execTranInput->getTds2ShipAddrCity();
    }

    /**
     * 配送先住所の国番号取得
     * @return string 配送先住所の国番号
     */
    public function getTds2ShipAddrCountry()
    {
        return $this->execTranInput->getTds2ShipAddrCountry();
    }

    /**
     * 配送先住所の区域部分の１行目取得
     * @return string 配送先住所の区域部分の１行目
     */
    public function getTds2ShipAddrLine1()
    {
        return $this->execTranInput->getTds2ShipAddrLine1();
    }

    /**
     * 配送先住所の区域部分の２行目取得
     * @return string 配送先住所の区域部分の２行目
     */
    public function getTds2ShipAddrLine2()
    {
        return $this->execTranInput->getTds2ShipAddrLine2();
    }

    /**
     * 配送先住所の区域部分の３行目取得
     * @return string 配送先住所の区域部分の３行目
     */
    public function getTds2ShipAddrLine3()
    {
        return $this->execTranInput->getTds2ShipAddrLine3();
    }

    /**
     * 配送先住所の郵便番号取得
     * @return string 配送先住所の郵便番号
     */
    public function getTds2ShipAddrPostCode()
    {
        return $this->execTranInput->getTds2ShipAddrPostCode();
    }

    /**
     * 配送先住所の州または都道府県番号取得
     * @return string 配送先住所の州または都道府県番号
     */
    public function getTds2ShipAddrState()
    {
        return $this->execTranInput->getTds2ShipAddrState();
    }

    /**
     * 納品先電子メールアドレス取得
     * @return string 納品先電子メールアドレス
     */
    public function getTds2DeliveryEmailAddress()
    {
        return $this->execTranInput->getTds2DeliveryEmailAddress();
    }

    /**
     * 商品納品時間枠取得
     * @return string 商品納品時間枠
     */
    public function getTds2DeliveryTimeframe()
    {
        return $this->execTranInput->getTds2DeliveryTimeframe();
    }

    /**
     * プリペイドカードまたはギフトカードの総購入金額取得
     * @return string プリペイドカードまたはギフトカードの総購入金額
     */
    public function getTds2GiftCardAmount()
    {
        return $this->execTranInput->getTds2GiftCardAmount();
    }

    /**
     * 購入されたプリペイドカードまたはギフトカード の総数取得
     * @return integer 購入されたプリペイドカードまたはギフトカード の総数
     */
    public function getTds2GiftCardCount()
    {
        return $this->execTranInput->getTds2GiftCardCount();
    }

    /**
     * 購入されたプリペイドカードまたはギフトカードの通貨コード取得
     * @return string 購入されたプリペイドカードまたはギフトカードの通貨コード
     */
    public function getTds2GiftCardCurr()
    {
        return $this->execTranInput->getTds2GiftCardCurr();
    }

    /**
     * 商品の発売予定日取得
     * @return string 商品の発売予定日
     */
    public function getTds2PreOrderDate()
    {
        return $this->execTranInput->getTds2PreOrderDate();
    }

    /**
     * 商品の販売時期情報取得
     * @return string 商品の販売時期情報
     */
    public function getTds2PreOrderPurchaseInd()
    {
        return $this->execTranInput->getTds2PreOrderPurchaseInd();
    }

    /**
     * 商品の注文情報取得
     * @return string 商品の注文情報
     */
    public function getTds2ReorderItemsInd()
    {
        return $this->execTranInput->getTds2ReorderItemsInd();
    }

    /**
     * 取引の配送方法取得
     * @return string 取引の配送方法
     */
    public function getTds2ShipInd()
    {
        return $this->execTranInput->getTds2ShipInd();
    }

    /**
     * 継続課金の期限取得
     * @return string 継続課金の期限
     */
    public function getTds2RecurringExpiry()
    {
        return $this->execTranInput->getTds2RecurringExpiry();
    }

    /**
     * 継続課金の課金最小間隔日数取得
     * @return integer 継続課金の課金最小間隔日数
     */
    public function getTds2RecurringFrequency()
    {
        return $this->execTranInput->getTds2RecurringFrequency();
    }

    /**
     * 取引登録入力パラメータ設定
     *
     * @param EntryTranInput entryTranInput  取引登録入力パラメータ
     */
    public function setEntryTranInput(&$entryTranInput)
    {
        $this->entryTranInput = $entryTranInput;
    }

    /**
     * 決済実行入力パラメータ設定
     *
     * @param ExecTranInput  決済実行入力パラメータ
     */
    public function setExecTranInput(&$execTranInput)
    {
        $this->execTranInput = $execTranInput;
    }

    /**
     * ショップID設定
     *
     * @param string $shopId
     */
    public function setShopId($shopId)
    {
        $this->entryTranInput->setShopId($shopId);
    }

    /**
     * ショップパスワード設定
     *
     * @param string $shopPass
     */
    public function setShopPass($shopPass)
    {
        $this->entryTranInput->setShopPass($shopPass);
    }

    /**
     * オーダーID設定
     *
     * @param string $orderId
     */
    public function setOrderId($orderId)
    {
        $this->entryTranInput->setOrderId($orderId);
        $this->execTranInput->setOrderId($orderId);
    }

    /**
     * 処理区分設定
     *
     * @param string $jobCd
     */
    public function setJobCd($jobCd)
    {
        $this->entryTranInput->setJobCd($jobCd);
    }

    /**
     * 商品コード設定
     *
     * @param string $itemCode
     */
    public function setItemCode($itemCode)
    {
        $this->entryTranInput->setItemCode($itemCode);
    }

    /**
     * 利用金額設定
     *
     * @param integer $amount
     */
    public function setAmount($amount)
    {
        $this->entryTranInput->setAmount($amount);
    }

    /**
     * 税送料設定
     *
     * @param integer $tax
     */
    public function setTax($tax)
    {
        $this->entryTranInput->setTax($tax);
    }

    /**
     * 3Dセキュア使用フラグ設定
     *
     * @param string $tdFlag
     */
    public function setTdFlag($tdFlag)
    {
        $this->entryTranInput->setTdFlag($tdFlag);
    }

    /**
     * 3Dセキュア表示店舗名設定
     *
     * @param string $tdTenantName
     */
    public function setTdTenantName($tdTenantName)
    {
        $this->entryTranInput->setTdTenantName($tdTenantName);
    }

    /**
     * 3DS2.0非対応時取り扱い設定
     *
     * @param string $tds2Type
     */
    public function setTds2Type($tds2Type)
    {
        $this->entryTranInput->setTds2Type($tds2Type);
    }

    /**
     * 3DS必須タイプ
     *
     * @param string $tdRequired
     */
    public function setTdRequired($tdRequired)
    {
        $this->entryTranInput->setTdRequired($tdRequired);
    }

    /**
     * 取引ID設定
     *
     * @param string $accessId
     */
    public function setAccessId($accessId)
    {
        $this->execTranInput->setAccessId($accessId);
    }

    /**
     * 取引パスワード設定
     *
     * @param string $accessPass
     */
    public function setAccessPass($accessPass)
    {
        $this->execTranInput->setAccessPass($accessPass);
    }

    /**
     * 支払い方法設定
     *
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->execTranInput->setMethod($method);
    }

    /**
     * 支払回数設定
     *
     * @param string $payTimes
     */
    public function setPayTimes($payTimes)
    {
        $this->execTranInput->setPayTimes($payTimes);
    }

    /**
     * カード番号設定
     *
     * @param string $cardNo
     */
    public function setCardNo($cardNo)
    {
        $this->execTranInput->setCardNo($cardNo);
    }

    /**
     * 有効期限設定
     *
     * @param string $expire
     */
    public function setExpire($expire)
    {
        $this->execTranInput->setExpire($expire);
    }

    /**
     * サイトID設定
     * @param string $siteID
     */
    public function setSiteId($siteID)
    {
        $this->execTranInput->setSiteId($siteID);
    }

    /**
     * サイトパスワード設定
     * @param string $sitePass
     */
    public function setSitePass($sitePass)
    {
        $this->execTranInput->setSitePass($sitePass);
    }

    /**
     * 会員ID設定
     * @param string $memberId
     */
    public function setMemberId($memberId)
    {
        $this->execTranInput->setMemberId($memberId);
    }

    /**
     * カード登録連番設定
     * @param integer $cardseq
     */
    public function setCardSeq($cardseq)
    {
        $this->execTranInput->setCardSeq($cardseq);
    }

    /**
     * カード連番モード設定
     * @param string $seqMode
     */
    public function setSeqMode($seqMode)
    {
        $this->execTranInput->setSeqMode($seqMode);
    }

    /**
     * カードパスワード設定
     * @param string $cardPass
     */
    public function setCardPass($cardPass)
    {
        $this->execTranInput->setCardPass($cardPass);
    }


    /**
     * セキュリティコード設定
     *
     * @param string $securityCode
     */
    public function setSecurityCode($securityCode)
    {
        $this->execTranInput->setSecurityCode($securityCode);
    }


    /**
     * HTTP_ACCEPT設定
     *
     * @param string $httpAccept
     */
    public function setHttpAccept($httpAccept)
    {
        $this->execTranInput->setHttpAccept($httpAccept);
    }


    /**
     * HTTP_USER_AGENT設定
     *
     * @param string $httpUserAgent
     */
    public function setHttpUserAgent($httpUserAgent)
    {
        $this->execTranInput->setHttpUserAgent($httpUserAgent);
    }


    /**
     * 加盟店自由項目1設定
     *
     * @param string $clientField1
     */
    public function setClientField1($clientField1)
    {
        $this->execTranInput->setClientField1($clientField1);
    }

    /**
     * 加盟店自由項目2設定
     *
     * @param string $clientField2
     */
    public function setClientField2($clientField2)
    {
        $this->execTranInput->setClientField2($clientField2);
    }


    /**
     * 加盟店自由項目3設定
     *
     * @param string $clientField3
     */
    public function setClientField3($clientField3)
    {
        $this->execTranInput->setClientField3($clientField3);
    }

    /**
     * 利用明細に記載される文言設定
     *
     * @param string $displayInfo
     */
    public function setDisplayInfo($displayInfo)
    {
        $this->execTranInput->setDisplayInfo($displayInfo);
    }

    /**
     * トークンタイプ設定
     *
     * @param string $tokenType
     */
    public function setTokenType($tokenType)
    {
        $this->execTranInput->setTokenType($tokenType);
    }

    /**
     * 加盟店戻りURL設定
     *
     * @param string $retUrl
     */
    public function setRetUrl($retUrl)
    {
        $this->execTranInput->setRetUrl($retUrl);
    }

    /**
     * モバイルアプリモード設定
     *
     * @param string $appMode
     */
    public function setAppMode($appMode)
    {
        $this->execTranInput->setAppMode($appMode);
    }

    /**
     * 3DS2.0 authentication challenge request type
     */
    public function setTds2ChallengeIndType($tds2ChallengeIndType)
    {
        $this->execTranInput->setTds2ChallengeIndType($tds2ChallengeIndType);
    }	

    /**
     * コールバック方法設定
     *
     * @param string $callbackType
     */
    public function setCallbackType($callbackType)
    {
        $this->execTranInput->setCallbackType($callbackType);
    }

    /**
     * カード会員最終更新日設定
     *
     * @param string $tds2ChAccChange
     */
    public function setTds2ChAccChange($tds2ChAccChange)
    {
        $this->execTranInput->setTds2ChAccChange($tds2ChAccChange);
    }

    /**
     * カード会員作成日設定
     *
     * @param string $tds2ChAccDate
     */
    public function setTds2ChAccDate($tds2ChAccDate)
    {
        $this->execTranInput->setTds2ChAccDate($tds2ChAccDate);
    }

    /**
     * カード会員パスワード変更日設定
     *
     * @param string $tds2ChAccPwChange
     */
    public function setTds2ChAccPwChange($tds2ChAccPwChange)
    {
        $this->execTranInput->setTds2ChAccPwChange($tds2ChAccPwChange);
    }

    /**
     * 過去6ヶ月間の購入回数設定
     *
     * @param integer $tds2NbPurchaseAccount
     */
    public function setTds2NbPurchaseAccount($tds2NbPurchaseAccount)
    {
        $this->execTranInput->setTds2NbPurchaseAccount($tds2NbPurchaseAccount);
    }

    /**
     * カード登録日設定
     *
     * @param string $tds2PaymentAccAge
     */
    public function setTds2PaymentAccAge($tds2PaymentAccAge)
    {
        $this->execTranInput->setTds2PaymentAccAge($tds2PaymentAccAge);
    }

    /**
     * 過去24時間のカード追加の試行回数設定
     *
     * @param integer $tds2ProvisionAttemptsDay
     */
    public function setTds2ProvisionAttemptsDay($tds2ProvisionAttemptsDay)
    {
        $this->execTranInput->setTds2ProvisionAttemptsDay($tds2ProvisionAttemptsDay);
    }

    /**
     * 配送先住所の初回使用日設定
     *
     * @param string $tds2ShipAddressUsage
     */
    public function setTds2ShipAddressUsage($tds2ShipAddressUsage)
    {
        $this->execTranInput->setTds2ShipAddressUsage($tds2ShipAddressUsage);
    }

    /**
     * カード会員名と配送先名の一致/不一致設定
     *
     * @param string $tds2ShipNameInd
     */
    public function setTds2ShipNameInd($tds2ShipNameInd)
    {
        $this->execTranInput->setTds2ShipNameInd($tds2ShipNameInd);
    }

    /**
     * カード会員の不審行為情報設定
     *
     * @param string $tds2SuspiciousAccActivity
     */
    public function setTds2SuspiciousAccActivity($tds2SuspiciousAccActivity)
    {
        $this->execTranInput->setTds2SuspiciousAccActivity($tds2SuspiciousAccActivity);
    }

    /**
     * 過去24時間の取引回数設定
     *
     * @param integer $tds2TxnActivityDay
     */
    public function setTds2TxnActivityDay($tds2TxnActivityDay)
    {
        $this->execTranInput->setTds2TxnActivityDay($tds2TxnActivityDay);
    }

    /**
     * 前年の取引回数設定
     *
     * @param integer $tds2TxnActivityYear
     */
    public function setTds2TxnActivityYear($tds2TxnActivityYear)
    {
        $this->execTranInput->setTds2TxnActivityYear($tds2TxnActivityYear);
    }

    /**
     * ログイン証跡設定
     *
     * @param string $tds2ThreeDSReqAuthData
     */
    public function setTds2ThreeDSReqAuthData($tds2ThreeDSReqAuthData)
    {
        $this->execTranInput->setTds2ThreeDSReqAuthData($tds2ThreeDSReqAuthData);
    }

    /**
     * ログイン方法設定
     *
     * @param string $tds2ThreeDSReqAuthMethod
     */
    public function setTds2ThreeDSReqAuthMethod($tds2ThreeDSReqAuthMethod)
    {
        $this->execTranInput->setTds2ThreeDSReqAuthMethod($tds2ThreeDSReqAuthMethod);
    }

    /**
     * ログイン日時設定
     *
     * @param string $tds2ThreeDSReqAuthTimestamp
     */
    public function setTds2ThreeDSReqAuthTimestamp($tds2ThreeDSReqAuthTimestamp)
    {
        $this->execTranInput->setTds2ThreeDSReqAuthTimestamp($tds2ThreeDSReqAuthTimestamp);
    }

    /**
     * 請求先住所と配送先住所の一致/不一致設定
     *
     * @param string $tds2AddrMatch
     */
    public function setTds2AddrMatch($tds2AddrMatch)
    {
        $this->execTranInput->setTds2AddrMatch($tds2AddrMatch);
    }

    /**
     * 請求先住所の都市設定
     *
     * @param string $tds2BillAddrCity
     */
    public function setTds2BillAddrCity($tds2BillAddrCity)
    {
        $this->execTranInput->setTds2BillAddrCity($tds2BillAddrCity);
    }

    /**
     * 請求先住所の国番号設定
     *
     * @param string $tds2BillAddrCountry
     */
    public function setTds2BillAddrCountry($tds2BillAddrCountry)
    {
        $this->execTranInput->setTds2BillAddrCountry($tds2BillAddrCountry);
    }

    /**
     * 請求先住所の区域部分の１行目設定
     *
     * @param string $tds2BillAddrLine1
     */
    public function setTds2BillAddrLine1($tds2BillAddrLine1)
    {
        $this->execTranInput->setTds2BillAddrLine1($tds2BillAddrLine1);
    }

    /**
     * 請求先住所の区域部分の２行目設定
     *
     * @param string $tds2BillAddrLine2
     */
    public function setTds2BillAddrLine2($tds2BillAddrLine2)
    {
        $this->execTranInput->setTds2BillAddrLine2($tds2BillAddrLine2);
    }

    /**
     * 請求先住所の区域部分の３行目設定
     *
     * @param string $tds2BillAddrLine3
     */
    public function setTds2BillAddrLine3($tds2BillAddrLine3)
    {
        $this->execTranInput->setTds2BillAddrLine3($tds2BillAddrLine3);
    }

    /**
     * 請求先住所の郵便番号設定
     *
     * @param string $tds2BillAddrPostCode
     */
    public function setTds2BillAddrPostCode($tds2BillAddrPostCode)
    {
        $this->execTranInput->setTds2BillAddrPostCode($tds2BillAddrPostCode);
    }

    /**
     * 請求先住所の州または都道府県番号設定
     *
     * @param string $tds2BillAddrState
     */
    public function setTds2BillAddrState($tds2BillAddrState)
    {
        $this->execTranInput->setTds2BillAddrState($tds2BillAddrState);
    }

    /**
     * カード会員のメールアドレス設定
     *
     * @param string $tds2Email
     */
    public function setTds2Email($tds2Email)
    {
        $this->execTranInput->setTds2Email($tds2Email);
    }

    /**
     * 自宅電話の国コード設定
     *
     * @param string $tds2HomePhoneCC
     */
    public function setTds2HomePhoneCC($tds2HomePhoneCC)
    {
        $this->execTranInput->setTds2HomePhoneCC($tds2HomePhoneCC);
    }

    /**
     * 自宅電話番号設定
     *
     * @param string $tds2HomePhoneSubscriber
     */
    public function setTds2HomePhoneSubscriber($tds2HomePhoneSubscriber)
    {
        $this->execTranInput->setTds2HomePhoneSubscriber($tds2HomePhoneSubscriber);
    }

    /**
     * 携帯電話の国コード設定
     *
     * @param string $tds2MobilePhoneCC
     */
    public function setTds2MobilePhoneCC($tds2MobilePhoneCC)
    {
        $this->execTranInput->setTds2MobilePhoneCC($tds2MobilePhoneCC);
    }

    /**
     * 携帯電話番号設定
     *
     * @param string $tds2MobilePhoneSubscriber
     */
    public function setTds2MobilePhoneSubscriber($tds2MobilePhoneSubscriber)
    {
        $this->execTranInput->setTds2MobilePhoneSubscriber($tds2MobilePhoneSubscriber);
    }

    /**
     * 職場電話の国コード設定
     *
     * @param string $tds2WorkPhoneCC
     */
    public function setTds2WorkPhoneCC($tds2WorkPhoneCC)
    {
        $this->execTranInput->setTds2WorkPhoneCC($tds2WorkPhoneCC);
    }

    /**
     * 職場電話番号設定
     *
     * @param string $tds2WorkPhoneSubscriber
     */
    public function setTds2WorkPhoneSubscriber($tds2WorkPhoneSubscriber)
    {
        $this->execTranInput->setTds2WorkPhoneSubscriber($tds2WorkPhoneSubscriber);
    }

    /**
     * 配送先住所の都市設定
     *
     * @param string $tds2ShipAddrCity
     */
    public function setTds2ShipAddrCity($tds2ShipAddrCity)
    {
        $this->execTranInput->setTds2ShipAddrCity($tds2ShipAddrCity);
    }

    /**
     * 配送先住所の国番号設定
     *
     * @param string $tds2ShipAddrCountry
     */
    public function setTds2ShipAddrCountry($tds2ShipAddrCountry)
    {
        $this->execTranInput->setTds2ShipAddrCountry($tds2ShipAddrCountry);
    }

    /**
     * 配送先住所の区域部分の１行目設定
     *
     * @param string $tds2ShipAddrLine1
     */
    public function setTds2ShipAddrLine1($tds2ShipAddrLine1)
    {
        $this->execTranInput->setTds2ShipAddrLine1($tds2ShipAddrLine1);
    }

    /**
     * 配送先住所の区域部分の２行目設定
     *
     * @param string $tds2ShipAddrLine2
     */
    public function setTds2ShipAddrLine2($tds2ShipAddrLine2)
    {
        $this->execTranInput->setTds2ShipAddrLine2($tds2ShipAddrLine2);
    }

    /**
     * 配送先住所の区域部分の３行目設定
     *
     * @param string $tds2ShipAddrLine3
     */
    public function setTds2ShipAddrLine3($tds2ShipAddrLine3)
    {
        $this->execTranInput->setTds2ShipAddrLine3($tds2ShipAddrLine3);
    }

    /**
     * 配送先住所の郵便番号設定
     *
     * @param string $tds2ShipAddrPostCode
     */
    public function setTds2ShipAddrPostCode($tds2ShipAddrPostCode)
    {
        $this->execTranInput->setTds2ShipAddrPostCode($tds2ShipAddrPostCode);
    }

    /**
     * 配送先住所の州または都道府県番号設定
     *
     * @param string $tds2ShipAddrState
     */
    public function setTds2ShipAddrState($tds2ShipAddrState)
    {
        $this->execTranInput->setTds2ShipAddrState($tds2ShipAddrState);
    }

    /**
     * 納品先電子メールアドレス設定
     *
     * @param string $tds2DeliveryEmailAddress
     */
    public function setTds2DeliveryEmailAddress($tds2DeliveryEmailAddress)
    {
        $this->execTranInput->setTds2DeliveryEmailAddress($tds2DeliveryEmailAddress);
    }

    /**
     * 商品納品時間枠設定
     *
     * @param string $tds2DeliveryTimeframe
     */
    public function setTds2DeliveryTimeframe($tds2DeliveryTimeframe)
    {
        $this->execTranInput->setTds2DeliveryTimeframe($tds2DeliveryTimeframe);
    }

    /**
     * プリペイドカードまたはギフトカードの総購入金額設定
     *
     * @param string $tds2GiftCardAmount
     */
    public function setTds2GiftCardAmount($tds2GiftCardAmount)
    {
        $this->execTranInput->setTds2GiftCardAmount($tds2GiftCardAmount);
    }

    /**
     * 購入されたプリペイドカードまたはギフトカード の総数設定
     *
     * @param integer $tds2GiftCardCount
     */
    public function setTds2GiftCardCount($tds2GiftCardCount)
    {
        $this->execTranInput->setTds2GiftCardCount($tds2GiftCardCount);
    }

    /**
     * 購入されたプリペイドカードまたはギフトカードの通貨コード設定
     *
     * @param string $tds2GiftCardCurr
     */
    public function setTds2GiftCardCurr($tds2GiftCardCurr)
    {
        $this->execTranInput->setTds2GiftCardCurr($tds2GiftCardCurr);
    }

    /**
     * 商品の発売予定日設定
     *
     * @param string $tds2PreOrderDate
     */
    public function setTds2PreOrderDate($tds2PreOrderDate)
    {
        $this->execTranInput->setTds2PreOrderDate($tds2PreOrderDate);
    }

    /**
     * 商品の販売時期情報設定
     *
     * @param string $tds2PreOrderPurchaseInd
     */
    public function setTds2PreOrderPurchaseInd($tds2PreOrderPurchaseInd)
    {
        $this->execTranInput->setTds2PreOrderPurchaseInd($tds2PreOrderPurchaseInd);
    }

    /**
     * 商品の注文情報設定
     *
     * @param string $tds2ReorderItemsInd
     */
    public function setTds2ReorderItemsInd($tds2ReorderItemsInd)
    {
        $this->execTranInput->setTds2ReorderItemsInd($tds2ReorderItemsInd);
    }

    /**
     * 取引の配送方法設定
     *
     * @param string $tds2ShipInd
     */
    public function setTds2ShipInd($tds2ShipInd)
    {
        $this->execTranInput->setTds2ShipInd($tds2ShipInd);
    }

    /**
     * 継続課金の期限設定
     *
     * @param string $tds2RecurringExpiry
     */
    public function setTds2RecurringExpiry($tds2RecurringExpiry)
    {
        $this->execTranInput->setTds2RecurringExpiry($tds2RecurringExpiry);
    }

    /**
     * 継続課金の課金最小間隔日数設定
     *
     * @param integer $tds2RecurringFrequency
     */
    public function setTds2RecurringFrequency($tds2RecurringFrequency)
    {
        $this->execTranInput->setTds2RecurringFrequency($tds2RecurringFrequency);
    }
}

?>