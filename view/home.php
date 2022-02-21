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
        <input type="password" id="pass-word" name="password">
        <label for="comment">コメント</label>
        <textarea id="comment" name="comment"></textarea>
        <button type="submit" name="profile">更新する</button>
    </form>
    <!-- modal tweet -->
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $_COOKIE['id'] ?>">
        <label for="title">タイトル</label>
        <input type="text" name="title" id="title">
        <label for="content">本文</label>
        <textarea id="content" name="content" id="content"></textarea>
        <button type="submit" name="tweet">投稿する</button>
    </form>

    <!-- show -->
    <h1 class="display-none">自分のプロフィール画面</h1>
    <!-- bg -->
    <img src="" alt="背景画像">
    <img src="" alt="icon画像">
    <!-- profile -->
    <article>
        <h2 class="display-none">プロフィール内容一覧と編集</h2>
        <!-- modal profile button -->
        <button type="button">プロフィールを編集する</button>
        <!-- contents -->
        <p><?php echo $name ?></p>
        <pre><?php echo $comment ?></pre>
        <p><?php echo $birthday ?></p>
    </article>
    <article>
        <!-- modal tweet button -->
        <button type="button">鉛筆</button>
        <h2 class="display-none">tweet一覧</h2>
        <section>
            <h3>tweet本文</h3>
            <img src="" alt="" height="100px" width="100px">
            <p><?php echo $name ?><span><?php echo $created_at ?></span></p>
            <pre><?php echo $content ?></pre>
            <button type="button">fav</button>
        </section>
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