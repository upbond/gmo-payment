<?php
namespace Gineign\GmoPayment\Tran;
use Gineign\GmoPayment\Common\Cryptgram;
use Gineign\GmoPayment\Common\GPayException;
use Gineign\GmoPayment\Output\EntryTranCvsOutput;
use Gineign\GmoPayment\Tran\BaseTran;
/**
 * <b>コンビニ取引登録　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 01-07-2008 00:00:00
 */
class EntryTranCvs extends BaseTran {

	/**
	 * コンストラクタ
	 */
	public function __construct() {
	    parent::__construct();
	}

	/**
	 * プロトコルタイプのURLから戻り値を読み出す。
	 * 文字列を復号化して戻します。
	 *
	 * @param  string $retData プロトコルタイプからの取得文字列
	 * @return string 復号化済みの文字列
	 */
	protected function recvData($retData) {
		// データの送受信に失敗しているときは戻る
		if (!$retData) {
			return null;
		}

		// 取得データの置き換え処理
        $retData = preg_replace('/^ReturnData=/', '', $retData);
        // rtrim処理(strvalで型をstringに固定)
        // ※rtrimの２つめの引数はPHP4.1.0以降で認識します
        $retData = strval(rtrim($retData, "\r\n"));
		return $retData;
	}

	/**
	 * 取引登録を実行する
	 *
	 * @param  EntryTranCvsInput $input  入力パラメータ
	 * @return EntryTranCvsOutput $output 出力パラメータ
	 * @exception GPayException
	 */
	public function exec(&$input) {

        // 接続しプロトコル呼び出し・結果取得
        $resultMap = $this->callProtocol($input->toString());
	    // 戻り値がnullの場合、nullを戻す
        if (is_null($resultMap)) {
		    return null;
        }

        // EntryTranCvsOutput作成し、戻す
	    return new EntryTranCvsOutput($resultMap);
	}
}
?>