<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'projet_web3';
$con = mysqli_connect($server, $user, $pass,$dbname) or die("Can't connect");
//check conx 
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  ?>