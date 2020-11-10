<?php

namespace Gineign\GmoPayment\Output;

/**
 * <b>逆引き会員照会　出力パラメータクラス</b>
 *
 * @package com.gmo_pg.client
 * @subpackage output
 * @see outputPackageInfo.php
 * @author GMO PaymentGateway
 * @version 1.0
 * @created 15-12-2014
 */
class SearchCardReverseOutput extends BaseOutput
{

    /**
     * @var array 会員IDの一次元配列
     *
     */
    private $memberID;

    /**
     * @var array 削除フラグの一次元配列 '1'=削除済み '0'=非削除
     *
     */
    private $deleteFlag;

    /**
     * @var array  カード登録日の一次元配列 形式はYYYYMMDDhhmmss
     */
    private $createDate;

    /**
     * @var array 会員情報の配列。会員情報の連想配列が繰り返される、二次元配列。例：
     *
     *    <code>
     *    $memberList =
     *        array(
     *            array(
     *                'MemberID' =>    'SampleMember01' ,
     *                'DeleteFlag'    =>    '0',
     *                'CreateDate'=>    '20141231185959'
     *            ),
     *            array(
     *                'MemberID' =>    'SampleMember02' ,
     *                'DeleteFlag'    =>    '1',
     *                'CreateDate'=>    '20141231185959'
     *            ),
     *    )
     * </code>
     *
     */
    private $memberList = null;


    /**
     * コンストラクタ
     *
     * @param IgnoreCaseMap $params 出力パラメータ
     */
    public function __construct($params = null)
    {
        parent::__construct($params);

        // 引数が無い場合は戻る
        if (is_null($params)) {
            return;
        }

        // マップの展開
        //カードは複数返るので、全てマップに展開
        $cardArray = null;
        $memberID = $params->get('MemberID');
        $deleteFlag = $params->get('DeleteFlag');
        $createDate = $params->get('CreateDate');

        if (is_null($memberID)) {
            return;
        }
        //項目ごとに配列として設定
        if (!is_null($memberID)) {
            $this->setMemberID(explode('|', $memberID));
        }
        if (!is_null($createDate)) {
            $this->setCreateDate(explode('|', $createDate));
        }
        if (!is_null($deleteFlag)) {
            $this->setDeleteFlag(explode('|', $deleteFlag));
        }
        //カード配列を作成
        $memberList = array();
        $count = count($this->memberID);
        for ($i = 0; $i < $count; $i++) {
            $tmp = null;
            $tmp['DeleteFlag'] = $this->deleteFlag[$i];
            $tmp['MemberID'] = $this->memberID[$i];
            $tmp['CreateDate'] = $this->createDate[$i];
            $memberList[] = $tmp;
        }
        $this->memberList = $memberList;
    }

    /**
     * 会員IDの配列取得
     * @return array 会員ID配列
     */
    public function getMemberID()
    {
        return $this->memberID;
    }

    /**
     * 会員ID配列設定
     * @param array $memberID 会員ID
     */
    public function setMemberID($memberID)
    {
        $this->memberID = $memberID;
    }

    /**
     * 削除フラグの配列取得
     * @return array 削除フラグ配列
     */
    public function getDeleteFlag()
    {
        return $this->deleteFlag;
    }

    /**
     * 削除フラグ設定
     * @param array $deleteFlag 削除フラグ
     */
    public function setDeleteFlag($deleteFlag)
    {
        $this->deleteFlag = $deleteFlag;
    }

    /**
     * 登録日の配列取得
     * @return array 登録日配列
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * 登録日配列設定
     *
     * @param array $createDate 登録日配列設定
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    /**
     * 会員リスト取得
     * <p>
     *    　$memberListを返します
     * </p>
     * @return array 会員リスト
     */
    public function getMemberList()
    {
        return $this->memberList;
    }

    /**
     * 会員IDリスト設定
     * @param array $memberList 会員IDリスト設定
     */
    public function setMemberList($memberList)
    {
        $this->memberList = $memberList;
    }

    /**
     * 文字列表現
     * <p>
     *  現在の各パラメータを、パラメータ名=値&パラメータ名=値の形式で取得します。
     * </p>
     * @return string 出力パラメータの文字列表現
     */
    public function toString()
    {
        $str = 'MemberID=' . (is_null($this->memberID) ? '' : implode('|', $this->memberID));
        $str .= '&';
        $str .= 'CreateDate=' . (is_null($this->createDate) ? '' : implode('|', $this->createDate));
        $str .= '&';
        $str .= 'DeleteFlag=' . (is_null($this->deleteFlag) ? '' : implode('|', $this->deleteFlag));

        if ($this->isErrorOccurred()) {
            // エラー文字列を連結して返す
            $errString = parent::toString();
            $str .= '&' . $errString;
        }

        return $str;
    }

}

?>
