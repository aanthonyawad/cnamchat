<?php
session_start();
include('../php/databaseconnect.php');

$userName = $_POST['adminName'];
$userPass = $_POST['adminPass'];

																									// type 2 means he is admin
$query= "SELECT * FROM user WHERE User_Mail = '$userName' and User_Pass = '$userPass' and User_Type = 2 ";

$result= mysqli_query($con,$query);
  $row = mysqli_fetch_row($result);
if($row[0]){
	
	//echo 'query sa7';
	
	$_SESSION['adminId']=$row[0];
	$_SESSION['loginState']=0;
}else {
	$_SESSION['loginState']=1;
}
echo $_SESSION['adminId'];
echo '<br/>';
echo $_SESSION['loginState'];

	
	 header("Location: index.php");

?>