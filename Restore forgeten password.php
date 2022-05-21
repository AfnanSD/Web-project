<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
	<link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
	<title> fprgetPage </title>
		<style type="text/css">
		h1 img {position:absolute;
			float:center;
			 z-index:-1;
			 height:70vh;
			 width:60vh;
			 margin-top:-5vh; 
			 margin-left:-30vh;
			} 
		div{margin: 0;
			height: 50vh;
			margin-top:-8vh;
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
		h1,label{color:#4A4E69}
		body{background-color: #FAE8E0;}
		span h1{
			margin-top:10vh;
		}
		p{
			align-items: center;
			justify-content: center;
		}
	</style>
  </head>
  	<body>		
		<!--<img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">-->
		<br><br>
		<h1><img src="28181_30881_1.png" alt="logo" height:40vh> </h1>
		
		<span><h1> Get your password back </h1></span>
		<div>
			<label> Enter the user E-mail <label>
			<form method= "post" action="Restore forgeten password.php"> 
				<span>
					<br><input name="Email", placeholder="Email", type="text", size="25", maxlength="30">
				</span>
				<p> 
					<input type="submit", value="Submit" name="submit">
					<input type="reset", value="Clear">
				</p>
			</form>
			<center><p><a href="Log in page.php">Go to log in page</a></p></center>
		</div>
  	</body>
</html>
<?php

	if (!( $database = mysqli_connect( "localhost", "root", "" )))
	die( "<p>Could not connect to database</p>" );

	if (!mysqli_select_db( $database, "web_project2" ))
		die( "<center><p>Could not open URL database</p></center>" );
		if(isset($_POST['submit'])) {  
		$email=$_POST['Email'];   
		$query="SELECT OWNER_PASSWORD FROM pet_owner WHERE OWNER_EMAIL='$email'"; 
		$pass=mysqli_query($database, $query);
		//if(!$pass)
		//{
			//$query2="SELECT MANAGER_PASSWORD FROM clinic_manager WHERE MANAGER_EMAIL='$email'";
			//$pass2=mysqli_query($database, $query2);
			//if(!$pass2)
			//{
				//echo"<center><p> This email adress does not exist !</center></p>";
			//}
			//else
			//{
				//$row = mysqli_fetch_row($pass2);
				//echo "<center><p style='color:red;'>your password of FelinFine Profile is :".$row[0]."</p></center>";
			//}
		//}
		//else
		//{
			$row = mysqli_fetch_row($pass);
			if(!$row)
			{
				echo"<center><p> This email adress does not exist !</center></p>";
			}
			else{

			echo "<center><p style='color:red;'>your password of FelinFine Profile is :".$row[0]."</p></center>";
			}
		//}
		
		mysqli_close($database);
	}

?>
