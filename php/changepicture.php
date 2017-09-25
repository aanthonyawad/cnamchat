<?php 
session_start();
require	'databaseconnect.php';



/*
$id = $_SESSION['ID'];
$newpic = $_POST['newpic'];
$query1="SELECT User_Name FROM user WHERE user_ID=$id";

  $result= mysqli_query($con,$query1);
 $row = mysqli_fetch_row($result);

$newpicname= $row[0].'_'.$id.'.jpg';
echo $newpic . '</br>' . $newpicname ; 

//change the picture name 
//copy($newpic, "../users/images/$newpicname");


//put  new picture extension in database 
//$query2 ="UPDATE user SET User_Pic='$newpicname' WHERE user_ID='$id'";
//$result= mysqli_query($con,$query2);

//header('Location :../html/editprofile.php'); */
$id = $_SESSION['ID'];	

 if(isset($_FILES['newpic'])){
	 echo 'fet';
      $errors= array();
      $file_name = $_FILES['newpic']['name'];
      $file_size =$_FILES['newpic']['size'];
      $file_tmp =$_FILES['newpic']['tmp_name'];
      $file_type=$_FILES['newpic']['type'];
     echo   $file_name. '<br>';
	 echo  $file_size.'<br>';
      echo  $file_tmp.'<br>';
	  echo $file_type;
 $image='image';     
      
     
		
	  
      
     if(strpos($file_type,$image)!==false ){
         move_uploaded_file($file_tmp,"../users/images/".$file_name);
			$query2 ="UPDATE user SET User_Pic='$file_name' WHERE user_ID='$id'";
			$result= mysqli_query($con,$query2);
			
			echo '1';
		
		 
      
 }
   header("Location: ../html/editprofile.php");
	//header("Location : ../html/editprofile.php");

 }

?>
