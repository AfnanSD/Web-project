<?php  
    session_start();
    if(!isset($_SESSION['Email'])){
        header("Location: Log in page.php?error=Please Sign In again!");
    }

    $host = 'localhost';
	$user = 'root';
	$pass = '';
	$dbname = 'web_project';
	$database = mysqli_connect($host,$user,$pass,$dbname);

    $aid = mysqli_real_escape_string($database,$_GET['aid']);
    echo $aid;

    $query = "UPDATE `appointment` SET `STATUS`='AVAILABLE'WHERE `AID`='$aid';";
	$query2 = "DELETE FROM `book_appointment` WHERE aid = '$aid';";

    
    $result = mysqli_query($database,$query);
    $result2 = mysqli_query($database,$query2);
    if($result && $result2){
        header("Location: Costumer page.php");
        exit();
    }
?>  