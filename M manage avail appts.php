<!DOCTYPE html>
<html>
<head>
    <title>Manage Available Appointments</title>
    <meta charset="ufc-8" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleForRequestAndEdit.css">
    <link rel="shortcut icon" type="image/x-icon" href="tinyLogo.PNG" />
</head>

<body>
    <img src="logo 1.1.jpg" alt="logo" class="aboutUsImage">
    <div>
    <h1>Manage availabe appointments:</h1>
<table align="center" border="1" style="width: 100%;">
    <tr style="background-color:#faebd7 ; color: #695e59 ;">
        <!--/*63452A-FAE8E0/*-->
        <th>Day </th>
        <th>Service</th>
        <th>Time</th>
        <th colspan="3">Manage</th>
    </tr>


    <?php
    $servername = "localhost";
    //username
    $username = "root";
    //empty password
    $password = "";
    //database is the database name
    $dbname = "web_project";
    
    // Create connection by passing these connection parameters
    $conn = new mysqli($servername, $username, $password, $dbname);
    echo "<br>";
    echo "<br>";
    //sql query to display all student_address table based on student id using inner join
    $sql = "SELECT date,SERVICE_NAME,AID,time from appointment";
    $result = $conn->query($sql);
    //display data on web page
    while($row = mysqli_fetch_array($result)){
        
            echo "<tr>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['service_name'] . "</td>";
            echo "<td>".$row['time']."</td>";
            echo "<form method='post'> <input type='submit' name='delete' value='Delete'>
            <input class = 'buttonlike' type='hidden' name='aid' value='".$row['aid']."'>
       </form>";
        //MAYBE THE TYPE INPUT IS UNNEC
        //-----------------------------
            echo "</tr>";
            
    }
    
    echo "<br>";
    
    
    
    
    //close the connection
    
    $conn->close();

    ?>


</table>
<br>
<a href="Manager page.html" class="buttonlike">Return to personal page</a>
<a href="M Set available appointments.html" class="buttonlike">Set available appointenmts</a>
    </div>
</body>

</html>