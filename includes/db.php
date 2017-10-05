
<?php
$SERVERNAME = 'localhost';
$DB = 'coursesystem';
$USER = 'root';
$PASSWORD = '';

$conn = mysqli_connect($SERVERNAME, $USER, $PASSWORD, $DB);
if(!$conn){
  die('ERROR connecting to db');
}else{
  // echo "connected to db";
}
 ?>
