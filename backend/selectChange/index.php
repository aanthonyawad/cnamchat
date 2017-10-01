
 <?php 
 session_start();

include('../../php/databaseconnect.php');


/*
-----------------------------------------------------------
-----------------------------------------------------------
					 CHECK IF LOGGED IN
-----------------------------------------------------------
-----------------------------------------------------------
*/
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
/*
-----------------------------------------------------------
-----------------------------------------------------------
					 ADD USER SECTION
-----------------------------------------------------------
-----------------------------------------------------------
*/
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


<?php 
/*
-----------------------------------------------------------
-----------------------------------------------------------
					 ADD CLASS SECTION
-----------------------------------------------------------
-----------------------------------------------------------
*/
$createClassMessage="";
if(isset($_SESSION['classCreated'])){

	if($_SESSION['classCreated'] == 1){
		//means user created succesfully  
		$createClassMessage="Class succesfully created";
	}else if($_SESSION['classCreated'] == 0){

		//means something went wrong creating user
		$createClassMessage="Class was not created... problem";
	}else {

$createClassMessage = "Create class";
	}


$_SESSION['classCreated']=-1;
}else{
$createClassMessage = "Create class";
$_SESSION['classCreated']=-1;
}


/*
-----------------------------------------------------------
-----------------------------------------------------------
					 GET THE TEACHERS
-----------------------------------------------------------
-----------------------------------------------------------
*/
													// 1 means teahcer
$teachersQuery = "SELECT * FROM user WHERE User_Type = 1";
$teachersInput="";

$result = mysqli_query($con,$teachersQuery);

while ($row = mysqli_fetch_array($result)){
	$teacherSingleInput = '<input type="radio" name="teacherId" checked="checked" value="'. $row['User_ID'].'" />'.$row['User_Name']  .
	" ".$row['User_Last']."</br>";
	$teachersInput.=$teacherSingleInput;
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
							<!-- 

					-----------------------------------------------------------
					-----------------------------------------------------------
					 					ADD USER SECTION
					-----------------------------------------------------------
					-----------------------------------------------------------
							-->
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
						<!-- 

					-----------------------------------------------------------
					-----------------------------------------------------------
					 					ADD CLASS SECTION
					-----------------------------------------------------------
					-----------------------------------------------------------
							-->

							<h3> <?php echo $createClassMessage     ?>  </h3>				<!--to be set  -->
							<form  method="post" action="createClass.php"> 
								<input type="text" required  name="className" placeholder="Class name"></br></br>

								<input type="text" required  name="classType" placeholder="Class type"></br></br>


								<div class="teachersDiv">
								<h5> teacher:</h5>	
								<?php echo $teachersInput ?>
								</div>

								<input type="submit" name="submitAddClass">
							</form>
						</div>
					</td>

					<td>

						<!-- 

					-----------------------------------------------------------
					-----------------------------------------------------------
					 					ADD DOMAINE SECTION
					-----------------------------------------------------------
					-----------------------------------------------------------
							-->
						<div>
							<h3> <?php echo $createUserMessage     ?>  </h3>				<!--to be set  -->
							<form  method="post" action="createUser.php"> 
								<input type="text" required  name="userFirstName" placeholder="First name"></br></br>

								<input type="text" required  name="userLastName" placeholder="Last name"></br></br>


								<input type="submit" name="submitAddUser">
							</form>
						</div>
					</td>
				</tr>

			</table>
		</div>
	

<script type="script/javascript">
	




</script>

	</body>

</html>
