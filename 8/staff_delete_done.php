<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>データベースにデータ登録</title>
</head>

<body>

  <?php

try{
  

$staff_code=$_POST['code'];


//データベースに接続
$dsn = 'mysql:dbname=shop;host=localhost';
$user = 'root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh ->query('SET NAMES utf8');

//$SQLに追加
$sql = 'DELETE FROM mst_staff WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $staff_code;
$stmt->execute($data);

$dbh = null;

}
catch(Exception $e) //サーバーに不具合があるとき発生
{
  echo 'ただいま不具合が起こっています。';
  exit();
}
?>
削除しました<br><br>
    <a href="staff_list.php">戻る</a>
</body>

</html>
