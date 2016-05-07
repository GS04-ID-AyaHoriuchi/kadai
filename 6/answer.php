<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$name = htmlspecialchars($name);
$email = htmlspecialchars($email);
$message = htmlspecialchars($message);


echo $name;
echo'さん<br/>';
echo '頂いた質問『';
echo $message;
echo '』につきましては、<br/>';
echo $email;
echo 'あてに';
echo '２営業日以内にご回答いたします。<br/>';

$mail_sub='ご質問内容を承りました。';
$mail_body=$name."さんへ\nご質問いただきありがとうございます。";
$mail_body=html_entity_decode($mail_body,ENT_QUOTES,"UTF-8");
$mail_head='From:aaa@a.co.jp';
mb_language('Japanese');
mb_internal_encoding("UTF-8");
mb_send_mail($email,$mail_sub,$mail_body,$mail_head);
?>