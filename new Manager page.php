<!DOCTYPE html>
<?php  
    /*session_start();
    if(!isset($_SESSION['Email'])){
        header("Location: Log in page.php?error=Please Sign In again!");
    }*/

?>
<html>

<head>
    <meta charset="utf-8" content="width=device-width, initial-scale=1.0">
    <title>Manager Profile</title>
    <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
    <link rel="stylesheet" type="text/css" href="new manager page sheet.css">
</head>

<body>
    <?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'web_project';
    $database = mysqli_connect($host, $user, $pass, $dbname);
    ?>
    <table style="margin-left:10px;">
        <tr>
            <td width=20%><a href="C Edit profile.html">
                    <!--<img  height="30" width="30" alt="Edit profile" src="<?php echo (($_POST['pfp'])?$_POST['pfp']:"acc.jpg")?>">-->
                </a>My Account</td>
            <td width=15%><a href="C Add a pet.html">
                    <!--<img height="30" width="30" alt="Add a pet" src="3004543.png">-->Add a pet
                </a></td>
            <td width=15%><a href="C View pet list.html">
                    <!--<img height="30" width="30" alt="pet list" src="87971.png">-->Pet List
                </a></td>
            <td width=15%><a href="C Previous appointments.html">
                    <!-- <img height="30" width="30" alt="View previous appointments here" src="5896962.png"> -->
                    Services
                </a></td>

            <td width=10%><a href="signout.php" class="logoutb" style="float: right;"><img src="1250678.png"
                        alt="logout icon" height="30" width="30"></a></td>
            <!--<th>Time</th>
                        <th>Edit</th>
                        <th>Cancel</th>-->
        </tr>
    </table>
    <header class="logo">
        <img src="logo 1.1.jpg" alt="logo" width="500px" height="170px">
    </header>
    <div id="content">
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Appointment Request')" id="defaultOpen">Appointment
                Request</button>
            <button class="tablinks" onclick="openCity(event, 'Upcoming Appointment')">Upcoming Appointment</button>
            <button class="tablinks" onclick="openCity(event, 'Previous Appointment')">Previous Appointment</button>
        </div>

        <!-- Tab content -->
        <div id="Appointment Request" class="tabcontent">
            <?php
            $query = " SELECT PID,AID,PET_OWNER_EMAIL
            FROM  book_appointment ;";
    
            $result = mysqli_query($database, $query);
            if (mysqli_num_rows($result) != 0) {
                echo '
            <table border="1">
                <thead>
                    <tr>
                        <th>Pet ID </th>
                        <th>Appointment ID </th>
                        <th>Pet owner email</th>
                        <th colspan="3">Status</th>

                    </tr>
                </thead>
                <tbody>';
                  while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['PID'] . '</td>';
                        echo '<td>' . $row['AID'] . '</td>';
                        echo '<td><a href="mailto:'. $row['PET_OWNER_EMAIL'] .'">'. $row['PET_OWNER_EMAIL'] .'</a></td>';
                        echo '<td><button value="view"><label>View</label></button></td>';
                        echo '<td><button value="Approave"><label>Approave</label></button></td>';
                        echo '<td><button value="Deny"><label>Deny</label></button></td>'; //?
                        echo '</tr>';
                    }
                    echo '
                </tbody>
            </table>';
            } else
                echo '<p><span class="error">* There are no appointment request</span></p>';
            ?>
        </div>

        <div id="Upcoming Appointment" class="tabcontent">
            <?php
        $query = "SELECT AID,SERVICE_NAME,DATE,TIME
        FROM appointment
        WHERE STATUS = 'UPCOMING';";

        $result = mysqli_query($database, $query);
        if (mysqli_num_rows($result) != 0) {
            echo '
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
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['AID'] . '</td>';
                echo '<td>' . $row['SERVICE_NAME'] . '</td>';
                echo '<td>' . $row['DATE'] . '</td>';
                echo '<td>' . $row['TIME'] . '</td>';
                echo '<td><button value="view"><label>View</label></button></td>'; //?
                echo '</tr>';
            }
            echo '
            </tbody>
        </table>';
        } else
            echo '<p><span class="error">* There are no upcoming appointments</span></p>';
        ?>
        </div>

        <div id="Previous Appointment" class="tabcontent">
            <?php
        $query = "SELECT AID,SERVICE_NAME,DATE,TIME
                    FROM appointment
                    WHERE STATUS = 'PREVIOUS';";

        $result = mysqli_query($database, $query);
        if (mysqli_num_rows($result) != 0) {
            echo '
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
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['AID'] . '</td>';
                echo '<td>' . $row['SERVICE_NAME'] . '</td>';
                echo '<td>' . $row['DATE'] . '</td>';
                echo '<td>' . $row['TIME'] . '</td>';
                echo '<td><button value="view"><label>View</label></button></td>'; //?
                echo '</tr>';
            }
            echo '
            </tbody>
            </table>';
        } else
            echo '<p><span class="error">* There are no previous appointments</span></p>';
        ?>
        </div>
        <script>
            function openCity(evt, Name) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(Name).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>
    </div>
    <footer class="contact">
        Let us help you
        our contact info--------change this to database:
        <br>call us directly at : 8001249999
        <br>or contact us via Email :<a href="mailto:info@FilineFine.com">info@FilineFine.com</a>
    </footer>
    </div>
</body>

</html>