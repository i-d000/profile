<?php

  include './setting/const.php';
  $id = '';
  $department[] = ''; //学科情報
  $student[] = ''; //生徒情報
  $teacher[] = ''; //先生情報


  //ログインしていなければlogin.phpに飛ばす
  if (!isset($_COOKIE['id'])) {
    header("location:login.php");
  }else {
    $id = $_COOKIE['id'];
    $link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
    mysqli_set_charset($link,'utf8');

    //学科情報
    $result = mysqli_query($link,"
    SELECT department_name AS name
    FROM department
    WHERE id = (SELECT department_id FROM profile WHERE id = " . $id . ")
    ;");
    $num_rows = mysqli_num_rows($result);
    if ($num_rows == 0) {
      $department[] = [
        'name' => '学科がありませんでした'
      ]
    }else {
      while ($row = mysqli_fetch_assoc($result)) {
        $department[] = $row;
      }
    }

    //学科が同じ生徒を取得
    $result = mysqli_query($link,"
      SELECT id,username AS name
      FROM profile
      WHERE department_id = (SELECT department_id FROM profile WHERE id = " . $id . ")
      AND position = 0
    ;");
    $num_rows = mysqli_num_rows($result);
    if ($num_rows == 0) {
      //何も取得できなかったら全件取得
      $result = mysqli_query($link, "SELECT id,username AS name FROM profile WHERE position = 0;");
      while ($row = mysqli_fetch_assoc($result)) {
        $student[] = $row;
      }
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        $student[] = $row;
      }
    }

    //学科が同じ先生を取得
    $result = mysqli_query($link,"
      SELECT id,username AS name
      FROM profile
      WHERE department_id = (SELECT department_id FROM profile WHERE id = " . $id . ")
      AND position = 9
    ;");
    $num_rows = mysqli_num_rows($result);
    if ($num_rows == 0) {
      //何も取得できなかったら全件取得
      $result = mysqli_query($link, "SELECT id,username AS name FROM profile WHERE position 9;");
      while ($row = mysqli_fetch_assoc($result)) {
        $teacher[] = $row;
      }
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        $teacher[] = $row;
      }
    }

    mysqli_close($link);

  }

  include 'tpl/member.php';
  exit;

?>
