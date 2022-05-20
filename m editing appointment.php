<?php

        session_start();
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'web_project';
        $database = mysqli_connect($host,$user,$pass,$dbname);
         
        // Check connection
        if($database === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
         
        $app_id = $_SESSION["editdetail"];
        //$sql = "UPDATE appointment SET SERVICE_NAME =".'"$service"'.",DATE = ".'"$apptday"'.",TIME=".'"$apptime"'."where AID = ".'"$_SESSION["editdetail"]"'.";";
        //$sql1 = "DELETE FROM appointment WHERE AID ="."$app_id".";";

        $service =  $_REQUEST['sService'];
        $apptday = $_REQUEST['apptDay'];
        $apptime =  $_REQUEST['apptime'];
        $status = "AVAILABLE";
         
        // Performing insert query execution
        // here our table name is college
        //$sql2 = "INSERT INTO appointment(AID,SERVICE_NAME,DATE,TIME,STATUS)  VALUES ('".$app_id."','".$service."','".$apptday."','".$apptime."','".$status."');";
        $sql = "UPDATE appointment SET SERVICE_NAME ='".$service."', DATE = '".$apptday."',TIME='".$apptime."' WHERE AID = '".$_SESSION["editdetail"]."';";

      mysqli_query($database,$sql);
      //mysqli_query($database,$sql2);
      header("Location: M manage avail appts.php");
      exit();
        // Close connection
    
        ?>