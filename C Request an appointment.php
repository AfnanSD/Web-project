<!--request an appointment by specifying the pet, the service, note, date and time-->
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
		<title>Request an appointment</title>
		<link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
		<link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />

		<!--move this?-->
		<style>
			.error {color: #FF0000;}
		</style>
	</head>
	<body>
	<span style="background-color:white;">
		<table style="margin-top: -9px;margin-left: -7px; width: 105%; border-collapse:collapse; background-color:white" >
							<tr>
								<td width=20.6% height: 30px;><a style="text-decoration: none; color: #44475c;" href="C View profile.php">My Account</a></td><!--C profile.php-->
								<td width=15.6%  height: 30px; background-color: #DCABB3;><a   style="text-decoration: none; color: #44475c;" href="C Add a pet.php">Add a pet</a></td>
								<td width=15.6%  height: 30px; ><a   style="text-decoration: none; color: #44475c;"href="C View pet list.php">Pet List</a></td>
								<td width=15.6%  height: 30px; ><a   style="text-decoration: none; color: #44475c;"href="C Add more services.php"> Services</a></td>
								<td width=15.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="C previous appts.php">View previous appointments</a></td><!--was C Previous appointments.html-->
								<td width=10.6%  height: 30px;><a   style="text-decoration: none; color: #44475c;"href="signout.php" class="logoutb" style="float: right;"><img src="1250678.png" alt="logout icon.png" height="30" width="30"></a></td>
								<!--<th>Time</th>
								<th>Edit</th>
								<th>Cancel</th>-->
							</tr>
				</table>
		</span>
		<?php
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$dbname = 'web_project';
			$database = mysqli_connect($host,$user,$pass,$dbname);
		?>
		<?php 
			// define variables and set to empty values
			$pet = $service = $note = $apptDay = $apptime = "";
			$petErr = $serviceErr = $noteErr = $apptDayErr = $apptimeErr = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				//if($_POST!=null)
				//	echo "not null";

				//make pet and service a defaul chosen one?
				if (empty($_POST["pet"])) {
					$petErr = "Pet is required";
				  } else {
					$pet = test_input($_POST["pet"]);
					$petErr = "";//null?
				  }
				  
				  if (empty($_POST["service"])) {
					$serviceErr = "Service is required";
				  } else {
					$service = test_input($_POST["service"]);
				  }
				  
				  if (empty($_POST["note"])) {
					$note = "";//??
				  } else {
					$note = test_input($_POST["note"]);
					/*
					// check if only contains letters and whitespace
					if (!preg_match("/^[a-zA-Z-' ]*$/",$note)) {
						$noteErr = "Only letters and white space allowed";//already santized??
					}*/
				  }
				
				  if (empty($_POST["apptDay"])) {
					$apptDay = "";//?
					$apptDayErr = "Date is required";
				  } else {
					$apptDay = test_input($_POST["apptDay"]);
				  }
			
				  if (empty($_POST["apptime"])) {
					$apptime = "";//?
					$apptimeErr = "Time is required";
				  } else {
					$apptime = test_input($_POST["apptime"]);
				  }
			
				  //submit button clicked and no error
				  $result2=false;
				  if (isset($_POST['submit'])) {
					  if($petErr==null && $serviceErr==null && $apptDayErr==null && $apptimeErr==null){
						$queryAID = "SELECT AID FROM appointment WHERE TIME = '$apptime' AND DATE = '$apptDay' AND SERVICE_NAME = '$service' AND STATUS = 'AVAILABLE';";// AND STATUS = 'AVAILABLE';
						$resultAID = mysqli_query($database,$queryAID);
						$rowAID = mysqli_fetch_assoc($resultAID);
						$AID = $rowAID['AID'];

						$queryPID = "SELECT `PID` FROM `pet` WHERE `PET_NAME`= '$pet' AND `PET_OWNER_EMAIL`='". $_SESSION['Email']."';";
						$resultPID = mysqli_query($database,$queryPID);
						$rowPID = mysqli_fetch_assoc($resultPID);
						$PID = $rowPID['PID'];

						global $result;
						$query = "INSERT INTO `book_appointment`(`PET_OWNER_EMAIL`, `PID`, `AID`) VALUES ('".$_SESSION['Email']."','$PID','$AID')";
						$result = mysqli_query($database,$query);
						if($result)
							$result2 = true;
					}
					if($result2){
						echo "<script> window.alert('Appointmend added successfully'); </script>";
						//UPCOMING
						$querySetUpcoming = "UPDATE appointment SET STATUS = 'REQUESTED',NOTE = '$note' WHERE TIME = '$apptime' AND DATE = '$apptDay' AND SERVICE_NAME = '$service' AND STATUS = 'AVAILABLE';";
						$resultPID = mysqli_query($database,$querySetUpcoming);
						header("Location: Costumer page.php");
  						exit();
					}
					else{
						echo "<script> window.alert('Appointmend was not added successfully'); </script>";
					}
				  }

				//time
				else if (isset($_POST['btnSubmit2'])) {
				} 
			}

			function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
			}	
		?>

		<img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
		<div>
			<h1>Request an appointment</h1>
			<p><span class="error">* required field</span></p>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<p>
					<strong>Pet:</strong>
					<span class="error">* <?php echo $petErr;?></span>
					<br>
					<?php
							
						$query = "SELECT `PET_NAME` FROM `pet` WHERE PET_OWNER_EMAIL = '". $_SESSION['Email'] ."';";
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
							echo '<span class="error">* there are no pets</span>';//test this?
						}
					?>
				</p>
				<p>
					<strong>Service:</strong>
					<span class="error">* <?php echo $serviceErr;?></span>
					<br>
					<?php
							
						$query = "SELECT `SERVICE_NAME` FROM `clinic_service`";
						$result = mysqli_query($database,$query);
						if(mysqli_num_rows($result)!=0){
							while($row = mysqli_fetch_assoc($result)) {
								echo '<label>';
								//get images from database <img src="checkup.jpg" alt="photo of pet care" height="40px" width="40px">
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
					<!--change this to make text disappear once clicked-->
					<br>
					<!--something wrong with value always suggested-->
					<textarea name="note" rows="3" cols="40" value="<?php echo $note;?>">
					</textarea>
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
				<p>
					<input type="submit" name="submit" value="Submit"> 
					<!--<input type="reset" value="Reset">delete this?? since it would reset only befor submittng-->

					<input type="submit" name="btnSubmit2" value="check available time">
				</p>
			</form>
			<br>
			<a href="Costumer page.php" class="buttonlike">Return to personal page</a>
		</div>
	</body>
</html>

