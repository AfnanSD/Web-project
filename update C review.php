<?php
$host='localhost';
$user='root';
$pass='';
$dbname="web_project";
$database=mysqli_connect($host,$user,$pass,$dbname);
 
  if(isset($_POST['update_button']))
 { 
    $rev=$_POST["CReview"];

    $q1="UPDATE appointment SET review = $rev  where aid = ; ";
    $result=mysqli_query($database,$q1);

     $q2="INSERT INTO clinic_pictures  (PICTURES) VALUES('$cp')";
    $result=mysqli_query($database,$q2);}

   $q="UPDATE clinic_manager SET CLINIC_EMAIL='$em',CLINIC_PHONE_NUMBER=$ph,CLINIC_DESCRIPTION='$de',CLINIC_LOCATION='$loc' ";
 $result=mysqli_query($database,$q);
 
 mysqli_close($database);


if($result){
header("Location: M Manger page.php");
exit(0);
}
?>