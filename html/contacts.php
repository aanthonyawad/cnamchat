<?php 
session_start();

$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'projet_web3';
$con = mysqli_connect($server, $user, $pass,$dbname) or die("Can't connect");
//check conx 
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $ID = $_SESSION['ID'];
//query to get friends 
  $query1 ="SELECT  Friend_ID  FROM are_friends WHERE user_ID =$ID";
  $result= mysqli_query($con,$query1);
  $row = mysqli_fetch_row($result);
   $addedfriends=$row[0];
   while ($row = mysqli_fetch_row($result)){
	  
	   $addedfriends .=',' .$row[0];
	   
   }
   $query2 ="SELECT user_Name ,user_Last ,user_Pic FROM user WHERE user_ID  in ($addedfriends)";
$result= mysqli_query($con,$query2);
  $addedfriendsnames=Array();
  $addedfriendspics=Array();$i=0;
  while ($row = mysqli_fetch_row($result)){
	  $i++;
	   $addedfriendsnames[]=$row[0]." ".$row[1];
	   $addedfriendspics[]=$row[2];
	   
   }
   // end query to get friends
   //----------------------
   //query to get teachers 
   $query3 ="SELECT Class_ID from is_in_class WHERE Stud_ID=$ID";
   $result = mysqli_query($con,$query3);
   $row = mysqli_fetch_row($result);
   $classes=$row[0];
    while ($row = mysqli_fetch_row($result)){
	  
	   $classes .=',' .$row[0];
	   }
	   
	   
   $query4= "Select class_Teacher_ID from class WHERE class_ID in ($classes)";
   $result = mysqli_query($con,$query4);
   $row = mysqli_fetch_row($result);
   $teachers=$row[0];
    while ($row = mysqli_fetch_row($result)){
	  
	   $teachers .=',' .$row[0];
	}
   
   $query5 ="SELECT user_Name ,user_Last ,user_Pic FROM user WHERE user_ID  in ($teachers)";
$result= mysqli_query($con,$query5);
  $teachersnames=Array();
  $teacherspics=Array();$z=0;
  while ($row = mysqli_fetch_row($result)){
	  $z++;
	   $teachersnames[]=$row[0]." ".$row[1];
	   $teacherspics[]=$row[2];
   
  }
   
   //end query to get teachers
   //query to get classmates 
   
   $query6="SELECT Stud_ID from is_in_class WHERE Stud_ID <> $ID and Class_ID in ($classes)";
   $result = mysqli_query($con,$query6);
   $row = mysqli_fetch_row($result);
   $classmates=$row[0];
    while ($row = mysqli_fetch_row($result)){
	  
	   $classmates .=',' .$row[0];
	   }
   
   $query7  ="SELECT user_Name ,user_Last ,user_Pic FROM user WHERE user_ID  in ($classmates)";
$result= mysqli_query($con,$query7);
  $classmatesnames=Array();
  $classmatespics=Array();$x=0;
  while ($row = mysqli_fetch_row($result)){
	  $x++;
	   $classmatesnames[]=$row[0]." ".$row[1];
	   $classmatespics[]=$row[2];
	   
   }
   
   
   
   //end query to get class mates 
  
  
  
  
  
   
//print_r($addedfriendsnames);
//print_r($addedfriendspics);
?> 



<!DOCTYE html>
<html>
<head>

<title> Web3_Project2017 </title>
<link rel="stylesheet" type="text/css" href="../css/contactsList.css">




</head>
<body>






<table width="100%"  height="10%"> 
<tr> 
<td>
   <img src="../images/groupchat-small.png" width="50px" />
   </td>
   <td>
  <div class="titre"><h1>Contacts </h1> </div>
  </td>
  <td>
  <div style="text-align:right ">
<a href="page1.html" text-decoration="none"> <=back </a> 
  </div>
  </td>    
 </tr>
</table>
</div>
<!--side menu -->
<div style="padding-left:50px;">
<table>
<tbody >
<tr>
 

<td> <button class="button_style" onclick="window.location.href='editprofile.php'"> edit Profile </button> </td>
<td> <button class="button_style" > Settings </button> </td> 
<td> <button class="button_style" onclick="window.location.href='page2.php'"  > Chatting room </button> </td>
<td> <button class="button_style" > private chatting </button> </td>
<td> <button class="button_style" onclick="window.location.href='contacts.php'" > contacts </button> </td> 
<td> <button class="button_style" > How to use </button> </td> 
<td> <button class="button_style" > Friends </button> </td> 
<td> <button class="button_style" onclick="window.location.href='reportProb.php'" > report a problem </button> </td> 
<td> <button class="button_style" onclick="window.location.href='../php/logout.php'"> Logout </button> </td> 
</tr>
</tbody>
</table>
</div>

<!-- end side menu --> 

<div>

<div class="diva">
	<ul class="ula">
	<li> <h1 class="h1a"> class mates </h1> </li>
	<?php 
	for($j=0;$j<$x;$j++){
	 echo '<li class="lia" >';
       echo "<img src=\"../users/images/$classmatespics[$j]\"  style=\"width:50px; height:50px;\"/>";
      echo "<h3>$classmatesnames[$j] </h3>";
     echo' <p>Lorem ipsum dolor sit amet...</p>';
     echo '</li>';
	}
	?>
	
	
	</ul>

 
 
 
 
 
 </div>
<div  class="diva"> 
<ul class="ula">
	<li> <h1 class="h1a"> addedfriends </h1> </li>
	<?php 
	for($j=0;$j<$i;$j++){
	 echo '<li class="lia" >';
       echo "<img src=\"../users/images/$addedfriendspics[$j]\"  style=\"width:50px; height:50px;\"/>";
      echo "<h3>$addedfriendsnames[$j] </h3>";
     echo' <p>Lorem ipsum dolor sit amet...</p>';
     echo '</li>';
	}
	?>
	
	
	</ul>

 </div>
<div  class="diva"> 
<ul class="ula">	
	<li> <h1 class="h1a"> teachers </h1> </li>
	<?php 
	for($j=0;$j<$z;$j++){
	 echo '<li class="lia" >';
       echo "<img src=\"../users/images/$teacherspics[$j]\"  style=\"width:50px; height:50px;\"/>";
      echo "<h3>$teachersnames[$j] </h3>";
     echo' <p>Lorem ipsum dolor sit amet...</p>';
     echo '</li>';
	}
	?>
	
	
	</ul>
 </div>
</div>
</body>
</html>