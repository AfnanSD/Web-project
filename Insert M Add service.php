<?php
$host='localhost';
$user='root';
$pass='';
$dbname="web_project";
$database=mysqli_connect($host,$user,$pass,$dbname);

if(isset($_POST['addsboutton']))
{ 
   $NAME=$_POST["nameofservice"];
    $S_PHOTO=$_POST["photoofservice"];
   $PRICE=$_POST["costofservice"];
   $S_DE=$_POST["S_DE"];

$q="INSERT INTO clinic_service(SERVICE_NAME,SERVICE_PHOTO, SERVICE_PRICE,SERVICE_DESCRIPTION) VALUES('$NAME','$S_PHOTO',$PRICE, '$S_DE')";
$result=mysqli_query($database,$q);
if($result){
    header("Location: M Manger page.php");
    exit(0);
    }}
mysqli_close($database);

?>
<?php ?>
