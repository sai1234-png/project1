<?php
// Database connection parameters
$servername = "database1.cw4reif9h48w.us-east-1.rds.amazonaws.com";
$username = "root";
$password = "umesh888";
$dbname = "database1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the registrations table
$sql = "SELECT * FROM registrations";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table>";
    echo "<thead><tr><th>ID</th><th>Team Number</th><th>Member 1 Name</th><th>Member 2 Name</th><th>Member 3 Name</th><th>Project Name</th><th>Tech Stack</th></tr></thead>";
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["team_number"] . "</td>";
        echo "<td>" . $row["member1_name"] . "</td>";
        echo "<td>" . $row["member2_name"] . "</td>";
        echo "<td>" . $row["member3_name"] . "</td>";
        echo "<td>" . $row["project_name"] . "</td>";
        echo "<td>" . $row["tech_stack"] . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p>No Registrations for now</p>";
}

$conn->close();
?>
