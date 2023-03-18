<?php 
session_start();
 if(!isset($_SESSION['Email'])){
        header("Location: Log in page.php?error=Please Sign In again!");
    }

?> 


<!DOCTYPE html>
<html>
	<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
   <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
    <title>MY account</title>
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
                        <td width=15.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="Costumer page.php">Home page</a></td>
                        <td width=10.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="signout.php" class="logoutb" style="float: right;"><img src="1250678.png" alt="logout icon.png" height="30" width="30"></a></td>
                        <!--<th>Time</th>
                        <th>Edit</th>
                        <th>Cancel</th>-->
                    </tr>
        </table>
</span>
    <img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
<div>
        <h1>MY account:</h1>
		<fieldset>
			<legend></legend>
 			 <table border="1" align="center" style="width: 85%;">
  <tbody>  
            

  
 </tbody> 
<thead>
  <tr style="background-color: #faebd7;">

         <th>View account</th>
        <th>Edit Account</th>
	  <th>Delete Account</th>

	</tr>
</thead>
<tbody>
<th><a href="C View profile.php"><img src="acc.jpg" alt="view icon" height="29" width="29" > </a></th>
<th><a href="C Edit profile.php"><img src="edit.jpg" alt="edit icon" height="19" width="19"> </a></th>
<th><a href="C Delete profile owner.php"><img src="delet.jpg" alt="a delet icon" height="20" width="20"></th>
 </tr>
</tbody>
              </table><br>
              		</fieldset></div>
	</body></html>
