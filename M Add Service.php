<?php  
    session_start();
    if(!isset($_SESSION['Email'])){
        header("Location: Log in page.php?error=Please Sign In again!");
    }

?> 
<!DOCTYPE html>
<html>
	<head>
   <meta charset="utf-8">
   
   <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
   
   <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
   <title>Add Service</title>
  </head>
	<body>
   <span style="background-color:white;">
        <table style="margin-left:10px; background-color:white;">
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
    <!--<a href="Manager page.php" class="logoutb" style="float: right;"><img src="re-pict-house-base.png" alt="HomePage" height="50" width="50" style="align-items:left;"></a>-->
      <img src="logo 1.1.jpg" alt="logo" class="aboutUsImage"> 

      <div>
<h1>Add a service</h1>

<fieldset>
    <legend>Please add a service</legend>
   <table border="1">
      <thead>
         <tr style="background-color: antiquewhite;">
            <th>Name</th>
<th>Description</th>
<th>Cost</th>
<th>photo</th>
      </tr></thead>
      <tbody>

<form action="M Add Service.php" method="POST" >
   <tr>
   <th><input type="text" name="nameofservice" placeholder="write your service's name"required></th>
   <th><textarea name="S_DE" placeholder="write your service's description"required></textarea> </th>
   <th><input type="text" name="costofservice" placeholder="write your service's cost"required></th>
   <th><input type="file" name="photoofservice"></th>
   </tr>
      </tbody>
   </table><br>
   <input type="submit" name="addsboutton" value="Add">
</form>
     </div>
 </fieldset>

    </body>
   
    </html>
    <?php
$host='localhost';
$user='root';
$pass='';
$dbname='web_project';
$database=mysqli_connect($host,$user,$pass,$dbname);

if(isset($_POST['addsboutton']))
{ 
   $NAME=$_POST["nameofservice"];
    $S_PHOTO=$_POST["photoofservice"];
   $PRICE=$_POST["costofservice"];
   $S_DE=$_POST["S_DE"];
   //echo $NAME.$S_PHOTO.$PRICE;

$q2="INSERT INTO clinic_service(SERVICE_NAME,SERVICE_PHOTO,SERVICE_DESCRIPTION, SERVICE_PRICE,CLINIC_MANAGER_EMAIL) VALUES('$NAME','$S_PHOTO','$S_DE',$PRICE,'MANAGER@GMAIL.COM')";
$result=mysqli_query($database,$q2);
//if($result){
header("Location:Manager page.php");
   // exit(0);
    //}
}
mysqli_close($database);

?>
