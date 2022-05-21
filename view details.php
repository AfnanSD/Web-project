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
  
  <span style="background-color:white;">
        <table style="margin-left:10px;">
                    <tr>
                        <!--td width=10.2%><a href="AB0UT US.php">View About us</a></td>.. Insert M Add service.php-->
                        <td width=10.2%><a href="Custmeres.php">Contact pet owners</a></td>
                        <td width=10.2%><a href="M Edit about us.php"><!--<img height="30" width="30" alt="Add a pet" src="3004543.png">-->Edit About us</a></td>
                        <td width=10.2%><a href="M Add Service.php"><!--<img height="30" width="30" alt="pet list" src="87971.png">-->Add service</a></td>
                        <td width=10.2%><a href="M request list.php"><!-- <img height="30" width="30" alt="View previous appointments here" src="5896962.png"> -->View Requests List</a></td>
                        <td width=14.2%><a href="M manage avail appts.php"><!-- <img height="30" width="30" alt="View previous appointments here" src="5896962.png"> -->Manage available appointment</a></td>
                        <td width=14.2%><a href="M set available appts.php"><!-- <img height="30" width="30" alt="View previous appointments here" src="5896962.png"> -->Set available appointement</a></td>
                        <td width=10.6%><a href="M reviews list.php"><!-- <img height="30" width="30" alt="View previous appointments here" src="5896962.png"> -->View review List</a></td>
                        <td width=0.2%><a href="signout.php" class="logoutb" style="float: right;"><img src="1250678.png" alt="logout icon" height="30" width="30"></a></td>
                        <!--<th>Time</th>
                        <th>Edit</th>
                        <th>Cancel</th>-->
                    </tr>
        </table>
</span>



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
                $_SESSION['mviewdetail'] = $aid;
        }
            $app_id = $_SESSION['mviewdetail'];

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
	</tr>

</thead>

              </table>
            <br>
              <br>
              <br>
              
		</fieldset></div>
 </body></html>
