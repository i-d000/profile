<?php

  include './setting/const.php';

  $search = '';

  if (isset($_POST['search'])) {
    $search = $_POST['search'];
  }
  
  //ログインしていなければlogin.phpに飛ばす
  if (!isset($_COOKIE['id'])) {
    header("location:login.php");
  }else {
  //データベースから全件取得
    $link = mysqli_connect(HOST, USER_ID, PASSWORD, DB_NAME);
    mysqli_set_charset($link, 'utf8');
    $result = mysqli_query($link, "SELECT id,username AS name FROM profile WHERE username LIKE '%" . $search . "%';");
    $num_rows = mysqli_num_rows($result);
    if ($num_rows == 0) {
      //何も取得できなかったら
      $result = mysqli_query($link, "SELECT id,username AS name FROM profile;");
      while ($row = mysqli_fetch_assoc($result)) {
        $table[] = $row;
      }
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        $table[] = $row;
      }
    }

    mysqli_close($link);

  }

  include './view/search.php';
  exit;

?>
