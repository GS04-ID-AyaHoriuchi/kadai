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
  <title>情報の削除</title>
</head>

<body>

<?php

try{

//スタッフコードの受け取り
$pro_code=$_GET['procode'];
  
//データベースに接続
$dsn='mysql:dbname=shop;host=localhost';
$user='root';
$password='';
$dbh=new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');

//$SQLに追加
$sql='SELECT name,gazou FROM mst_product WHERE code=?'; //1件のスタッフコードをDBから選択
$stmt=$dbh->prepare($sql);
$data[]=$pro_code;
$stmt->execute($data); //スタッフコードが入ったら実行

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$pro_name=$rec['name'];
$pro_gazou=$rec['gazou'];

$dbh=null;
  
  if($pro_gazou_name==''){
    $disp_gazou='';
  }else{
  $disp_gazou='<img src = "./gazou/'.$pro_gazou_name.'">';
  }
  

}
catch(Exception $e) //サーバーに不具合があるとき発生
{
  echo 'ただいま不具合が起こっています。';
  exit();
}
?>

商品削除<br>
<br>
商品コード<br>
<?php echo $pro_code;?>
<br>
商品名<br>
<?php echo $pro_name;?>
<br>
<?php echo $disp_gazou;?>
<br>
この商品を削除しますか<br>
<br>
<form method ="post" action="pro_delete_done.php">
<input type="hidden" name="code" value="<?=$pro_code?>">
<input type="hidden" name="gazou_name" value="<?=$pro_gazou_name?>">

<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>

</html>
