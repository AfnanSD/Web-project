
<?php 
$host='localhost';
$user='root';
$pass='';
$dbname="web_project";
$database=mysqli_connect($host,$user,$pass,$dbname);
 
$q = "SELECT * from clinic_manager";
$result=mysqli_query($database,$q);

while($row=mysqli_fetch_assoc($result))
{
    $de=$row['CLINIC_DESCRIPTION'];
    $loc=$row['CLINIC_LOCATION'];
    $ph=$row['CLINIC_PHONE_NUMBER'];
    $em=$row['CLINIC_EMAIL'];
}
$q2 = "SELECT PICTURES from clinic_pictures";
$result=mysqli_query($database,$q2);

while($row=mysqli_fetch_assoc($result))
{
    $cp=$row['PICTURES'];
}
mysqli_close($database);?>

<!DOCTYPE html>
<html>
	<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
   <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
   <title>Edit about us</title>
 
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
	<a href="Manager page.php" class="logoutb" style="float: right;"><img src="re-pict-house-base.png" alt="HomePage" height="50" width="50" style="align-items:left;"></a>
        <img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
 <div>

 <h1>Edit about us information</h1>
    <form action="update M Edit about us.php" method="POST" enctype="multipart/form-data">   
    <p> Phone number:<br><input  type="text" name="PHONE_CLINIC" value="<?php echo $ph ;?>"></p> 
    <p> Email:<br><input  type="text" name="EMAIL_CLINIC" value="<?php echo $em ;?>"></p> 
    <p>Description:<br><textarea name="DES1"><?php echo $de; ?></textarea></p> 
    <p>Location:<br><textarea name="LOC"><?php echo $loc; ?></textarea></p> 
    <p>Picture:<br>
  <img src="<?php echo $cp;?>" alt="our store" height="190"	width="190"	> <br>
change pictures to:
    <input  type="file" name="PIC_CLINIC" multiple accept="image/*"></p> 
    <br><button id="submit100" name="update_button"> Edit </button>
    
</form></div> 
 

 

    </body>
</html>
