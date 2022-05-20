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
<<<<<<< Updated upstream
                echo "1";
=======
>>>>>>> Stashed changes
                echo'
                <table border="1" align="center" style="width: 100%;">
                <tr style="background-color: #faebd7; color: #695e59 ;">
                <th>Date</th>
                <th>Service</th>
                <th>Review</th>
                <th>PID</th>
                </tr>;';
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
    <a href="Costumer page.html" class="buttonlike">Return to personal page</a>
    </div>
</body>
</html>