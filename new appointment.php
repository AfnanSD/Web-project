<?php

        session_start();
        
    if(!isset($_SESSION['Email'])){
        header("Location: Log in page.php?error=Please Sign In again!");
    }

 
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
         
        // Taking all 5 values from the form data(input)
        $service =  $_REQUEST['sService'];
        $apptday = $_REQUEST['apptDay'];
        $apptime =  $_REQUEST['apptime'];
        $status = "AVAILABLE";
         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO appointment(SERVICE_NAME,DATE,TIME,STATUS)  VALUES ('".$service."','".$apptday."','".$apptime."','".$status."');";
        echo $sql;
        
      mysqli_query($database,$sql);
      header("Location: M manage avail appts.php");
      exit();
        // Close connection
    
        ?>
