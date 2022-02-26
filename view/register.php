<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録</title>
</head>

<body>
  <form action="register.php" method="post" enctype="multipart/form-data">
    CSVファイル:<br />
    <input type="file" name="csvfile" size="30" /><br />
    <button type="submit" name="uploard" value="uploard">アップロード</button>
    <?php
    echo $msg;
    ?>
  </form>
</body>

</html>