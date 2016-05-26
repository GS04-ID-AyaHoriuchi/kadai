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
  <title>情報の修正</title>
</head>

<body>

  <?php

try{

//スタッフコードの受け取り
$pro_code=$_GET['procode'];
  
//データベースに接続
$dsn = 'mysql:dbname=shop;host=localhost';
$user = 'root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh ->query('SET NAMES utf8');

//$SQLに追加
$sql = 'SELECT name,price,gazou FROM mst_product WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $pro_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$pro_name=$rec['name'];
$pro_price=$rec['price'];
$pro_gazou_name=$rec['gazou'];


$dbh = null;

if($pro_gazou_name==''){
  $disp_gazou='';
}else{
  $disp_gazou='<img src = "./gazou/'.$pro_gazou_name_old.'">';
}
  
}
catch(Exception $e) //サーバーに不具合があるとき発生
{
  echo 'ただいま不具合が起こっています。';
  exit();
}
?>

商品修正<br>
<br>
商品コード<br>
<?php echo $pro_code;?>
<br>
<br>
<form method ="post" action="pro_edit_check.php" enctype="multipart/form-data">
<input type="hidden" name="code" value="<?=$pro_code?>">
<input type="hidden" name="gazou_name_old" value="<?=$pro_gazou_name_old?>"> 
<!--エラーが出る-->


商品名<br>

<input type="text" name="name" style="width;150px" value="<?=$pro_name?>"><br/>
価格<br/>
<input type="text" name="price" style="width;150px" value="<?=$pro_price?>">円<br/>
<?=$disp_gazou?><br>
画像を選んでください<br>
<input type = "file" name="gazou" style="width:400px"><br><br>



<br/>
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>

</html>
