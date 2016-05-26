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
スタッフが追加されていません。<br>
  <a href="staff_list.php">戻る</a>
</body>

</html>>