<?php
session_start();

include('../../php/databaseconnect.php');


// 0 not created 1 created -1 never entered
$_SESSION['classCreated']= 0;

$className = $_POST['className'];

$classType = $_POST['classType'];


$query = "INSERT INTO class(class_Name, class_Type, date_Created, class_Teacher_ID) VALUES 
			() ";


if( mysqli_query($con,$query) ){
	//means query successful 
	$_SESSION['classCreated']= 1;
}

	 header("Location: index.php");


?>