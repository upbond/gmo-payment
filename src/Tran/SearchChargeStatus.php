<?php
namespace Gineign\GmoPayment\Tran;

use Gineign\GmoPayment\Output\SearchChargeStatusOutput;

/**
 * <b>PGプリカチャージ状態照会　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class SearchChargeStatus extends BaseTran
{

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * チャージ状態照会を実行する
     *
     * @param SearchChargeStatusInput $input 入力パラメータ
     * @return SearchChargeStatusOutput $output 出力パラメータ
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

        // SearchChargeStatusOutput作成し、戻す
        return new SearchChargeStatusOutput($resultMap);
    }
}

?>
