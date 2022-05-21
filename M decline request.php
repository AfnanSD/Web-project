<?php  
//good for manager?
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

    $query = "UPDATE `appointment` SET `STATUS`='AVAILABLE'WHERE `AID`='$aid';";//
	//$query2 = "DELETE FROM `book_appointment` WHERE aid = '$aid';";

    
    $result = mysqli_query($database,$query);
    if($result){
        header("Location: Manager page.php");//
        exit();
    }
?>  