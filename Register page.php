<?php
session_start();

?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset = "utf-8">
	<title> Register Page </title>
	<meta charset="ufc-8" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
	<style type="text/css">
		h1 img {position:absolute;
			float:center;
			 z-index:-1;
			 height:108vh;
			 width:60vh;
			 margin-top:-25vh; 
			 margin-left:-23vh;
			} 
		body{background-color:#FAE8E0 ;}
		div{margin: 0;
			height: 50vh;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 18px;
			background: url(./background.jpg);
			background-size: cover;}
		#input input{height:40px;
				width:250px;
				margin-top:0px;
				border-radius:5px;
				border-style:solid;}
		a,h1{text-align:center;
			margin-top:3vh;}
		h1,label{color:#4A4E69}
		#OpPhoto{height: 130px;
				margin-top:10vh ;}
		
		
	</style>
  </head>
  <body>
	
	<center><h ><img id="OpPhoto" accept="image/png , image/jpg" alt="user optional Photo" src="acc.jpg" ></h></center>
    <h1 style="margin-top:5vh z-indix:1" ><img src="28181_30881_1.png" alt="logo">SignUp</h1>
	<br><br><br><br><br><br>
	<!--<p> Enter the user name and the password <p>-->
	<div>
        
		
	<form method= "post" action="Register page.php"> 
	<span id="input">
	  <br><input name="Fname", type="text", placeholder="First Name" maxlength="30" required><br>
	  <br><input name="Lname", type="text", placeholder="Last Name" maxlength="30" required><br>
	  <br><input name="email", placeholder="example@gmail.com" type="text" maxlength="30" required><br>
	  <br><input name="password", placeholder="Password" type="password" maxlength="30" required><br>
	  <br><input name="phone", placeholder="0555555555" type="text" pattern="\d*" maxlength="12" required><br>

	</span>
	  <p><label> Gender: <!-- <br><input name="gender", type="text", size="25", maxlength="30"> </label><p>-->
	  <!--<p>-->
		<label> 
		  <input name ="gender" type="radio" value="male" required> Male
		</label><!-- the value is the answent which is sent nit the label-->
	  <!--</p>-->
	  <!--<p> -->
		<label> 
		  <input  name ="gender" type="radio" value="female" required> Female </label><!-- the choises of the same category must have the same name-->
	  </p>
	  <p>
		  <lable>Personal Picture (Optional):<br>
			<input id="pfp" name="pfp" type="file" accept="image/*"><br>
		  </lable>
	  </p>
	  <p> 
	      <input type="submit", value="Sing Up" name="register">
	      <input type="reset", value="Clear">
		  <center><p><a href="Log in page.php">already have an account?</a></p></center>
		  <br><br><br><br>		  </form>

	  </p>
	
	  </div>
  </body>

</html>
	<!--<center><p><a href="R.html">already have an account?</p></center> -->
  
<?php 
 	
		if(isset($_POST['register'])){
			if(!preg_match('/^[a-z]+$/',$_POST["Fname"])||!preg_match('/^[a-z]+$/',$_POST["Lname"]) )
			{
				print("<center><p>You can write a name using lower case letters only!</p></center>");
			}else
			if(!preg_match('/^[0-9]{10}+$/',$_POST["phone"]))
			{
				print("<center><p>Please enter the phone number correctly!</p></center>");
			}else
			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
			{
				print("<center><p>Please enter a valid email address!</p></center>");
			}
			else
			{
				if (!( $database = mysqli_connect( "localhost", "root", "" )))
						die( "<center><p>Could not connect to database</p></center>" );
				$email = "";
				$phoneNom = "";
				if (!mysqli_select_db( $database, "web_project" ))////////////////
								die( "<center><p>Could not open URL database</p></center>" );

				else////////////if (isset($_POST['register'])) 
				{
					$email = $_POST['email'];
					$phoneNom = $_POST['phone'];

					$sql_u = "SELECT * FROM pet_owner WHERE OWNER_PHONE_NUMBER='$phoneNom'";
					$sql_e = "SELECT * FROM pet_owner WHERE OWNER_EMAIL='$email'";
					$res_u = mysqli_query($database, $sql_u);
					$res_e = mysqli_query($database, $sql_e);

					if (mysqli_num_rows($res_e)  > 0) {
					echo"<center>Sorry... email address already taken</center>"; 	
					}else if(mysqli_num_rows($res_u) > 0){
					echo "<center>Sorry... phone number already taken</center>"; 	
					}else
					{
						$e=$_POST['email'];
						$ph=$_POST['phone'];
						$p=$_POST['password'];
						$f=$_POST['Fname'];
						$l=$_POST['Lname'];
						$g=$_POST['gender'];
						$pfp1=$_POST["pfp"];
						$_SESSION['Email']=$e;

						$query ="INSERT INTO pet_owner (OWNER_EMAIL, OWNER_PHONE_NUMBER, OWNER_PASSWORD, FIRST_NAME, LAST_NAME, OWNER_GENDER,OWNER_PHOTO,CLINIC_MANAGER_EMAIL) VALUES('$e',$ph,'$p','$f','$l','$g','$pfp1','MANAGER@GMAIL.COM')";
						echo  "<script type='text/javascript'> alert('Saved!');</script>";
						$results = mysqli_query($database, $query);
						mysqli_close($database);

						if($results){
							echo "<script>alert('Saved!');</script>";
							header("location:Costumer page.php?OWNER_EMAIL=<?=$e;?>");
							exit(0);
						}	
						else
						{
							echo "<script>alert('...');</script>";
						}				
					}
				}
			}
		}
	
?>
