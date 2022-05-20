<!DOCTYPE html>
<html>
<head>
    <title>Set Available Appointments</title>
    <meta charset="ufc-8" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
    <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
</head>

<body>
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
                    while($row=mysqli_row_assoc($result)){
                        $RR=$row['SERVICE_NAME'];
                        if($RR !=$N){

                        echo  '<label>
                        <input type="radio" name="service" value="'.$RR.'">'.$RR.'</label>';
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