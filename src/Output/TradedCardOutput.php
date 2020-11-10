<?php

namespace Gineign\GmoPayment\Output;

/**
 * <b>取引後カード登録　出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 01-01-2008 00:00:00
 */
class TradedCardOutput extends BaseOutput
{

    /**
     * @var integer 登録カード連番
     *
     */
    private $cardSeq;

    /**
     * @var string カード番号（下四桁表示、以上マスク）
     */
    private $cardNo;

    /**
     * @var string 仕向先コード
     *
     */
    private $forward;

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
        $this->setCardSeq($params->get('CardSeq'));
        $this->setCardNo($params->get('CardNo'));
        $this->setForward($params->get('Forward'));
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
        $str = 'CardSeq=' . $this->getCardSeq();
        $str .= '&';
        $str .= 'CardNo=' . $this->getCardNo();
        $str .= '&';
        $str .= 'Forward=' . $this->getForward();

        if ($this->isErrorOccurred()) {
            // エラー文字列を連結して返す
            $errString = parent::toString();
            $str .= '&' . $errString;
        }

        return $str;
    }

    /**
     * カード登録連番取得
     * @return integer カード登録連番
     */
    public function getCardSeq()
    {
        return $this->cardSeq;
    }

    /**
     * カード登録連番設定
     * @param integer $cardSeq カード登録連番
     */
    public function setCardSeq($cardSeq)
    {
        $this->cardSeq = $cardSeq;
    }

    /**
     * カード番号取得
     * @return string カード番号
     */
    public function getCardNo()
    {
        return $this->cardNo;
    }

    /**
     * カード番号設定
     * @param string $cardNo カード番号
     */
    public function setCardNo($cardNo)
    {
        $this->cardNo = $cardNo;
    }

    /**
     * 仕向先コード取得
     * @return string 仕向先コード
     */
    public function getForward()
    {
        return $this->forward;
    }

    /**
     * 仕向先コード取得
     * @param string $forward 仕向先コード
     */
    public function setForward($forward)
    {
        $this->forward = $forward;
    }

}

?>
