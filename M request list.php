<?php  
    session_start();
    if(!isset($_SESSION['Email'])){
        header("Location: Log in page.php?error=Please Sign In again!");
    }

?>  
<!DOCTYPE html>
<html>
    
<head>
    <title>Request Appointments List</title>
    <meta charset="ufc-8" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
    <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
    <style>
        td{
            text-align: center;
            /*font-weight: bold;*/
            
        }
    </style>
</head>

<body>

<span style="background-color:white;">
        <table style="margin-left:10px; background-color:white;">
                    <tr>
                        <!--td width=10.2%><a href="AB0UT US.php">View About us</a></td>.. Insert M Add service.php-->
                        <td width=10.2%><a href="Custmeres.php">Contact pet owners</a></td>
                        <td width=10.2%><a href="M Edit about us.php"><!--<img height="30" width="30" alt="Add a pet" src="3004543.png">-->Edit About us</a></td>
                        <td width=10.2%><a href="M Add Service.php"><!--<img height="30" width="30" alt="pet list" src="87971.png">-->Add service</a></td>
                        <td width=10.2%><a href="M request list.php"><!-- <img height="30" width="30" alt="View previous appointments here" src="5896962.png"> -->View Requests List</a></td>
                        <td width=14.2%><a href="M manage avail appts.php"><!-- <img height="30" width="30" alt="View previous appointments here" src="5896962.png"> -->Manage available appointment</a></td>
                        <td width=14.2%><a href="M set available appts.php"><!-- <img height="30" width="30" alt="View previous appointments here" src="5896962.png"> -->Set available appointement</a></td>
                        <td width=10.6%><a href="M reviews list.php"><!-- <img height="30" width="30" alt="View previous appointments here" src="5896962.png"> -->View review List</a></td>
                        <td width=10.6%><a href="Manager page.php"><!-- <img height="30" width="30" alt="View previous appointments here" src="5896962.png"> -->Home page</a></td>
                        <td width=0.2%><a href="signout.php" class="logoutb" style="float: right;"><img src="1250678.png" alt="logout icon" height="30" width="30"></a></td>
                        <!--<th>Time</th>
                        <th>Edit</th>
                        <th>Cancel</th>-->
                    </tr>
        </table>
</span>

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
                            echo '<td><a href="m view pet detail.php?viewpet='.$row["PID"].'">'. $row['PID'] .'</a></td>';
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