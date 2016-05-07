
  <?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$name = htmlspecialchars($name);
$email = htmlspecialchars($email);
$subject = htmlspecialchars($subject);
$message = htmlspecialchars($message);

echo '名前:';
echo $name;
echo '<br/>';


echo 'メールアドレス:';
echo $email;
echo '<br/>';


echo '件名:';
echo $subject;
echo '<br/>';


echo '内容:';
echo $message;
echo '<br/>';

echo '<form method="post" action="answer.php">';
echo'<input name="name" type="hidden" value="'.$name.'">';
echo'<input name="email" type="hidden" value="'.$email.'">';
echo'<input name="message" type="hidden" value="'.$message.'">';
echo '<input type="button" onclick="history.back()" value="編集">';
echo '<input type="submit" value="OK">';
echo '</form>';

$str = $name.",".$email.",".$subject.",".$message."\n";
  
$file=fopen("./data/data.txt","a");
flock($file,LOCK_EX);
fputs($file, $str);
flock($file,LOCK_UN);
fclose($file);
?>


