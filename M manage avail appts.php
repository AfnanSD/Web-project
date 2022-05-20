<!DOCTYPE html>
<html>
<head>
    <title>Manage Available Appointments</title>
    <meta charset="ufc-8" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
    <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
</head>

<body>
    <img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
    <div>
    <h1>Manage availabe appointments:</h1>
<table align="center" border="1" style="width: 100%;" class="availappts">
<thead>
    <tr style="background-color:#faebd7 ; color: #695e59 ;">
        <!--/*63452A-FAE8E0/*-->
        <th>Day </th>
        <th>Service</th>
        <th>Time</th>
        <th colspan="3">Manage</th>
    </tr>
</thead>

    <?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'web_project';
    $database = mysqli_connect($host,$user,$pass,$dbname);

    //sql query to display all student_address table based on student id using inner join
    $sql = "SELECT date,SERVICE_NAME,AID,time from appointment where `STATUS`= 'AVAILABLE';";
    $result = mysqli_query($database,$sql);
    //display data on web page
    echo ' <tbody>';
    while($row = mysqli_fetch_assoc($result)){
            echo "<tr class='availappts'>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['SERVICE_NAME'] . "</td>";
            echo "<td>".$row['time']."</td>";
            echo "<td><a href='view details.php?'>VIEW</a>";
            echo "<td><a href='m del appt.php?'>DELETE</a>";
            echo "<td><a href='m edit appt.php'>EDIT</a>";
        //MAYBE THE TYPE INPUT IS UNNEC
        //-----------------------------
            echo "</tr>";
            
    }
    echo'</tbody>';
    
    echo "<br>";
    
    
    
    
    //close the connection
    

    ?>


</table>
<br>
<a href="Manager page.html" class="buttonlike">Return to personal page</a>
<a href="M Set available appointments.html" class="buttonlike">Set available appointenmts</a>
    </div>
</body>

</html>