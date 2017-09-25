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




$name = $_POST['user_name'];
$password = $_POST['user_pass'];



$queryforuserid= "select User_ID from user where User_Mail = '$name' and User_Pass ='$password';";
	$result= mysqli_query($con,$queryforuserid);
  $row = mysqli_fetch_row($result);
if($row[0]){
	
	//echo 'query sa7';
	session_start();
	$_SESSION['ID']=$row[0];
	///echo $_SESSION['ID'];
	$_SESSION['chat1']=-1;
	$_SESSION['chat2']=-1;	
	header("Location: ../html/page2.php");
}else {
	

	
echo 'query galat';
		header("Location: ../html/page1.php");
	
}


?> 	