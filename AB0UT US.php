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
		<img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
		<div>
			<h1>About us:</h1>
				

                <?php     
$host='localhost';
$user='root';
$pass='';
$dbname="web_project2";
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
$q3='SELECT * FROM CLINIC_PICTURE';
$result=mysqli_query($database,$q3);
$nn= mysqli_num_rows($result);

$row=mysqli_fetch_array($result);
for ($x = 0; $x < $nn; $x++) {
	echo  "<img src=$row[$x] alt='our store' height='190' width='190'>"; 
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



