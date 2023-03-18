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
    <title>Previous Appoitments</title>
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
								<td width=10.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="signout.php" class="logoutb" style="float: right;"><img src="1250678.png" alt="logout icon.png" height="25" width="25"></a></td>
								<!--<th>Time</th>
								<th>Edit</th>
								<th>Cancel</th>-->
							</tr>
				</table>
		</span>


    <img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
<div>
        <h1>Appoitment Details:</h1>
        <?php
        $database = mysqli_connect("localhost", "root", "", "web_project");
        ?>
		<fieldset>
			<legend>Details:</legend>
 		<br>
<table border="1" align="center" style="width: 85%;">
  <tbody>  
      <caption style="text-align:left">Previous Details</caption>             
        <?php

            $app_id = $_GET['detail'];
            $query = "SELECT * from appointment where aid = '$app_id'";

            $result=mysqli_query($database,$query);
            while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row['AID'] . "</td>";
            echo "<td>" . $row['TIME'] . "</td>";
            echo "<td>" . $row['DATE'] . "</td>";
            echo "<td>" . $row['NOTE'] . "</td>";
            echo "<td>" . $row['SERVICE_NAME'] . "</td>";
            $checking = $row['REVIEW'];
            if (empty($checking)){
            echo "<td> <a href='C edit appt review.php?edetail=".$row['AID']."'> <img src='edit.jpg' alt='edit icon'height='15' width='15' ></a></td>";}
            else 
              echo "<td>" . $row['REVIEW'] . "</td>";
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
        <th>REVIEW</th>
	</tr>

</thead>

              </table>
            <br>
              <br>
              <br>
              <a href="Costumer page.php" class="buttonlike">Return to personal page</a>
		</fieldset></div>
 </body></html>