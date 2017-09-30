<?php
session_start();
$message = "Welcome";if(isset($_SESSION['loginState'])){
$loginState = $_SESSION['loginState'];
$message = "Welcome";
/*
 $_SESSION['loginState']
0 logged in 
1 means username not found 
*/
switch ($loginState) {
	case 0:
		// we need to log him in 
		//TODO add page for when logged in
		header('Location: selectChange');
		break;


	case 1:
		$message = "Wrong username password combination. Try again";
		break;

	;
	
	default:
	// maybe something went wrong :p
		$message = "Welcome";
		break;
	}
}
?>


<!DOCTYPE html>
<html>
<head>

<title>Backend </title>
<link rel="stylesheet" type="text/css" href="backendCss.css">

</head>

<body>

<div class="mainDiv" >
	<h5> <?php echo $message; ?> </h5>

	<form method="post" action="login.php">
			
		<input placeholder="email" type="text" name="adminName"/>	
			
		<input placeholder="password" type="password" name="adminPass"/>
		<br/>
		<b><input type="submit" name="submit"> </b>
	</form>	
</div>

</body>




</html>