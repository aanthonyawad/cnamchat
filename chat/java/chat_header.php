
<?php 
session_start();
include '../../php/databaseconnect.php';
 $ID = $_SESSION['ID'];
	// for java class 
$currentclass= 1;


$query1 ="select class_Name from class where class_ID=$currentclass";
  $result= mysqli_query($con,$query1);
  $row = mysqli_fetch_row($result);
$classname = $row[0];
	
	//query to get chats
	$query2 ="select User_Name,chat,date  from chats where Class_ID=$currentclass";
  $result= mysqli_query($con,$query2);
  $classesarray =Array();
$i=0;
  while($row = mysqli_fetch_row($result)){
	  $usernamearray[] =$row[0];
	  $chatarray[]=$row[1];
	  $datearray[]=$row[2];
		$i++;
	  }
	





?>

<!DOCTYPE html> 
<html>
<head>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/custom.css" rel="stylesheet">
</head>	
<body>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> <?php echo $classname;?>	
                    
                </div>
				</div>
				</div>
				</div>
				</div>
				</body>
				</html>
				