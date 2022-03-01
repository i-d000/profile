<?php

require_once 'setting/const.php';
require_once 'model/state.check.php'; // ログイン
require_once 'model/profile.php';
require_once 'model/datetime.php'; // 日付フォーマット


// セッション値
session_start();

// ログイン状態 表示処理
if (isset($_COOKIE['id']) && $_COOKIE['id'] === stateCheck($_COOKIE['password'])) {
  $profile = getProfile($_GET['id']);
  // var_dump($profile);
  $tweets = getTweets($_GET['id']);
  // var_dump($tweets);
}
// ログアウト状態
if (isset($_COOKIE['id']) === NULL || $_COOKIE['id'] !== stateCheck($_COOKIE['password'])) {
  header('Location:login.php');
  exit;
}

require_once 'view/profile.php';

// test-data
// $id = 1;
// $hashed = 'a';
// 画面遷移時の相手ID session
// $_SESSION['id'] = $id;
// cookie値 ログイン状態
// setcookie("id", $id, time() + 60 * 60 * 24 * 30);
// setcookie('password', $hashed, time() + 60 * 60 * 24 * 30);
// ログイン状態削除
// setcookie("id", "", time() - 3600);