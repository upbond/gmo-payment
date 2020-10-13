<?php
namespace Gineign\GmoPayment\Tran;
use Gineign\GmoPayment\Output\EntryExecTranEdyOutput;
use Gineign\GmoPayment\Input\TdVerifyInput;
use Gineign\GmoPayment\Input\AcsParam;
use Gineign\GmoPayment\Tran\EntryTranEdy;
use Gineign\GmoPayment\Tran\ExecTranEdy;
use Gineign\GmoPayment\Tran\TdVerify;
use Gineign\GmoPayment\Common\RedirectUtil;
/**
 * <b>モバイルEdy取引登録・決済一括実行　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 03-07-2008 00:00:00
 */
class EntryExecTranEdy {
	/**
	 * @var Gmopg_Log ログ
	 */
	private $log;

	/**
	 * @var GPayException 例外
	 */
	private $exception;

	/**
	 * コンストラクタ
	 */
	public function __construct() {
		$this->log = new Gmopg_Log(get_class($this));
	}

	/**
	 * 例外の発生を判定する
	 *
	 * @param mixed $target    判定対象
	 */
	private function errorTrap(&$target) {
		if (is_null($target->getException())) {
			return false;
		}
		$this->exception = $target->getException();
		return true;
	}

	/**
	 * 例外の発生を判定する
	 *
	 * @return  boolean 判定結果(true=エラーアリ)
	 */
	public function isExceptionOccured() {
		return false == is_null($this->exception);
	}

	/**
	 * 例外を返す
	 *
	 * @return  GPayException 例外
	 */
	public function &getException() {
		return $this->exception;
	}

	/**
	 * モバイルEdy登録・決済を実行する
	 *
	 * @param EntryExecTranEdyInput $input    モバイルEdy登録・決済入力パラメータ
	 * @return  EntryExecTranEdyOutput モバイルEdy登録・決済出力パラメータ
	 * @exception GPayException
	 */
	public function exec(&$input) {
		// モバイルEdy取引登録入力パラメータを取得
		$entryTranEdyInput =& $input->getEntryTranEdyInput();
		// モバイルEdy決済実行入力パラメータを取得
		$execTranEdyInput =& $input->getExecTranEdyInput();

		// モバイルEdy登録・決済出力パラメータを生成
		$output = new EntryExecTranEdyOutput();

		// 取引ID、取引パスワードを取得
		$accessId = $execTranEdyInput->getAccessId();
		$accessPass = $execTranEdyInput->getAccessPass();

		// 取引ID、取引パスワードが設定されていないとき
		if (is_null($accessId) || 0 == strlen($accessId) || is_null($accessPass)) {
			// モバイルEdy取引登録を実行
			$this->log->debug("モバイルEdy取引登録実行");
			$entryTranEdy = new EntryTranEdy();
			$entryTranEdyOutput = $entryTranEdy->exec($entryTranEdyInput);

			if ($this->errorTrap($entryTranEdy)) {
				return $output;
			}

			// 取引ID、取引パスワードを決済実行用のパラメータに設定
			$accessId = $entryTranEdyOutput->getAccessId();
			$accessPass = $entryTranEdyOutput->getAccessPass();
			$execTranEdyInput->setAccessId($accessId);
			$execTranEdyInput->setAccessPass($accessPass);

			$output->setEntryTranEdyOutput($entryTranEdyOutput);
		}

		$this->log->debug("取引ID : [$accessId]  取引パスワード : [$accessPass]");

		// 取引登録でエラーが起きたとき決済を実行せずに戻る
		if ($output->isEntryErrorOccurred()) {
			$this->log->debug("<<<取引登録失敗>>>");
			return $output;
		}

		// 決済実行
		$this->log->debug("決済実行");
		$execTranEdy = new ExecTranEdy();
		$execTranEdyOutput = $execTranEdy->exec($execTranEdyInput);

		$output->setExecTranEdyOutput($execTranEdyOutput);

		$this->errorTrap($execTranEdy);

		return $output;
	}


}
?>