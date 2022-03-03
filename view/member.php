<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>メンバー画面</title>
  <link rel="stylesheet" href="./resource/css/destyle.css">
  <link rel="stylesheet" href="./resource/css/member.css">
</head>
<body>
  <!-- ヘッダー部分   -->
  <header>
    <div id="line">
      <h2>メンバー</h2>
    </div>
    <div id="header_form">
      <form action="./search.php">
        <input type="text" name="search">
        <button type="submit">検索</button>
      </form>
    </div>
  </header>

  <main>
    <h2>所属している学校：HAL大阪</h2>
    
    <div class="category_box">
      <div class="flex_text">
        <h3>あなたのクラス（4年制2年IT学科）</h3>
        <a href="./search.php"><p>もっと見る</p></a>
      </div>

      <div class="flex_members">

      <?php for($i = 0;$i < $15;$i++){?> 
      <div class="person">
          <a href="./profile.php?id=<?php echo $student['id']; ?>">
            <img src="./resource/image/<?php echo$student['id']; ?>.jpg" alt="アイコン画像">
            <p><?php echo $student['name']; ?></p>
          </a>
        </div>
      </div>
      <?php } ?>
    </div>

    <div class="category_box">
      <div class="flex_text">
        <h3>クラスの先生</h3>
        <a href="./search.php"><p>もっと見る</p></a>
      </div>

      <div class="flex_members">

      <?php for($i = 0;$i < $5;$i++){?> 
      <div class="person">
          <a href="./profile.php?id=<?php echo $teacher['id']; ?>">
            <img src="./resource/image/<?php echo$teacher['id']; ?>.jpg" alt="アイコン画像">
            <p><?php echo $teacher['name']; ?></p>
          </a>
        </div>
      </div>
      <?php } ?>
    </div>
  </main> 

  <footer>
    <div id="container">
      <div class="item">
        <a href="./home.php"><img src="./resource/image/home.png" alt="ホームボタンのロゴ画像"></a>
      </div>
      <div class="item">
        <a href="./member.php"><img src="./resource/image/team.png" alt="メンバーボタンのロゴ画像"></a>
      </div>
      <div class="item">
        <a href="./massages.php"><img src="./resource/image/mail_pushed.png" alt="メールボタンのロゴ画像"></a>
      </div>
    </div>
  </footer>
</body>
</html>