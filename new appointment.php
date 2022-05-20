<?php
 
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
        $service =  $_REQUEST['service'];
        $apptday = $_REQUEST['apptDay'];
        $apptime =  $_REQUEST['apptime'];
        $status = "AVAILABLE";
         
        // Performing insert query execution
        // here our table name is college
        $sql = 'INSERT INTO appointment(Service_name,date,time,status)  VALUES ("$service","$apptday","$apptime","$status")';

        if (!mysqli_query($sql,$database))
  
            die('Error: ' . mysqli_error());
  
        echo "1 record added";
         
        // Close connection
    
        ?>