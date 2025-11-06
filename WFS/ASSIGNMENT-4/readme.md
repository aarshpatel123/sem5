# ✅ PHP WFS Practical Assignment - 4 Solutions

## **Q1. PHP program to execute a Python script using `echo` command**

```php
<?php
echo shell_exec("python hello.py");
?>
```

**Instructions:**

1. Create a Python file `hello.py`:
    ```python
    print("Hello from Python script!")
    ```
2. Save both files in the same folder.
3. Run the PHP file in browser or terminal:
    ```bash
    php filename.php
    ```
4. Output:
    ```
    Hello from Python script!
    ```


## **Q2. PHP code using `shell_exec()`**

```php
<?php
$output = shell_exec("python hello.py");
echo "Output from Python: " . $output;
?>
```

**Instructions:** Same as Q1, but here the output is stored in `$output` and displayed.


## **Q3. PHP program using `escapeshellcmd()`**

```php
<?php
$command = escapeshellcmd("python hello.py");
$output = shell_exec($command);
echo $output;
?>
```

**Instructions:**

-   This ensures malicious commands are escaped.
-   Run as before, output will be safe and same as Q1.


## **Q4. Python program using `subprocess.check_call()`**

```python
import subprocess

subprocess.check_call(["echo", "Hello from check_call"])
```

**Instructions:**

-   Save as `check_call.py`.
-   Run:
    ```bash
    python check_call.py
    ```
-   Output:
    ```
    Hello from check_call
    ```


## **Q5. Python program using `subprocess.check_output()`**

```python
import subprocess

output = subprocess.check_output(["echo", "Hello from check_output"])
print(output.decode())
```

**Instructions:**

-   Save as `check_output.py`.
-   Run:
    ```bash
    python check_output.py
    ```
-   Output:
    ```
    Hello from check_output
    ```


## **Q6. Python program using `Popen()` and `communicate()`**

```python
import subprocess

process = subprocess.Popen(["echo", "Hello from Popen"], stdout=subprocess.PIPE)
output, error = process.communicate()
print(output.decode())
```

**Instructions:**

-   Save as `popen_demo.py`.
-   Run:
    ```bash
    python popen_demo.py
    ```
-   Output:
    ```
    Hello from Popen
    ```


## **Q7. Python program using `os.write()` and `os.read()`**

```python
import os

# Create a file descriptor
fd = os.open("testfile.txt", os.O_RDWR | os.O_CREAT)

# Write to file
os.write(fd, b"Hello from os.write!\n")

# Move cursor to start
os.lseek(fd, 0, 0)

# Read content
print(os.read(fd, 100).decode())

os.close(fd)
```

**Instructions:**

-   Save as `os_write_read.py`.
-   Run:
    ```bash
    python os_write_read.py
    ```
-   Output:
    ```
    Hello from os.write!
    ```


## **Q8. Python program using `os.mkdir()` and `os.makedirs()`**

```python
import os

os.mkdir("single_dir")
os.makedirs("nested/dir/structure")

print("Directories created successfully!")
```

**Instructions:**

-   Save as `mkdir_demo.py`.
-   Run:
    ```bash
    python mkdir_demo.py
    ```
-   Check folders created in your directory.


## **Q9. Python program using `os.listdir()` and `os.walk()`**

```python
import os

print("Files in current directory:", os.listdir("."))

print("\nWalking through directories:")
for root, dirs, files in os.walk("."):
    print("Root:", root)
    print("Dirs:", dirs)
    print("Files:", files)
```

**Instructions:**

-   Save as `listdir_walk.py`.
-   Run:
    ```bash
    python listdir_walk.py
    ```
-   Output: Lists all files and directories.


## **Q10. Python program using `os.path.exists()`, `isfile()`, `isdir()`**

```python
import os

path = "testfile.txt"

print("Exists:", os.path.exists(path))
print("Is File:", os.path.isfile(path))
print("Is Directory:", os.path.isdir(path))
```

**Instructions:**

-   Save as `path_check.py`.
-   Run:
    ```bash
    python path_check.py
    ```
-   Output depends on whether `testfile.txt` exists.

