<?php
    session_start();
    if(!isset($_SESSION['Email'])){
        header("Location: Log in page.php?error=Please Sign In again!");
    }
?>
  <?php
            $database = mysqli_connect("localhost", "root", "", "web_project");
            if(!empty($_GET)){
                $aid = mysqli_real_escape_string($database,$_GET['edit']);
            $_SESSION['editapptrev'] = $aid;
        }
        $aid = $_SESSION['editapptrev'];

        ?>
<!DOCTYPE html>
<html>
	<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
   <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
    <title>Rate Appointment</title>
 </head>
	<body>
    <img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
<div>
    <table border="1" align="center" style="width: 85%; text-align: center;">
    <tbody><tr>
<form action="update C review.php" method="POST" enctype="multipart/form-data">   
<input  type="text" name="CReview"></tr>
<!-- $aid = $_SESSION['editapptrev']; -->
    
</form>
</tbody> 
<thead>
  <tr style="background-color: #faebd7;">

        <th>Review</th>
	</tr>

</thead>

              </table><br>
              <a href="Costumer page.html" class="buttonlike">Return to personal page</a>
              <button value="submit" name="submit"> Edit </button>
		</div>
 </body></html>