<?php

/**
 * win sijsにエンコード
 * 引数 $_FILEの[name],変更先の文字コード,変更元の文字コード
 */
function jpEncord()
{
    //日本語に変更
    return mb_convert_encoding($_FILES['img']['name'], 'sjis', 'utf8');
}
