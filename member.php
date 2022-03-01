<?php

  include './setting/const.php';

  $table = array();

  //ログインしていなければlogin.phpに飛ばす
  // if (!isset($_COOKIE['id'])) {
  //   header("location:login.php");
  // }else {
    //データベースから全件取得
    $link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
    mysqli_set_charset($link,'utf8');
    $result = mysqli_query($link,"SELECT id,username AS name FROM profile;");
    while ($row = mysqli_fetch_assoc($result)) {
      $table[] = $row;
    }
    mysqli_close($link);


    //何も取得できなかったら
    if (!$table) {

    }

    //idから学科、学年、春/秋が同じ生徒をデータベースから取り出す
    //idから学科、
  // }

  include 'view/member.php';
  exit;
