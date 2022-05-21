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
    <a href="Manager page.php" class="logoutb" style="float: right;"><img src="re-pict-house-base.png" alt="HomePage" height="50" width="50" style="align-items:left;"></a>
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
