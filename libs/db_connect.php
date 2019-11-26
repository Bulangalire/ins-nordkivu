<?php
$host = "localhost/ins-nordkivu";
$db_name = "ins";
$username = "root";
$password = '';

//$host = "localhost/ins-nordkivu";
//$db_name = "bulangalire_ins";
//$username = "bulangalire_ins";
//$password = '.;Davtec\]2019@InsMyDb@';

try {
   $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
   $con->exec("set names utf8");
}
catch(PDOException $exception){
   echo "Connection error: " . $exception->getMessage();
}
?>
