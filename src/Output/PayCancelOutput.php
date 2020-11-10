<?php
namespace Gineign\GmoPayment\Output;

/**
 * <b>PGプリカ支払停止　出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 */
class PayCancelOutput extends BaseOutput
{

    /**
     * @var string オーダーID
     */
    private $orderID;
    /**
     * @var string ステータス
     */
    private $status;


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
     * ステータス取得
     * @return string ステータス
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * ステータス設定
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

}

?>
