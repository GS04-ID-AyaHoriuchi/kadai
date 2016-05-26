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
  <title>データベースにデータ登録</title>
</head>

<body>

<?php

try{
  
$pro_code=$_POST['code'];
$pro_name=$_POST['name'];
$pro_price=$_POST['price'];
$pro_gazou_name_old=$_POST['gazou_name_old'];
$pro_gazou_name=$_POST['gazou_name'];

//ここでサニタイジング必要？
$pro_code=htmlspecialchars($pro_code);
$pro_name=htmlspecialchars($pro_name);
$pro_price=htmlspecialchars($pro_price);

//データベースに接続
$dsn = 'mysql:dbname=shop;host=localhost';
$user = 'root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh ->query('SET NAMES utf8');

//$SQLに追加
$sql = 'UPDATE mst_product SET name=?,price=?,gazou=? WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $pro_name; // = の前後に半角がないとエラーが出た
$data[] = $pro_price;
$data[] = $pro_gazou_name;
$data[] = $pro_code;

$stmt->execute($data);

$dbh = null;
  
if($pro_gazou_name_old!=$pro_gazou_name){
  if($pro_gazou_name_old!=''){
    unlink('./gazou/'.$pro_gazou_name_old);
  }
}

echo '修正しました。<br/>';
}
  
catch(Exception $e){
  echo 'ただいま不具合が起こっています。';
  exit();
}
?>

    <a href = "pro_list.php">戻る</a>
</body>

</html>
