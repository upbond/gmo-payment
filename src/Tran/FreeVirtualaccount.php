<?php
namespace Gineign\GmoPayment\Tran;

use Gineign\GmoPayment\Output\FreeVirtualaccountOutput;

/**
 * <b>銀行振込(バーチャル口座)継続口座解除　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class FreeVirtualaccount extends BaseTran
{

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 継続口座解除を実行する
     *
     * @param FreeVirtualaccountInput $input 入力パラメータ
     * @return FreeVirtualaccountOutput $output 出力パラメータ
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

        // FreeVirtualaccountOutput作成し、戻す
        return new FreeVirtualaccountOutput($resultMap);
    }
}

?>
