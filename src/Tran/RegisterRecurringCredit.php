<?php
namespace Gineign\GmoPayment\Tran;

use Gineign\GmoPayment\Output\RegisterRecurringCreditOutput;

/**
 * <b>自動売上自動売上登録　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class RegisterRecurringCredit extends BaseTran
{

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 自動売上登録を実行する
     *
     * @param RegisterRecurringCreditInput $input 入力パラメータ
     * @return RegisterRecurringCreditOutput $output 出力パラメータ
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

        // RegisterRecurringCreditOutput作成し、戻す
        return new RegisterRecurringCreditOutput($resultMap);
    }
}

?>
