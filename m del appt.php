<?php

          
         
        session_start();
        if(!isset($_SESSION['Email'])){
            header("Location: Log in page.php?error=Please Sign In again!");
        }
    
      
        // Check connection
        if($database === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

        $database = mysqli_connect("localhost", "root", "", "web_project");
            if(!empty($_GET)){
                $aid = mysqli_real_escape_string($database,$_GET['mdetail']);
                $_SESSION['mvdeldetail'] = $aid;
        }
            $app_id = $_SESSION['mvdeldetail'];
         
        // Taking all 5 values from the form data(input)
         
        // Performing insert query execution
        // here our table name is college
        $sql = "DELETE FROM appointment WHERE AID ="."$app_id".";";
        //DELETE FROM MyGuests WHERE id=3

        
      mysqli_query($database,$sql);
      header("Location: M manage avail appts.php");
      exit();
        // Close connection
    
        ?>
