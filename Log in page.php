<!DOCTYPE html>
<?php  
    session_start();
?>  
<html>
 	<head>
		<meta charset = "utf-8">
		<title> LogInPage </title>
		<link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
		<style type="text/css">
			h1 img {position:absolute;
				float:center;
				z-index:-1;
				height:70vh;
				width:60vh;
				margin-top:-5vh; 
				margin-left:-35vh;
				} 
			div{margin: 0;
				margin-left:-70px;
				height: 50vh;
				display: flex;
				align-items: center;
				justify-content: center;
				font-size: 18px;
				background: url(./background.jpg);
				background-size: cover;}
			span input{height:40px;
					width:250px;
					margin-top:0px;
					border-radius:5px;
					border-style: solid;}
			a,h1{text-align :center;
				margin-top:50px;
				}
			span h1{ margin-top:80px;}
			h1,label{color:#4A4E69}
			body{background-color: #FAE8E0;}
		</style>
  	</head>
	<body>		
		<!--<img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">-->
		<br><br><br>
		<h1><img src="28181_30881_1.png" alt="logo" height:40vh></h1>
		<span> <h1 style="margin-left:-90px ">LogIn</h1></span>
		<div>
			<label> Enter the user name and the password <label>
			<form method= "post"  action="Log in page.php"> 
				<span>
					<br><input name="Email", placeholder="Email", type="text", size="25", maxlength="30" required><br>
					<br><input name="password", placeholder="Password", type="password", size="25", maxlength="30" required><br>
				</span>
				<p> 
					<input type="submit", value="Login" name="login">
					<input type="reset", value="Clear">
				</p>
			</form>
			<br><a href="Register page.php">Create new account<br></a>
			<br><a href="Restore forgeten password.php">Forgot my password</a>
		</div>
  	</body>
</html>
<?php  
	if (!( $database = mysqli_connect( "localhost", "root", "" )))
	die( "<p>Could not connect to database</p>" );

	if (!mysqli_select_db( $database, "web_project" ))//////database name????
		die( "<p>Could not open URL database</p>" );


	if(isset($_POST['login'])) {  
		$email=$_POST['Email'];  
		$password=$_POST['password'];  
		$query="SELECT * FROM pet_owner WHERE OWNER_EMAIL='$email'AND OWNER_PASSWORD='$password'";  
		$query2="SELECT * FROM clinic_manager WHERE MANAGER_EMAIL='$email'AND MANAGER_PASSWORD='$password'";

		$run=mysqli_query($database, $query);  
		$run2=mysqli_query($database,$query2);
		
		if($row=mysqli_fetch_row($run)) {  
			header("location:Costumer page.php");
			$_SESSION['name']=$row[3];
			$_SESSION['Email']=$email;
		}else if($row2=mysqli_fetch_row($run2))
			{
				header("location: Manager Page.php");
				$_SESSION['Email']=$email;
			}
		
		else  
		echo "<script>alert('Email or password is incorrect!')</script>";  
	}  
	mysqli_close($database);	
?> 

