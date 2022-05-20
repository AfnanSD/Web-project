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
    <tbody>
  <?php
            $database = mysqli_connect("localhost", "root", "", "web_project");
            $app_id = $_GET['edit'];

        ?>




<form action="update C review.php" method="POST" enctype="multipart/form-data">   
    <p> Review:<br><input  type="text" name="CReview" value="<?php echo $cReview ;?>"></p>
    <br><button id="submit100" name="edit_button"> Edit </button>
    
</form>
</tbody> 
<thead>
  <tr style="background-color: #faebd7;">

        <th>Review</th>
	</tr>

</thead>

              </table><br>
              <a href="Costumer page.html" class="buttonlike">Return to personal page</a>
		</fieldset></div>
 </body></html>