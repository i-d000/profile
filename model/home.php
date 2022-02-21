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
    $tweets = $link->query('SELECT * FROM tweet WHERE profile_id =' . $cookie_id);
    $tweets->execute();
    $link = null;
    return $tweets->fetchAll(PDO::FETCH_NAMED);
}

// var_dump(getTweets(1));
