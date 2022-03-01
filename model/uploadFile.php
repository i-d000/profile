<?php

/**
 * ファイルアップロード
 * 引数 $_FILESの一時保存dir 保存先dir+ファイル保存名
 */
function profileImg($file_name)
{
    return move_uploaded_file($_FILES['img']['tmp_name'], './resource/img/' . $file_name);
}

/**
 * ファイルアップロード
 * 引数 $_FILESの一時保存dir 保存先dir+ファイル保存名
 */
function tweetImg($file_name)
{
    return move_uploaded_file($_FILES['img']['tmp_name'], './resource/img/tweet/' . $file_name);
}
