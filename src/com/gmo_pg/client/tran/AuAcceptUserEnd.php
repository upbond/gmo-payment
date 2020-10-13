<?php
namespace Gineign\GmoPayment\Tran;
use Gineign\GmoPayment\Common\Cryptgram;
use Gineign\GmoPayment\Common\GPayException;
use Gineign\GmoPayment\Output\AuAcceptUserEndOutput;
use Gineign\GmoPayment\Tran\BaseTran;
/**
 * <b>auかんたん決済支払い（利用承諾）利用承諾終了　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class AuAcceptUserEnd extends BaseTran {

	/**
	 * コンストラクタ
	 */
	public function __construct() {
	    parent::__construct();
	}

	/**
	 * 利用承諾終了を実行する
	 *
	 * @param  AuAcceptUserEndInput $input  入力パラメータ
	 * @return AuAcceptUserEndOutput $output 出力パラメータ
	 * @exception GPayException
	 */
	public function exec(&$input) {

        // 接続しプロトコル呼び出し・結果取得
        $resultMap = $this->callProtocol($input->toString());
	    // 戻り値がnullの場合、nullを戻す
        if (is_null($resultMap)) {
		    return null;
        }

        // AuAcceptUserEndOutput作成し、戻す
	    return new AuAcceptUserEndOutput($resultMap);
	}
}
?>
