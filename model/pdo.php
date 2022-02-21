<?php
// require_once '../setting/const.php';

function pdoConnect()
{
    $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . HOST . ';charset=utf8';
    try {
        $db = new PDO($dsn, USER_ID, PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $err) {
        die('DB接続エラー:' . $err->getMessage());
    }
}
