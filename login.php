<?php
// 初期設定
$position = '';
$year = '';
$season = '';
$personal = '';
$msg = '';
$loginId = '';
$getSql = '';
$memberId = '';
$loginId = '';
$hashPass = '';
$passSolt = '';
$passStr = '';
$genereatePass = '';
$displayId = '';
$msg = '';
var_dump($_COOKIE);
require_once "setting/const.php";
// -ログインボタンが押された場合-
if (isset($_POST['btn']) && $_POST['btn'] === 'login') {
    // --両方入力されている場合--
    if (!empty('loginId') && !empty($_POST['pass'])) {
        // ログインIDとパスワードの組み合わせチェック
        // 入力されたIDをもとにパスワード、ソルト、ストレッチ回数を取得し入力されたパスワードをハッシュ化し比較
        // db接続
        $link = mysqli_connect(HOST, USER_ID, PASSWORD, DB_NAME);
        if (!$link) {
            $msg = '不明なエラーです';
            exit;
        }
        mysqli_set_charset($link, 'utf8');
        $loginId = mysqli_real_escape_string($link, $_POST['loginId']);
        $position = mb_substr($loginId, 0, 1, "UTF-8");
        $year = mb_substr($loginId, 1, 1, "UTF-8");
        $season = mb_substr($loginId, 2, 1, "UTF-8");
        $personal = mb_substr($loginId, 3, 3, "UTF-8");
        $getSql = "SELECT id AS id,password AS hashPass,salt AS solt,stretch AS stretch FROM profile WHERE position = '.$position.' AND year = '.$year.' AND season= '.$season.' AND personal = '.$personal.'";
        // 値取得
        $result = mysqli_query($link, $getSql);
        if (!$result) {
            mysqli_close($link);
            exit;
        }
        if ($row = mysqli_fetch_assoc($result)) {
            $memberId = $row['id'];
            $hashPass = $row['hashPass'];
            $passSolt = $row['solt'];
            $passStr = $row['stretch'];
        }
        mysqli_close($link);
        // ハッシュ化
        $genereatePass = $_POST['pass'];
        for ($i = 0; $i < $passStr; $i++) {
            $genereatePass = md5($passSolt . $genereatePass);
        }
        // ---組み合わせが正しかった場合---
        if ($hashPass === $genereatePass) {
            // セッションを作成
            setcookie("id", $id, time() + 60 * 60 * 24 * 30);
            header('Location:home.php');
            exit;
        } else {
            // ---組み合わせが正しくなかった場合---
            $displayId = $_POST['loginId'];
            $msg = '存在しない組み合わせです';
        }
    } else {
        // --両方入力されていない場合--
        $msg = '正しく入力してください';
    }
} else {
    // -ログインボタンが押されていない場合-
}
require_once "./view/login.php";
