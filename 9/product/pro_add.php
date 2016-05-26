
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
  <title>商品</title>
</head>
<body>
商品追加<br/>
<br/>
<form method = "post" action="pro_add_check.php" enctype="multipart/form-data">
商品名の入力<br/>
<input type="text" name="name" style="width:150px"><br/>
価格の入力<br/>
<input type="text" name="price" style="width:150px"><br/>
<br/>
画像の選択<br/>
<input type="file" name="gazou" style="width:400px"><br/>
<br/>
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>
</body>

</html>