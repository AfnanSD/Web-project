<?php
$host='localhost';
$user='root';
$pass='';
$dbname="web_project";
$database=mysqli_connect($host,$user,$pass,$dbname);
 
  if(isset($_POST['update_button']))
 { 
    $rev=$_POST["CReview"];
    $aid = $_SESSION['editapptrev'];
    $q1='UPDATE appointment SET review = "$rev"  where aid = "$aid" ';
    $result=mysqli_query($database,$q1);
    echo $q1;


 mysqli_close($database);


if($result){
header("Location: M Manger page.php");
exit(0);
}
?>