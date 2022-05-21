<!--Edit his/her appointenmt request-->
<?php  
    session_start();
    if(!isset($_SESSION['Email'])){
        header("Location: Log in page.php?error=Please Sign In again!");
    }

?>  

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Edit an appointment request</title>
		<link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
		<!--<link rel="stylesheet" type="text/css" href="C Grid sheet.css">for menu style ? not white-->
		<link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />

		<style>
			.error {color: #FF0000;}
    		a:hover{ color: rgb(100, 100, 121);}
		</style>
	</head>
	<body>
				<!--menu?-->
				<table style="margin-top: -9px;margin-left :-7px; width: 105%; border-collapse:collapse; background-color:white" >
                    <tr>
                        <td width=20.6% height: 30px;><a style="text-decoration: none; color: #44475c;" href="C profile.php">My Account</a></td>
                        <td width=15.6%  height: 30px; background-color: #DCABB3;><a   style="text-decoration: none; color: #44475c;" href="C Add a pet.php">Add a pet</a></td>
                        <td width=15.6%  height: 30px; ><a   style="text-decoration: none; color: #44475c;"href="C View pet list.php">Pet List</a></td>
                        <td width=15.6%  height: 30px; ><a   style="text-decoration: none; color: #44475c;"href="#"> Services</a></td>
                        <td width=15.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="C Previous appointments.html">View previous appointments</a></td>
                        <td width=10.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="signout.php" class="logoutb" style="float: right;"><img src="1250678.png" alt="logout icon" height="30" width="30"></a></td>
                        <!--<th>Time</th>
                        <th>Edit</th>
                        <th>Cancel</th>-->
                    </tr>
        		</table>    
		<img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">

		<?php
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$dbname = 'web_project';
			$database = mysqli_connect($host,$user,$pass,$dbname);

			$pet = $service = $note = $apptDay = $apptime = "";
			
			if (!empty($_GET)) {
				$aid = mysqli_real_escape_string($database,$_GET['aid']);
				$_SESSION['edit_aid'] = $aid;

				$queryappt = "SELECT TIME, DATE, NOTE, SERVICE_NAME,PET_NAME 
							FROM appointment,book_appointment,PET 
							WHERE appointment.AID = '".$aid."' AND '".$aid."'=book_appointment.AID
							AND book_appointment.PID=PET.PID;";

			$resultappt = mysqli_query($database,$queryappt);
			$rowappt = mysqli_fetch_assoc($resultappt);

			global $pet , $service , $note , $apptDay , $apptime;

			$service = $rowappt['SERVICE_NAME'];
			$note = $rowappt['NOTE'];
			$apptDay = $rowappt['DATE'];
			$apptime = $rowappt['TIME'];
			$pet = $rowappt['PET_NAME'];

			}
			$aid2 = $_SESSION['edit_aid'];
		?>
		<?php  
			$apptDayErr = $apptimeErr = "";


			if ($_SERVER["REQUEST_METHOD"] == "POST") {

				if (empty($_POST["pet"])) {
					$petErr = "Pet is required";
				  } else {
					$pet = test_input($_POST["pet"]);
					$petErr = "";
				  }
				  
				  if (empty($_POST["service"])) {
					$serviceErr = "Service is required";
				  } else {
					$service = test_input($_POST["service"]);
				  }
				  
				  if (empty($_POST["note"])) {
					$note = "";
				  } else {
					$note = test_input($_POST["note"]);
				  }

				  if (empty($_POST["apptDay"])) {
					$apptDay = "";
					$apptDayErr = "Date is required";
				  } else {
					$apptDay = test_input($_POST["apptDay"]);
				  }
			
				  if (empty($_POST["apptime"])) {
					$apptime = "";
					$apptimeErr = "Time is required";
				  } else {
					$apptime = test_input($_POST["apptime"]);
				  }
			
				  //submit button clicked and no error
				  $result2=false;
				  if (isset($_POST['submit'])) {
					  if($apptDayErr==null && $apptimeErr==null){

						$query0 = "SELECT PID FROM pet WHERE PET_NAME = '".$pet."';";
						$result0 = mysqli_query($database,$query0);
						$row0 = mysqli_fetch_assoc($result0);
						$pet0 = $row0['PID'];

						$query = "Update book_appointment set PID = '$pet0' where AID = '".$aid2."';";
						$result = mysqli_query($database,$query);

						$query2 = "UPDATE appointment 
									SET TIME = '".$apptime."' , DATE = '".$apptDay."' , NOTE = '".$note."' 
									, SERVICE_NAME = '".$service."' WHERE AID = '".$aid2."';";
						$result2 = mysqli_query($database,$query2);

						if($result && $result2){
							header("Location: Costumer page.php");
  							exit();
						}
						else{
							echo mysqli_error($database);
							echo "<script> window.alert('Appointmend was not edited successfully'); </script>";
						}
					}
				}
			}

			function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
				}	
		?>
		<div>

			<h1>Edit an appointment request</h1>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

				<p>
					<strong>Pet:</strong>
					<br>
					<?php
							
						$query = "SELECT `PET_NAME` FROM `pet` WHERE PET_OWNER_EMAIL = '". $_SESSION['Email']."';";
						$result = mysqli_query($database,$query);
						if(mysqli_num_rows($result)!=0){
							while($row = mysqli_fetch_assoc($result)) {
								echo '<label>';
								echo '<input type="radio" name="pet" value="' . $row['PET_NAME'].'" ';
								if (isset($pet) && $pet==$row['PET_NAME']) 
									echo "checked >" .  $row['PET_NAME'];
								else
									echo '>' .  $row['PET_NAME'];
								echo '</label> <br>';
							}
						}
						else{
							echo '<span class="error">* there are no pets</span>';
						}
					?>
				</p>

				<p>
					<strong>Service:</strong>
					<br>
					<?php	
						$query = "SELECT `SERVICE_NAME` FROM `clinic_service`";
						$result = mysqli_query($database,$query);
						if(mysqli_num_rows($result)!=0){
							while($row = mysqli_fetch_assoc($result)) {
								echo '<label>';
								echo '<input type="radio" name="service" value="' . $row['SERVICE_NAME'].'" ';
								if (isset($service) && $service==$row['SERVICE_NAME']) 
									echo "checked >" .  $row['SERVICE_NAME'];
								else
									echo '>' .  $row['SERVICE_NAME'];
								echo '</label> <br>';
							}
						}
						else{
							echo '<span class="error">* there are no services</span>';
						}
					?>
				</p>
		
				<p>
					<strong>Note:</strong>
					<br>
					<textarea name="note" rows="3" cols="40" value="<?php echo $note;?>"></textarea>
				</p>

				<p>
					<strong>Date:</strong>
					<span class="error">* <?php echo $apptDayErr;?></span>
					<br>
					<p>
						<label><input type="date" name="apptDay" value="<?php echo $apptDay;?>"></label>
					</p>
			
					<p>
						<strong>Time:</strong>
						<span class="error">* <?php echo $apptimeErr;?></span>
						<br>
						<label>
								<?php
								//check after specifying
								if($apptDay == null)
									echo '<span class="error">* date must be selected fisrt</span>';
								else{
									$query = "SELECT `TIME` 
												FROM `appointment` 
												WHERE DATE = '". $apptDay ."' AND STATUS='AVAILABLE' AND `SERVICE_NAME` = '".$service."';" ;//check service
									$result = mysqli_query($database,$query);
									echo '<select name="apptime">';
									echo '<option value="'. $apptime.'"selected>'.$apptime.'</option>';
										if(mysqli_num_rows($result)!=0){
											echo '<select name="apptime">';
											while($row = mysqli_fetch_assoc($result)){
												$rowtime = $row['TIME'];
												echo '<option value="';
													echo $rowtime . '" ';
													if (isset($apptime) && $apptime==$rowtime) 
														echo "selected>";
													else
														echo '>';
													echo $rowtime;
												echo '</option>';
											}
											echo '</select>';
										}
										else{
											echo '<span class="error">* there is not any time available in the date you selected or the service</span>';
										}
								}
								?>
						</label>
					</p>
				</p>
				<br>
				<br>
				<p>
					<input type="submit" name="submit" value="Submit"> 
					<!--<input type="reset" value="Reset">-->
				</p>
			</form>
			<a href="Costumer page.php" class="buttonlike">Return to personal page</a>

		</div>
	</body>
</html>
