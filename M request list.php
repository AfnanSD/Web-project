<?php  
    session_start();
    if(!isset($_SESSION['Email'])){
        header("Location: Log in page.php?error=Please Sign In again!");
    }

?>  
<!DOCTYPE html>
<html>
    
<head>
    <title>Reuest Appointments List</title>
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

    <h1>Requested appointments: </h1>
    <hr>
    
        <?php


            $host = 'localhost';
			$user = 'root';
			$pass = '';
			$dbname = 'web_project';
			$database = mysqli_connect($host,$user,$pass,$dbname);


            //wrong 
            $query = "SELECT PID,book_appointment.AID,PET_OWNER_EMAIL
                        FROM  book_appointment,appointment 
                        WHERE appointment.STATUS = 'requested'and appointment.AID=book_appointment.AID;";

            $result = mysqli_query($database,$query);

            
            

            if(mysqli_num_rows($result)!=0){
                echo '
                <table border="1" align="center" style="width: 100%;">
                    <thead>
                    <tr style="background-color: #faebd7; color: #695e59 ;">
                            <th>Pet ID </th>
                            <th>Appointment ID </th>
                            <th>Pet owner email</th>
                            <th colspan="2">Status</th>
                            
                            <th>Details</th>

                        </tr>
                    </thead>
                    <tbody>';
                    while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td><a href="#">'. $row['PID'] .'</a></td>';
                            echo '<td><a href="#">'. $row['AID'] .'</a></td>';
                            echo '<td><a href="mailto:'. $row['PET_OWNER_EMAIL'] .'">'. $row['PET_OWNER_EMAIL'] .'</a></td>';
                            echo '<td><a href="M accept request.php?aid='.$row['AID'].'" class="buttonlike">Accept</a></td>';
                            echo '<td><a href="M decline request.php?aid='.$row['AID'].'" class="buttonlike">Deny</a></td>'; //?
                            echo "<td><a href='view req details.php?mdetail=".$row['AID']."'class='buttonlike'>VIEW</a></td>";
                            echo '</tr>';
                           // echo '<td><a href="C cancel request.php?aid='.$row['AID'].'" class="buttonlike">Cancel</a></td>';
                        }
                        echo '
                    </tbody>
                </table>';

            }
            else
                echo '<p><span class="error">* There are no appointments requests</span></p>';
        ?>


    <br>
    <a href="Manager page.php" class="buttonlike">Return to personal page</a>
    </div>
</body>
</html>