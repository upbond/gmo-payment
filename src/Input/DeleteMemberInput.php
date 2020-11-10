<?php

namespace Gineign\GmoPayment\Input;

/**
 * <b>会員削除 入力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage input
 * @see inputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 01-01-2008 00:00:00
 */
class DeleteMemberInput extends BaseInput
{

    /**
     * @var string GMOPG発行のサイト識別ID
     */
    private $siteId;

    /**
     * @var string サイトIDと対になるパスワード
     */
    private $sitePass;

    /**
     * @var string 会員ID
     */
    private $memberId;

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
     * デフォルト値を設定する
     */
    public function setDefaultValues()
    {
    }

    /**
     * 入力パラメータ群の値を設定する
     *
     * @param IgnoreCaseMap $params 入力パラメータ(IgnoreCaseMap型)
     */
    public function setInputValues($params)
    {
        // 入力パラメータがnullの場合は設定処理を行わない
        if (is_null($params)) {
            return;
        }

        // 各項目の設定(Amount,Taxは値が数値でないものは無効とする)
        $this->setSiteId($this->getStringValue($params, 'SiteID', $this->getSiteId()));
        $this->setSitePass($this->getStringValue($params, 'SitePass', $this->getSitePass()));
        $this->setMemberId($this->getStringValue($params, 'MemberID', $this->getMemberId()));

    }

    /**
     * サイトID取得
     * @return string サイトID
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * サイトIDを設定
     *
     * @param string　 $siteId サイトID
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
    }

    /**
     * サイトパスワード取得
     * @return string サイトパスワード
     */
    public function getSitePass()
    {
        return $this->sitePass;
    }

    /**
     * サイトパスワード設定
     *
     * @param string $sitePass サイトパスワード
     */
    public function setSitePass($sitePass)
    {
        $this->sitePass = $sitePass;
    }

    /**
     * 会員ID取得
     * @return string 会員ID
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * 会員ID設定
     *
     * @param string $memberId 会員ID
     */
    public function setMemberId($memberId)
    {
        $this->memberId = $memberId;
    }

    /**
     * 文字列表現
     * URLのパラメータ文字列の形式の文字列を生成する
     * @return string 接続文字列表現
     */
    public function toString()
    {

        $str = 'SiteID=' . $this->encodeStr($this->getSiteId());
        $str .= '&';
        $str .= 'SitePass=' . $this->encodeStr($this->getSitePass());
        $str .= '&';
        $str .= 'MemberID=' . $this->encodeStr($this->getMemberId());

        return $str;
    }

}

?>
