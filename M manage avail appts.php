<?php  
    session_start();
    if(!isset($_SESSION['Email'])){
        header("Location: Log in page.php?error=Please Sign In again!");
    }

?>  
<!DOCTYPE html>
<html>
<head>
    <title>Manage Available Appointments</title>
    <meta charset="ufc-8" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
    <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
</head>

<body>
<a href="Manager page.php" class="logoutb" style="float: right;"><img src="re-pict-house-base.png" alt="HomePage" height="50" width="50" style="align-items:left;"></a>

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
            $aid = $row['AID'];
            echo "<td><a href='view details.php?mdetail=".$aid."'>VIEW</a></td>";
            echo "<td><a href='m del appt.php?mdetail=".$aid."'>DELETE</a></td>";
            echo "<td><a href='m edit appt.php?mdetail=".$aid."'>EDIT</a></td>";
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

<a href="M set available appts.php" class="buttonlike">Set available appointenmts</a>
    </div>
</body>

</html>
