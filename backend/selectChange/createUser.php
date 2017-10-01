<?php
session_start();

include('../../php/databaseconnect.php');


// 0 not created 1 created -1 never entered
$_SESSION['userCreated']= 0;

$firstName = $_POST['userFirstName'];

$lastName = $_POST['userLastName'];

$mail = $_POST['userMail'];

$password = $_POST['userPassword'];

$type = $_POST['userType'];


$query = "INSERT INTO user (Active, User_Name, User_Last, User_Mail, User_Pass,  User_Type) VALUES 
			(1,'$firstName' , '$lastName' , '$mail' , '$password' , $type ) ";


if( mysqli_query($con,$query) ){
	//means query successful 
	$_SESSION['userCreated']= 1;
}

	 header("Location: index.php");

?>