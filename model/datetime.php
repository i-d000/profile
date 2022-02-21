<?php

function birthdayFormat($birthday)
{
    $date = new DateTime($birthday, new DateTimeZone('Asia/Tokyo'));
    return $date->format('Y年m月d日');
}

// var_dump(birthdayFormat('2022-02-21 16:49:10'));
