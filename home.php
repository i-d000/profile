<?php
require_once 'setting/const.php';
require_once 'model/state.check.php'; // ログイン
require_once 'model/home.php';
require_once 'model/datetime.php'; // 日付フォーマット
require_once 'model/jpEncord.php';
require_once 'model/uploadFile.php';
require_once 'model/imgCompress.php';

// セッション値
session_start();

// ログイン状態 表示処理
if (isset($_COOKIE['id']) && $_COOKIE['id'] === stateCheck($_COOKIE['password'])) {
    $profile = getProfile($_COOKIE['id']);
    // var_dump($profile);
    $tweets = getTweets($_COOKIE['id']);
    // var_dump($tweets);
}
// ログアウト状態
if (isset($_COOKIE['id']) === NULL || $_COOKIE['id'] !== stateCheck($_COOKIE['password'])) {
    header('Location:login.php');
    exit;
}

// profile 更新処理
if (isset($_POST['profile'])) {
    updateProfile($_POST);
    // if (profileImg($_POST['id'] . '.jpg')) {
    //     imgCompress($_POST['id'] . '.jpg');
    // }
    header('Location:home.php');
    exit;
}
// tweet 投稿処理
if (isset($_POST['tweet'])) {
    insertTweet($_POST, $_FILES['img']['name']);
    $file_name = jpEncord();
    if (tweetImg($file_name)) {
        tweetImgCompress($file_name);
    }
    header('Location:home.php');
    exit;
}
require_once 'view/home.php';


// test-data
// $_COOKIE['id'] = 1;
// $_COOKIE['hashed'] = 'a';
// 画面遷移時の相手ID session
// $_SESSION['id'] = $id;
// cookie値 ログイン状態
// setcookie("id", $id, time() + 60 * 60 * 24 * 30);
// setcookie('password', $hashed, time() + 60 * 60 * 24 * 30);
// ログイン状態削除
// setcookie("id", "", time() - 3600);
// var_dump($_COOKIE['id']);
// var_dump(stateCheck($_COOKIE['password']));