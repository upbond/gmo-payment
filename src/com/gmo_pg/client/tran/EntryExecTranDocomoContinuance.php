<?php
namespace Gineign\GmoPayment\Tran;
use Gineign\GmoPayment\Output\EntryExecTranDocomoContinuanceOutput;
use Gineign\GmoPayment\Tran\EntryTranDocomoContinuance;
use Gineign\GmoPayment\Tran\ExecTranDocomoContinuance;
/**
 * <b>ドコモ継続決済　登録・決済一括実行　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 2012/08/21
 */
class EntryExecTranDocomoContinuance {
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
	 * ドコモ継続決済登録・決済を実行する
	 *
	 * @param EntryExecTranDocomoContinuanceInput $input    ドコモ継続決済登録・決済入力パラメータ
	 * @return  EntryExecTranDocomoContinuanceOutput ドコモ継続決済登録・決済出力パラメータ
	 * @exception GPayException
	 */
	public function exec(&$input) {
		// ドコモ継続決済取引登録入力パラメータを取得
		$entryTranDocomoContinuanceInput =& $input->getEntryTranDocomoContinuanceInput();
		// ドコモ継続決済決済実行入力パラメータを取得
		$execTranDocomoContinuanceInput =& $input->getExecTranDocomoContinuanceInput();

		// ドコモ継続決済登録・決済出力パラメータを生成
		$output = new EntryExecTranDocomoContinuanceOutput();

		// 取引ID、取引パスワードを取得
		$accessId = $execTranDocomoContinuanceInput->getAccessId();
		$accessPass = $execTranDocomoContinuanceInput->getAccessPass();

		// 取引ID、取引パスワードが設定されていないとき
		if (is_null($accessId) || 0 == strlen($accessId) || is_null($accessPass)) {
			// ドコモ継続決済取引登録を実行
			$this->log->debug("ドコモ継続決済取引登録実行");
			$entryTranDocomoContinuance = new EntryTranDocomoContinuance();
			$entryTranDocomoContinuanceOutput = $entryTranDocomoContinuance->exec($entryTranDocomoContinuanceInput);

			if ($this->errorTrap($entryTranDocomoContinuance)) {
				return $output;
			}

			// 取引ID、取引パスワードを決済実行用のパラメータに設定
			$accessId = $entryTranDocomoContinuanceOutput->getAccessId();
			$accessPass = $entryTranDocomoContinuanceOutput->getAccessPass();
			$execTranDocomoContinuanceInput->setAccessId($accessId);
			$execTranDocomoContinuanceInput->setAccessPass($accessPass);

			$output->setEntryTranDocomoContinuanceOutput($entryTranDocomoContinuanceOutput);
		}

		$this->log->debug("取引ID : [$accessId]  取引パスワード : [$accessPass]");

		// 取引登録でエラーが起きたとき決済を実行せずに戻る
		if ($output->isEntryErrorOccurred()) {
			$this->log->debug("<<<取引登録失敗>>>");
			return $output;
		}

		// 決済実行
		$this->log->debug("決済実行");
		$execTranDocomoContinuance = new ExecTranDocomoContinuance();
		$execTranDocomoContinuanceOutput = $execTranDocomoContinuance->exec($execTranDocomoContinuanceInput);

		$output->setExecTranDocomoContinuanceOutput($execTranDocomoContinuanceOutput);

		$this->errorTrap($execTranDocomoContinuance);

		return $output;
	}


}
?>
