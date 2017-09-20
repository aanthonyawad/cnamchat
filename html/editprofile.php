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

  $query ="SELECT  User_Pic  FROM user WHERE User_ID =$ID";
  $result= mysqli_query($con,$query);
  $row = mysqli_fetch_row($result);
$img = $row[0];



?> 



<!DOCTYE html>
<html>
<head>

<title> Web3_Project2017 </title>
<link rel="stylesheet" type="text/css" href="../css/editprofile.css">


</head>
<body>






<table width="100%"  height="10%"> 
<tr> 
<td>
   <img src="../images/groupchat-small.png" width="50px" />
   </td>
   <td>
  <div class="titre"><h1>Edit Profile </h1> </div>
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
<td> <button class="button_style" onclick="window.location.href='contacts.php'"> contacts </button> </td> 
<td> <button class="button_style" > How to use </button> </td> 
<td> <button class="button_style" > Friends </button> </td> 
<td> <button class="button_style" onclick="window.location.href='reportProb.php'" > report a problem </button> </td> 
<td> <button class="button_style" onclick="window.location.href='../php/logout.php'"> Logout </button> </td> 
</tr>
</tbody>
</table>
</div>
<!-- side menu end -->


<!-- the edit profile div -->

<!--
<div style="text-align:center;"> 
<form >
 <div class="imgcontainer">    
      <img src="../images/isae.jpg" class="ProfilePic" width="100" >
 </div>
<div id="ChangePic">
<a href="ChangePic">Change Profile Photo</a>
</div>
<br/>

<div  id ="ChangePass">

<b> &nbsp;  &nbsp;  &nbsp;Current Password:</b> 

  <input type="password" class="inputStyle" placeholder="Enter Password" name="user_pass" id="user_pass" novalidate="off"> </input> 
  </br>
   </br>
   
   
  <b>New Password:</b>


  <input type="password" class="inputStyle" placeholder="New Password" name="user_pass" id="user_pass" novalidate="off"> </input> 
  </br>
  
  </br>
  
  <b>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; Confirm your Password :</b>
  
  
  <input type="password" class="inputStyle" placeholder="New Password,again" name="user_pass" id="user_pass" novalidate="off"> </input>  
  
  
  
  </br>
  </br>
  
  </br>
  <button  class="button_style" type="submit"> save </button>
  <br/>
  <br/>
</div>
</form>
</div>
   -->
    
   
   <!-- change pass section -->
   <div>
   <div style="float:left;">
<div class="form-style-2">
<div class="form-style-2-heading">change password </div>

<form action="../php/changepass.php" method="post">
<label for="oldpass"><span>old password <span class="required">*</span></span><input type="password" class="input-field" name="oldpass" value="" /></label>
<label for="newpass"><span>new password <span class="required">*</span></span><input type="password" class="input-field" name="newpass" value="" /></label>
<label for="confirmnewpass"><span>confirm new password <span class="required">*</span></span><input type="password" class="input-field" name="confirmnewpass" value="" /></label>
<label><span>&nbsp;</span><input type="submit" value="Submit"   onclick="alertwhensubmit();" /></label>
</div>
</div>
</form>

<!-- change picture -->
<div style="float:left;">
<div class="form-style-2">
<div class="form-style-2-heading">current picture </div> 
<div width="100px" height="100px"> <img width="200px" height="200px" src="../users/images/<?php echo $img; ?>" alt="no image found" />   </div>
<div class="form-style-2-heading">change profile picture</div>

<form action="../php/changepicture.php" method="post"  enctype="multipart/form-data">
<label for="newpic"><span>select picture </span> <input type="file" class="input-field" name="newpic" value="" /></label>
<label><span>&nbsp;</span><input type="submit" value="upload"    /></label>
</div>
</div>
</div>
</form>


<!-- 
------------------
------------------
end of  div of edit profile -->




</body>
</html>
