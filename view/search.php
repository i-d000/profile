<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>メンバー画面</title>
  <link rel="stylesheet" href="./css/destyle.css">
  <link rel="stylesheet" href="./css/member.css">
</head>
<body>
  <!-- ヘッダー部分   -->
  <header>
    <div id="line">
      <h2>メンバー</h2>
    </div>
    <div id="header_form">
      <form action="./search.html"method="post">
        <input type="text" name="search">
        <button type="submit">検索</button>
      </form>
    </div>
  </header>

  <main>
    <h2><span>検索条件</span>の検索結果</h2>

    <div class="category_box">

      <div class="flex_members">

        <?php foreach ($table as $value): ?>
          <div class="person">
            <a href="">
              <img src="img/<?php echo $value['id'] ?>.png" alt="<?php echo $value['name']?>">
              <p><?php echo $value['name'] ?></p>
            </a>
          </div>
        <?php endforeach; ?>

      </div>

    </div>

  </main>

  <footer>
    <div id="container">
      <div class="item">
        <a href="./home.html"><img src="./img/home.png" alt="ホームボタンのロゴ画像"></a>
      </div>
      <div class="item">
        <a href="./member.html"><img src="./img/team.png" alt="メンバーボタンのロゴ画像"></a>
      </div>
      <div class="item">
        <a href="massages.html"><img src="./img/mail_pushed.png" alt="メールボタンのロゴ画像"></a>
      </div>
    </div>
  </footer>
</body>
</html>
