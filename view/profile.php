<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $profile['username'] ?>のProfile</title>
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
    <h1 class="display-none"><?php echo $profile['username'] ?>プロフィール画面</h1>
    <!-- 画面最上段の帯 -->
    <div id="line">
      <h2><?php echo $profile['username'] ?>のプロフィール画面</h2>
    </div>
    <!-- プロフ背景 -->
    <div id="background-img" style="background-image: url(resource/img/<?php echo $profile['id'] ?>_back.png);">
      <img src="resource/img/<?php echo $profile['id'] ?>.png" alt="icon画像" width="" height="" />
    </div>

    <!-- プロフィール-->
    <article id="profile_page">
      <h2 class="display-none">プロフィール内容一覧と編集</h2>
      <div id="edit_button">
        <a href="./personal_message.php?id=<?php echo $profile['id'] ?>">
          <p id="DM"><img src="./resource/image/mail_empty.png" alt="DM用の画像"></p>
        </a>
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

    <!--ツイートボタン-->
    <article>
      <!-- modal tweet button -->
      <!-- <button type="button" id="tweet_button"><img src="./resource/image/pen.png" alt="編集ボタンの画像"></button> -->
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