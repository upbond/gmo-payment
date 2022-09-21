<?php

namespace Gineign\GmoPayment\Output;

use Gineign\GmoPayment\Output\BaseOutput;


/**
 * <b>Tds2Auth 3DS2.0 authentication execution</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 01-01-2008 00:00:00
 */
class Tds2AuthOutput extends BaseOutput
{

    /**
     * @var string Authentication result
     */
    private $tds2TransResult;

    /**
     * @var string Authentication result reason
     */
    private $tds2TransResultReason;

    /**
     * @var string 3DS 2.0 Authentication Challenge URL
     */
    private $challengeUrl; 

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
        $this->setTds2TransResult($params->get('Tds2TransResult'));
        $this->setTds2TransResultReason($params->get('Tds2TransResultReason'));
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
        $str = 'Tds2TransResult=' . $this->getTds2TransResult();
        $str .= '&';
        $str .= 'Tds2TransResultReason=' . $this->getTds2TransResultReason();
        $str .= '&';
        $str .= 'ChallengeUrl=' . $this->getChallengeUrl();

        if ($this->isErrorOccurred()) {
            // エラー文字列を連結して返す
            $errString = parent::toString();
            $str .= '&' . $errString;
        }

        return $str;
    }

    /**
     * Authentication result
     * @return string Authentication result
     */
    public function getTds2TransResult()
    {
        return $this->tds2TransResult;
    }

    /**
     * Authentication result
     *
     * @param string Authentication result
     */
    public function setTds2TransResult($tds2TransResult)
    {
        $this->tds2TransResult = $tds2TransResult;
    }

    /**
     * Tds2TransResultReason
     * @return string Tds2TransResultReason
     */
    public function getTds2TransResultReason()
    {
        return $this->tds2TransResultReason;
    }

    /**
     * Tds2TransResultReason
     *
     * @param string Tds2TransResultReason
     */
    public function setTds2TransResultReason($tds2TransResultReason)
    {
        $this->tds2TransResultReason = $tds2TransResultReason;
    }

    /**
     * 3DS 2.0 Authentication Challenge URL
     * @return string 3DS 2.0 Authentication Challenge URL
     */
    public function getChallengeUrl()
    {
        return $this->challengeUrl;
    }

    /**
     * 3DS 2.0 Authentication Challenge URL
     *
     * @param string 3DS 2.0 Authentication Challenge URL
     */
    public function setChallengeUrl($challengeUrl)
    {
        $this->challengeUrl = $challengeUrl;
    }

}

?>
