<?php
namespace Gineign\GmoPayment\Tran;
use Gineign\GmoPayment\Common\Cryptgram;
use Gineign\GmoPayment\Common\GPayException;
use Gineign\GmoPayment\Output\AssignVirtualaccountOutput;
use Gineign\GmoPayment\Tran\BaseTran;
/**
 * <b>銀行振込(バーチャル口座)継続口座登録　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class AssignVirtualaccount extends BaseTran {

	/**
	 * コンストラクタ
	 */
	public function __construct() {
	    parent::__construct();
	}

	/**
	 * 継続口座登録を実行する
	 *
	 * @param  AssignVirtualaccountInput $input  入力パラメータ
	 * @return AssignVirtualaccountOutput $output 出力パラメータ
	 * @exception GPayException
	 */
	public function exec(&$input) {

        // 接続しプロトコル呼び出し・結果取得
        $resultMap = $this->callProtocol($input->toString());
	    // 戻り値がnullの場合、nullを戻す
        if (is_null($resultMap)) {
		    return null;
        }

        // AssignVirtualaccountOutput作成し、戻す
	    return new AssignVirtualaccountOutput($resultMap);
	}
}
?>
