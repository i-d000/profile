<?php

function birthdayFormat($birthday)
{
    $date = new DateTime($birthday, new DateTimeZone('Asia/Tokyo'));
    return $date->format('Y年m月d日');
}
