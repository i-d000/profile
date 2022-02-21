<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>

<body>
    <!-- modal profile -->
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $_COOKIE['id'] ?>">
        <label for="pass-word">パスワード</label>
        <input type="password" id="pass-word" name="password" value="<?php echo $profile['password'] ?>">
        <label for="comment">コメント</label>
        <textarea id="comment" name="comment"><?php echo $profile['comment'] ?></textarea>
        <button type="submit" name="profile">プロフィール更新ボタン</button>
    </form>
    <!-- modal tweet -->
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $_COOKIE['id'] ?>">
        <label for="title">タイトル</label>
        <input type="text" name="title" id="title">
        <label for="content">本文</label>
        <textarea id="content" name="content" id="content"></textarea>
        <button type="submit" name="tweet">tweet投稿ボタン</button>
    </form>

    <!-- show -->
    <h1 class="display-none">自分のプロフィール画面</h1>
    <!-- bg -->
    <img src="resource/img/<?php echo $profile['id'] ?>.png" alt="背景画像" width="" height="">
    <img src="resource/img/<?php echo $profile['id'] ?>_back.png" alt="icon画像" width="" height="">
    <!-- profile -->
    <article>
        <h2 class="display-none">プロフィール内容一覧と編集</h2>
        <!-- modal profile button -->
        <button type="button">プロフィール編集modalボタン</button>
        <!-- contents -->
        <p><?php echo $profile['username'] ?></p>
        <pre><?php echo $profile['comment'] ?></pre>
        <p><?php echo birthdayFormat($profile['birthday']) ?></p>
    </article>
    <article>
        <!-- modal tweet button -->
        <button type="button">tweet投稿モーダルボタン</button>
        <h2 class="display-none">tweet一覧</h2>
        <?php foreach ($tweets as $tweet) : ?>
            <section>
                <img src="resource/tweet/<?php echo $tweet['img'] ?>" alt="<?php echo $tweet['img'] ?>" height="100px" width="100px">
                <h3><?php echo $tweet['title'] ?><span><?php echo $tweet['created_at'] ?></span></h3>
                <pre><?php echo $tweet['content'] ?></pre>
                <button type="button">fav</button>
            </section>
        <?php endforeach ?>
    </article>
    <footer>
        <dl>
            <a href="">
                <dt>Home</dt>
                <dd><img src=""></dd>
            </a>
            <a href="">
                <dt>メンバー</dt>
                <dd><img src=""></dd>
            </a><a href="">
                <dt>DM</dt>
                <dd><img src=""></dd>
            </a>
        </dl>
    </footer>
</body>

</html>