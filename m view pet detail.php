<?php 
$host='localhost';
$user='root';
$pass='';
$dbname="web_project";
$database=mysqli_connect($host,$user,$pass,$dbname);

 $pet_id=mysqli_real_escape_string($database,$_GET['view']);
$q = "SELECT * from pet WHERE PID='$pet_id' ";
$result=mysqli_query($database,$q);

 while($row=mysqli_fetch_assoc($result))
{
    $pn=$row['PET_NAME'];
    $pdb=$row['DATE_OF_BIRTH'];
    $pg=$row['PET_GENDER'];
    $pb=$row['BREED'];
    $ps=$row['SPAYED_OR_NEUTERED_STATUS'];
    $pp=$row['PET_PHOTO'];
    $pi=$row['PID'];
    $pmh=$row['MEDICAL_HISTORY'];
    $pv=$row['VACCINATION_LIST'];
}

mysqli_close($database);

?> 

<!DOCTYPE html>
<html>
	<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
   <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
   <title>Pet Details</title>
   <style>
  .petprofilepic {
  flex: none;
  width: 70px;
  height: 70px;
  border-radius: 50%;
  object-fit: cover;
}     

   </style>
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
<div>
<h1>Your pet's profile:</h1>
		<fieldset>
			<legend>Pet's profile</legend>
<img class="petprofilepic"src="<?php echo $pp?>" alt="pet pic" height="80" width="80">
  			 <table border="1">
                <tbody>               
                    <tr>
                     <th><?php echo $pi?></th>
                     <th><?php echo $pn?></th>
                     <th><?php echo $pb?></th>

                     <th><?php echo $pdb?></th>
                     <th><?php echo $pg?></th>
                     <th><?php echo $ps?></th>

                     <th><?php echo $pmh?></th>
                     <th><?php echo $pv?></th>
                      
                    
                     </tr></tbody> 
                    <thead>
                        <tr style="background-color: antiquewhite;">
                        <th>ID:</th>
                            <th>Name:</th>
                            <th>Breed:</th>

                            <th>Date of birth:</th>
                            <th>Gender:</th>
                            <th>Status</th>

                             <th> Medical record:</th>
                            <th> vaccinated:</th>

                    </thead> 
                </table>       

  </fieldset></div>
       </body> 
        </html>
               
               

    


