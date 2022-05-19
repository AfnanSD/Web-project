<!DOCTYPE html>
<html>
    
<head>
    <title>Previous Appointments</title>
    <meta charset="ufc-8" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
    <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
    <style>
        td{
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
    <div>

    <h1>Your previous appointments: </h1>
    <hr>
    <table border="1" align="center" style="width: 100%;">
        <tr style="background-color: #faebd7; color: #695e59 ;">
            <th>Date</th>
            <th>Service</th>
            <th>Review</th>
            <th>PID</th>
        </tr>
        <?php
//servername
$servername = "localhost";
//username
$username = "root";
//empty password
$password = "";
//database is the database name
$dbname = "web_project";

// Create connection by passing these connection parameters
$conn = new mysqli($servername, $username, $password, $dbname);
echo "inner join on appointment: ";
echo "<br>";
echo "<br>";
//sql query to display all student_address table based on student id using inner join
$sql = "SELECT date,SERVICE_NAME,review,pid from appointment INNER JOIN book_appointment on appointment.AID=book_appointment.AID";
$result = $conn->query($sql);
//display data on web page
while($row = mysqli_fetch_array($result)){
    
        echo "<tr>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['service_name'] . "</td>";
        echo "<td>" . $row['review'] . "</td>";
        echo "<td>" . $row['pid'] . "</td>";
        echo "</tr>";
        
}

echo "<br>";

}


//close the connection

$conn->close();
?>

    </table>

    <br>
    <a href="Costumer page.html" class="buttonlike">Return to personal page</a>
    </div>
</body>
</html>