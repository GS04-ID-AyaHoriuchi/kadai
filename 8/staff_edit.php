<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>情報の修正</title>
</head>

<body>

  <?php

try{

//スタッフコードの受け取り
$staff_code=$_GET['staffcode'];
  
//データベースに接続
$dsn = 'mysql:dbname=shop;host=localhost';
$user = 'root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh ->query('SET NAMES utf8');

//$SQLに追加
$sql = 'SELECT name FROM mst_staff WHERE code=?'; //1件のスタッフコードをDBから選択
$stmt = $dbh->prepare($sql);
$data[] = $staff_code;
$stmt->execute($data); //スタッフコードが入ったら実行

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$staff_name=$rec['name'];

$dbh = null;

}
catch(Exception $e) //サーバーに不具合があるとき発生
{
  echo 'ただいま不具合が起こっています。';
  exit();
}
?>

スタッフ修正<br>
<br>
スタッフコード<br>
<?php echo $staff_code;?>
<br>
<br>
<form method ="post" action="staff_edit_check.php">
<input type="hidden" name="code" value="<?=$staff_code?>">
スタッフ名<br>

<input type="text" name="name" style="width;150px" value="<?=$staff_name?>"><br/>
パスワードの入力<br/>
<input type="password" name="pass" style="width;150px"><br/>
パスワードをもう一度入力<br/>
<input type="password" name="pass2" style="width;150px"><br/>
<br/>
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>

</html>
