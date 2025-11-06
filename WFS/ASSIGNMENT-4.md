# WFS Practical Assignment - 4

---

## **Q1. Write a PHP program to execute a Python script using echo command.**

### 🧠 **Code**

**File: `run_python_echo.php`**

```php
<?php
echo "Running Python Script using echo command:<br><br>";

$output = `python script.py`;
echo $output;
?>
```

**Python Script: `script.py`**

```python
print("Hello from Python Script!")
```

---

### ⚙️ **Steps to Execute**

1. Save both files in `C:\xampp\htdocs\php_python_practical`.
2. Start Apache server from XAMPP.
3. Open browser → go to:

   ```
   http://localhost/php_python_practical/run_python_echo.php
   ```

---

### 🖥️ **Expected Output**

```
Running Python Script using echo command:

Hello from Python Script!
```

---

## **Q2. Write PHP code to execute Python script using shell_exec() and display output.**

### 🧠 **Code**

**File: `run_python_shellexec.php`**

```php
<?php
echo "<h3>Output from Python Script using shell_exec()</h3>";

$output = shell_exec("python script.py");
echo "<pre>$output</pre>";
?>
```

---

### ⚙️ **Steps to Execute**

1. Keep `script.py` in the same folder.
2. Run the PHP file in browser:

   ```
   http://localhost/php_python_practical/run_python_shellexec.php
   ```

---

### 🖥️ **Expected Output**

```
Output from Python Script using shell_exec()

Hello from Python Script!
```

---

## **Q3. Demonstrate PHP program using escapeshellcmd() to run Python script with secure handling.**

### 🧠 **Code**

**File: `run_safe_python.php`**

```php
<?php
$command = "python script.py";
$safeCommand = escapeshellcmd($command);

$output = shell_exec($safeCommand);

echo "<h3>Secure Python Execution Output:</h3>";
echo "<pre>$output</pre>";
?>
```

---

### ⚙️ **Steps to Execute**

1. Save in same folder as `script.py`.
2. Run:

   ```
   http://localhost/php_python_practical/run_safe_python.php
   ```

---

### 🖥️ **Expected Output**

```
Secure Python Execution Output:

Hello from Python Script!
```

---

## **Q4. Write Python program using subprocess.check_call() to run an external command successfully.**

### 🧠 **Code**

**File: `run_command_check_call.py`**

```python
import subprocess

try:
    subprocess.check_call(["python", "--version"])
    print("Command executed successfully!")
except subprocess.CalledProcessError:
    print("Error occurred while executing command.")
```

---

### ⚙️ **Steps to Execute**

1. Open CMD/Terminal in folder.
2. Run:

   ```
   python run_command_check_call.py
   ```

---

### 🖥️ **Expected Output**

```
Python 3.12.6
Command executed successfully!
```

---

## **Q5. Write Python program using subprocess.check_output() to capture and display output.**

### 🧠 **Code**

**File: `run_command_check_output.py`**

```python
import subprocess

output = subprocess.check_output(["python", "--version"])
print("Python Version Output:")
print(output.decode())
```

---

### ⚙️ **Steps to Execute**

```
python run_command_check_output.py
```

---

### 🖥️ **Expected Output**

```
Python Version Output:
Python 3.12.6
```

---

## **Q6. Demonstrate Python program using Popen() and communicate() to run and capture output.**

### 🧠 **Code**

**File: `run_with_popen.py`**

```python
import subprocess

process = subprocess.Popen(
    ["python", "--version"],
    stdout=subprocess.PIPE,
    stderr=subprocess.PIPE
)

stdout, stderr = process.communicate()

print("Output:", stdout.decode())
print("Error:", stderr.decode())
```

---

### ⚙️ **Steps to Execute**

```
python run_with_popen.py
```

---

### 🖥️ **Expected Output**

```
Output: Python 3.12.6
Error:
```

---

## **Q7. Write Python program using os.write() and os.read() for file writing and reading.**

### 🧠 **Code**

**File: `file_os_write_read.py`**

```python
import os

fd = os.open("sample.txt", os.O_RDWR | os.O_CREAT)

os.write(fd, b"Hello! Writing to file using os.write().")

os.lseek(fd, 0, os.SEEK_SET)

content = os.read(fd, 100)
print("File Content:", content.decode())

os.close(fd)
```

---

### ⚙️ **Steps to Execute**

```
python file_os_write_read.py
```

---

### 🖥️ **Expected Output**

```
File Content: Hello! Writing to file using os.write().
```

**File Created:** `sample.txt`

---

## **Q8. Write Python program using os.mkdir() and os.makedirs() to create directories.**

### 🧠 **Code**

**File: `create_directories.py`**

```python
import os

os.mkdir("SingleFolder")
os.makedirs("ParentFolder/Child/SubChild")

print("Directories created successfully!")
```

---

### ⚙️ **Steps to Execute**

```
python create_directories.py
```

---

### 🖥️ **Expected Output**

```
Directories created successfully!
```

**Created folders:**

```
SingleFolder/
ParentFolder/Child/SubChild/
```

---

## **Q9. Write Python program using os.listdir() and os.walk() to display all directory files.**

### 🧠 **Code**

**File: `list_directories.py`**

```python
import os

print("Files using listdir():")
print(os.listdir("."))

print("\nFiles using os.walk():")
for root, dirs, files in os.walk("."):
    print("Root:", root)
    print("Directories:", dirs)
    print("Files:", files)
    print("-" * 40)
```

---

### ⚙️ **Steps to Execute**

```
python list_directories.py
```

---

### 🖥️ **Expected Output**

```
Files using listdir():
['script.py', 'run_command_check_call.py', 'sample.txt', 'ParentFolder']

Files using os.walk():
Root: .
Directories: ['SingleFolder', 'ParentFolder']
Files: ['script.py', 'sample.txt']
----------------------------------------
Root: ./ParentFolder
Directories: ['Child']
Files: []
----------------------------------------
Root: ./ParentFolder/Child
Directories: ['SubChild']
Files: []
----------------------------------------
Root: ./ParentFolder/Child/SubChild
Directories: []
Files: []
----------------------------------------
```

---

## **Q10. Write Python program using os.path.exists(), isfile(), and isdir().**

### 🧠 **Code**

**File: `check_path_status.py`**

```python
import os

path = "sample.txt"

print("Exists:", os.path.exists(path))
print("Is File:", os.path.isfile(path))
print("Is Directory:", os.path.isdir(path))
```

---

### ⚙️ **Steps to Execute**

```
python check_path_status.py
```

---

### 🖥️ **Expected Output**

```
Exists: True
Is File: True
Is Directory: False
```
