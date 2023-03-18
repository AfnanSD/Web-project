
        <!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>About us</title>
		<link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
	</head>
	<body>
    <span style="background-color:white;">
<table style="margin-top: -9px;margin-left: -7px; width: 105%; border-collapse:collapse; background-color:white" >
                    <tr>
                        <td width=20.6% height: 30px;><a style="text-decoration: none; color: #44475c;" href="C profile.php">My Account</a></td>
                        <td width=15.6%  height: 30px; background-color: #DCABB3;><a   style="text-decoration: none; color: #44475c;" href="C Add a pet.php">Add a pet</a></td>
                        <td width=15.6%  height: 30px; ><a   style="text-decoration: none; color: #44475c;"href="C View pet list.php">Pet List</a></td>
                        <td width=15.6%  height: 30px; ><a   style="text-decoration: none; color: #44475c;"href="C Add more services.php"> Services</a></td>
                        <td width=15.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="C Previous appointments.php">View previous appointments</a></td>
                        <td width=15.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="Costumer page.php">Home page</a></td>
                        <td width=10.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="signout.php" class="logoutb" style="float: right;"><img src="1250678.png" alt="logout icon.png" height="30" width="30"></a></td>
                        <!--<th>Time</th>
                        <th>Edit</th>
                        <th>Cancel</th>-->
                    </tr>
        </table>
</span>
		<img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
		<div>
			<h1>About us:</h1>
				

                <?php     
$host='localhost';
$user='root';
$pass='';
$dbname="web_project";
//$QQ="INSERT INTO CLINIC_INFO "."( PIC,LOC,DES,PHONE,EMAIL) "."VALUES (1,'DD','DD',05,'EMAILIY')";
$database=mysqli_connect($host,$user,$pass,$dbname);

print("<h3>Brife description about us:</h3>");
$q='SELECT CLINIC_DESCRIPTION FROM clinic_manager';
$result=mysqli_query($database,$q);
$row=mysqli_fetch_row($result);
foreach($row as $key )
print($key);

print("<h3>Our location:</h3>");
$q='SELECT CLINIC_LOCATION FROM clinic_manager';
$result=mysqli_query($database,$q);
$row=mysqli_fetch_row($result);
foreach($row as $key )
print("<a href=$key><img src='loc.jpg' alt='our store' height='190'	width='190'	> </a>");


 print("<h3>Visit us:</h3>");
$q3='SELECT PICTURES FROM clinic_pictures';
$result=mysqli_query($database,$q3);
$nn= mysqli_num_rows($result);
if($nn!=0){
while($row=mysqli_fetch_assoc($result)){
$gg=$row['PICTURES'];
echo '<img src="'.$gg.'" alt="our store" height="190" width="190">'; 
}
}



//<img src="pet_store3.jpg" alt="our store" height="190"	width="190"	> 
 
 print("<h3>Contact us:</h3>");
 print('<p style="font-size: large;">');
 print(" Let us help you");
 print("  <!--our contact info:-->");

 $q='SELECT CLINIC_PHONE_NUMBER FROM clinic_manager';
$result=mysqli_query($database,$q);
$row=mysqli_fetch_row($result);
foreach($row as $key )

 print("<br>call us directly at :$key");
 print("<br>or contact us via Email:");
 $q='SELECT CLINIC_EMAIL FROM clinic_manager';
 $result=mysqli_query($database,$q);
 $row=mysqli_fetch_row($result);
 foreach($row as $key )
 print("<a href=mail to:$key>info@Filine.Fine.com</a>");
 print('</p>');
mysqli_close($database);

?>
 
		</div>
	</body>
</html>

