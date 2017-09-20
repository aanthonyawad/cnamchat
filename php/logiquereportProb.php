<?php 
session_start();
$title = $_POST['field1'];
$message = $_POST['field2'];




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
  $ID = $_SESSION['ID'];
  
  $query ="INSERT INTO `problems_bugs`(`User_ID`, `Problem`, `Problem_Type`, `solved`) VALUES ($ID,'$title','$message',0)";
  $result= mysqli_query($con,$query);
	header("Location: ../html/reportProb.php");
  



?>