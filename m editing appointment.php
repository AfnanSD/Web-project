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


        if(!empty($_GET)){
          $aid = mysqli_real_escape_string($database,$_GET['mdetail']);
          $_SESSION['mveditdetail'] = $aid;
  }
      $app_id = $_SESSION['mveditdetail'];
         
         
        
    
        $service =  $_REQUEST['sService'];
        $apptday = $_REQUEST['apptDay'];
        $apptime =  $_REQUEST['apptime'];
        $status = "AVAILABLE";
         
      


      $AID2=$_SESSION["meditingdetail"];
      
  
      $sql = 'UPDATE appointment SET SERVICE_NAME ="'.$service.'", DATE ="'.$apptday.'", TIME="'.$apptime.'" WHERE AID ="'.$AID2.'";';

       mysqli_query($database,$sql);


      header("Location: M manage avail appts.php");
      exit();
        // Close connection
    
        ?>
