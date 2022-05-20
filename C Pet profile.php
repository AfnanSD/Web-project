<?php 
$host='localhost';
$user='root';
$pass='';
$dbname="web_project";
$database=mysqli_connect($host,$user,$pass,$dbname);

 /*$pet_id=mysqli_real_escape_string($database,$_GET['view']);
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
}*/

mysqli_close($database);

?> 

<!DOCTYPE html>
<html>
	<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
   <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
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
<table style="margin-top: -9px; margin-left: -7px; width: 105%; border-collapse:collapse; background-color:white" >
                    <tr>
                        <td width=20.6% height: 30px;><a style="text-decoration: none; color: #44475c;" href="C profile.php">My Account</a></td>
                        <td width=15.6%  height: 30px; background-color: #DCABB3;><a   style="text-decoration: none; color: #44475c;" href="C Add a pet.php">Add a pet</a></td>
                        <td width=15.6%  height: 30px; ><a   style="text-decoration: none; color: #44475c;"href="C View pet list.php">Pet List</a></td>
                        <td width=15.6%  height: 30px; ><a   style="text-decoration: none; color: #44475c;"href="#"> Services</a></td>
                        <td width=15.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="C Previous appointments.html">View previous appointments</a></td>
                        <td width=10.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="signout.php" class="logoutb" style="float: right;"><img src="1250678.png" alt="logout icon" height="30" width="30"></a></td>
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
               
               

