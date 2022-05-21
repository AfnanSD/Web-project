<!DOCTYPE html>
<html>
<!-- View Previous Appointments, current page: PERSONAL-->
    <head> 
       
	<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
   <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
    <title>List of services</title>
 </head>
	
        <style>
table {
    width: 100%;
    border-collapse: collapse;
}

th {
    height: 30px;
}

a { 
    text-decoration: none;
    color: #44475c;
}
a:hover{ color: rgb(100, 100, 121);}
.s_box{
    display:inline-block;
     background-color:white;
    height: 310px;
    width: 210px;
    padding:1rem 1rem;
box-shadow:1px 1px;
     margin-left:1.5rem;
     margin-top:2rem;
     margin-right:1rem;
     margin-bottom:5rem;

     text-align:center;
     border: 4px solid #FAE8E0;
  border-radius: 5px;
  font-size: 12px;
}

            </style>
</head>
<   <span style="background-color:white;">
<table style="margin-top: -9px;margin-left: -7px; width: 105%; border-collapse:collapse; background-color:white" >
                    <tr>
                        <td width=20.6% height: 30px;><a style="text-decoration: none; color: #44475c;" href="C profile.php">My Account</a></td>
                        <td width=15.6%  height: 30px; background-color: #DCABB3;><a   style="text-decoration: none; color: #44475c;" href="C Add a pet.php">Add a pet</a></td>
                        <td width=15.6%  height: 30px; ><a   style="text-decoration: none; color: #44475c;"href="C View pet list.php">Pet List</a></td>
                        <td width=15.6%  height: 30px; ><a   style="text-decoration: none; color: #44475c;"href="C Add more services.php"> Services</a></td>
                        <td width=15.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="C Previous appointments.php">View previous appointments</a></td>
                        <td width=10.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="signout.php" class="logoutb" style="float: right;"><img src="1250678.png" alt="logout icon.png" height="30" width="30"></a></td>
                        <!--<th>Time</th>
                        <th>Edit</th>
                        <th>Cancel</th>-->
                    </tr>
        </table>
</span>
    <img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
        <!--<a href="PreviousApps.html" class="button">Previous Appointments</a>-->
        <div class="container">


     <h1> Our Services:<h1>
  <h4>Whether it’s grooming, sitting or online calls and more, we provide the best in pet services with highly trained, passionate associates.</h4>
     
      <?php
        $host = "localhost";
         $user = "root";
         $pass = "";
         $dbname = "web_project";//2
         $database=mysqli_connect($host,$user,$pass,$dbname);
     
$q = "SELECT * from clinic_service ";
$result=mysqli_query($database,$q);
$nn= mysqli_num_rows($result);
if($nn!=0){
while($row=mysqli_fetch_assoc($result)){
    $sn=$row['SERVICE_NAME'];
    $sp=$row['SERVICE_PHOTO'];
    $sr=$row['SERVICE_PRICE'];
    $sd=$row['SERVICE_DESCRIPTION'];

    echo  '<div class="s_box">';
    echo $sn ;
    echo '<br><img src="'.$sp.'" alt="our store" height="190" width="190">'; 
    echo '<br>cost='.$sr;
    echo  '<br>'.$sd;
    echo  '</div>';
}
}
mysqli_close($database);

 ?>
 
  </div>


</body>
   
</html>
