<!--Edit his/her appointenmt request-->
<?php  
    session_start();
	$_SESSION['email'] = 'A@GAMIL.COM';//change this to not overwrite it
?> 
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Edit an appointment request</title>
		<link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
		<link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
		<style>
			.error {color: #FF0000;}
		</style>
	</head>
	<body>    
		<?php
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$dbname = 'web_project';
			$database = mysqli_connect($host,$user,$pass,$dbname);
		?>
		<img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">

		<div>
			<!--enough??-->
			<h1>Edit an appointment request111111111</h1>
			<p><span class="error">* required field</span></p>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<p>
					<strong>Pet:</strong>
					<span class="error">* <?php echo $petErr;?></span>
					<br>
					<?php
							
						$query = "SELECT `PET_NAME` FROM `pet` WHERE PET_OWNER_EMAIL = '". $_SESSION['email'] ."';";
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
					<textarea name="note" rows="3" cols="40" value="<?php echo $note;?>">Any extra information you want to tell us about..
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
					<input type="reset" value="Reset"><!--delete this?? since it would reset only befor submittng-->
				</p>
			</form>
			<!--
			<form method="post" action="#">
				<p>
					<strong>Pet:</strong>
					<br>
					<label>
						<input type="radio" name="pet" value="jacki">Jacki
					</label>
					<label>
						<input type="radio" name="pet" value="lolo">Lolo
					</label>
					<label>
						<input type="radio" name="pet" value="mocha">Mocha
					</label>
				</p>
				<p>
					<strong>Service:</strong>
					<br>
					<label>
						<img src="checkup.jpg" alt="photo of pet care" height="40px" width="40px">
						<input type="radio" name="service" value="emergency care">Emergency care
					</label>
					<br>
					<label>
						<img src="groomingpic.jpg" alt="clinicla examination" height="40px" width="40px">
						<input type="radio" name="service" value="general periodic clinical examination">General periodic clinical examination
					</label>
					<br>
					<label>
						<img src="vaccination.jpg" alt="clinicla examination" height="40px" width="40px">
						<input type="radio" name="service" value="vaccinations">Vaccinations
						
					</label>
					<br>
					<label>
						<img src="groomingpic.jpg" alt="clinicla examination" height="40px" width="40px">
						<input type="radio" name="service" value="treat wounds">Treat wounds
					
					</label>
					<br>
					<label>
						<img src="blood.jpg" alt="clinicla examination" height="40px" width="40px">
						<input type="radio" name="service" value="blood tests">Blood tests
					</label>
					<br>
					<label>
						<img src="dental.jpg" alt="clinicla examination" height="30px" width="30px">
						<input type="radio" name="service" value="dental care">Dental care
					</label>
					<br>
					<label>
						<img src="other.jpg" alt="clinicla examination" height="30px" width="30px">
						<input type="radio" name="service" value="other">Other
					</label>
				</p>
				<p>
					<strong>Note:</strong>
					<br>
					<textarea name="note" rows="3" cols="40">Any extra information you want to tell us about..
					</textarea>
				</p>
				<p>
					<strong>Date:</strong>
					<p>
						<label>Day: <input type="date" name="apptDay"></label>
					</p>
			
					<p>
						<label>Time:
							<input type="time" name="apptime">
						</label>
					</p>
				<p>
					<input type="submit" value="Submit">
					<input type="reset" value="Reset">
				</p>
			</form>
-->
			<a href="Costumer page.html" class="buttonlike">Return to personal page</a>

		</div>
	</body>
</html>
