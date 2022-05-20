<?php
session_start();
$host='localhost';
$user='root';
$pass='';
$dbname="web_project";
$database=mysqli_connect($host,$user,$pass,$dbname);

$e22=mysqli_real_escape_string($database,$_SESSION["se"]);
echo $e22;

if(isset($_POST['add_pet_button']))
{ 
   $add_pet_name=$_POST["add_pet_name"];
   $add_pet_imge=$_POST["add_pet_imge"];
   $add_pet_date=$_POST["add_pet_date"];
   $add_pet_breed=$_POST["add_pet_breed"];
 
   $add_pet_gender=$_POST["add_pet_gender"];
   $add_pet_status=$_POST["add_pet_status"];
   $add_pet_vac=$_POST["add_pet_vac"];
   $add_pet_medi=$_POST["add_pet_medi"];

$q="INSERT INTO pet(PET_NAME,DATE_OF_BIRTH,PET_GENDER,BREED,SPAYED_OR_NEUTERED_STATUS,PET_PHOTO,PET_OWNER_EMAIL) VALUES('$add_pet_name','$add_pet_date','$add_pet_gender','$add_pet_breed','$add_pet_status','$add_pet_imge','$e22')";
$result=mysqli_query($database,$q); 

$q = "SELECT PID from pet WHERE ='$' ";
$result=mysqli_query($database,$q);
 while($row=mysqli_fetch_assoc($result))
{
    $pn=$row['PET_NAME'];

$q3="INSERT INTO pet_medical_history(MEDICAL_HISTORY,PID) VALUES('$add_pet_medi',)";
$result=mysqli_query($database,$q3);

$q4="INSERT INTO pet_vaccination_list(VACCINATION_LIST,PID)VALUES('$pv2',)";
$result=mysqli_query($database,$q4);


 mysqli_close($database);

 if($result){
    header("Location: Costumer page.php");
    exit(0);
    }
}

 ?>