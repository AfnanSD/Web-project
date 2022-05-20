<!DOCTYPE html>
<html>
<head>
    <title>Set Available Appointments</title>
    <meta charset="ufc-8" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
    <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
</head>

<body>
    <div>
    <h1>Set available appointments:</h1>
    <hr>


    <form method="post" action="new appointment.php">

        <!--imagenary values, might link it to the docs database later-->
        <p>
            <strong>Service:</strong>
            <br>
            <label>
                <input type="radio" name="service" value=" general examination">General periodic clinical examination
            </label>
            <label>
                
                <input type="radio" name="service" value="Vaccination">Vaccination
            </label>
            <label>
                <input type="radio" name="service" value="Dental">Dental Care
            </label>
            <label>
                <input type="radio" name="service" value="Blood">Blood tests
            </label>
            <label>
                <input type="radio" name="service" value="wounds">Wound Care
            </label>
            <label>
                <input type="radio" name="service" value="Emergency">Emergency Care

        <p>
            <label>Day: <input type="date" name="apptDay"></label>
        </p>

        <p>
            <label>Time:
                <input type="time" name="apptime">
            </label>
        </p>
        <input type="submit" value="Submit"> <br>
    </form>
    <br>
    <a href="Manager page.html" class="buttonlike">Return to personal page</a>
    </div>
</body>
</html>