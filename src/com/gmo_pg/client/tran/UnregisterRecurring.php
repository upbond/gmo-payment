<?php
namespace Gineign\GmoPayment\Tran;
use Gineign\GmoPayment\Common\Cryptgram;
use Gineign\GmoPayment\Common\GPayException;
use Gineign\GmoPayment\Output\UnregisterRecurringOutput;
use Gineign\GmoPayment\Tran\BaseTran;
/**
 * <b>自動売上自動売上定義解除　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class UnregisterRecurring extends BaseTran {

	/**
	 * コンストラクタ
	 */
	public function __construct() {
	    parent::__construct();
	}

	/**
	 * 自動売上定義解除を実行する
	 *
	 * @param  UnregisterRecurringInput $input  入力パラメータ
	 * @return UnregisterRecurringOutput $output 出力パラメータ
	 * @exception GPayException
	 */
	public function exec(&$input) {

        // 接続しプロトコル呼び出し・結果取得
        $resultMap = $this->callProtocol($input->toString());
	    // 戻り値がnullの場合、nullを戻す
        if (is_null($resultMap)) {
		    return null;
        }

        // UnregisterRecurringOutput作成し、戻す
	    return new UnregisterRecurringOutput($resultMap);
	}
}
?>
