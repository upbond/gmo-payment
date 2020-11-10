<?php
namespace Gineign\GmoPayment\Tran;

use Gineign\GmoPayment\Output\UnionpaySalesOutput;

/**
 * <b>ネット銀聯売上確定　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class UnionpaySales extends BaseTran
{

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 売上確定を実行する
     *
     * @param UnionpaySalesInput $input 入力パラメータ
     * @return UnionpaySalesOutput $output 出力パラメータ
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

        // UnionpaySalesOutput作成し、戻す
        return new UnionpaySalesOutput($resultMap);
    }
}

?>
