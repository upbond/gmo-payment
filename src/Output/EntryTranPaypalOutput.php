<?php

namespace Gineign\GmoPayment\Output;

/**
 * <b>Paypal取引登録　出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 12-22-2009 00:00:00
 */
class EntryTranPaypalOutput extends BaseOutput
{

    /**
     * @var string オーダID
     */
    private $orderId;

    /**
     * @var string 取引ID
     */
    private $accessId;

    /**
     * @var string 取引パスワード
     */
    private $accessPass;

    public function __construct($params = null)
    {
        parent::__construct($params);

        // 引数がない場合は戻る
        if (is_null($params)) {
            return;
        }

        // マップの展開
        $this->setOrderId($params->get('OrderID'));
        $this->setAccessId($params->get('AccessID'));
        $this->setAccessPass($params->get('AccessPass'));
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
        $str = 'OrderID=' . $this->getOrderId();
        $str .= '&';
        $str .= 'AccessID=' . $this->getAccessId();
        $str .= '&';
        $str .= 'AccessPass=' . $this->getAccessPass();

        if ($this->isErrorOccurred()) {
            // エラー文字列を連結して返す
            $errString = parent::toString();
            $str .= '&' . $errString;
        }
        return $str;
    }

    /**
     * オーダIDを取得する
     * @return string オーダID
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * オーダIDを設定する
     * @param $orderId オーダID
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * アクセスIDを取得する。
     * @return string アクセスID
     */
    public function getAccessId()
    {
        return $this->accessId;
    }

    /**
     * アクセスIDを設定する
     * @param $accessId アクセスID
     */
    public function setAccessId($accessId)
    {
        $this->accessId = $accessId;
    }

    /**
     * アクセスパスワードを取得する
     * @return string アクセスパスワード
     */
    public function getAccessPass()
    {
        return $this->accessPass;
    }

    /**
     * アクセスパスワードを設定する
     * @param $accessPass
     * @return $accessPass アクセスパスワード
     */
    public function setAccessPass($accessPass)
    {
        $this->accessPass = $accessPass;
    }
}
