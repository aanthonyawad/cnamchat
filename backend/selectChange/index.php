
 <?php 
 session_start();


 if(isset($_SESSION['loginState'])){
 	if($_SESSION['loginState'] == 0){
 	//logged in do nothing
 	}else {
 		header('Location: ../');
 	}
 }else {
 		header('Location: ../');
 		 }

?>




<?php 
$createUserMessage="";
if(isset($_SESSION['userCreated'])){

	if($_SESSION['userCreated'] == 1){
		//means user created succesfully  
		$createUserMessage="User succesfully created";
	}else if($_SESSION['userCreated'] == 0){

		//means something went wrong creating user
		$createUserMessage="User was not created... problem";
	}else {

$createUserMessage = "Create user";
	}


$_SESSION['userCreated']=-1;
}else{
$createUserMessage = "Create user";
$_SESSION['userCreated']=-1;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Backend</title>
		<link rel="stylesheet" type="text/css" href="selectChangeCss.css">
	</head>
		<div> <h1> Welcome </h1> </div>

		<div class="mainDiv">
			<table>  
				<tr>
					<td>
						<div>
							<h3> <?php echo $createUserMessage     ?>  </h3>				<!--to be set  -->
							<form  method="post" action="createUser.php"> 
								<input type="text" required  name="userFirstName" placeholder="First name"></br></br>

								<input type="text" required  name="userLastName" placeholder="Last name"></br></br>

								<input type="email" required  name="userMail" placeholder="Email"></br></br>

								<input type="text" required  name="userPassword" placeholder="Password"></br>

								<h5> type:</h5>	
								<input type="radio" required  name="userType" value="0" checked="checked"> Student</br></br>

								<input type="radio" required  name="userType" value="1"> Teacher</br></br>

								<input type="submit" name="submitAddUser">
							</form>


						</div>
					</td>

					<td>
						<div>


						</div>
					</td>

					<td>
						<div>


						</div>
					</td>
				</tr>

			</table>
		</div>
	

<script type="script/javascript">
	




</script>

	</body>

</html>
