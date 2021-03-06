<?php
namespace Gineign\GmoPayment\Tran;

use Gineign\GmoPayment\Output\CheckPaidBuyerOutput;

/**
 * <b>Paid取引先ステータス確認　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class CheckPaidBuyer extends BaseTran
{

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 取引先ステータス確認を実行する
     *
     * @param CheckPaidBuyerInput $input 入力パラメータ
     * @return CheckPaidBuyerOutput $output 出力パラメータ
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

        // CheckPaidBuyerOutput作成し、戻す
        return new CheckPaidBuyerOutput($resultMap);
    }
}

?>
