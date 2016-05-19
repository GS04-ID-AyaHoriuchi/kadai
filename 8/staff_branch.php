<?PHP
//header('location~')で、任意の画面へ飛ばす
//参照
if(isset($_POST['disp'])==true){
  if(isset($_POST['staffcode'])==false){
     header('Location:staff_ng.php');
  }
   $staff_code=$_POST['staffcode'];
  header('Location:staff_disp.php?staffcode='.$staff_code);
}

//追加
if(isset($_POST['add'])==true){
  header('Location:staff_add.php');
  }

//修正
if(isset($_POST['edit'])==true){
  if(isset($_POST['staffcode'])==false){
     header('Location:staff_ng.php');
  }
  $staff_code=$_POST['staffcode'];
  header('Location:staff_edit.php?staffcode='.$staff_code);
}

//削除（object not found...）
if(isset($_POST['delete'])==true){
  if(isset($_POST['staffcode'])==false){
  header('Location:staff_ng.php');
}
  
   $staff_code=$_POST['staffcode'];
  header('Location:staff_dalete.php?staffcode='.$staff_code);
}

?>