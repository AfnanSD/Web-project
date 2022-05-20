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