<?php
require_once "../const.php";
//リンクから飛んできた場合の処理
if(!isset($_GET["id"])){
    header("location:./home.php");
    exit;
}else{
    $partner_id = $_GET["id"];
}
//メッセージを送る処理
if(isset($_POST["submit"])){
    //画像が選択されている場合の処理
    $img = "";
    if(isset($_FILES["file"]["name"])){
       $upload_file = $_FILES['file'];
        move_uploaded_file($upload_file["tmp_name"] , "./img/".$_FILES['file']['name']);
        $img = $_FILES['file']['name'];
    }
    if($_POST["message"] != "" ){
        $link = mysqli_connect(HOST , USER_ID ,PASSWORD , DB_NAME);
        mysqli_set_charset($link , 'utf8');
        $message = mysqli_real_escape_string($link , $_POST["message"]);
        mysqli_query($link , "INSERT INTO direct_message(text , img , profile_id , destination_profile_id) VALUES('". $message ."' , '". $img ."' , ". $_COOKIE["id"] ." , ". $partner_id.")");
    }
}

//相手とのメッセージを全件取得してくる処理
$list = [];
$link = mysqli_connect(HOST , USER_ID ,PASSWORD , DB_NAME);
mysqli_set_charset($link , 'utf8');
$result = mysqli_query($link , "SELECT username FROM profile WHERE id = ". $_COOKIE["id"] ."");
$row = mysqli_fetch_assoc($result);
$user_name = $row["username"];
$result = mysqli_query($link , "SELECT username FROM profile WHERE id = ". $partner_id ."");
$row = mysqli_fetch_assoc($result);
$partner_name = $row["username"];
$result = mysqli_query($link , "SELECT text AS メッセージ , img AS 画像 , profile_id AS 送信者, destination_profile_id 受信者 , img AS 画像
                                FROM direct_message
                                WHERE (profile_id = ". $_COOKIE["id"] ." OR destination_profile_id = ". $_COOKIE["id"] .")
                                AND (profile_id = ". $partner_id ." OR destination_profile_id = ".$partner_id.")
                                ORDER BY created_at ASC");
while($row = mysqli_fetch_assoc($result)){
    $list[] = $row;
}
mysqli_close($link) ;
//使用者が相手に送ったメッセージか相手から自分に送られたメッセージかによってクラス分けをする処理
for($i = 0 ; $i < count($list) ; $i++){
    //画像が存在していた場合
    if(isset($list[$i]["画像"])){
        $list[$i]["画像"] = '<p><img src="./img/'. $list[$i]["画像"] .'" alt="画像"';
    }
    //使用者から相手に送ったメッセージ
    if($list[$i]["送信者"] == $_COOKIE["id"]){
        $list[$i]["position"] = "me";
        $list[$i]["name"] = $user_name;
    //相手から使用者に送られてきたメッセージ
    }else{
        $list[$i]["position"] = "partner";
        $list[$i]["name"] = $partner_name;
    }
}
require_once "./tpl/personal_message.php";
?>
