<?php
namespace Gineign\GmoPayment\Output;

/**
 * <b>LINE Pay決済実行　出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 */
class ExecTranLinepayOutput extends BaseOutput
{

    /**
     * @var string Startフラグ
     */
    private $start;
    /**
     * @var string 取引ID
     */
    private $accessID;
    /**
     * @var string トークン
     */
    private $token;
    /**
     * @var string 支払手続き開始IFのURL
     */
    private $startURL;
    /**
     * @var string 現状態
     */
    private $status;
    /**
     * @var string 支払方法
     */
    private $payMethod;
    /**
     * @var string MD5ハッシュ
     */
    private $checkString;
    /**
     * @var string 加盟店自由項目1
     */
    private $clientField1;
    /**
     * @var string 加盟店自由項目2
     */
    private $clientField2;
    /**
     * @var string 加盟店自由項目3
     */
    private $clientField3;


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
        $this->setStart($params->get('Start'));
        $this->setAccessID($params->get('AccessID'));
        $this->setToken($params->get('Token'));
        $this->setStartURL($params->get('StartURL'));
        $this->setStatus($params->get('Status'));
        $this->setPayMethod($params->get('PayMethod'));
        $this->setCheckString($params->get('CheckString'));
        $this->setClientField1($params->get('ClientField1'));
        $this->setClientField2($params->get('ClientField2'));
        $this->setClientField3($params->get('ClientField3'));

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
        $str .= 'Start=' . $this->encodeStr($this->getStart());
        $str .= '&';
        $str .= 'AccessID=' . $this->encodeStr($this->getAccessID());
        $str .= '&';
        $str .= 'Token=' . $this->encodeStr($this->getToken());
        $str .= '&';
        $str .= 'StartURL=' . $this->encodeStr($this->getStartURL());
        $str .= '&';
        $str .= 'Status=' . $this->encodeStr($this->getStatus());
        $str .= '&';
        $str .= 'PayMethod=' . $this->encodeStr($this->getPayMethod());
        $str .= '&';
        $str .= 'CheckString=' . $this->encodeStr($this->getCheckString());
        $str .= '&';
        $str .= 'ClientField1=' . $this->encodeStr($this->getClientField1());
        $str .= '&';
        $str .= 'ClientField2=' . $this->encodeStr($this->getClientField2());
        $str .= '&';
        $str .= 'ClientField3=' . $this->encodeStr($this->getClientField3());


        if ($this->isErrorOccurred()) {
            // エラー文字列を連結して返す
            $errString = parent::toString();
            $str .= '&' . $errString;
        }

        return $str;
    }

    /**
     * Startフラグ取得
     * @return string Startフラグ
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Startフラグ設定
     *
     * @param string $start
     */
    public function setStart($start)
    {
        $this->start = $start;
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
     * 支払手続き開始IFのURL取得
     * @return string 支払手続き開始IFのURL
     */
    public function getStartURL()
    {
        return $this->startURL;
    }

    /**
     * 支払手続き開始IFのURL設定
     *
     * @param string $startURL
     */
    public function setStartURL($startURL)
    {
        $this->startURL = $startURL;
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
     * 支払方法取得
     * @return string 支払方法
     */
    public function getPayMethod()
    {
        return $this->payMethod;
    }

    /**
     * 支払方法設定
     *
     * @param string $payMethod
     */
    public function setPayMethod($payMethod)
    {
        $this->payMethod = $payMethod;
    }

    /**
     * MD5ハッシュ取得
     * @return string MD5ハッシュ
     */
    public function getCheckString()
    {
        return $this->checkString;
    }

    /**
     * MD5ハッシュ設定
     *
     * @param string $checkString
     */
    public function setCheckString($checkString)
    {
        $this->checkString = $checkString;
    }

    /**
     * 加盟店自由項目1取得
     * @return string 加盟店自由項目1
     */
    public function getClientField1()
    {
        return $this->clientField1;
    }

    /**
     * 加盟店自由項目1設定
     *
     * @param string $clientField1
     */
    public function setClientField1($clientField1)
    {
        $this->clientField1 = $clientField1;
    }

    /**
     * 加盟店自由項目2取得
     * @return string 加盟店自由項目2
     */
    public function getClientField2()
    {
        return $this->clientField2;
    }

    /**
     * 加盟店自由項目2設定
     *
     * @param string $clientField2
     */
    public function setClientField2($clientField2)
    {
        $this->clientField2 = $clientField2;
    }

    /**
     * 加盟店自由項目3取得
     * @return string 加盟店自由項目3
     */
    public function getClientField3()
    {
        return $this->clientField3;
    }

    /**
     * 加盟店自由項目3設定
     *
     * @param string $clientField3
     */
    public function setClientField3($clientField3)
    {
        $this->clientField3 = $clientField3;
    }

}

?>
