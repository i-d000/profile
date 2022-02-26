<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
    <link rel="stylesheet" type="text/css">
</head>
<body>
<form action="./login.php" method="post">
    <ul>
        <li>
            <label class="loginId">ログインID</label>
            <input type="text" name="loginId" placeholder="ohs" value="<?php echo htmlspecialchars($displayId,ENT_QUOTES);?>"><br>
        </li>
        <li>
            <label class="pass">パスワード</label>
            <input type="text"name="pass" placeholder="mode"><br>
        </li>
        <li>
            <button type="submit" name="btn" value="login" id="login">ログイン</button><br>
        </li>
        <span><?php echo $msg;?></span>
    </ul>
    </form>
</body>
</html>