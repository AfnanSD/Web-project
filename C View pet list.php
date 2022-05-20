<?php 
session_start();
?> 


<!DOCTYPE html>
<html>
	<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
   <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
    <title>List of pets</title>
    
 </head>
	<body>
    <span style="background-color:white;">
<table style="margin-top: -9px;margin-left: -7px; width: 105%; border-collapse:collapse; background-color:white" >
                    <tr>
                        <td width=20.6% height: 30px;><a style="text-decoration: none; color: #44475c;" href="C profile.php">My Account</a></td>
                        <td width=15.6%  height: 30px; background-color: #DCABB3;><a   style="text-decoration: none; color: #44475c;" href="C Add a pet.php">Add a pet</a></td>
                        <td width=15.6%  height: 30px; ><a   style="text-decoration: none; color: #44475c;"href="C View pet list.php">Pet List</a></td>
                        <td width=15.6%  height: 30px; ><a   style="text-decoration: none; color: #44475c;"href="C Add more services.php"> Services</a></td>
                        <td width=15.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="C Previous appointments.php">View previous appointments</a></td>
                        <td width=10.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="signout.php" class="logoutb" style="float: right;"><img src="1250678.png" alt="logout icon.png" height="30" width="30"></a></td>
                        <!--<th>Time</th>
                        <th>Edit</th>
                        <th>Cancel</th>-->
                    </tr>
        </table>
</span>
    <img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
<div>
        <h1>List of pets:</h1>
		<fieldset>
			<legend>Your list</legend>
 			 <table border="1" align="center" style="width: 85%;">
  <tbody>  
  <?php 
$host='localhost';
$user='root';
$pass='';
$dbname="web_project";
$database=mysqli_connect($host,$user,$pass,$dbname);
$sss=mysqli_real_escape_string($database,$_SESSION['Email']);
//441201399@student.ksu.edu.sa
$q = "SELECT * from pet where PET_OWNER_EMAIL='$sss' ";

$result=mysqli_query($database,$q);

$num=mysqli_num_rows($result);

if($num>0){
 while($row=mysqli_fetch_assoc($result))
{
  //  $_SESSION['pp'];
    echo '<tr>';
    echo '<th>'.$row["PID"].'</th>';
    echo '<th>'.$row["PET_NAME"].'</th>';
    $pi=$row["PID"];
    echo '<form action="C Pet profile.php" mathod="post"> <input type="hidden" name="vvv1" value="'.$pi.'"></form>';
    echo '<form action="C Edit pet profile.php" mathod="post"> <input type="hidden" name="vvv2" value="'.$pi.'"></form>';
    echo '<form action="C Delete pet profile.php" mathod="post"> <input type="hidden" name="vvv3" value="'.$pi.'"></form>';

    echo '<th><a href="C Pet profile.php?view='.$row["PID"].'"><img src="view_pet_profile.png" alt="view icon" height="29" width="29" > </a></th>';
    echo  '<th><a href="C Edit pet profile.php?edit='.$row["PID"].'"><img src="edit.jpg" alt="edit icon" height="19" width="19"> </a></th>';
    echo  '<th><a href="C Delete pet profile.php?delete='.$row["PID"].'"><img src="delet.jpg" alt="a delet icon" height="20" width="20"></th>';
    echo '</tr>';

}}
else echo "<p>THERE IS NO PETS</p>";
 mysqli_close($database);
?>              

  
 </tbody> 
<thead>
  <tr style="background-color: #faebd7;">

        <th>ID:</th>
        <th>Name:</th>
         <th>View pet</th>
        <th>Edit</th>
	  <th>Delete</th>

	</tr>

</thead>

              </table><br>
              		</fieldset></div>
	</body></html>
