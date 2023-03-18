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
<body>
    <img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
        <!--<a href="PreviousApps.html" class="button">Previous Appointments</a>-->
        <div class="container">


     <h1> Our Services:<h1>
  <h4>Whether it’s grooming, sitting or online calls and more, we provide the best in pet services with highly trained, passionate associates.</h4>
     
      <?php
        $host = "localhost";
         $user = "root";
         $pass = "";
         $dbname = "web_project";
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
  <form action="firstpage.php" method="POST">

  <input type="submit" value=" return to home page">
  </div>


  </form>
</body>
   
</html>
