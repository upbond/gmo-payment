<?php
namespace Gineign\GmoPayment\Tran;
use Gineign\GmoPayment\Output\ExecTranPaypalOutput;
use Gineign\GmoPayment\Tran\BaseTran;

/**
 * <b>Paypal決済実行　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 12-24-2009 00:00:00
 */
class ExecTranPaypal extends BaseTran {

	/**
	 * コンストラクタ
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * 決済を実行する
	 *
	 * @param  ExecTranPaypalInput $input    入力パラメータ
	 * @return ExecTranPaypalOuput 出力パラメータ
	 */
	public function exec(&$input) {

		// プロトコル呼び出し・結果取得
		$resultMap = $this->callProtocol($input->toString());

		// 戻り値がnullの場合、nullを戻す
		if (is_null($resultMap)) {
			return null;
		}

		// ExecTranPayEasyOutputを作成し、戻す
		return new ExecTranPaypalOutput($resultMap);
	}
}
