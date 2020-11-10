<?php

namespace Gineign\GmoPayment\Tran;

use Gineign\GmoPayment\Output\TradedCardOutput;

/**
 * <b>取引後カード登録　実行クラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 01-01-2008 00:00:00
 */
class TradedCard extends BaseTran
{

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * カードを登録する
     *
     * @param TradedCardInput $input 入力パラメータ
     * @return TradedCardOutput 出力パラメータ
     */
    public function exec(&$input)
    {
        // プロトコル呼び出し・結果取得
        $resultMap = $this->callProtocol($input->toString());

        // 戻り値がnullの場合、nullを戻す
        if (is_null($resultMap)) {
            return null;
        }

        // TradedCardOutputを作成し、戻す
        return new TradedCardOutput($resultMap);
    }

}

?>
