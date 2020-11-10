<?php
namespace Gineign\GmoPayment\Output;

/**
 * <b>JCBプリカ決済実行　出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 */
class ExecTranJcbPrecaOutput extends BaseOutput
{

    /**
     * @var string オーダーID
     */
    private $orderID;
    /**
     * @var string 現状態
     */
    private $status;
    /**
     * @var integer 利用金額
     */
    private $amount;
    /**
     * @var integer 税送料
     */
    private $tax;
    /**
     * @var integer 利用前残高
     */
    private $beforeBalance;
    /**
     * @var integer 利用後残高
     */
    private $afterBalance;
    /**
     * @var string カードアクティベートステータス
     */
    private $cardActivateStatus;
    /**
     * @var string カード有効期限ステータス
     */
    private $cardTermStatus;
    /**
     * @var string カード有効ステータス
     */
    private $cardInvalidStatus;
    /**
     * @var string カードWEB参照ステータス
     */
    private $cardWebInquiryStatus;
    /**
     * @var string カード有効期限
     */
    private $cardValidLimit;
    /**
     * @var string 券種コード
     */
    private $cardTypeCode;


    /**
     * コンストラクタ
     *
     * @param IgnoreCaseMap $params 出力パラメータ
     */
    public function __construct($params = null)
    {
        parent::__construct($params);

        // 引数が無い場合は戻る
        if (is_null($params)) {
            return;
        }

        // マップの展開
        $this->setOrderID($params->get('OrderID'));
        $this->setStatus($params->get('Status'));
        $this->setAmount($params->get('Amount'));
        $this->setTax($params->get('Tax'));
        $this->setBeforeBalance($params->get('BeforeBalance'));
        $this->setAfterBalance($params->get('AfterBalance'));
        $this->setCardActivateStatus($params->get('CardActivateStatus'));
        $this->setCardTermStatus($params->get('CardTermStatus'));
        $this->setCardInvalidStatus($params->get('CardInvalidStatus'));
        $this->setCardWebInquiryStatus($params->get('CardWebInquiryStatus'));
        $this->setCardValidLimit($params->get('CardValidLimit'));
        $this->setCardTypeCode($params->get('CardTypeCode'));

    }

    /**
     * 文字列表現
     * <p>
     *  現在の各パラメータを、パラメータ名=値&パラメータ名=値の形式で取得します。
     * </p>
     * @return string 出力パラメータの文字列表現
     */
    public function toString()
    {
        $str = '';
        $str .= 'OrderID=' . $this->encodeStr($this->getOrderID());
        $str .= '&';
        $str .= 'Status=' . $this->encodeStr($this->getStatus());
        $str .= '&';
        $str .= 'Amount=' . $this->encodeStr($this->getAmount());
        $str .= '&';
        $str .= 'Tax=' . $this->encodeStr($this->getTax());
        $str .= '&';
        $str .= 'BeforeBalance=' . $this->encodeStr($this->getBeforeBalance());
        $str .= '&';
        $str .= 'AfterBalance=' . $this->encodeStr($this->getAfterBalance());
        $str .= '&';
        $str .= 'CardActivateStatus=' . $this->encodeStr($this->getCardActivateStatus());
        $str .= '&';
        $str .= 'CardTermStatus=' . $this->encodeStr($this->getCardTermStatus());
        $str .= '&';
        $str .= 'CardInvalidStatus=' . $this->encodeStr($this->getCardInvalidStatus());
        $str .= '&';
        $str .= 'CardWebInquiryStatus=' . $this->encodeStr($this->getCardWebInquiryStatus());
        $str .= '&';
        $str .= 'CardValidLimit=' . $this->encodeStr($this->getCardValidLimit());
        $str .= '&';
        $str .= 'CardTypeCode=' . $this->encodeStr($this->getCardTypeCode());


        if ($this->isErrorOccurred()) {
            // エラー文字列を連結して返す
            $errString = parent::toString();
            $str .= '&' . $errString;
        }

        return $str;
    }

    /**
     * オーダーID取得
     * @return string オーダーID
     */
    public function getOrderID()
    {
        return $this->orderID;
    }

    /**
     * オーダーID設定
     *
     * @param string $orderID
     */
    public function setOrderID($orderID)
    {
        $this->orderID = $orderID;
    }

    /**
     * 現状態取得
     * @return string 現状態
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * 現状態設定
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * 利用金額取得
     * @return integer 利用金額
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * 利用金額設定
     *
     * @param integer $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * 税送料取得
     * @return integer 税送料
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * 税送料設定
     *
     * @param integer $tax
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
    }

    /**
     * 利用前残高取得
     * @return integer 利用前残高
     */
    public function getBeforeBalance()
    {
        return $this->beforeBalance;
    }

    /**
     * 利用前残高設定
     *
     * @param integer $beforeBalance
     */
    public function setBeforeBalance($beforeBalance)
    {
        $this->beforeBalance = $beforeBalance;
    }

    /**
     * 利用後残高取得
     * @return integer 利用後残高
     */
    public function getAfterBalance()
    {
        return $this->afterBalance;
    }

    /**
     * 利用後残高設定
     *
     * @param integer $afterBalance
     */
    public function setAfterBalance($afterBalance)
    {
        $this->afterBalance = $afterBalance;
    }

    /**
     * カードアクティベートステータス取得
     * @return string カードアクティベートステータス
     */
    public function getCardActivateStatus()
    {
        return $this->cardActivateStatus;
    }

    /**
     * カードアクティベートステータス設定
     *
     * @param string $cardActivateStatus
     */
    public function setCardActivateStatus($cardActivateStatus)
    {
        $this->cardActivateStatus = $cardActivateStatus;
    }

    /**
     * カード有効期限ステータス取得
     * @return string カード有効期限ステータス
     */
    public function getCardTermStatus()
    {
        return $this->cardTermStatus;
    }

    /**
     * カード有効期限ステータス設定
     *
     * @param string $cardTermStatus
     */
    public function setCardTermStatus($cardTermStatus)
    {
        $this->cardTermStatus = $cardTermStatus;
    }

    /**
     * カード有効ステータス取得
     * @return string カード有効ステータス
     */
    public function getCardInvalidStatus()
    {
        return $this->cardInvalidStatus;
    }

    /**
     * カード有効ステータス設定
     *
     * @param string $cardInvalidStatus
     */
    public function setCardInvalidStatus($cardInvalidStatus)
    {
        $this->cardInvalidStatus = $cardInvalidStatus;
    }

    /**
     * カードWEB参照ステータス取得
     * @return string カードWEB参照ステータス
     */
    public function getCardWebInquiryStatus()
    {
        return $this->cardWebInquiryStatus;
    }

    /**
     * カードWEB参照ステータス設定
     *
     * @param string $cardWebInquiryStatus
     */
    public function setCardWebInquiryStatus($cardWebInquiryStatus)
    {
        $this->cardWebInquiryStatus = $cardWebInquiryStatus;
    }

    /**
     * カード有効期限取得
     * @return string カード有効期限
     */
    public function getCardValidLimit()
    {
        return $this->cardValidLimit;
    }

    /**
     * カード有効期限設定
     *
     * @param string $cardValidLimit
     */
    public function setCardValidLimit($cardValidLimit)
    {
        $this->cardValidLimit = $cardValidLimit;
    }

    /**
     * 券種コード取得
     * @return string 券種コード
     */
    public function getCardTypeCode()
    {
        return $this->cardTypeCode;
    }

    /**
     * 券種コード設定
     *
     * @param string $cardTypeCode
     */
    public function setCardTypeCode($cardTypeCode)
    {
        $this->cardTypeCode = $cardTypeCode;
    }

}

?>
