<?php
namespace Gineign\GmoPayment\Tran;
use Gineign\GmoPayment\Common\Cryptgram;
use Gineign\GmoPayment\Common\GPayException;
use Gineign\GmoPayment\Output\JcbPrecaBalanceInquiryOutput;
use Gineign\GmoPayment\Tran\BaseTran;
/**
 * <b>JCBプリカ残高照会　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class JcbPrecaBalanceInquiry extends BaseTran {

	/**
	 * コンストラクタ
	 */
	public function __construct() {
	    parent::__construct();
	}

	/**
	 * 残高照会を実行する
	 *
	 * @param  JcbPrecaBalanceInquiryInput $input  入力パラメータ
	 * @return JcbPrecaBalanceInquiryOutput $output 出力パラメータ
	 * @exception GPayException
	 */
	public function exec(&$input) {

        // 接続しプロトコル呼び出し・結果取得
        $resultMap = $this->callProtocol($input->toString());
	    // 戻り値がnullの場合、nullを戻す
        if (is_null($resultMap)) {
		    return null;
        }

        // JcbPrecaBalanceInquiryOutput作成し、戻す
	    return new JcbPrecaBalanceInquiryOutput($resultMap);
	}
}
?>
