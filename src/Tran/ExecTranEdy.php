<?php

namespace Gineign\GmoPayment\Tran;

use Gineign\GmoPayment\Output\ExecTranEdyOutput;

/**
 * <b>モバイルEdy決済実行　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 03-07-2008 00:00:00
 */
class ExecTranEdy extends BaseTran
{

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 決済を実行する
     *
     * @param ExecTranEdyInput $input 入力パラメータ
     * @return ExecTranEdyOuput 出力パラメータ
     */
    public function exec(&$input)
    {


        // プロトコル呼び出し・結果取得
        $resultMap = $this->callProtocol($input->toString());

        // 戻り値がnullの場合、nullを戻す
        if (is_null($resultMap)) {
            return null;
        }

        // ExecTranEdyOutputを作成し、戻す
        return new ExecTranEdyOutput($resultMap);
    }

}

?>
