<?php
namespace Gineign\GmoPayment\Tran;

use Gineign\GmoPayment\Output\SearchCardDetailOutput;

/**
 * <b>カード情報詳細カード詳細情報取得　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class SearchCardDetail extends BaseTran
{

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * カード詳細情報取得を実行する
     *
     * @param SearchCardDetailInput $input 入力パラメータ
     * @return SearchCardDetailOutput $output 出力パラメータ
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

        // SearchCardDetailOutput作成し、戻す
        return new SearchCardDetailOutput($resultMap);
    }
}

?>
