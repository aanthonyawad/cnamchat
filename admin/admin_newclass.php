<?php
include ("../php/databaseconnect.php");
  $query1 ="select User_Name , User_Last,User_ID from user where User_Type=1;";
  $result= mysqli_query($con,$query1);
  $i=0;
  while($row = mysqli_fetch_row($result)){
  $teachers[] = $row[0]. " ".$row[1];
  $teachersID[]=$row[2];
  $i++;
  }





?>


<html>
<body>
<table> 
<tr> 
<td>
 class name :
 </td>
 <td>
 <input type="text" name ="name">  </input>
</td>
</tr>
<tr>
<td>
class type </td>
<td>
<input type="text" name ="type"> </input>
</td></tr>
<tr> <td>
domaine:</td>
<td>
<input type="text" name ="domaine"> </input>
</td></tr>

<tr>
<td> 
teacher </td>
<td>
<select name="teacher"> 
<?php
for($j=0;$j<$i;$j++){
echo " <option value=\"$teachers[$j]\">$teachers[$j]</option>";
}
?>
</select>
</td>
</tr>
<tr>
<td>
<input type="submit" name="submit" />
</td>
</tr>
</table>
