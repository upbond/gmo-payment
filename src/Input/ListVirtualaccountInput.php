<?php
namespace Gineign\GmoPayment\Input;

/**
 * <b>銀行振込(バーチャル口座)専有口座一覧取得　入力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage input
 * @see inputPackageInfo.php
 * @author GMO PaymentGateway
 */
class ListVirtualaccountInput extends BaseInput
{

    /**
     * @var string ショップID
     */
    private $shopID;
    /**
     * @var string ショップパスワード
     */
    private $shopPass;


    /**
     * コンストラクタ
     *
     * @param array $params 入力パラメータ
     */
    public function __construct($params = null)
    {
        parent::__construct($params);
    }

    /**
     * デフォルト値設定
     */
    public function setDefaultValues()
    {

    }

    /**
     * 入力パラメータ群の値を設定する
     *
     * @param IgnoreCaseMap $params 入力パラメータ
     */
    public function setInputValues($params)
    {
        // 入力パラメータがnullの場合は設定処理を行わない
        if (is_null($params)) {
            return;
        }

        $this->setShopID($this->getStringValue($params, 'ShopID', $this->getShopID()));
        $this->setShopPass($this->getStringValue($params, 'ShopPass', $this->getShopPass()));

    }

    /**
     * ショップID取得
     * @return string ショップID
     */
    public function getShopID()
    {
        return $this->shopID;
    }

    /**
     * ショップID設定
     *
     * @param string $shopID
     */
    public function setShopID($shopID)
    {
        $this->shopID = $shopID;
    }

    /**
     * ショップパスワード取得
     * @return string ショップパスワード
     */
    public function getShopPass()
    {
        return $this->shopPass;
    }

    /**
     * ショップパスワード設定
     *
     * @param string $shopPass
     */
    public function setShopPass($shopPass)
    {
        $this->shopPass = $shopPass;
    }

    /**
     * 文字列表現
     * @return string 接続文字列表現
     */
    public function toString()
    {
        $str = '';
        $str .= 'ShopID=' . $this->encodeStr($this->getShopID());
        $str .= '&';
        $str .= 'ShopPass=' . $this->encodeStr($this->getShopPass());

        return $str;
    }


}

?>
