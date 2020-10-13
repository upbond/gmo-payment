<?php
namespace Gineign\GmoPayment\Tran;
use Gineign\GmoPayment\Common\Cryptgram;
use Gineign\GmoPayment\Common\GPayException;
use Gineign\GmoPayment\Output\RecruitContinuanceCancelOutput;
use Gineign\GmoPayment\Tran\BaseTran;
/**
 * <b>リクルートかんたん支払い継続課金解約　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class RecruitContinuanceCancel extends BaseTran {

	/**
	 * コンストラクタ
	 */
	public function __construct() {
	    parent::__construct();
	}

	/**
	 * 解約を実行する
	 *
	 * @param  RecruitContinuanceCancelInput $input  入力パラメータ
	 * @return RecruitContinuanceCancelOutput $output 出力パラメータ
	 * @exception GPayException
	 */
	public function exec(&$input) {

        // 接続しプロトコル呼び出し・結果取得
        $resultMap = $this->callProtocol($input->toString());
	    // 戻り値がnullの場合、nullを戻す
        if (is_null($resultMap)) {
		    return null;
        }

        // RecruitContinuanceCancelOutput作成し、戻す
	    return new RecruitContinuanceCancelOutput($resultMap);
	}
}
?>
