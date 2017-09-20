
<?php 
//for java
$currentclass= 1;
session_start();
include '../../php/databaseconnect.php';
 $ID = $_SESSION['ID'];
	//for java



$query1 ="select class_Name from class where class_ID=$currentclass";
  $result= mysqli_query($con,$query1);
  $row = mysqli_fetch_row($result);
$classname = $row[0];
	
	//query to get chats
	$query2 ="select User_Name,chat,date,User_ID,User_Pic  from chats where Class_ID=$currentclass ORDER BY chat_ID DESC";
  $result= mysqli_query($con,$query2);
  $classesarray =Array();
$i=0;
  while($row = mysqli_fetch_row($result)){
	  $usernamearray[] =$row[0];
	  $chatarray[]=$row[1];
	  $datearray[]=$row[2];
	  $userarray[]=$row[3];
	  $picarray[]=$row[4];
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
                
                <div class="panel-body">
                    <ul style="list-style:none;" class="chat">
					<?php
					for($j=0;$j<$i;$j++){
						if($userarray[$j]!==$ID){
                       echo "  <li class=\"left clearfix\"><span class=\"chat-img pull-left\"> 					   ";
                       echo "     <img style=\" width:50px; height:50px; \" src=\"../../users/images/$picarray[$j]\" alt=\"User Avatar\" class=\"img-circle\">  ";
                       echo" </span> ";
                       echo '    <div class="chat-body clearfix"> ';
                       echo '    <div class="header">    ';
                       echo "      <strong class=\"primary-font\">$usernamearray[$j]</strong> <small class=\"pull-right text-muted\">";
                       echo"          <span class=\"glyphicon glyphicon-time\"></span>$datearray[$j]</small>   ";
                       echo' </div> ';
                       echo'  <p > ';
                       echo             $chatarray[$j];
                       echo '         </p></div></li> ';
					}
					else{
					   echo"	<li class=\"right clearfix\"><span class=\"chat-img pull-right\">  	";
                       echo"      <img style=\" width:50px; height:50px; \" src=\"../../users/images/$picarray[$j]\" alt=\"User Avatar\" class=\"img-circle\">";
                       echo"   </span>";
                       echo"       <div class=\"chat-body clearfix\">";
                       echo"          <div class=\"header\">";
                       echo"              <small class=\" text-muted\"><span class=\"glyphicon glyphicon-time\"></span>$datearray[$j]</small>";
                       echo"              <strong class=\"pull-right primary-font\">$usernamearray[$j]</strong>";
                       echo"          </div>";
                       echo"         <p style=\" word-break: break-all;      \">";
                       echo             $chatarray[$j];
                       echo"     </p></div></li>";
						
						
						
					}
					
					
					}
					  ?> 
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>
</body>
</html>