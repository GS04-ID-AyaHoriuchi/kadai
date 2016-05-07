<!DOCTYPE html>
<html>
  <head>
  <link href="send.css" rel="stylesheet" type="text/css">
  <title>FAQ</title>
  </head>
  <body>
  
<form id="contactform" name="contact" method="post" action="check.php">

<p class="note"><span class="req">※</span>は必須項目です。</p>

<div class="row">
<label for="name">お名前<span class="req">※</span></label>
<input type="text" name="name" id="name" class="txt" tabindex="1" placeholder="名前を入力" required>
</div>

<div class="row">
<label for="email">メールアドレス<span class="req">※</span></label>
<input type="email" name="email" id="email" class="txt" tabindex="2" placeholder="××××××@google.com" required>
</div>

<div class="row">
<label for="subject">件名<span class="req">※</span></label>
<input type="text" name="subject" id="subject" class="txt" tabindex="3" required>
</div>

<div class="row">
<label for="message">内容<span class="req">※</span></label>
<textarea name="message" id="message" class="txtarea" tabindex="4" required></textarea>
</div>

<div class="center">
<input type="submit" id="submitbtn" name="submitbtn" tabindex="5" value="質問する">
</div>
 
</form>
  </body>
</html>