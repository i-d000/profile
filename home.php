<?php
require_once 'setting/const.php';
require_once 'model/state.check.php';
// test-data
$id = 1;
$hashed = 'a';
// セッション値
session_start();
// cookie値 ログイン状態
setcookie("id", $id, time() + 60 * 60 * 24 * 30); //有効期間30日
setcookie('password', $hashed, time() + 60 * 60 * 24 * 30); //有効期間30日
// ログイン状態削除
// setcookie("id", "", time() - 3600);
if (isset($_COOKIE['id']) && $_COOKIE['id'] === stateCheck($_COOKIE['password'])) {
    echo 'ログイン';
}
$_SESSION['id'] = $id;

require_once 'view/home.php';
