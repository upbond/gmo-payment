<?php
namespace Gineign\GmoPayment\Tran;

use Gineign\GmoPayment\Output\TradedBrandtokenOutput;

/**
 * <b>ブランドトークン決済ブランドトークン登録／更新　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class TradedBrandtoken extends BaseTran
{

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * ブランドトークン登録／更新を実行する
     *
     * @param TradedBrandtokenInput $input 入力パラメータ
     * @return TradedBrandtokenOutput $output 出力パラメータ
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

        // TradedBrandtokenOutput作成し、戻す
        return new TradedBrandtokenOutput($resultMap);
    }
}

?>
