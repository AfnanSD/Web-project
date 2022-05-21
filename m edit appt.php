<?php  
    session_start();
    if(!isset($_SESSION['Email'])){
        header("Location: Log in page.php?error=Please Sign In again!");
    }

?>  
<!DOCTYPE html>
<html>
<head>
    <title>Edit Appointment</title>
    <meta charset="ufc-8" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
    <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
</head>

<body>
<a href="M manage avail appts.php" class="logoutb" style="float: right;"><img src="263085.png" alt="manage appts page" height="50" width="50" style="align-items:left;"></a>
    <div>
    <h1>Edit available appointment:</h1>
    <hr>


    <form method="post" action="m editing appointment.php">

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

            if(!empty($_GET)){
                $aid = mysqli_real_escape_string($database,$_GET['mdetail']);
                $_SESSION['meditdetail'] = $aid;
            }
            $app_id = $_SESSION['meditdetail'];


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
    <a href="Manager page.html" class="buttonlike">Return to personal page</a>
    </div>
</body>
</html>
