<?php 
session_start();

session_destroy();

header("Location:Log in page.php");
?>