<?php
session_start();

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

// Retrieve form data
$team_number = $_POST['team_number'];
$member1_name = $_POST['member1_name'];
$member2_name = $_POST['member2_name'];
$member3_name = $_POST['member3_name'];
$project_name = $_POST['project_name'];
$tech_stack = implode(', ', $_POST['tech_stack']); // Convert array to comma-separated string

// Store team number in session
$_SESSION['team_number'] = $team_number;

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO registrations (team_number, member1_name, member2_name, member3_name, project_name, tech_stack) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $team_number, $member1_name, $member2_name, $member3_name, $project_name, $tech_stack);

// Execute the statement
if ($stmt->execute()) {
    echo "<script>alert('Registration successful');</script>";
    header("Refresh:0; url=dashboard.php"); // Redirect to dashboard
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
