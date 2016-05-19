<?php

//前の画面からデータを取得して、変数に変換
$staff_code=$_POST['code'];
$staff_name=$_POST['name'];
$staff_pass=$_POST['pass'];
$staff_pass2=$_POST['pass2'];

$staff_name=htmlspecialchars($staff_name);
$staff_pass=htmlspecialchars($staff_pass);
$staff_pass2=htmlspecialchars($staff_pass2);

if($staff_name==''){
  echo 'スタッフ名が入力されていません'.'<br/>';
}else{
  echo'スタッフ名:';
  echo $staff_name.'<br/>';
  
}

if($staff_pass!=$staff_pass2){
  echo 'パスワードが一致しません'.'<br/>';
}

if($staff_name==''||$staff_pass==''||$staff_pass!=$staff_pass2){
  echo'<form>'.'<input type = "button" onclick="history.back()" value="戻る">'.'</form>';
}else{
  $staff_pass=md5($staff_pass);
  echo '<form method="post" action="staff_edit_done.php">';
  echo '<input type="hidden" name="code" value="'.$staff_code.'">';
  echo '<input type="hidden" name="name" value="'.$staff_name.'">';
  echo '<input type="hidden" name="pass" value="'.$staff_pass.'">';
  echo '<br/>';
  echo '<input type="button" onclick="history.back()" value="戻る">';
  echo '<input type="submit" value="OK">';
  echo '<form/>';
}

?>