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
            </tr>              
        </table> 
    <br>
        <button type="button" onclick="addMedical()"> Add a medicla record </button>
        <script>
            /*
            var phpadd= <1?php //name="add_medical_button"
            //echo add(1,2);?> //call the php add function
            var phpmult= <1?php //echo mult(1,2);?> //call the php mult function
            var phpdivide= <1?php //echo divide(1,2);?> //call the php divide function
            */
            function addMedical() {
                //window.prompt(<f?php echo '122';?>);
                var history = window.prompt("medical history: ");
                <?php
                    $history = "<script>document.write(history)</script>"; 
                    echo $history;
                    //addHitory($history)
                ?>
                //<1?php echo '1';?>>
            }
        </script>
    <br><br>
        <table border="1">
            <tr style="background-color: antiquewhite;">
                <th> Vaccinations list:</th>
            </tr>              
        </table> 
<!--
        <table border="1">
            <tr style="background-color: antiquewhite;">
                <th> Medical record:</th>
                <th> vaccinated:</th>
            </tr>

            <tr>
                <td> <textarea name="add_pet_vac" style="overflow: scroll;"placeholder="Enter vaccination list"></textarea></td>
                <td> <textarea name="add_pet_medi"  style="overflow: scroll;" placeholder="Enter medical history"></textarea></td> 
            </tr>                
        </table> 
-->
    
                        
<BR>
                <input type="reset" value="RESET">
                <button name="add_pet_button"> ADD </button>

            </fieldset>
        </form>           

    </div>
 </body>

</html>

<?php 
    function addHitory($h){
        echo '
        <script>
            window.alert('.$h.')
        </script>
        ';
    }

?>

