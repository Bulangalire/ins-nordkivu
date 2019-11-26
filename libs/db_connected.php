<?php
$host = "localhost";
$db_name = "ins";
$username = "root";
$password = "";

/*
$host = "localhost";
$db_name = "bulangalire_ins";
$username = "bulangalire_ins";
$password = '.;Davtec\]2019@InsMyDb@';*/
 
  $con = mysqli_connect($host, $username, $password, $db_name );
  // Style procédural
  mysqli_set_charset($con, "utf8")

 
?>