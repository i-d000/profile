<?php
require_once 'pdo.php';

function getProfile($cookie_id)
{
    $link = pdoConnect();
    $profile = $link->query('SELECT * FROM profile WHERE id =' . $cookie_id);
    $profile->execute();
    $link = null;
    return $profile->fetch(PDO::FETCH_ASSOC);
}

// var_dump(getProfile(1));

function getTweets($cookie_id)
{
    $link = pdoConnect();
    $tweets = $link->query("SELECT * FROM tweet WHERE profile_id = $cookie_id ORDER BY created_at DESC");
    $tweets->execute();
    $link = null;
    return $tweets->fetchAll(PDO::FETCH_NAMED);
}

// var_dump(getTweets(1));

// profile 更新処理
function updateProfile(array $POST)
{
    $link = pdoConnect();
    $sql = "UPDATE profile SET comment = :comment WHERE id = :id";
    // password = :password ,
    $data = $link->prepare($sql);
    // $data->bindValue(':password', $POST['password'], PDO::PARAM_STR);
    $data->bindValue(':comment', $POST['comment'], PDO::PARAM_STR);
    $data->bindValue(':id', $POST['id'], PDO::PARAM_STR);
    $data->execute();
}

// $POST = ['id' => '1', 'password' => 'gorira', 'comment' => 'dsfsdfdsdfsddf'];
// updateProfile($POST);

// tweet 登録処理
function insertTweet(array $POST, $FILES_name)
{
    $link = pdoConnect();
    $sql = 'INSERT INTO tweet (profile_id,title,content,img)VALUES(:profile_id,:title,:content,:img)';
    $data = $link->prepare($sql);
    $data->bindValue(':profile_id', $POST['id'], PDO::PARAM_STR);
    $data->bindValue(':title', $POST['title'], PDO::PARAM_STR);
    $data->bindValue(':content', $POST['content'], PDO::PARAM_STR);
    $data->bindValue(':img', $FILES_name, PDO::PARAM_STR);
    $data->execute();
}

// $POST = ['id' => '1', 'title' => 'gorira', 'content' => 'title'];
// insertTweet($POST, "");
