<?php
// 初期設定
$cnt=0;
$msg = '';
$personal = '';
$name = '';
$pass = '';
$salt = '';
$str = '';
$hashPass = '';
$email = '';
$birthday = '';
$school = '';
$department =''; 
$position = '';
$year = '';
$season ='';
$date = '';
require_once "../config.php";
// アップロードボタンが押されている場合
if(isset($_POST['uploard']) && $_POST['uploard'] === 'uploard'){
    if (is_uploaded_file($_FILES["csvfile"]["tmp_name"])) {
        $file_tmp_name = $_FILES["csvfile"]["tmp_name"];
        $file_name = $_FILES["csvfile"]["name"];
        //拡張子を判定
        if (pathinfo($file_name, PATHINFO_EXTENSION) != 'csv') {
          $msg = 'CSVファイルのみ対応しています。';
        }else {
            //ファイルをdataディレクトリに移動
            if (move_uploaded_file($file_tmp_name, "./uploaded/" . $file_name)) {
              //後で削除できるように権限を644に
              chmod("./uploaded/" . $file_name, 0644);
              $msg = $file_name . "をアップロードしました。";
              $file = './uploaded/'.$file_name;
              $fp   = fopen($file, "r");
              //配列に変換する
              while (($data = fgetcsv($fp)) !== FALSE) {
                $asins[] = $data;
                //   データの仕分け
                $personal = $asins[$cnt][0];
                $name = $asins[$cnt][1];
                $email = $asins[$cnt][2];
                $pass = $asins[$cnt][3];
                $birthday = $asins[$cnt][3];
                $school = $asins[$cnt][4];
                $department = $asins[$cnt][5];
                $position = $asins[$cnt][6];
                $year = $asins[$cnt][7];
                $season = $asins[$cnt][8];
                // ソルトとストレッチング回数をランダムに決定してパスワードをハッシュ化
                $salt = md5(random_bytes(rand(1,100)));
                $str = rand(10000,100000);
                for($i=0;$i<$str;$i++){
                    $pass = md5($salt . $pass);
                }
                $hashPass = $pass;
                // db接続
                $link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
                if(!$link){
                    $msg = '不明なエラーです';
                    exit;
                }
                mysqli_set_charset($link,'utf8');
                // sql文作成
                $personal =(int)mysqli_real_escape_string($link,$personal);
                $name =mysqli_real_escape_string($link,$name);
                $hashPass =mysqli_real_escape_string($link,$hashPass);
                $salt =mysqli_real_escape_string($link,$salt);
                $str = mysqli_real_escape_string($link,$str);
                $email = mysqli_real_escape_string($link,$email);
                $birthday = mysqli_real_escape_string($link,$birthday);
                $school = mysqli_real_escape_string($link,$school);
                $department = (int)mysqli_real_escape_string($link,$department);
                $position = (int)mysqli_real_escape_string($link,$position);
                $year = (int)mysqli_real_escape_string($link,$year);
                $season = (int)mysqli_real_escape_string($link,$season);
                $sql = "INSERT INTO profile (personal_id , username , password , salt , stretching , email , birthday , school , department_id , position , year , season) 
                VALUES(" . $personal . ", '" . $name . "' ,'" . $hashPass . "','" . $salt . "'," . $str . ",'" . $email . "' , " . $birthday . " , '".$school."' , ".$department." , ".$position." , ".$year." , ".$season.")";
                if(mysqli_query($link,$sql)){
                  $msg = '登録完了しました';
                }
                else{
                    $msg = '登録に失敗しました始めからやり直してください';
                    mysqli_close($link);
                    exit;
                }
                mysqli_close($link);
                $cnt = $cnt+1;
              }
              fclose($fp);
              
            }else {
              $msg = "ファイルをアップロードできません。";
            }
        }
    } else {
        $msg = "ファイルが選択されていません。";
    }
}else{//アップロードボタンが押されていない場合

}
  require_once "./tpl/register.php";
?>
