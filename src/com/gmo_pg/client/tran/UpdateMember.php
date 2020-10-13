<?php
namespace Gineign\GmoPayment\Tran;
use Gineign\GmoPayment\Output\UpdateMemberOutput;
use Gineign\GmoPayment\Tran\BaseTran;
/**
 * <b>会員更新　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 01-01-2008 00:00:00
 */
class UpdateMember extends BaseTran {

	/**
	 * コンストラクタ
	 */
	public function __construct() {
	    parent::__construct();
	}

	/**
	 * 会員を登録する
	 *
	 * @param  UpdateMemberInput $input    入力パラメータ
	 * @return UpdateMemberOutput 出力パラメータ
	 */
	public function exec(&$input) {
        // プロトコル呼び出し・結果取得
        $resultMap = $this->callProtocol($input->toString());

        // 戻り値がnullの場合、nullを戻す
        if (is_null($resultMap)) {
		    return null;
        }

		// UpdateMemberOutputを作成し、戻す
		return new UpdateMemberOutput($resultMap);
	}

}
?>