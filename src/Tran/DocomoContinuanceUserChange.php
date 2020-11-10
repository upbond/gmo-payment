<?php
namespace Gineign\GmoPayment\Tran;

use Gineign\GmoPayment\Output\DocomoContinuanceUserChangeOutput;

/**
 * <b>ドコモ継続決済　継続課金変更(お客様)　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 2012/08/21
 */
class DocomoContinuanceUserChange extends BaseTran
{

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 決済実行を実行する
     *
     * @param DocomoContinuanceUserChangeInput $input 入力パラメータ
     * @return DocomoContinuanceUserChangeOutput $output 出力パラメータ
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

        // DocomoContinuanceUserChangeOutput作成し、戻す
        return new DocomoContinuanceUserChangeOutput($resultMap);
    }
}

?>
