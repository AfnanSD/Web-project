<!DOCTYPE html>
<?php  
    session_start();
    if(!isset($_SESSION['Email'])){
        header("Location: Log in page.php?error=Please Sign In again!");
    }

?>  
<html>
<!-- View Previous Appointments, current page: PERSONAL-->
    <head> 
        <meta charset="utf-8" content="width=device-width, initial-scale=1.0">
        <title>Personal Page</title>
        <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
        <link rel="stylesheet" type="text/css" href="C Grid sheet.css">
        <?php
//?
        $cssFile = "C Grid sheet.css";
        echo "<link rel='stylesheet' href='" . $cssFile . "'>";

        ?>
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
        <table style="margin-left:10px;">
                    <tr>
                        <td width=20.6%><a href="C Edit profile.html"><!--<img  height="30" width="30" alt="Edit profile" src="<?php echo (($_POST['pfp'])?$_POST['pfp']:"acc.jpg")?>">--></a>My Account</td>
                        <td width=15.6%><a href="C Add a pet.html"><!--<img height="30" width="30" alt="Add a pet" src="3004543.png">-->Add a pet</a></td>
                        <td width=15.6%><a href="C View pet list.html"><!--<img height="30" width="30" alt="pet list" src="87971.png">-->Pet List</a></td>
                        <td width=15.6%><a href="C Previous appointments.html"><!-- <img height="30" width="30" alt="View previous appointments here" src="5896962.png"> --> Services</a></td>
                        <td width=15.6%><a href="C previous appts.php"><!-- <img height="30" width="30" alt="View previous appointments here" src="5896962.png"> --> View previous appointments</a></td>
                        <td width=10.6%><a href="signout.php" class="logoutb" style="float: right;"><img src="1250678.png" alt="logout icon" height="30" width="30"></a></td>
                        <!--<th>Time</th>
                        <th>Edit</th>
                        <th>Cancel</th>-->
                    </tr>
        </table>
        <div class="container">
        <div class="logo">
                
                <img src="logo 1.1.jpg" alt="logo"width="500px" height="170px" >

                <!--<p id="link"><a href="C Edit profile.html">Edit profile</a></p>
                <p  id="link"><a href="C Add a pet.html">Add a pet</a></p>
                <p  id="link"><a href="C View pet list.html"> pet list</a></p>
                <p  id="link"><a href="C Previous appointments.html">View previous appointments here</a> </p>
                <a href="Felinfine main page.html" class="logoutb" style="float: right;"><img src="logout icon.png" alt="logout icon" height="50" width="50"></a>-->
            </div>
            <div class="upcoming"  >
                <h3>Upcoming appoitments:</h3>
                <!--
                    style="width:153%;"

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
                                        WHERE book_appointment.PET_OWNER_EMAIL='".$_SESSION['Email']."' AND
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
            <div class="requests" ><!--style="width:153%;"-->
                <h3>Your appointements requests:</h3>
                    <?php
                            $query = "SELECT appointment.AID,PET_NAME,SERVICE_NAME,NOTE,DATE,TIME
                                        FROM appointment,PET,book_appointment
                                        WHERE book_appointment.PET_OWNER_EMAIL='".$_SESSION['Email']."' AND
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
                                        //echo '<td><a href="C Edit an appointment request.php" class="buttonlike">Edit</a></td>';
                                        echo '<td><a href="C Edit an appointment request.php?aid='.$row['AID'].'" class="buttonlike">Edit</a></td>';
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
                <br>
                <a href="C Request an appointment.php" class="buttonlike">Request an appointment</a>
            </div>
            
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
