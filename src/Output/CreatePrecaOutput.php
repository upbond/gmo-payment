<?php
namespace Gineign\GmoPayment\Output;

/**
 * <b>PGプリカPGプリカ発行　出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 */
class CreatePrecaOutput extends BaseOutput
{

    /**
     * @var string プリカ番号
     */
    private $precaNo;
    /**
     * @var string プリカ認証番号
     */
    private $precaPass;


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
        $this->setPrecaNo($params->get('PrecaNo'));
        $this->setPrecaPass($params->get('PrecaPass'));

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
        $str .= 'PrecaNo=' . $this->encodeStr($this->getPrecaNo());
        $str .= '&';
        $str .= 'PrecaPass=' . $this->encodeStr($this->getPrecaPass());


        if ($this->isErrorOccurred()) {
            // エラー文字列を連結して返す
            $errString = parent::toString();
            $str .= '&' . $errString;
        }

        return $str;
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

}

?>
