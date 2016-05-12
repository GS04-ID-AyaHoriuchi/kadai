
 <?php
  
$dsn = 'mysql:dbname=kadai7;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');

  $sql = 'SELECT*FROM kadai_7 WHERE1';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();

while(1){
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  if($rec==false){
    break;
  }
  echo $rec['name'];
  echo $rec['birth'];
  echo $rec['tell'];
  echo $rec['mail'];
  //echo $rec['upfile'];
}
  
  $dbh = null;
?>
