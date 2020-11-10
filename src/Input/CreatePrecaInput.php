<?php
namespace Gineign\GmoPayment\Input;

/**
 * <b>PGプリカPGプリカ発行　入力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage input
 * @see inputPackageInfo.php
 * @author GMO PaymentGateway
 */
class CreatePrecaInput extends BaseInput
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
     * @var string プリカ番号
     */
    private $precaNo;
    /**
     * @var string プリカ認証番号
     */
    private $precaPass;
    /**
     * @var string プリカ名称
     */
    private $precaName;


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
        $this->setPrecaNo($this->getStringValue($params, 'PrecaNo', $this->getPrecaNo()));
        $this->setPrecaPass($this->getStringValue($params, 'PrecaPass', $this->getPrecaPass()));
        $this->setPrecaName($this->getStringValue($params, 'PrecaName', $this->getPrecaName()));

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
     * プリカ番号取得
     * @return string プリカ番号
     */
    public function getPrecaNo()
    {
        return $this->precaNo;
    }

    /**
     * プリカ番号設定
     *
     * @param string $precaNo
     */
    public function setPrecaNo($precaNo)
    {
        $this->precaNo = $precaNo;
    }

    /**
     * プリカ認証番号取得
     * @return string プリカ認証番号
     */
    public function getPrecaPass()
    {
        return $this->precaPass;
    }

    /**
     * プリカ認証番号設定
     *
     * @param string $precaPass
     */
    public function setPrecaPass($precaPass)
    {
        $this->precaPass = $precaPass;
    }

    /**
     * プリカ名称取得
     * @return string プリカ名称
     */
    public function getPrecaName()
    {
        return $this->precaName;
    }

    /**
     * プリカ名称設定
     *
     * @param string $precaName
     */
    public function setPrecaName($precaName)
    {
        $this->precaName = $precaName;
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
        $str .= '&';
        $str .= 'PrecaNo=' . $this->encodeStr($this->getPrecaNo());
        $str .= '&';
        $str .= 'PrecaPass=' . $this->encodeStr($this->getPrecaPass());
        $str .= '&';
        $str .= 'PrecaName=' . $this->encodeStr($this->getPrecaName());

        return $str;
    }


}

?>
