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
<body><div>
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
               
               

