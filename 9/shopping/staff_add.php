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
  <title>スタッフ</title>
</head>
<body>
スタッフ追加<br/>
<br/>
<form method = "post" action="staff_add_check.php">
スタッフ名の入力<br/>
<input type="text" name="name" style="width;150px"><br/>
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