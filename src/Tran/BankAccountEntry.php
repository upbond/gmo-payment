<?php
namespace Gineign\GmoPayment\Tran;

use Gineign\GmoPayment\Output\BankAccountEntryOutput;

/**
 * <b>口振オンライン申し込み　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class BankAccountEntry extends BaseTran
{

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 申し込みを実行する
     *
     * @param BankAccountEntryInput $input 入力パラメータ
     * @return BankAccountEntryOutput $output 出力パラメータ
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

        // BankAccountEntryOutput作成し、戻す
        return new BankAccountEntryOutput($resultMap);
    }
}

?>
