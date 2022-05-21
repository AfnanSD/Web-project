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
    <title>Rate Appointment</title>
 </head>
	<body>

    <span style="background-color:white;">
		<table style="margin-top: -9px;margin-left: -7px; width: 105%; border-collapse:collapse; background-color:white" >
							<tr>
								<td width=20.6% height: 30px;><a style="text-decoration: none; color: #44475c;" href="C profile.php">My Account</a></td><!--C profile.php-->
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
<form method="post" action="c editing review req.php">

<!--imagenary values, might link it to the docs database later-->
<p>
    <strong>Review:</strong><input  type="text" name="editedreview"><br>
    <br>
    <?php

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'web_project';
    $database = mysqli_connect($host,$user,$pass,$dbname);

    if(!empty($_GET)){
        $aid = mysqli_real_escape_string($database,$_GET['edetail']);
        $_SESSION['reviewuseredit'] = $aid;
    }

    ?>

<input type="submit" value="Submit"> <br>
</form>
		</div>
 </body></html>