<?php 
session_start();
$host='localhost';
$user='root';
$pass='';
$dbname="web_project";
$database=mysqli_connect($host,$user,$pass,$dbname);

 $pet_id2=mysqli_real_escape_string($database,$_GET['edit']);
 $pet_id=$_GET['edit'];
 
$q = "SELECT * from pet WHERE PID='$pet_id' ";
$result=mysqli_query($database,$q);
 while($row=mysqli_fetch_assoc($result))
{
    $pn3=$row['PET_NAME'];
    $pdb=$row['DATE_OF_BIRTH'];
    $pg=$row['PET_GENDER'];
    $pb=$row['BREED'];
    $ps=$row['SPAYED_OR_NEUTERED_STATUS'];
    $pp=$row['PET_PHOTO'];
    $pi=$row['PID'];
    $pmh=$row['MEDICAL_HISTORY'];
    $pv=$row['VACCINATION_LIST'];

}
mysqli_close($database);

 ?>
<!DOCTYPE html>
<html>
	<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
   <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
   <style>
  .petprofilepic {
  flex: none;
  width: 70px;
  height: 70px;
  border-radius: 50%;
  object-fit: cover;
}     
   </style>
 </head>

<body>
<div>
<h1>Edit pet's profile:</h1>
		<fieldset>
			<legend>Pet's profile</legend>
          
                              <form action="update_edit_pet_profile.php" method="POST">
                              <input type="hidden" name="idid"  value=<?php echo  $pi?>>

                           <label> Name: <input type="text" name="pet_name2" value=" <?php echo $pn3;?>" > </label>  <br><br>
                           <label >  Image:<input type="file" name="pet_image2" value=<?php echo $pp;?>>   </label ><br><br>
                           <label >  Breed: <input type="text" name="pet_breed2" value=<?php echo $pb;?>>   </label ><br><br>
                           <label >  Date of birth:<br> From<input type="text"  value="<?php echo $pdb;?>"> To<input type="date" name="pet_date_of_birth2" value=<?php echo $pdb?> ></label ><br><br>
                           <label >   Gender:  <select name="pet_gender2"></label><br><br>
                                <option selected>Female</option> 
                                <option >Male</option> 
                               </select> <br><br>
                               <label >  Status  <select name="pet_status2">  </label ><br><br>
                               <label >  <option selected>Spayed</option>   </label >
                                   <option>Neutered</option>    
                            </select>  <br><br>
                            <label > Vaccinated: <textarea name="pet_Medical_vac"> <?php echo $pmh;?></textarea>  </label ><br><br>
                               <label > Medical record: <textarea name="pet_Medical_record2"><?php echo $pv;?> </textarea>  </label ><br><br>

                      
      <input type="submit" value="Submit" name="submit_edit_pet_profile" >
     <input type="reset" value="Reset" name="reset_edit_pet_profile" >

  </form>


  </fieldset></div>
       </body> 
        </html>
               
               
