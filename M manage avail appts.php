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
<!-- <a href="Manager page.php" class="logoutb" style="float: right;"><img src="re-pict-house-base.png" alt="HomePage" height="50" width="50" style="align-items:left;"></a> -->
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
                        <td width=0.2%><a href="signout.php" class="logoutb" style="float: right;"><img src="1250678.png" alt="logout icon" height="30" width="30"></a></td>
                        <!--<th>Time</th>
                        <th>Edit</th>
                        <th>Cancel</th>-->
                    </tr>
        </table>
</span>
<?php
/*
<span style="background-color:white;">
        <table style="margin-left:10px;">
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
                        <!-- <a href="Manager page.php" class="logoutb" style="float: right;"><img src="263085.png" alt="manage appts page" height="50" width="50" style="align-items:left;"></a> -->
                        <!--<th>Time</th>
                        <th>Edit</th>
                        <th>Cancel</th>-->
                    </tr>
        </table>
</span>
*/
?>
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



    </div>
</body>

</html>
