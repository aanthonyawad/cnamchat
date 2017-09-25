<!DOCTYE html>
<html>
<head>


<title> Web3_Project2017 </title>
<link rel="stylesheet" type="text/css" href="../css/page2.css">	
<script src="../js/jquery-3.2.1.min.js"></script>
<script>
var i=0;
window.setInterval(
function(){reloadIFrame();}, 2000);

function reloadIFrame() {
	 x = document.getElementsByClassName("torefresh");
 x[0].src = x[0].src

 x[1].src = x[1].src

 x[2].src = x[2].src
 
 console.log('a');
}
function clicked(a){
console.log('clicked');
 x = document.getElementsByClassName("torefresh");
 y=document.getElementsByClassName("header");
 z=document.getElementsByClassName("send");
	x[i].src = "../chat/"+a+"/chat_room.php"
	y[i].src = "../chat/"+a+"/chat_header.php"
	z[i].src = "../chat/"+a+"/chat_send.php"
 
	i++;
	if(i==3)i=0;
	
	
	
}
</script>



</head>

<body>
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
  // query to get name 
  $query1 ="select User_Name , User_Last from user where User_ID='$ID';";
  $result= mysqli_query($con,$query1);
  $row = mysqli_fetch_row($result);
$name = $row[0]. " ".$row[1];



//query to get classes
$query2 ="select Class_ID  from is_in_class where Stud_ID='$ID';";
  $result= mysqli_query($con,$query2);
  $classesarray =Array();

  while($row = mysqli_fetch_row($result)){
	  $classesarray[] =$row[0];
  }
  $classesstring =$classesarray[0];
  for($i=1;$i<count($classesarray);$i++){
	 $classesstring.=",$classesarray[$i]";
  }
  
  //query to get class names
  $query3 = "select class_Name  from class where class_ID in ($classesstring) and class_Type='class'";
  $result= mysqli_query($con,$query3);
	$j=0; $classesnamesarray=Array();
  while($row = mysqli_fetch_row($result)){
	  $classesnamesarray[] =$row[0];$j++;
  }
  
	$_SESSION['classes']=$classesarray;
$_SESSION['currentclass']=1;
mysqli_close($con);
?> 





<table width="100%"  height="10%"> 
<tr> 
<td>
   <img src="../images/groupchat-small.png" width="50px" />
   </td>
   <td>
  <div class="titre"><h1> Welcome    <?php echo $name;?> </h1> </div>
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
<td> <button class="button_style"  onclick="window.location.href='page2.php'" > Chatting room </button> </td>
<td> <button class="button_style"  onclick="window.location.href='privatechatting.php'"> private chatting </button> </td>
<td> <button class="button_style" onclick="window.location.href='contacts.php'" > contacts </button> </td> 
<td> <button class="button_style" > How to use </button> </td> 
<td> <button class="button_style" > Friends </button> </td> 
<td> <button class="button_style" onclick="window.location.href='reportProb.php'"> report a problem </button> </td> 
<td> <button class="button_style" onclick="window.location.href='../php/logout.php'"> Logout </button> </td> 
</tr>
</tbody>
</table>
</div>
<!-- side menu end -->





<!-- chat place-->

<div> <table> 
<tr>
<td>
<h2 style="text-align:center; width:48px; "> </h2> 
</td>


<?php
$chatRooms=Array(); 
for($i=0;$i<$j;$i++){
echo '<td>';
echo "<button class=\"button_style1\" id=\"btn$classesarray[$i]\" onclick=\"clicked('$classesnamesarray[$i]')\"> ";	
echo $classesnamesarray[$i];	
echo '</button> </td>';
	
echo '</td>';	


}
?>

</tr>
</table>
</div>

<div>




</div>

<!-- go to chat folder for logic of the chat  -->
<!-- first chat -->
<div style=" float:left;  height:70%; width:33%;" >
<div style=" height:8%; width:100%;"> 
<iframe class="header" style="width:100%; height:100%;"  src="../chat/java/chat_header.php"></iframe>
</div>

<div id="div1" style=" 	 height:82%; width:100%;" > 
<iframe class="torefresh"  style="width:100%; height:100%;"  src="../chat/java/chat_room.php"></iframe>
</div>

<div style=" height:10%; width:100%;" > 
<iframe class="send" style="width:100%; height:100%;"  src="../chat/java/chat_send.php"></iframe>
</div>
</div>
<!-- second chat -->
<div style="float:left;  height:70%; width:33%;" >
<div style=" height:8%; width:100%;"> 
<iframe class="header" style="width:100%; height:100%;"  src="../chat/java/chat_header.php"></iframe>
</div>

<div id="div2" style=" height:82%; width:100%;" > 
<iframe class="torefresh"  style="width:100%; height:100%;"  src="../chat/java/chat_room.php"></iframe>
</div>

<div style=" height:10%; width:100%;" > 
<iframe class="send" style="width:100%; height:100%;"  src="../chat/java/chat_send.php"></iframe>
</div>
</div>
<!-- third chat -->
<div style="float:left;  height:70%; width:33%;" >
<div style=" height:8%; width:100%;"> 
<iframe class="header" style="width:100%; height:100%;"  src="../chat/java/chat_header.php"></iframe>
</div>

<div id="div3" style=" height:82%; width:100%;" > 
<iframe class="torefresh"  style="width:100%; height:100%;"  src="../chat/java/chat_room.php"></iframe>
</div>

<div style=" height:10%; width:100%;" > 
<iframe class="send" style="width:100%; height:100%;"  src="../chat/java/chat_send.php"></iframe>
</div>
</div>



<!-- chat place end-->

<div  class="Fin">
<u> Developed and designed by Anthony Awad & Diana Kanaan </u>
</div>


<!-- jquery for ajaxx -->
<script type="text/javascript">






//var phpvar ='<?php echo $chatrooms[0]->chat_full;?>;';
/*$(document).ready(function(){
$('#btn1').click(function(){

 //$(document).on('click', '#btn1', function(e) {
//function(){
	
	//document.querySelector('#chatdiv').innerHTML="sd";
	alert('phpvar');

});
});
*/

/*
function myAjax () {
$.ajax( { type : 'POST',
          data : { },
          url  : 'bb2.php',              // <=== CALL THE PHP FUNCTION HERE.
          success: function ( data ) {
            alert( data );               // <=== VALUE RETURNED FROM FUNCTION.
          },
          error: function ( xhr ) {
            alert( "error" );
          }
        });
}
		
	*/	
</script> 
</body>

</html>
