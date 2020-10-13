<?php
namespace Gineign\GmoPayment\Tran;
use Gineign\GmoPayment\Common\Cryptgram;
use Gineign\GmoPayment\Common\GPayException;
use Gineign\GmoPayment\Output\ExecTranBankaccountOutput;
use Gineign\GmoPayment\Tran\BaseTran;
/**
 * <b>口振セレクト請求依頼　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class ExecTranBankaccount extends BaseTran {

	/**
	 * コンストラクタ
	 */
	public function __construct() {
	    parent::__construct();
	}

	/**
	 * 請求依頼を実行する
	 *
	 * @param  ExecTranBankaccountInput $input  入力パラメータ
	 * @return ExecTranBankaccountOutput $output 出力パラメータ
	 * @exception GPayException
	 */
	public function exec(&$input) {

        // 接続しプロトコル呼び出し・結果取得
        $resultMap = $this->callProtocol($input->toString());
	    // 戻り値がnullの場合、nullを戻す
        if (is_null($resultMap)) {
		    return null;
        }

        // ExecTranBankaccountOutput作成し、戻す
	    return new ExecTranBankaccountOutput($resultMap);
	}
}
?>
