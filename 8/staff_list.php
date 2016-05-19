<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>DBから情報を出す</title>
</head>

<body>

  <?php

try{
  
//データベースに接続
$dsn = 'mysql:dbname=shop;host=localhost';
$user = 'root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh ->query('SET NAMES utf8');


$sql = 'SELECT code,name FROM mst_staff WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();
  
$dbh = null;

echo 'スタッフ一覧<br><br>';
  
echo '<form method = "post" action = "staff_branch.php">';
  
while(true){
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  if($rec==false){
    break;
  }
  echo'<input type="radio" name = "staffcode" value="'.$rec['code'].'">';
  echo $rec['name'];
  echo'<br>';
}

echo '<input type = "submit" name="disp" value="参照">';
echo '<input type = "submit" name="add" value="追加">';
echo '<input type = "submit" name="edit" value="修正">';
echo '<input type = "submit" name="delete" value="削除">';
echo '</form>';

}catch(Exception $e){
  echo 'ただいま不具合が起こっています。';
  exit();
}
?>

</body>

</html>
