
<?php
$host='localhost';
$user='root';
$pass='';
$dbname="web_project2";
$database=mysqli_connect($host,$user,$pass,$dbname);
 
  if(isset($_POST['update_button']))
 { 
    $loc=$_POST["LOC"];
    $de=$_POST["DES1"];
    $ph=$_POST["PHONE_CLINIC"];
    $em=$_POST["EMAIL_CLINIC"];
    $cp=$_FILES["PIC_CLINIC"]['name'];
    $q1="DELETE FROM CLINIC_PICTURE ";
    $result=mysqli_query($database,$q1);

     $q2="INSERT INTO CLINIC_PICTURE  (CLINIC_PICTURE2) VALUES('$cp')";
    $result=mysqli_query($database,$q2);}

   $q="UPDATE clinic_manager SET CLINIC_EMAIL='$em',CLINIC_PHONE_NUMBER=$ph,CLINIC_DESCRIPTION='$de',CLINIC_LOCATION='$loc' ";
 $result=mysqli_query($database,$q);
 
 mysqli_close($database);


if($result){
header("Location: M Manger page.php");
exit(0);
}
?>
