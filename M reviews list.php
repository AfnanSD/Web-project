<!--review all reviews-->
<?php  
    session_start();
    if(!isset($_SESSION['Email'])){
        header("Location: Log in page.php?error=Please Sign In again!");
    }

?>  
<!DOCTYPE html>
<html>
    <head> 
       
	<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
    <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
    <link rel="stylesheet" type="text/css" href="C Grid sheet.css">
        <title>List of reviews</title>
    </head>

    </head>
    <body>
    
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
                        <td width=0.2%><a href="signout.php" class="logoutb" style="float: right;"><img src="1250678.png" alt="logout icon" height="30" width="30"></a></td>
                        <!--<th>Time</th>
                        <th>Edit</th>
                        <th>Cancel</th>-->
                    </tr>
        </table>
</span>

        <img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
        <div>

        <h1> From our custmers:<h1>
        <h4>we love when we get reviwed ,because it makes us better! </h4>
        
        <?php
            $host = "localhost";
            $user = "root";
            $pass = "";
            $dbname = "web_project";
            $database=mysqli_connect($host,$user,$pass,$dbname);
            

            $N=" ";
            $q = "SELECT REVIEW,PET_OWNER_EMAIL FROM appointment,book_appointment WHERE appointment.AID=book_appointment.AID and REVIEW is not null ";
            $result=mysqli_query($database,$q);
            $nn= mysqli_num_rows($result);
            if($nn!=0){
                echo'
                <table border="1">
                <thead>
                    <tr>
                        <th>Pet owner email</th>
                        <th>Review</th>
                    </tr>
                </thead>
                <tbody>';
                while($row=mysqli_fetch_assoc($result)){
                    ////<a href="mailto:'.$email.'">'.$email.'</a>'
                    //echo '<br>or contact us via Email : <a href="mailto:'.$email.'">'.$email.'</a>';
                    echo '<tr>';
                    echo '<td><a href="mailto:"'. $row['PET_OWNER_EMAIL'] .'">'.$row['PET_OWNER_EMAIL'].'</td>';
                    echo '<td>'. $row['REVIEW'] .'</td>';
                    echo '</tr>';
                }
                echo'
                </tbody>
                </table>';
            }
            else{
                //no review msg
                echo '<p><span class="error">* There are no reviews</span></p>';
            }
            mysqli_close($database);

        ?>
        <br><br>
       
        </div>
    </body>
   
</html>
