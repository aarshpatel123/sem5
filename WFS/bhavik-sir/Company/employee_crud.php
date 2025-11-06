<?php
include("connection.php");

if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $salary = $_POST['salary'];
    mysqli_query($conn, "INSERT INTO employees (name, designation, salary) VALUES ('$name', '$designation', '$salary')");
    echo "<p style='color:green;'>Record inserted successfully!</p>";
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $salary = $_POST['salary'];
    mysqli_query($conn, "UPDATE employees SET name='$name', designation='$designation', salary='$salary' WHERE id=$id");
    echo "<p style='color:blue;'>Record updated successfully!</p>";
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM employees WHERE id=$id");
    echo "<p style='color:red;'>Record deleted successfully!</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee CRUD</title>
</head>
<body>
    <h2>Employee Form</h2>
    <form method="post">
        ID (for Update/Delete): <input type="text" name="id"><br><br>
        Name: <input type="text" name="name" required><br><br>
        Designation: <input type="text" name="designation" required><br><br>
        Salary: <input type="text" name="salary" required><br><br>

        <input type="submit" name="insert" value="Insert">
        <input type="submit" name="update" value="Update">
        <input type="submit" name="delete" value="Delete">
    </form>

    <hr>
    <h3>All Employees</h3>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM employees");
    echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Designation</th><th>Salary</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['designation']}</td>
                <td>{$row['salary']}</td>
              </tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
