<?php
namespace Gineign\GmoPayment\Input;

/**
 * <b>ドコモ払い_随時決済取引開始　入力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage input
 * @see inputPackageInfo.php
 * @author GMO PaymentGateway
 */
class DocomoAcceptStartInput extends BaseInput
{

    /**
     * @var string 取引ID
     */
    private $accessID;
    /**
     * @var string トークン
     */
    private $token;


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

        $this->setAccessID($this->getStringValue($params, 'AccessID', $this->getAccessID()));
        $this->setToken($this->getStringValue($params, 'Token', $this->getToken()));

    }

    /**
     * 取引ID取得
     * @return string 取引ID
     */
    public function getAccessID()
    {
        return $this->accessID;
    }

    /**
     * 取引ID設定
     *
     * @param string $accessID
     */
    public function setAccessID($accessID)
    {
        $this->accessID = $accessID;
    }

    /**
     * トークン取得
     * @return string トークン
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * トークン設定
     *
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * 文字列表現
     * @return string 接続文字列表現
     */
    public function toString()
    {
        $str = '';
        $str .= 'AccessID=' . $this->encodeStr($this->getAccessID());
        $str .= '&';
        $str .= 'Token=' . $this->encodeStr($this->getToken());

        return $str;
    }


}

?>
