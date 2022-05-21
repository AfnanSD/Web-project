<?php
            session_start();
?>
<!DOCTYPE html>
<html>
    
<head>
    <title>Previous Appointments</title>
    <meta charset="ufc-8" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
    <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
    <style>
        td{
            text-align: center;
            font-weight: bold;
        }
    </style>
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
								<td width=10.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="signout.php" class="logoutb" style="float: right;"><img src="1250678.png" alt="logout icon.png" height="25" width="25"></a></td>
								<!--<th>Time</th>
								<th>Edit</th>
								<th>Cancel</th>-->
							</tr>
				</table>
		</span>

    <img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
    <div>

    <h1>Your previous appointments: </h1>
    <hr>
    
        <?php
            if(!isset($_SESSION['Email'])){
                header("Location: Log in page.php?error=Please Sign In again!");
            }


            $host = 'localhost';
			$user = 'root';
			$pass = '';
			$dbname = 'web_project';
			$database = mysqli_connect($host,$user,$pass,$dbname);

      
            $query = "SELECT DATE,SERVICE_NAME,PID,appointment.AID from appointment, book_appointment WHERE book_appointment.PET_OWNER_EMAIL='".$_SESSION['Email']."' AND
            book_appointment.AID = appointment.AID AND `STATUS`= 'FINISHED';";

            $result = mysqli_query($database,$query);
            //display data on web page

            //---------------------------------------------------------------------------------------
            if(mysqli_num_rows($result)!=0){

                echo'
                <table border="1" align="center" style="width: 100%;">
                <tr style="background-color: #faebd7; color: #695e59 ;">
                <th>Date</th>
                <th>Service</th>
                <th>Review</th>
                <th>PID</th>
                </tr>';
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>" . $row['DATE'] . "</td>";
                    echo "<td>" . $row['SERVICE_NAME'] . "</td>";
                    $aid = $row['AID'];
                    echo "<td> <a href='C prev appts details.php?detail=".$aid."'> Details</a></td>";
                    echo "<td>" . $row['PID'] . "</td>";
                    echo "</tr>";
                }
                echo'
                </table>';
            }
            else
                echo '<p><span class="error">* There are no previous appointments</span></p>';

echo "<br>";




//close the connection

?>


    <br>
    <a href="Costumer page.php" class="buttonlike">Return to personal page</a>
    </div>
</body>
</html>
