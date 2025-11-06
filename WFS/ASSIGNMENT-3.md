# WFS Practical Assignment - 3

---

## ✅ **1. Create database `school`, table `students`, insert two records using PHP**

### 🔹 **Code**

```php
<?php
$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$sql1 = "CREATE DATABASE IF NOT EXISTS school";
mysqli_query($conn, $sql1);

mysqli_select_db($conn, "school");

$sql2 = "CREATE TABLE IF NOT EXISTS students(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    age INT
)";
mysqli_query($conn, $sql2);

$sql3 = "INSERT INTO students (name, age) VALUES
 ('Amit', 20),
 ('Neha', 22)";
mysqli_query($conn, $sql3);

echo "Database, Table & Records Created Successfully!";
?>
```

### 🧭 **Steps**

1. Save the file as `create_students.php`.
2. Run `http://localhost/create_students.php`.
3. Check `phpMyAdmin` → database `school` → table `students`.

### 🖥️ **Output**

```
Database, Table & Records Created Successfully!
```

---

## ✅ **2. PHP program to insert, update, delete records in employees table**

### 🔹 **Code**

```php
<?php
$conn = mysqli_connect("localhost", "root", "", "school");

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS employees(id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50), salary INT)");

mysqli_query($conn, "INSERT INTO employees(name, salary) VALUES('John', 25000)");

mysqli_query($conn, "UPDATE employees SET salary = 30000 WHERE name='John'");

mysqli_query($conn, "DELETE FROM employees WHERE name='John'");

echo "Insert, Update & Delete Operations Done!";
?>
```

### 🧭 **Steps**

1. Save as `employee_operations.php`.
2. Run file in browser.

### 🖥️ **Output**

```
Insert, Update & Delete Operations Done!
```

---

## ✅ **3. PHP code to search products table using AJAX and display results**

### 🔹 **HTML (search.html)**

```html
<input type="text" id="search" placeholder="Search Product" onkeyup="loadData()">
<div id="result"></div>

<script>
function loadData(){
    let text = document.getElementById("search").value;
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function(){
        document.getElementById("result").innerHTML = this.responseText;
    }
    xhttp.open("GET", "search.php?q=" + text, true);
    xhttp.send();
}
</script>
```

### 🔹 **PHP (search.php)**

```php
<?php
$conn = mysqli_connect("localhost","root","","school");
$q = $_GET['q'];

$sql = "SELECT * FROM products WHERE name LIKE '%$q%'";
$res = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($res)){
    echo $row['name'] . " - " . $row['price'] . "<br>";
}
?>
```

### 🧭 **Steps**

1. Create `products` table with fields `(id, name, price)`.
2. Open `search.html` in browser.
3. Type product name to search dynamically.

### 🖥️ **Output Example**

```
Mobile - 15000
Mouse - 500
Monitor - 12000
```

---

## ✅ **4. Display users table records where age between 18 and 25**

### 🔹 **Code**

```php
<?php
$conn = mysqli_connect("localhost","root","","school");

$sql = "SELECT * FROM users WHERE age BETWEEN 18 AND 25";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    echo $row['name'] . " - " . $row['age'] . "<br>";
}
?>
```

### 🧭 **Steps**

1. Ensure `users` table exists.
2. Save file as `user_age_filter.php`.

### 🖥️ **Output Example**

```
Riya - 20
Arjun - 22
Megha - 24
```

---

## ✅ **5. Create PHP form to insert student details into students table**

### 🔹 **HTML (form.html)**

```html
<form action="insert_student.php" method="post">
    Name: <input type="text" name="name"><br>
    Age: <input type="number" name="age"><br>
    <button type="submit">Insert</button>
</form>
```

### 🔹 **PHP (insert_student.php)**

```php
<?php
$conn = mysqli_connect("localhost","root","","school");

$name = $_POST['name'];
$age = $_POST['age'];

$sql = "INSERT INTO students(name, age) VALUES('$name', '$age')";
mysqli_query($conn, $sql);

echo "Student Inserted Successfully!";
?>
```

### 🧭 **Steps**

1. Open `form.html`.
2. Enter student name and age.
3. Click submit.

### 🖥️ **Output**

```
Student Inserted Successfully!
```

---

## ✅ **6. Update product price where product_id = 101 and display updated table**

### 🔹 **Code**

```php
<?php
$conn = mysqli_connect("localhost","root","","school");

mysqli_query($conn, "UPDATE products SET price = price + 50 WHERE product_id = 101");

$result = mysqli_query($conn, "SELECT * FROM products");

while($row = mysqli_fetch_assoc($result)){
    echo $row['product_id']." - ".$row['name']." - ".$row['price']."<br>";
}
?>
```

### 🧭 **Steps**

1. Run file as `update_product.php`.

### 🖥️ **Output Example**

```
101 - Laptop - 40500
102 - Mobile - 20000
```

---

## ✅ **7. Perform ascending and descending order sorting in orders table using PHP**

### 🔹 **Code**

```php
<?php
$conn = mysqli_connect("localhost","root","","school");

echo "<h3>Ascending Order by Amount</h3>";
$res1 = mysqli_query($conn, "SELECT * FROM orders ORDER BY amount ASC");
while($row = mysqli_fetch_assoc($res1)){
    echo $row['order_id']." - ".$row['amount']."<br>";
}

echo "<h3>Descending Order by Amount</h3>";
$res2 = mysqli_query($conn, "SELECT * FROM orders ORDER BY amount DESC");
while($row = mysqli_fetch_assoc($res2)){
    echo $row['order_id']." - ".$row['amount']."<br>";
}
?>
```

### 🧭 **Steps**

1. Save file as `sort_orders.php`.
2. View sorted results.

### 🖥️ **Output**

```
Ascending Order by Amount
1 - 2000
2 - 4000
3 - 8000

Descending Order by Amount
3 - 8000
2 - 4000
1 - 2000
```

---

## ✅ **8. Insert one record into users table using mysqli_query()**

### 🔹 **Code**

```php
<?php
$conn = mysqli_connect("localhost","root","","school");

mysqli_query($conn, "INSERT INTO users(name, email, age) VALUES('Karan', 'karan@mail.com', 21)");

echo "1 Record Inserted!";
?>
```

### 🧭 **Steps**

1. Run as `insert_user.php`.

### 🖥️ **Output**

```
1 Record Inserted!
```

---

## ✅ **9. Update email of a user where id = 3 using PHP**

### 🔹 **Code**

```php
<?php
$conn = mysqli_connect("localhost","root","","school");

mysqli_query($conn, "UPDATE users SET email='newemail@mail.com' WHERE id = 3");

echo "Email Updated Successfully!";
?>
```

### 🧭 **Steps**

1. Save as `update_email.php`.

### 🖥️ **Output**

```
Email Updated Successfully!
```

---

## ✅ **10. Delete a record from users table where name = 'jay'**

### 🔹 **Code**

```php
<?php
$conn = mysqli_connect("localhost","root","","school");

mysqli_query($conn, "DELETE FROM users WHERE name='jay'");

echo "Record Deleted!";
?>
```

### 🧭 **Steps**

1. Save file as `delete_user.php`.
2. Run in browser.

### 🖥️ **Output**

```
Record Deleted!
```

---

## ✅ **11. Display all records from users table ordered by name ascending**

### 🔹 **Code**

```php
<?php
$conn = mysqli_connect("localhost","root","","school");

$result = mysqli_query($conn, "SELECT * FROM users ORDER BY name ASC");

while($row = mysqli_fetch_assoc($result)){
    echo $row['name'] . " - " . $row['email'] . "<br>";
}
?>
```

### 🧭 **Steps**

1. Save file as `display_users.php`.
2. Open in browser.

### 🖥️ **Output Example**

```
Amit - amit@gmail.com
Karan - karan@mail.com
Riya - riya@mail.com
```
