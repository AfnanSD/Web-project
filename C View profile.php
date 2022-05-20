<?php 
session_start();
$host='localhost';
$user='root';
$pass='';
$dbname="web_project";
$database=mysqli_connect($host,$user,$pass,$dbname);
 $owner_e4=mysqli_real_escape_string($database,$_SESSION['se']);
$q = "SELECT * from pet_owner WHERE OWNER_EMAIL='$owner_e4' ";
$result=mysqli_query($database,$q);
  while($row=mysqli_fetch_assoc($result))
{
    $oe4=$row['OWNER_EMAIL'];
    $op4=$row['OWNER_PHONE_NUMBER'];
    $of4=$row['FIRST_NAME'];
    $ol4=$row['LAST_NAME'];
    $oph4=$row['OWNER_PHOTO'];
    $og4=$row['OWNER_GENDER'];
    $opa4=$row['OWNER_PASSWORD'];
 
 if ($oph4!=" ");
 else 
 $oph4='acc.jpg';
 mysqli_close($database);

}
    ?>
<!DOCTYPE html>
<html>
	<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
   <title>Edit profile</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
 </head>

 <body>
 <img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
     <div>
         <h1>Your profile:</h1>
		<fieldset>
			<legend>Personal info:</legend>
         <img src="<?php echo $oph4; ?>" alt="account image" height="85" width="85"><br>
   			 <table border="1" align="center" style="width: 85%;">
  <tbody>               
<tr>
<th><?php echo $of4;?></th>
 <th><?php echo $ol4;?></th>
<th><?php echo $oe4;?></th>
<th><?php echo $og4;?></th>
 <th><?php echo $op4;?></th>
<th><?php echo $opa4;?></th> 
 </tr>
  
 </tbody> 
<thead>
  <tr style="background-color: #faebd7;">
        <th>FNAME:</th>
        <th>LNAME:</th>
         <th>EMAIL</th>
         <th>GENDER</th>
         <th>PHONE</th>
        <th>PASSWORD</th>

	</tr>

</thead>

              </table><br>
                <br>
              <br>
              </fieldset>
     </div>      
 </body>
</html>