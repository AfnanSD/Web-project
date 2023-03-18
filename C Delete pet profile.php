 <?php 
$host='localhost';
$user='root';
$pass='';
$dbname="web_project";
$database=mysqli_connect($host,$user,$pass,$dbname);

 $pet_id4=mysqli_real_escape_string($database,$_GET['delete']);
 $q="DELETE FROM pet WHERE PID='$pet_id4' ";
 $result=mysqli_query($database,$q);
mysqli_close($database);
if($result){
header("Location: Costumer page.php");
exit(0);
}
 
?>