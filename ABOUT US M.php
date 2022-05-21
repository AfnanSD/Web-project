<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>About us</title>
		<link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
        <style>

        </style>
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
	<a href="Manager page.php" class="logoutb" style="float: right;"><img src="re-pict-house-base.png" alt="HomePage" height="50" width="50" style="align-items:left;"></a>
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
 print('<a  href=mail to:"'.$key.'">info@Filine.Fine.com</a>');
 print('</p>');
mysqli_close($database);

?>
 
		</div>
	</body>
</html>

