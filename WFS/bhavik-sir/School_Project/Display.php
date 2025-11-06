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

// Fetch all records from students table
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<h3>Student Records</h3>";
  echo "<table border='1' cellpadding='8'>";
  echo "<tr><th>ID</th><th>Name</th><th>Age</th></tr>";
  
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["age"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "No records found!";
}

$conn->close();
?>
