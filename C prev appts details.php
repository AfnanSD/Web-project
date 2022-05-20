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
            echo "<td>" . $row['REVIEW'] . "</td>";
            echo "<td>" . $row['NOTE'] . "</td>";
            echo "<td>" . $row['SERVICE_NAME'] . "</td>";
            echo "<td> <a href='C edit appt review.php?edetail=".$row['AID']."'> <img src='edit.jpg' alt='edit icon'height='15' width='15' ></a></td>";
            echo "</tr>";}
        ?>
</tbody> 
<thead>
    <tr style="background-color: antiquewhite;">

        <th>AID</th>
        <th>TIME</th>
        <th>DATE</th>
        <th>REVIEW</th>
        <th>NOTE</th>
        <th>SERVICE</th>
        <th>EDIT REVIEW</th>
	</tr>

</thead>

              </table>
            <br>
              <br>
              <br>
              <a href="Costumer page.html" class="buttonlike">Return to personal page</a>
		</fieldset></div>
 </body></html>