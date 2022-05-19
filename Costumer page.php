<!DOCTYPE html>
<html>
<!-- View Previous Appointments, current page: PERSONAL-->
    <head> 
        <meta charset="utf-8" content="width=device-width, initial-scale=1.0">
        <title>Personal Page</title>
        <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
        <link rel="stylesheet" type="text/css" href="C Grid sheet.css">
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
            <div class="profile" id="link"><a href="C Edit profile.html">Edit profile</a></div>
            <div class="add" id="link"><a href="C Add a pet.html">Add a pet</a></div>
            <div class="list" id="link"><a href="C View pet list.html"> pet list</a></div>
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
                    
                    <!--
                        SELECT appointment.AID,PET_NAME,SERVICE_NAME,NOTE,DATE,TIME
                        FROM appointment,PET,book_appointment
                        WHERE book_appointment.PET_OWNER_EMAIL='A@GAMIL.COM' AND
                             book_appointment.PID=pet.PID AND book_appointment.AID = appointment.AID;
                    -->
                    <tbody>
                        <?php
                            $OWENER_EMAIL = 'A@GAMIL.COM';//need to come from session?
                            $query = "SELECT appointment.AID,PET_NAME,SERVICE_NAME,NOTE,DATE,TIME
                                        FROM appointment,PET,book_appointment
                                        WHERE book_appointment.PET_OWNER_EMAIL='A@GAMIL.COM' AND
                                            book_appointment.PID=pet.PID AND book_appointment.AID = appointment.AID;" ;
                            /*
                            "SELECT appointment.AID,PET_NAME,SERVICE_NAME,NOTE,DATE,TIME
                                        FROM appointment,PET,book_appointment
                                        WHERE book_appointment.PET_OWNER_EMAIL= ".$OWENER_EMAIL." AND
                                        book_appointment.PID=pet.PID AND book_appointment.AID = appointment.AID;"
                            */
                            if($result = mysqli_query($database,$query)){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<tr>';
                                        echo '<td>'. $row['AID'] .'</td>';
                                        echo '<td>'. $row['PET_NAME'] .'</td>';
                                        echo '<td>'. $row['SERVICE_NAME'] .'</td>';
                                        echo '<td>'. $row['NOTE'] .'</td>';
                                        echo '<td>'. $row['DATE'] .'</td>';
                                        echo '<td>'. $row['TIME'] .'</td>';
                                        echo '<td>'. 'button' .'</td>';
                                    echo '</tr>';
                                }
                            }
                            
                           // while($row){
                             //   echo '<tr> <td>'. $row['appointment.AID'] .'</td> </tr>';
                                /*
                                    <td>Jacki</td>
                                    <td>Vaccinations</td>
                                    <td>none</td>
                                    <td>1-3-2022</td>
                                    <td>1:00 to 2:00</td>
                                    <!-0- right? --0>
                                    <!-0-<td><button value="edit"><label>Edit</label></button></td>--0>
                                    <!-0-<td><a href="Edit an appointment request.html">Edit</a></td>--0>
                                    <!-0-<button value="edit"><label>Edit</label></button>--0>
                                    <td><button value="cancel"><label>Cancel</label></button></td>
                                </tr>*/
                         //   }
                        ?>

                        <!-- imaginary -->
                        <!--
                        <tr>
                            <td>1</td>
                            <td>Jacki</td>
                            <td>Vaccinations</td>
                            <td>none</td>
                            <td>1-3-2022</td>
                            <td>1:00 to 2:00</td>
                            <!-0- right? --0>
                            <!-0-<td><button value="edit"><label>Edit</label></button></td>--0>
                            <!-0-<td><a href="Edit an appointment request.html">Edit</a></td>--0>
                            <!-0-<button value="edit"><label>Edit</label></button>--0>
                            <td><button value="cancel"><label>Cancel</label></button></td>
                        </tr>
                    -->
                    </tbody>
                </table>
            </div>
            <div class="requests">
                <h3>Your appointements requests:</h3>
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
                    <!-- imaginary -->
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Lolo</td>
                            <td>Vaccinations</td>
                            <td>none</td>
                            <td>1-3-2022</td>
                            <td>1:00 to 2:00</td>
                            <!-- right? -->
                            <td><a href="C Edit an appointment request.html" class="buttonlike">Edit</a></td>
                            <!--<button value="edit"><label>Edit</label></button>-->
                            <td><button value="cancel"><label>Cancel</label></button></td>
                            <!--<button value="cancel"><label>Cancel</label></button>-->
                        </tr>
                    </tbody>
                </table>
                <br>
                <a href="C Request an appointment.php" class="buttonlike">Request an appointment</a>
            </div>
            <div class="previous" id="link"><a href="C Previous appointments.html">View previous appointments here</a> </div>
            <div class="contact">
                <a href="About us.html">Get to know us!</a> <br>
                Let us help you
				<!--our contact info:-->
				<br>call us directly at : 8001249999
				<br>or contact us via Email : <a href="mailto:info@FilineFine.com">info@FilineFine.com</a>
            </div>
        </div>
    </body>
</html>
