<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
<link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
<title>Add Pet</title>
</head>
<body>
    <img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
    <div>
        <h1>Add your pet</h1>
        <form action="insert C Add a pet.php" method="POST">
        <fieldset >
            <legend>Add your pet</legend>
            <br>
            <table border="1">
            <tr style="background-color: antiquewhite;">
                            <th>Name:</th>
                            <th>Image:</th>
                            <th>Date of birth:</th>
                            <th>Breed:</th>
                            <th>Gender:</th>
                            <th>Status</th>

                           </tr>

    <tr>
        <td><input type="text" name="add_pet_name" placeholder="enter pet's name"required ></td>
        <td><input type="file" name="add_pet_imge" required></td>
        <td> <input type="date" name="add_pet_date" required ></td>
        <td><input type="text" name="add_pet_breed" placeholder="enter pet's breed" required></td>
        <td> <select name="add_pet_gender" > 
            <option selected>Female</option> 
            <option >Male</option>         
        </select></td>
        <td> <select name="add_pet_status">
            <option selected>Spayed</option> 
            <option>Neutered</option> 
           </select> </td>

    
    </tr>   </table> 

<br><br>
<p>For more information about your pet(optional)</p>
        <table border="1">

        <tr style="background-color: antiquewhite;">
                             <th> Medical record:</th>
                            <th> vaccinated:</th>
</tr>

<tr>
       
         
        <td> <textarea name="add_pet_vac" style="overflow: scroll;"placeholder="Enter vaccination list"></textarea></td>
        <td> <textarea name="add_pet_medi"  style="overflow: scroll;" placeholder="Enter medical history"></textarea></td> 
</tr>                </table> 

    
                        
<BR>
                <input type="reset" value="RESET">
                <button name="add_pet_button"> ADD </button>

            </fieldset>
        </form>           

    </div>
 </body>

</html>


