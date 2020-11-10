<?php

namespace Gineign\GmoPayment\Tran;

use Gineign\GmoPayment\Output\DeleteAuOpenIDOutput;

/**
 * <b>auかんたん決済OpenID解除　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 2012/02/15
 */
class DeleteAuOpenID extends BaseTran
{

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * OpenID解除を実行する
     *
     * @param DeleteAuOpenIDInput $input 入力パラメータ
     * @return DeleteAuOpenIDOutput $output 出力パラメータ
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

        // DeleteAuOpenIDOutput作成し、戻す
        return new DeleteAuOpenIDOutput($resultMap);
    }
}

?>
