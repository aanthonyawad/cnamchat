<?php 
session_start();
require	'databaseconnect.php';
$id = $_SESSION['ID'];
$old = $_POST['oldpass'];
$new = $_POST['newpass'];
$cnew = $_POST['confirmnewpass'];
$query1="SELECT User_Pass FROM user WHERE user_ID=$id";

  $result= mysqli_query($con,$query1);
 $row = mysqli_fetch_row($result);

 if($row[0]==$old){
				if($new==$cnew){
		
				$query2 ="UPDATE user SET User_Pass='$new' WHERE user_ID='$id'";
				$result= mysqli_query($con,$query2);
				echo 'pass changed';
				}
					else {
					echo 'passes dont match';
	}
				}
				else { 
				echo 'old dont match';
}
 
echo '</br>';
 echo $row[0]."</br>".$id."</br>".$old."</br>".$new."</br>".$cnew;
?>
