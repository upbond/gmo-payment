<?php
namespace Gineign\GmoPayment\Tran;

use Gineign\GmoPayment\Output\ChargePrecaOutput;

/**
 * <b>PGプリカチャージ　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class ChargePreca extends BaseTran
{

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * チャージを実行する
     *
     * @param ChargePrecaInput $input 入力パラメータ
     * @return ChargePrecaOutput $output 出力パラメータ
     * @exception GPayException
     */
    public function exec(&$input)
    {

        // 接続しプロトコル呼び出し・結果取得
        $resultMap = $this->callProtocol($input->toString());
        // 戻り値がnullの場合、nullを戻す
        if (is_null($resultMap)) {
            return null;
        }

        // ChargePrecaOutput作成し、戻す
        return new ChargePrecaOutput($resultMap);
    }
}

?>
