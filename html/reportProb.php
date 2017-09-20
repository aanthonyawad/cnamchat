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
//  $ID = $_SESSION['ID'];
 // fucntion reportaprob(){
 // $query ="INSERT INTO `problems_bugs`(`User_ID`, `Problem`, `Problem_Type`, `solved`) VALUES (,[value-2],[value-3],[value-4])";
  //$result= mysqli_query($con,$query);
 // $row = mysqli_fetch_row($result);
//$name = $row[0]. " ".$row[1];




?> 



<!DOCTYE html>
<html>
<head>

<title> Web3_Project2017 </title>
<link rel="stylesheet" type="text/css" href="../css/reportProb.css">
</head>

<body>






<table width="100%"  height="10%"> 
<tr> 
<td>
   <img src="../images/groupchat-small.png" width="50px" />
   </td>
   <td>
  <div class="titre"><h1>Report a Problem </h1> </div>
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
<td> <button class="button_style"   onclick="window.location.href='page2.php'" > Chatting room </button> </td>
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
<!-- side menu end -->

<!-- report a problem div --> 

<div class="div1"> 

</br>



<div class="form-style-2">
<div class="form-style-2-heading">Thank you for taking the time to report this problem to us </div>
<form action="../php/logiquereportProb.php" method="post">
<label for="field1"><span>Problem Title <span class="required">*</span></span><input type="text" class="input-field" name="field1" value="" /></label>



<label for="field2"><span>Message <span class="required">*</span></span><textarea name="field2" class="textarea-field"></textarea></label>

<label><span>&nbsp;</span><input type="submit" value="Submit"   onclick="alertwhensubmit();" /></label>
</form>
</div>

<script >
function setbg(color)
{
document.getElementById("prob_text").style.background=color
}

function alertwhensubmit(){
	
 alert('thank you for submitting this error :D');
}
</script> 


