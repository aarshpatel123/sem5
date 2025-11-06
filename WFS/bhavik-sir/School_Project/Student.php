<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

// Connect with database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table
$sql = "CREATE TABLE students (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50),
age INT(3)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table 'students' created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
