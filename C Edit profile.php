<?php 
session_start();
if(!isset($_SESSION['Email'])){
    header("Location: Log in page.php?error=Please Sign In again!");
}
$host='localhost';
$user='root';
$pass='';
$dbname='web_project';
$database=mysqli_connect($host,$user,$pass,$dbname);
$owner_e2=mysqli_real_escape_string($database,$_SESSION['Email']);
$q = "SELECT * from pet_owner WHERE OWNER_EMAIL='$owner_e2' ";

$result=mysqli_query($database,$q);
 while($row=mysqli_fetch_assoc($result))
{
    $eee=$row['OWNER_EMAIL'];
    $op=$row['OWNER_PHONE_NUMBER'];
    $of=$row['FIRST_NAME'];
    $ol=$row['LAST_NAME'];
    $oph=$row['OWNER_PHOTO'];
    $og=$row['OWNER_GENDER'];
    $opa=$row['OWNER_PASSWORD'];

    if ($oph!="")
    echo "";
     else 
     $oph='acc.jpg';
}
 ?>
<!DOCTYPE html>
<html>
	<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
   <title>Edit profile</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
 </head>
 <span style="background-color:white;">
		<table style="margin-top: -9px;margin-left: -7px; width: 105%; border-collapse:collapse; background-color:white" >
							<tr>
								<td width=20.6% height: 30px;><a style="text-decoration: none; color: #44475c;" href="C profile.php">My Account</a></td><!--C profile.php-->
								<td width=15.6%  height: 30px; background-color: #DCABB3;><a   style="text-decoration: none; color: #44475c;" href="C Add a pet.php">Add a pet</a></td>
								<td width=15.6%  height: 30px; ><a   style="text-decoration: none; color: #44475c;"href="C View pet list.php">Pet List</a></td>
								<td width=15.6%  height: 30px; ><a   style="text-decoration: none; color: #44475c;"href="C Add more services.php"> Services</a></td>
								<td width=15.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="C Previous appointments.html">View previous appointments</a></td>
								<td width=10.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="signout.php" class="logoutb" style="float: right;"><img src="1250678.png" alt="logout icon.png" height="30" width="30"></a></td>
								<!--<th>Time</th>
								<th>Edit</th>
								<th>Cancel</th>-->
							</tr>
				</table>
		</span>
 <body>
    <img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
     <div>
         <h1>Your profile:</h1>
		<fieldset>
			<legend>Personal info:</legend>
            
          <img src="<?php echo $oph;?>" alt="account pic" height="75" width="75"><br>

                <form action="C Edit profile.php" method="POST">

                    <lable>First name:
                        <input name="Fname", type="text", value="<?php echo $of;?>" maxlength="30"><br>
                    </lable><br>

                     <label>
                        Last name:
                        <input name="Lname", type="text", value="<?php echo $ol;?>" maxlength="30"><br>
                    </label><br>

                    <label>Email:
                        <input name="email",type="text" value="<?php echo $eee;?>" placeholder="<?php echo $eee;?>" ><br>
                    </label><br>

                    <label>Phone number:
                        <input name="phone", value="<?php echo $op;?>" type="number", maxlength="12"><br>
                    </label><br>
                   
                    <label >  Gender:  <select name="o_gendero"></label><br><br>
                                <option selected>Female</option> 
                                <option >Male</option> 
                               </select> <br><br>
                          

                    <lable>Password:
                        <input name="password", placeholder="<?php echo $opa;?>"  value="<?php echo $opa;?>" type="password", maxlength="30"><br>
                    </lable><br>

                    <lable>Personal Picture (Optional):<br>
                        <input name="o_pic" type="file" accept="image/*"><br>
                      </lable>
                <br>
              <br>
              <input type="submit" value="Confirm" name="submit_edit_profile">
              </fieldset>
              </form> 

     </div>      
 </body>
</html>
<?php
    if(isset($_POST['submit_edit_profile']))
    { 
         if(!preg_match('/^[a-z]+$/',$_POST["Fname"])||!preg_match('/^[a-z]+$/',$_POST["Lname"]))
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
                }else
                {
                    $email = $_POST['email'];
					$sql_e = "SELECT * FROM pet_owner WHERE OWNER_EMAIL='$email'";
					$res_e = mysqli_query($database, $sql_e);
                    if (mysqli_num_rows($res_e)  > 0) {
                        echo"<br><center>Sorry... email address already taken</center>"; 	
                    }
                else{
              $of3=$_POST["Fname"];
              $ol3=$_POST["Lname"];
              $op3=$_POST["phone"];
              $oe3=$_POST["email"];
              $opa3=$_POST["password"];
              $og33=$_POST["o_gendero"];
              $oph3=$_POST["o_pic"];
              $q="UPDATE pet_owner SET FIRST_NAME='$of3',LAST_NAME='$ol3', OWNER_PASSWORD='$opa3', OWNER_EMAIL='$oe3', OWNER_PHONE_NUMBER=$op3,OWNER_GENDER='$og33', OWNER_PHOTO='$oph3' WHERE OWNER_EMAIL='$owner_e2' ";
              $result=mysqli_query($database,$q);
           //echo "hjh";

              mysqli_close($database);
              header("Location:Costumer page.php");
                //exit(0);
           }
        }
    }
?>
