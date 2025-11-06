<?php
include("connection.php");

if (isset($_POST['query'])) {
    $query = $_POST['query'];
    $sql = "SELECT * FROM products WHERE name LIKE '%$query%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' cellpadding='5'>
                <tr><th>ID</th><th>Product Name</th><th>Price</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['price']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color:red;'>No products found!</p>";
    }
}
?>
