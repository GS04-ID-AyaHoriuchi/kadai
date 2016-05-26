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

<?php

//前の画面からデータを取得して、変数に変換
$pro_name=$_POST['name'];
$pro_price=$_POST['price'];
$pro_gazou=$_FILES['gazou'];

$pro_name=htmlspecialchars($pro_name);
$pro_price=htmlspecialchars($pro_price);


if($pro_name==''){
  echo '商品名が入力されていません'.'<br/>';
}else{
  echo'商品名:';
  echo $pro_name.'<br/>';
}


//$pro_priceに0-9が入力されているかの判定
if(preg_match('/^[0-9]+$/',$pro_price)==0){
  echo '価格をきちんと入力してください'.'<br/>';
}else{
  echo'価格:';
  echo $pro_price.'<br/>';
  echo '円<br/>';
}


//画像の追加
if($pro_gazou['size'] > 0){
  if($pro_gazou['size'] > 1000000)
  {
  echo '画像が大きすぎます'.'<br/>';
}else{
  move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);
    echo'<img src="./gazou/'.$pro_gazou['name'].'">';
    echo'<br>';
  
}
}

if($pro_name==''||preg_match('/^[0-9]+$/',$pro_price)==false||$pro_gazou['size'] > 1000000){
   echo '<form>';
   echo '<input type="button" onclick="history.back()" value="戻る">';
   echo '</form>';
}else{
  echo '上記商品を追加します'.'<br/>';
  echo '<form method="post" action="pro_add_done.php">';
  echo '<input type="hidden" name="name" value="'.$pro_name.'">';
  echo '<input type="hidden" name="price" value="'.$pro_price.'">';
  echo '<input type="hidden" name="gazou_name" value="'.$pro_gazou['name'].'">';
  echo '<br/>';
  echo '<input type="button" onclick="history.back()" value="戻る">';
  echo '<input type="submit" value="OK">';
  echo '<form/>';
}

?>