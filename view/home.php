<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mypage</title>
  <link rel="stylesheet" href="./resource/css/destyle.css">
  <link rel="stylesheet" href="./resource/css/profile.css">
  <style>
    .display-none {
      display: none;
    }
  </style>
</head>

<body>
  <!-- 仮置き画面幅 -->
  <div id="frame">
    <h1 class="display-none">自分のプロフィール画面</h1>
    <!-- 画面最上段の帯 -->
    <div id="line">
      <h2>マイページ</h2>
    </div>
    <!-- プロフ背景 -->
    <div id="background-img" style="background-image: url(resource/img/<?php echo $profile['id'] ?>_back.png);">
      <img src="resource/img/<?php echo $profile['id'] ?>.png" alt="icon画像" width="" height="" />
    </div>

    <!-- プロフィール-->
    <article id="profile_page">
      <h2 class="display-none">プロフィール内容一覧と編集</h2>
      <div id="edit_button">
        <button type="button" id="edit_text">プロフィール編集</button>
      </div>
      <div id="profile_name">
        <h1><?php echo $profile['username'] ?><span></span></h1>
      </div>
      <div id="belong_frame">
        <p id="belong">HAL大阪IT学科4年制2年</p>
        <p id="role">role:課題委員</p>
      </div>
      <div id="flex_introduce">
        <p id="introduce">introduce:</p>
        <p id="introduce_text"><?php echo $profile['comment'] ?></p>
      </div>
      <p id="birth"><?php echo birthdayFormat($profile['birthday']) ?></p>
    </article>

    <!-- モーダルエリアここから -->
    <section id="modalArea">
      <!--モーダル削除用のタグ -->
      <div class="modalBg"></div>
      <div class="modalWrapper">
        <div class="modalContents">
          <div class="profile_icon" id="icon_good">
            <img src="resource/img/<?php echo $profile['id'] ?>.png" alt="" width="" height="" />
          </div>
          <form method="post" enctype="multipart/form-data" id="submit">
            <input type="hidden" name="id" value="<?php echo $_COOKIE['id'] ?>">
            <label for="title">タイトル</label>
            <input type="text" name="title" id="title">
            <label for="content">本文</label>
            <textarea id="content" name="content" id="content" placeholder="あなたの経験をおしえて"></textarea>
            <label for="img">画像</label>
            <input type="file" id="img" name="img" accept="image/jpeg">
            <p id="right_button"><button type="submit" name="tweet" id="submit_button">投稿する</button></p>
          </form>
        </div>
        <div class="closeModal">
          <p>×</p>
        </div>
      </div>
    </section>

    <section id="modalArea2">
      <!--モーダル削除用のタグ -->
      <div class="modalBg"></div>
      <div class="modalWrapper">
        <div id="flex_closeModal2">
          <div class="closeModal2">
            <p>×</p>
          </div>
          <p id="profile_submit_header">プロフィールを編集</p>
        </div>
        <div class="modalContents">
        </div>

        <form id="submit" class="plus" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $_COOKIE['id'] ?>">
          <!-- <p>名前</p>
          <input type="text" name="name">
          <p>ステータスメッセージ</p>
          <input type="text" name="name">
          <p>役職</p>
          <input type="text" name="name"> -->
          <p>自己紹介</p>
          <!-- <label for="comment">コメント</label> -->
          <textarea id="comment" name="comment"><?php echo $profile['comment'] ?></textarea>
          <!-- <p>生年月日</p>
          <div id="flex_input"><input type="text" name="#"> 年<input type="text" name="#"> 月<input type="text" name="#"> 日</div> -->
          <!-- <p>パスワード</p> -->
          <!-- <label for="pass-word">パスワード</label> -->
          <!-- < echo $profile['password'] ?> -->
          <!-- <input type="text" id="pass-word" name="password" value=""> -->
          <p id="right_button"><button name="profile" type="submit" id="submit_button">投稿する</button></p>
        </form>
      </div>

  </div>
  </section>
  <!-- モーダルエリアここまで -->

  <!--ツイートボタン-->
  <article>
    <!-- modal tweet button -->
    <button type="button" id="tweet_button"><img src="./resource/image/pen.png" alt="編集ボタンの画像"></button>
    <!-- ツイート内容に -->
    <h2 class="display-none">tweet一覧</h2>
    <?php foreach ($tweets as $tweet) : ?>
      <section class="tweet">
        <div class="profile_icon">
          <img src="resource/img/<?php echo $profile['id'] ?>.png" alt="icon画像" width="" height="" />
        </div>
        <div class="flex_right">
          <div class="flex_right_top">
            <h2><?php echo $tweet['title'] ?></h2>
            <p><?php echo birthdayFormat($tweet['created_at']) ?></p>
          </div>
          <p><?php echo $tweet['content'] ?></p>
          <p><?php echo $tweet['img'] !== "" ? '<img src="resource/img/tweet/' . $tweet['img'] . '"alt="' . $tweet['img'] . '" height="300px" width="300px">' : NULL ?></p>
        </div>
      </section>
    <?php endforeach ?>
  </article>

  <?php require_once 'resource/layout/footer.php' ?>
  <script src="./resource/js/profile.js"></script>
</body>

</html>