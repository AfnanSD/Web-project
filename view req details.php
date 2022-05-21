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
    <title>Appoitments details</title>
 </head>
	<body>
    <a href="M manage avail appts.php" class="logoutb" style="float: right;"><img src="263085.png" alt="manage appts page" height="50" width="50" style="align-items:left;"></a>
    <img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
<div>
        <h1>Appoitment Details:</h1>
		<fieldset>
			<legend>Details:</legend>
 		<br>
<table border="1" align="center" style="width: 85%;">
  <tbody>         
        <?php


        $database = mysqli_connect("localhost", "root", "", "web_project");
            if(!empty($_GET)){
                $aid = mysqli_real_escape_string($database,$_GET['mdetail']);
                $_SESSION['mviewreqdetail'] = $aid;
        }
            $app_id = $_SESSION['mviewreqdetail'];

            $query = "SELECT * from book_appointment join appointment where appointment.AID = '$app_id' and appointment.AID = book_appointment.AID";

            $result=mysqli_query($database,$query);
            while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row['AID'] . "</td>";
            echo "<td>" . $row['TIME'] . "</td>";
            echo "<td>" . $row['DATE'] . "</td>";
            echo "<td>" . $row['NOTE'] . "</td>";
            echo "<td>" . $row['SERVICE_NAME'] . "</td>";
            echo "<td>" . $row['PID']. "</td>";
            echo "<td>" . $row['PET_OWNER_EMAIL']."</td>";
            echo "</tr>";}
        ?>
</tbody> 
<thead>
    <tr style="background-color: antiquewhite;">

        <th>AID</th>
        <th>TIME</th>
        <th>DATE</th>
        <th>NOTE</th>
        <th>SERVICE</th>
        <th>PID</th>
        <th>OWNER EMAIL</th>
	</tr>

</thead>

              </table>
            <br>
              <br>
              <br>
              
		</fieldset></div>
 </body></html>
