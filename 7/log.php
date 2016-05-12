<?php
  
$name = $_POST['name'];
$birth = $_POST['birth'];
$tell = $_POST['tell'];
$mail = $_POST['mail'];
//$file = $_POST['file'];

$name = htmlspecialchars($name);
$birth = htmlspecialchars($birth);
$tell = htmlspecialchars($tell);
$mail = htmlspecialchars($mail);
//$file = htmlspecialchars($file);
  
$dsn = 'mysql:dbname=kadai7;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');


  //３．データ登録SQL作成
  $sql ='INSERT INTO kadai7_1(name,birth,tell,mail,upfile)VALUES("'.$name.'","'.$birth.'","'.$tell.'","'.$mail.'")';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  
  $dbh = null;
?>
