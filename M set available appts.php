<?php  
    session_start();
    if(!isset($_SESSION['Email'])){
        header("Location: Log in page.php?error=Please Sign In again!");
    }

?>  
<!DOCTYPE html>
<html>
<head>
    <title>Set Available Appointments</title>
    <meta charset="ufc-8" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
    <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
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
                        <td width=0.2%><a href="signout.php" class="logoutb" style="float: right;"><img src="1250678.png" alt="logout icon" height="30" width="30"></a></td>
                        <!--<th>Time</th>
                        <th>Edit</th>
                        <th>Cancel</th>-->
                    </tr>
        </table>
</span>
<img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
    <div>
    <h1>Set available appointments:</h1>
    <hr>


    <form method="post" action="new appointment.php">

        <!--imagenary values, might link it to the docs database later-->
        <p>
            <strong>Service:</strong>
            <br>
            <?php

            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $dbname = 'web_project';
            $database = mysqli_connect($host,$user,$pass,$dbname);


                $q = "SELECT SERVICE_NAME FROM clinic_service ";

                $result=mysqli_query($database,$q);

                $nn= mysqli_num_rows($result);

                $N = "";

                if($nn!=0){
                    while($row = mysqli_fetch_assoc($result)){
                        $RR=$row['SERVICE_NAME'];
                        if($RR !=$N){

                        echo  '<label>
                        <input type="radio" name="sService" value="'.$RR.'">'.$RR.'</label>';
                    }
                }
            
            }
            echo "<br>";
            ?>

        <p>
            <label>Day: <input type="date" name="apptDay"></label>
        </p>

        <p>
            <label>Time:
                <input type="time" name="apptime">
            </label>
        </p>
        <input type="submit" value="Submit"> <br>
    </form>
    <br>
    </div>
</body>
</html>
