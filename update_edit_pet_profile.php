 <?php 
$host='localhost';
$user='root';
$pass='';
$dbname="web_project";
$database=mysqli_connect($host,$user,$pass,$dbname);

 $pet_id3=mysqli_real_escape_string($database,$_POST['idid']);
///$q = "SELECT * from pet WHERE PID='$pet_id3' ";
//$result=mysqli_query($database,$q);
 
if(isset($_POST['submit_edit_pet_profile']))
{ 
   $pn2=$_POST["pet_name2"];
   $pp2=$_POST["pet_image2"];
   $pb2=$_POST["pet_breed2"];
   $pdb2=$_POST["pet_date_of_birth2"];
   $pg2=$_POST["pet_gender2"];
   $ps2=$_POST["pet_status2"];
   $pv2=$_POST["pet_Medical_vac"];
   $pmh2=$_POST["pet_Medical_record2"];
//echo  "UPDATE pet SET PET_NAME='$pn2' ,DATE_OF_BIRTH='$pdb2', PET_GENDER='$pg2',  BREED='$pb2', SPAYED_OR_NEUTERED_STATUS='$ps2',PET_PHOTO='$pp2'  WHERE PID='$pet_id3' ";

  //, MEDICAL_HISTORY='$pmh2' VACCINATIONS_LIST='$pv2'
 $q="UPDATE pet SET PET_NAME='$pn2' ,DATE_OF_BIRTH='$pdb2', PET_GENDER='$pg2',  BREED='$pb2', SPAYED_OR_NEUTERED_STATUS='$ps2',PET_PHOTO='$pp2'  WHERE PID='$pet_id3' ";
  $result=mysqli_query($database,$q);

  $q2="UPDATE pet_medical_history SET MEDICAL_HISTORY='$pmh2' WHERE PID='$pet_id3' ";
  $result=mysqli_query($database,$q2);

  $q2="UPDATE pet_vaccination_list SET VACCINATION_LIST='$pv2' WHERE PID='$pet_id3' ";
  $result=mysqli_query($database,$q2);
 
mysqli_close($database);
if($result){
header("Location: Costumer page.php");
exit(0);
}}
?>