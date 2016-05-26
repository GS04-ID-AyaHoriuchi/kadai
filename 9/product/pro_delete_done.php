<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false){
echo 'ログインされていません<br>';
echo '<a href = "../staff_login/staff_login.html">ログイン画面へ</a>';
exit();

}else{
  echo $_SESSION['staff_name'];
  echo 'さんログイン中'.'<br><br>';
  
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>データベースのデータ削除</title>
</head>

<body>

  <?php

try{
  

$pro_code=$_POST['code'];
$pro_gazou_name=$_POST['gazou_name'];


//データベースに接続
$dsn = 'mysql:dbname=shop;host=localhost';
$user = 'root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh ->query('SET NAMES utf8');

//$SQLに追加
$sql = 'DELETE FROM mst_product WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $pro_code;
$stmt->execute($data);

$dbh = null;
  

  if($pro_gazou_name!=''){
    unlink('./gazou/'.$pro_gazou_name);
  }

}
catch(Exception $e) //サーバーに不具合があるとき発生
{
  echo 'ただいま不具合が起こっています。';
  exit();
}
?>
削除しました<br><br>
    <a href="pro_list.php">戻る</a>
</body>

</html>
