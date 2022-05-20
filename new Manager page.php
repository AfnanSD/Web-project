<!DOCTYPE html>
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
    <header class="logo">
        <img src="logo 1.1.jpg" alt="logo" width="500px" height="170px">
        <a href="Felinfine main page.html" class="logoutb" style="float: right;"><img src="logout icon.png" alt="logout icon" height="50" width="50"></a>
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
        <h3>table</h3>
        <p>the table</p>
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