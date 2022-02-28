<?php
require_once "../const.php";
//ログインされていない場合の処理
if(!isset($_COOKIE["id"])){
    header("location:./login.php");
    exit;
}
//メッセージ送りあったことのあるユーザーのIDと名前をとってくる
$name_list = [];
$link = mysqli_connect(HOST , USER_ID ,PASSWORD , DB_NAME);
mysqli_set_charset($link , 'utf8');
$result = mysqli_query($link , "SELECT distinct profile.id AS ユーザーID , profile.username AS ユーザ名 
                        FROM direct_message INNER JOIN profile ON direct_message.destination_profile_id = profile.id OR direct_message.profile_id = profile.id 
                        WHERE (direct_message.profile_id = ". $_COOKIE["id"] ." OR direct_message.destination_profile_id = ". $_COOKIE["id"] .") && profile.id != ". $_COOKIE["id"] ."");
while($row = mysqli_fetch_assoc($result)){
    $name_list[] = $row;
}
$last_message_list = [];
//最後にユーザーに送信したメッセージもしくは受信したメッセージを取得する
for($i = 0 ; $i < count($name_list) ; $i++){
    $partner_id = $name_list[$i]["ユーザーID"]; //連絡をとっている相手のIDを格納
    $result = mysqli_query($link , "SELECT text AS メッセージ
    FROM direct_message
    WHERE (profile_id = ". $_COOKIE["id"] ." OR destination_profile_id = ". $_COOKIE["id"] .")
    AND (profile_id = ". $partner_id ." OR destination_profile_id = ". $partner_id .")
    ORDER BY created_at DESC");
    $row = mysqli_fetch_assoc($result);
    //最後のメッセージ格納
    $name_list[$i]["メッセージ"] = $row["メッセージ"];
}
mysqli_close($link);
//require_once "./tpl/messages.php";
?>
