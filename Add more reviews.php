<!DOCTYPE html>
<html>
<!-- View Previous Appointments, current page: PERSONAL-->
    <head> 
       
	<head>
   <meta charset="utf-8">
   <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
   <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
    <title>List of reviews</title>
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

     <h1> From our custmers:<h1>
  <h4>we love when we get reviwed ,because it makes us better! </h4>
     
      <?php
        $host = "localhost";
         $user = "root";
         $pass = "";
         $dbname = "web_project";
         $database=mysqli_connect($host,$user,$pass,$dbname);
         

     $N=" ";
$q = "SELECT REVIEW FROM appointment ";
$result=mysqli_query($database,$q);
$nn= mysqli_num_rows($result);
if($nn!=0){
while($row=mysqli_fetch_assoc($result)){
$RR=$row['REVIEW'];
    if($RR !=$N)
    {echo  '<div class="s_box">';
    echo $RR;
     echo  '</div>';}
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
