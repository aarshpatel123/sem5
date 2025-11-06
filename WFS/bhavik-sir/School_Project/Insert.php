<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert records
$sql = "INSERT INTO students (name, age) VALUES 
('Rahul Sharma', 20),
('Priya Patel', 19),
('Bittu Parmar',23)";

if ($conn->query($sql) === TRUE) {
  echo "Records inserted successfully";
} else {
  echo "Error inserting records: " . $conn->error;
}

$conn->close();
