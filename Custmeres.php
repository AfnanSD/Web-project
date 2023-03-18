
<!DOCTYPE html>
<html>
	<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
   <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
    <title>Custmeres email</title>
    
 </head>
	<body>
    <span style="background-color:white;">
        <table style="margin-left:10px; background-color:white;">
                    <tr>
                        <!--td width=10.2%><a href="AB0UT US.php">View About us</a></td>.. Insert M Add service.php-->
                        <td width=10.2%><a href="Custmeres.php">Contact pet owners</a></td>
                        <td width=10.2%><a href="M Edit about us.php"><!--<img height="30" width="30" alt="Add a pet" src="3004543.png">-->Edit About us</a></td>
                        <td width=10.2%><a href="M Add Service.php"><!--<img height="30" width="30" alt="pet list" src="87971.png">-->Add service</a></td>
                        <td width=10.2%><a href="M request list.php"><!-- <img height="30" width="30" alt="View previous appointments here" src="5896962.png"> -->View Requests List</a></td>
                        <td width=14.2%><a href="M manage avail appts.php"><!-- <img height="30" width="30" alt="View previous appointments here" src="5896962.png"> -->Manage available appointment</a></td>
                        <td width=14.2%><a href="M set available appts.php"><!-- <img height="30" width="30" alt="View previous appointments here" src="5896962.png"> -->Set available appointement</a></td>
                        <td width=10.6%><a href="M reviews list.php"><!-- <img height="30" width="30" alt="View previous appointments here" src="5896962.png"> -->View review List</a></td>
                        <td width=0.2%><a href="signout.php" class="logoutb" style="float: right;"><img src="1250678.png" alt="logout icon" height="30" width="30"></a></td>
                        <!--<th>Time</th>
                        <th>Edit</th>
                        <th>Cancel</th>-->
                    </tr>
        </table>
</span>
    <img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
    
<div>
        <h1>Custmeres email</h1>
		<fieldset>
			<legend>All the custmeres in the website</legend>
 			 <table border="1" align="center" style="width: 85%;">
  <tbody>  
  <?php 
 $host = "localhost";
 $user = "root";
 $pass = "";
 $dbname = "web_project";
 $database=mysqli_connect($host,$user,$pass,$dbname);

$q = "SELECT * from pet_owner";
$result=mysqli_query($database,$q);
$nn= mysqli_num_rows($result);

if($nn>0){
 while($row=mysqli_fetch_assoc($result))
{
    echo '<tr>';
    echo '<th>'.$row["FIRST_NAME"].'</th>';
    echo '<th><a href = "mailto:'.$row["OWNER_EMAIL"].'">'.$row["OWNER_EMAIL"].'</a></th>';
    echo '</tr>';

}}
else echo "<p>THERE IS NO CUSTMERES</p>";
 mysqli_close($database);
?>              

  
 </tbody> 
<thead>
  <tr style="background-color: #faebd7;">

        <th>ID:</th>
        <th>Name:</th>
      

	</tr>

</thead>

              </table><br>
              		</fieldset></div>
	</body></html>

