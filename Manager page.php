<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" content="width=device-width, initial-scale=1.0">
        <title>Manager Profile</title>
        <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
        <link rel="stylesheet" type="text/css" href="M Grid sheet.css">

        <style>
    
    td:hover{ color: rgb(100, 100, 121);}

</style>
</head>

<body>
    <?php
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$dbname = 'web_project';//2
			$database = mysqli_connect($host,$user,$pass,$dbname);
		?>
        <!--<a href="PreviousApps.html" class="button">Previous Appointments</a>-->
        <span style="background-color:white;">
        <table style="margin-left:10px;">
                    <tr>
                        <td width=10.2%><a href="AB0UT US.php">View About us</a></td>
                        <td width=10.2%><a href="M Edit about us.php"><!--<img height="30" width="30" alt="Add a pet" src="3004543.png">-->Edit About us</a></td>
                        <td width=10.2%><a href="M Add Service.php"><!--<img height="30" width="30" alt="pet list" src="87971.png">-->Add service</a></td>
                        <td width=10.2%><a href="M View appointments request.html"><!-- <img height="30" width="30" alt="View previous appointments here" src="5896962.png"> -->View Requests List</a></td>
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
        <div class="container">
        <div class="logo">
            <img src="logo 1.1.jpg" alt="logo" width="500px" height="170px">
            <!--<a href="Felinfine main page.html" class="logoutb" style="float: right;"><img src="logout icon.png" alt="logout icon" height="50" width="50"></a>-->
        </div>
        <!--
        <div class="profile"  id="link">
            <a href="M Manage available appointments.html" style="font-size: larger;">Manage available appointments</a>
        </div>
        -->
        <!--
        <div class="add"  id="link">
            <a href="M View appointments request.html" style="font-size: larger;">View appointment requests</a>
        </div>
        -->
<!--
            <div class="list">
                <nav><p style="font-size: large;">About us</p>
            <ul>
<li>
    <div class="li2" ><a href="AB0UT US.php" > View about us</a></div>
</li>
<li>
    <div class="li2" ><a href="M Edit about us.php" > Edit about us</a></div>
</li>
            </ul>
                </nav>
            </div>
        -->
            <div class="upcoming"><!--style="width:136%;"-->
                <h3>Upcoming appoitments:</h3>
                    <?php
                        $query = "SELECT AID,SERVICE_NAME,DATE,TIME
                                    FROM appointment
                                    WHERE STATUS = 'UPCOMING';";
                        
                        $result = mysqli_query($database,$query);
                        if(mysqli_num_rows($result)!=0){
                            echo'
                            <table border="1">
                            <thead>
                                <tr>
                                    <th>Appointment ID</th>
                                    <th>Service</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>';
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<tr>';
                                    echo '<td>'. $row['AID'] .'</td>';
                                    echo '<td>'. $row['SERVICE_NAME'] .'</td>';
                                    echo '<td>'. $row['DATE'] .'</td>';
                                    echo '<td>'. $row['TIME'] .'</td>';
                                    echo '<td><button value="view"><label>View</label></button></td>';//?
                                echo '</tr>';
                            }
                            echo'
                            </tbody>
                            </table>';
                        }
                        else
                            echo '<p><span class="error">* There are no upcoming appointments</span></p>';
                    ?>
                <!--
                <table border="1">
                    <thead>
                        <tr>
                            <th>N</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <!-s- imaginary -s->
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Vaccinations</td>
                            <td>1-3-2022</td>
                            <td>1:00 to 2:00</td>
                            <td><a href="M Upcoming appointment details.html" class="buttonlike">View</a> </td>
                        </tr>
                    </tbody>
                </table>
-->
            </div>
            <div class="requests"><!--style="width:136%;"-->
                <!--change previous to request list?-->
                <h3>Previous appoitments:</h3>
                <?php
                        $query = "SELECT AID,SERVICE_NAME,DATE,TIME
                                    FROM appointment
                                    WHERE STATUS = 'PREVIOUS';";
                        
                        $result = mysqli_query($database,$query);
                        if(mysqli_num_rows($result)!=0){
                            echo'
                            <table border="1">
                            <thead>
                                <tr>
                                    <th>Appointment ID</th>
                                    <th>Service</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>';
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<tr>';
                                    echo '<td>'. $row['AID'] .'</td>';
                                    echo '<td>'. $row['SERVICE_NAME'] .'</td>';
                                    echo '<td>'. $row['DATE'] .'</td>';
                                    echo '<td>'. $row['TIME'] .'</td>';
                                    echo '<td><button value="view"><label>View</label></button></td>';//?
                                echo '</tr>';
                            }
                            echo'
                            </tbody>
                            </table>';
                        }
                        else
                            echo '<p><span class="error">* There are no previous appointments</span></p>';
                    ?>
                    <!--
                <table border="1">
        				<tr>
						<th>Service</th>
            			<th>Day</th>
            			<th>Veterinary</th>
            			<th>Time</th>
            			<th>Details</th>
        				</tr>
        				<tr>
						<td>Grooming</td>
            			<td>Thursday</td>
            			<td>Dr. Sara</td>
            			<td>14:15</td>
            			<td><a href="M Previous appointment details.html" class="buttonlike">View</a></td>
        				</tr>
    			</table>
                    -->
            </div>
            <!--
            <div class="previous"id="link" >
                <a href="M Add service.html"style="font-size: larger;" >Add service</a>
            </div>
            -->
            <div class="contact">
                Let us help you
				<!--our contact info--------change this to database:-->
				<br>call us directly at : 8001249999
				<br>or contact us via Email :<a href="mailto:info@FilineFine.com">info@FilineFine.com</a>
            </div>
        </div>
    </body>
</html>

