<!DOCTYPE html>
<html>
<head>
    <title>View Appointments Requests</title>
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
    <h1>View appointment requests: </h1>
    <br>
<table align="center" border="1" style="width: 100%;">
    <tr style="background-color:#faebd7 ; color: #695e59 ;">
        
        <th>AID</th>
        <th>Day </th>
        <th>Service</th>
        <th>Time</th>
        <th colspan="3">Status</th>
    
    </tr>
    <!--Imaginary reqs-->
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
    $sql = "SELECT date,SERVICE_NAME,AID,time from appointment INNER JOIN book_appointment on appointment.AID=book_appointment.AID";
    $result = $conn->query($sql);
    //display data on web page
    while($row = mysqli_fetch_array($result)){
        
            echo "<tr>";
            echo "<td>" . $row['aid'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['service_name'] . "</td>";
            echo "<td>".$row['time']."</td>";
            echo "<td>" . $row['status'] . "</td>";
            //I NEED TO CHANGE THE STATUS ON CLICKING DENY OR APPROVE
            echo "<td><p class='buttonlike' onclick='approve($row['aid'])'>Approve</p></td>";
            echo "<td><p class='buttonlike' onclick='deny($row['aid'])'>Deny</p></td>";
            echo "</tr>";
            
    }
    
    echo "<br>";
    
    }
    
    
    //close the connection
    
    $conn->close();

    ?>

</table>
<br><br>
<a href="Manager page.html" class="buttonlike">Return to personal page</a>
    </div>

    <script>
        function approve(aid){

            createCookie("approve", aid, "40");
            <?php
                // Create connection
            $conn = new mysqli("localhost", "root", "", "web_project");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "UPDATE appointment SET status='approve' WHERE aid=$_COOKIE['approve']";

            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $conn->close();
            ?>
        }

        function deny(aid){
            createCookie("deny", aid, "40");
            <?php
                // Create connection
            $conn = new mysqli("localhost", "root", "", "web_project");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "UPDATE appointment SET status='approve' WHERE aid=$_COOKIE['deny']";

            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $conn->close();
            ?>
        }
        </script>
</body>
</html>