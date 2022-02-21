<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
</head>

<body>
    <!-- show -->
    <h1 class="display-none"><?php echo $profile['username'] ?>のプロフィール画面</h1>
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
                <h3><?php echo $tweet['title'] ?></h3>
                <pre><?php echo $tweet['content'] ?></pre>
                <button type="button">fav</button>
            </section>
        <?php endforeach ?>
    </article>
    <?php require_once 'resource/layout/footer.php' ?>
</body>

</html>