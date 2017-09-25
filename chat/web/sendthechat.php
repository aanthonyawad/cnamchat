<?php	session_start();
include '../../php/databaseconnect.php';
 $ID = $_SESSION['ID'];
 //for web
 $classID =2;
 $query ="select User_Name , User_Last,User_Pic from user where User_ID='$ID';";
  $result= mysqli_query($con,$query);
  $row = mysqli_fetch_row($result);
$name = $row[0]. " ".$row[1];
$date='now()';
$text = $_POST['text'];
$pic =$row[2];				
if(isset($_POST['send'])){
	$query1 ="INSERT INTO chats(User_ID, Class_ID, chat, date, User_Name,User_Pic) VALUES ($ID,$classID,'$text',$date,'$name','$pic') ";
	if( mysqli_query($con,$query1)){
	echo'true';} else echo 'false';
	}
	header("Location: chat_send.php");
	?>