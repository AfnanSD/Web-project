<?php 
session_start();
$host='localhost';
$user='root';
$pass='';
$dbname="web_project";
$database=mysqli_connect($host,$user,$pass,$dbname);
 $owner_e5=mysqli_real_escape_string($database,$_SESSION['Email']);
 $q="DELETE FROM pet_owner WHERE OWNER_EMAIL='$owner_e5' ";
 $result=mysqli_query($database,$q);
mysqli_close($database);
if($result){
header("Location: firstpage.php");
 exit(0);
}
?>
