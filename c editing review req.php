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
         
         
        $app_id = $_SESSION['reviewuseredit'];

        $review =  $_REQUEST['editedreview'];
         
        // Performing insert query execution
        // here our table name is college
        //$sql2 = "INSERT INTO appointment(AID,SERVICE_NAME,DATE,TIME,STATUS)  VALUES ('".$app_id."','".$service."','".$apptday."','".$apptime."','".$status."');";
        $sql = "UPDATE appointment SET REVIEW ='".$review."' WHERE AID = '".$app_id."';";

      mysqli_query($database,$sql);
      //mysqli_query($database,$sql2);
      header("Location: C previous appts.php");
      exit();
        // Close connection
    
        ?>