<!DOCTYPE html>
<html>
	<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
   <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
   <title>Add Service</title>
  </head>
	<body>
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

<form action="Add service.php" method="POST" >
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

$q2="INSERT INTO clinic_service(SERVICE_NAME,SERVICE_PHOTO,SERVICE_DESCRIPTION, SERVICE_PRICE,CLINIC_MANAGER_EMAIL) VALUES('$NAME','$S_PHOTO','$S_DE','$PRICE','MANAGER@GMAIL.COM')";
$result=mysqli_query($database,$q2);
//if($result){
header("Location:Manager page.php");
   // exit(0);
    //}
}
mysqli_close($database);

?>