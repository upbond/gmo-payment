<?php
namespace Gineign\GmoPayment\Tran;
use Gineign\GmoPayment\Common\Cryptgram;
use Gineign\GmoPayment\Common\GPayException;
use Gineign\GmoPayment\Output\ExecTranDocomoOutput;
use Gineign\GmoPayment\Tran\BaseTran;
/**
 * <b>ドコモケータイ払い決済実行　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 2012/06/14
 */
class ExecTranDocomo extends BaseTran {

	/**
	 * コンストラクタ
	 */
	public function __construct() {
	    parent::__construct();
	}

	/**
	 * 決済実行を実行する
	 *
	 * @param  ExecTranDocomoInput $input  入力パラメータ
	 * @return ExecTranDocomoOutput $output 出力パラメータ
	 * @exception GPayException
	 */
	public function exec(&$input) {

        // 接続しプロトコル呼び出し・結果取得
        $resultMap = $this->callProtocol($input->toString());
	    // 戻り値がnullの場合、nullを戻す
        if (is_null($resultMap)) {
		    return null;
        }

        // ExecTranDocomoOutput作成し、戻す
	    return new ExecTranDocomoOutput($resultMap);
	}
}
?>