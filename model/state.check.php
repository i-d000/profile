<?php
require_once 'pdo.php';

function stateCheck($hashed_password)
{
    $link = pdoConnect();
    $sql = "SELECT id FROM profile WHERE password = :password";
    $data = $link->prepare($sql);
    $data->bindValue(':password', $hashed_password, PDO::PARAM_INT);
    $data->execute();
    return $data->fetch(PDO::FETCH_ASSOC);
}
