<?php
namespace Gineign\GmoPayment\Tran;

use Gineign\GmoPayment\Common\ConnectUrlMap;
use Gineign\GmoPayment\Common\Gmopg_Log;
use Gineign\GmoPayment\Common\GPayException;
use Gineign\GmoPayment\Common\IgnoreCaseMap;
use Gineign\GmoPayment\Common\ParamParser;

/**
 * @abstract
 * <b>API 基底クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 01-01-2008 00:00:00
 */
class BaseTran
{

    private $user = 'MODP-3.110.178';
    private $version = '178';

    /**
     * @var Gmopg_Log 独自ログクラス
     */
    private $log;

    /**
     * @var GPayException 独自例外
     */
    private $exception;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->log = new Gmopg_Log(get_class($this));
    }

    /**
     * プロトコルタイプのURLへ接続する。
     *
     * @param string $url プロトコルタイプへのURL文字列
     * @exception GPayException
     */
    protected function connect($url)
    {
        // URLを解析
        $url_tokens = parse_url($url);

        // プロトコルを取得
        // ※array_key_exists()はPHP4.1.0以降で動作します
        $protocol = array_key_exists('scheme', $url_tokens) ? $url_tokens['scheme'] : null;

        // 未対応のプロトコルのときはエラーとする
        if (false == preg_match('/^[Hh][Tt][Tt][Pp][Ss]?/', $protocol)) {
            $this->exception =
                new GPayException("未対応のプロトコルが指定されました。[$protocol]", $this->exception);
            return null;
        }

        // HTTP/HTTPS 接続

        // CURLの初期化
        $urlConnect = curl_init();
        // POSTメソッドに設定
        curl_setopt($urlConnect, CURLOPT_POST, 1);
        // URLを設定
        curl_setopt($urlConnect, CURLOPT_URL, $url);
        // 戻り値の取得方法の設定
        curl_setopt($urlConnect, CURLOPT_RETURNTRANSFER, 1);
        // SSL認証の設定
        curl_setopt($urlConnect, CURLOPT_SSL_VERIFYHOST, 2);
        // サーバ証明書の検証を行わない
        curl_setopt($urlConnect, CURLOPT_SSL_VERIFYPEER, false);
        // HTTPで400 以上のコードが返ってきた際に処理失敗とする
        curl_setopt($urlConnect, CURLOPT_FAILONERROR, true);

        $error = curl_error($urlConnect);
        if ($error) {
            $this->exception =
                new GPayException("プロトコルタイプへの接続に失敗しました。[$error]", $this->exception);
            return null;
        }

        return $urlConnect;
    }

    /**
     * プロトコルタイプのURLへの接続を解除する。
     *
     * @param mixed $urlConnect プロトコルタイプへのURL接続
     */
    protected function disconnect(&$urlConnect)
    {
        if ($urlConnect) {
            curl_close($urlConnect);
        }
    }

    /**
     * プロトコルタイプのURLへデータを送信する。
     *
     * @param mixed $urlConnect プロトコルタイプへのURL接続
     * @param string $params プロトコルタイプへ送信するパラメータ文字列
     * @exception GPayException
     */
    protected function sendData(&$urlConnect, $params)
    {
        // HTTP/HTTPS 接続に失敗しているときは戻る
        if (!$urlConnect) {
            return null;
        }

        if (is_null($params)) {
            $this->exception = new GPayException("パラメータ文字列がnullです。", $this->exception);
            return null;
        }

        // パラメータを送信
        curl_setopt($urlConnect, CURLOPT_POSTFIELDS, $params);
        $retData = curl_exec($urlConnect);

        if (false == $retData) {
            $error = curl_error($urlConnect);
            $this->log->error("プロトコルタイプとのデータの送受信に失敗しました。 : $error");
            return "ErrCode=E91&ErrInfo=E91060001";
        }
        return $retData;
    }

    /**
     * プロトコルタイプのURLから戻り値を読み出す。
     *
     * @param mixed $retData プロトコルタイプへのURL接続
     * @return string 戻り値
     * @exception GPayException
     */
    protected function recvData($retData)
    {

        // データの送受信に失敗しているときは戻る

        if (!$retData) {
            return null;
        }

        // ※２つめの引数はPHP4.1.0以降で認識します。
        return rtrim($retData, "\r\n");
    }

    /**
     * プロトコルタイプを呼び出し、結果を返す。
     *
     * @param string $url プロトコルタイプへのURL文字列
     * @param string $params プロトコルタイプへ送信するパラメータ文字列
     * @return IgnoreCaseMap 出力パラメータマップ
     * @exception GPayException
     */
    protected function callProtocol_($url, $params)
    {

        // プロトコルタイプのURLへの接続
        $urlConnect = $this->connect($url);

        // データの送信
        $retData = $this->sendData($urlConnect, $params);

        // if(strstr($url,'payment/SecureTran2.idPass')){
        //     dd($retData);
        // }

        // 戻り値の取り出し
        $retData = $this->recvData($retData);

        // プロトコルタイプのURLへの接続を解除
        $this->disconnect($urlConnect);

        $this->log->debug("戻り値 : $retData");

        if (!$retData) {
            return null;
        }

        // 戻り値を解析
        $parser = new ParamParser();
        if (
            mb_strpos($url, "ListVirtualaccount") != false ||
            mb_strpos($url, "InquiryVirtualaccountTransfer") != false ||
            mb_strpos($url, "InquiryTransferGANB") != false
        ) {
            $resultMap = $parser->parseCsv($retData);
        } else if (mb_strpos($url, "ExecTran.idPass") === false
            && mb_strpos($url, "ExecTranVPreCa.idPass") === false
            && mb_strpos($url, "ExecTranLimited.idPass") === false) {
            // ExecTran（カード系）の呼び出しではない
            $resultMap = $parser->parse($retData);
        } else {
            // ExecTran（カード系）の呼び出しである
            if (mb_strpos($retData, "ACS=1") === false) {
                if (mb_strpos($retData, "ACS=2") === false) {
                    //ACS=1or2ではない場合は通常のパースを行う
                    $resultMap = $parser->parse($retData);
                } else {
                    // EntryTranの呼び出し、かつ、ACS=2である場合、3DS2.0用の特殊パースを行う
                    $resultMap = $parser->execSpecialParse2($retData);
                }
            } else {
                // EntryTranの呼び出し、かつ、ACS=1である場合、特殊パースを行う（3DS用URLの仕様変更のため）
                $resultMap = $parser->execSpecialParse($retData);
            }
        }
        $resultMap = new IgnoreCaseMap($resultMap);

        return $resultMap;
    }

    /**
     * プロトコルタイプを呼び出し、結果を返す。
     * 呼び出し先のURLはクラス名をもとに取得する。
     *
     * @param string $params プロトコルタイプへ送信するパラメータ文字列
     * @return IgnoreCaseMap 出力パラメータマップ
     * @exception GPayException
     */
    protected function callProtocol($params)
    {
        // URLを取得
        $urlMap = new ConnectUrlMap();
        // $key = get_class($this); 
        $arr = explode('\\', get_class($this));
        $key = end($arr);
        $url = $urlMap->getUrl($key);

        $this->log->debug("キー値 : $key  取得URL : $url パラメータ ： $params");


        // URLを取得できなかったときはエラーとする
        if (is_null($url)) {
            $this->exception =
                new GPayException("呼び出し先のURLを取得できませんでした。[$key]", $this->exception);
            return null;
        }

        //更新者として、製品バージョンを設定
        return $this->callProtocol_($url, $params . '&User=' . $this->user . '&Version=' . $this->version);
    }

    /**
     * 例外の発生を判定する
     *
     * @return boolean 判定結果(true = 例外発生)
     */
    public function isExceptionOccured()
    {
        return false == is_null($this->exception);
    }

    /**
     * 例外を返す
     *
     * @return  GPayException 例外
     */
    public function &getException()
    {
        return $this->exception;
    }

}

?>
