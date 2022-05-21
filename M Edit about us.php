
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
