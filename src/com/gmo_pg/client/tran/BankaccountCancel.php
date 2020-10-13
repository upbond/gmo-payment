<?php
namespace Gineign\GmoPayment\Tran;
use Gineign\GmoPayment\Common\Cryptgram;
use Gineign\GmoPayment\Common\GPayException;
use Gineign\GmoPayment\Output\BankaccountCancelOutput;
use Gineign\GmoPayment\Tran\BaseTran;
/**
 * <b>口振セレクト請求依頼取消　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class BankaccountCancel extends BaseTran {

	/**
	 * コンストラクタ
	 */
	public function __construct() {
	    parent::__construct();
	}

	/**
	 * 請求依頼取消を実行する
	 *
	 * @param  BankaccountCancelInput $input  入力パラメータ
	 * @return BankaccountCancelOutput $output 出力パラメータ
	 * @exception GPayException
	 */
	public function exec(&$input) {

        // 接続しプロトコル呼び出し・結果取得
        $resultMap = $this->callProtocol($input->toString());
	    // 戻り値がnullの場合、nullを戻す
        if (is_null($resultMap)) {
		    return null;
        }

        // BankaccountCancelOutput作成し、戻す
	    return new BankaccountCancelOutput($resultMap);
	}
}
?>
