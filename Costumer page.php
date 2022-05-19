<?php  
    session_start();
	$_SESSION['email'] = 'A@GAMIL.COM';//change this to not overwrite it
?> 
<!DOCTYPE html>
<html>
<!-- View Previous Appointments, current page: PERSONAL-->
    <head> 
        <meta charset="utf-8" content="width=device-width, initial-scale=1.0">
        <title>Personal Page</title>
        <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
        <link rel="stylesheet" type="text/css" href="C Grid sheet.css">
        <?php

        $cssFile = "C Grid sheet.css";
        echo "<link rel='stylesheet' href='" . $cssFile . "'>";

        ?>

        <!--
        <style>
			.error {color: #FF0000;}
		</style>
-->
    </head>

    <body>
        <?php
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$dbname = 'web_project';
			$database = mysqli_connect($host,$user,$pass,$dbname);
		?>
        <!--<a href="PreviousApps.html" class="button">Previous Appointments</a>-->
        <div class="container">
            <div class="logo">
                <img src="logo 1.1.jpg" alt="logo"width="500px" height="170px" >
                <a href="Felinfine main page.html" class="logoutb" style="float: right;"><img src="logout icon.png" alt="logout icon" height="50" width="50"></a>
            </div>
            <!--
            <div class="profile" id="link"><a href="C Edit profile.html">Edit profile</a></div>
            <div class="add" id="link"><a href="C Add a pet.html">Add a pet</a></div>
            <div class="list" id="link"><a href="C View pet list.html"> pet list</a></div>
-->
            <div class="upcoming">
                <h3>Upcoming appoitments:</h3>
                <!--
                    Status attribute:
                    Requested
                    Denied
                    Upcoming
                    Cancelled
                    Previous
                -->
                    
                        <?php
                            $query = "SELECT appointment.AID,PET_NAME,SERVICE_NAME,NOTE,DATE,TIME
                                        FROM appointment,PET,book_appointment
                                        WHERE book_appointment.PET_OWNER_EMAIL='".$_SESSION['email']."' AND
                                            book_appointment.PID=pet.PID AND book_appointment.AID = appointment.AID AND `STATUS`= 'UPCOMING';";
                            $result = mysqli_query($database,$query);
                            if(mysqli_num_rows($result)!=0){
                                echo'
                                <table border="1">
                                <thead>
                                    <tr>
                                        <th>Appointment ID</th><!--N-->
                                        <th>Pet</th>
                                        <th>Service</th>
                                        <th>Note</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <!--<th>Edit</th>-->
                                        <th>Cancel</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<tr>';
                                        echo '<td>'. $row['AID'] .'</td>';
                                        echo '<td>'. $row['PET_NAME'] .'</td>';
                                        echo '<td>'. $row['SERVICE_NAME'] .'</td>';
                                        echo '<td>'. $row['NOTE'] .'</td>';
                                        echo '<td>'. $row['DATE'] .'</td>';
                                        echo '<td>'. $row['TIME'] .'</td>';
                                        echo '<td><button value="cancel"><label>Cancel</label></button></td>';
                                    echo '</tr>';
                                }
                                echo'
                                </tbody>
                                </table>';
                            }
                            else
                                echo '<p><span class="error">* There are no upcoming appointments</span></p>';
                        ?>
            </div>
            <div class="requests">
                <h3>Your appointements requests:</h3>
                    <?php
                            $query = "SELECT appointment.AID,PET_NAME,SERVICE_NAME,NOTE,DATE,TIME
                                        FROM appointment,PET,book_appointment
                                        WHERE book_appointment.PET_OWNER_EMAIL='".$_SESSION['email']."' AND
                                            book_appointment.PID=pet.PID AND book_appointment.AID = appointment.AID AND `STATUS`= 'REQUESTED';" ;

                            $result = mysqli_query($database,$query);
                            if(mysqli_num_rows($result)!=0){
                                echo'
                                <table border="1">
                                <thead>
                                    <tr>
                                        <th>Appointment ID</th><!--N-->
                                        <th>Pet</th>
                                        <th>Service</th>
                                        <th>Note</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Edit</th>
                                        <th>Cancel</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<tr>';
                                        echo '<td>'. $row['AID'] .'</td>';
                                        echo '<td>'. $row['PET_NAME'] .'</td>';
                                        echo '<td>'. $row['SERVICE_NAME'] .'</td>';
                                        echo '<td>'. $row['NOTE'] .'</td>';
                                        echo '<td>'. $row['DATE'] .'</td>';
                                        echo '<td>'. $row['TIME'] .'</td>';
                                        echo '<td><a href="C Edit an appointment request.php" class="buttonlike">Edit</a></td>';
                                        echo '<td><button value="cancel"><label>Cancel</label></button></td>';
                                    echo '</tr>';
                                }
                                echo'
                                </tbody>
                                </table>';

                            }
                            else
                                echo '<p><span class="error">* There are no requested appointments</span></p>';
                        ?>
                <!--
                <table border="1">
                    <thead>
                        <tr>
                            <th>N</th>
                            <th>Pet</th>
                            <th>Service</th>
                            <th>Note</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Edit</th>
                            <th>Cancel</th>
                        </tr>
                    </thead>
                    <1!-- imaginary -1->
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Lolo</td>
                            <td>Vaccinations</td>
                            <td>none</td>
                            <td>1-3-2022</td>
                            <td>1:00 to 2:00</td>
                            <!-1- right? -1->
                            <td><a href="C Edit an appointment request.html" class="buttonlike">Edit</a></td>
                            <!-1-<button value="edit"><label>Edit</label></button>-1->
                            <td><button value="cancel"><label>Cancel</label></button></td>
                            <!-1-<button value="cancel"><label>Cancel</label></button>-1->
                        </tr>
                    </tbody>
                </table>
                        -->
                <br>
                <a href="C Request an appointment.php" class="buttonlike">Request an appointment</a>
            </div>
            <!--<div class="previous" id="link"><a href="C Previous appointments.html">View previous appointments here</a> </div>-->
            <div class="contact">
                <a href="AB0UT US.php">Get to know us!</a> <br>
                Let us help you
                <?php
                    $queryphone = "SELECT `CLINIC_PHONE_NUMBER` FROM `clinic_manager`;" ;
                    $resultphone = mysqli_query($database,$queryphone);
                    $rowphone = mysqli_fetch_assoc($resultphone);
                    $phone = $rowphone['CLINIC_PHONE_NUMBER'];

                    echo '<br>call us directly at : '.$phone.'';
                    
                    $query = "SELECT `MANAGER_EMAIL` FROM `clinic_manager`;" ;
                    $result = mysqli_query($database,$query);
                    $row = mysqli_fetch_assoc($result);
                    $email = $row['MANAGER_EMAIL'];
                    echo '<br>or contact us via Email : <a href="mailto:'.$email.'">'.$email.'</a>';
                ?>
            </div>
        </div>
    </body>
</html>
