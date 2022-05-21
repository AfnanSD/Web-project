
<!DOCTYPE html>
<html>
	<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
   <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
    <title>Custmeres email</title>
    
 </head>
	<body>
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

