<?php
session_start();
$host='localhost';
$user='root';
$pass='';
$dbname="web_project";
$database=mysqli_connect($host,$user,$pass,$dbname);

$e22=mysqli_real_escape_string($database,$_SESSION['Email']);

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

$q="INSERT INTO pet(PET_NAME,DATE_OF_BIRTH,PET_GENDER,BREED,SPAYED_OR_NEUTERED_STATUS,PET_PHOTO,PET_OWNER_EMAIL,MEDICAL_HISTORY,VACCINATION_LIST) 
VALUES('$add_pet_name','$add_pet_date','$add_pet_gender','$add_pet_breed','$add_pet_status','$add_pet_imge','$e22','$add_pet_medi','$add_pet_vac')";
$result=mysqli_query($database,$q); 
 mysqli_close($database);

 if($result){
    header("Location: Costumer page.php");
    exit(0);
    }
}

 ?>
