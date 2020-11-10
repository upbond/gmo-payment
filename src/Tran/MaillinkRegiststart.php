<?php
namespace Gineign\GmoPayment\Tran;

use Gineign\GmoPayment\Output\MaillinkRegiststartOutput;

/**
 * <b>メールリンクカード登録　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class MaillinkRegiststart extends BaseTran
{

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * カード登録を実行する
     *
     * @param MaillinkRegiststartInput $input 入力パラメータ
     * @return MaillinkRegiststartOutput $output 出力パラメータ
     * @exception GPayException
     */
    public function exec(&$input)
    {

        // 接続しプロトコル呼び出し・結果取得
        $resultMap = $this->callProtocol($input->toString());
        // 戻り値がnullの場合、nullを戻す
        if (is_null($resultMap)) {
            return null;
        }

        // MaillinkRegiststartOutput作成し、戻す
        return new MaillinkRegiststartOutput($resultMap);
    }
}

?>
