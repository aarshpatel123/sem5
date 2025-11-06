# 🔎 Viva Explanations for Each Question

## **Q1. PHP program using `echo` to run Python**
```php
<?php
echo shell_exec("python hello.py");
?>
```
- **Explanation:**  
  - `shell_exec()` runs a shell command from PHP.  
  - Here, the command is `python hello.py`, which executes the Python script.  
  - `echo` prints the output of that script directly to the browser/terminal.  
- **Viva Tip:** “This code shows how PHP can call an external Python script and display its output.”


## **Q2. PHP with `shell_exec()`**
```php
<?php
$output = shell_exec("python hello.py");
echo "Output from Python: " . $output;
?>
```
- **Explanation:**  
  - Instead of printing directly, the output is first stored in `$output`.  
  - Then it’s displayed with a message.  
- **Viva Tip:** “Here I’m capturing the Python script’s output into a variable and then printing it.”


## **Q3. PHP with `escapeshellcmd()`**
```php
<?php
$command = escapeshellcmd("python hello.py");
$output = shell_exec($command);
echo $output;
?>
```
- **Explanation:**  
  - `escapeshellcmd()` sanitizes the command string.  
  - This prevents malicious input (like someone injecting extra commands).  
- **Viva Tip:** “This is a secure way to run external commands from PHP.”


## **Q4. Python with `subprocess.check_call()`**
```python
import subprocess
subprocess.check_call(["echo", "Hello from check_call"])
```
- **Explanation:**  
  - `check_call()` runs a command and waits until it finishes.  
  - If the command fails, it raises an error.  
- **Viva Tip:** “This ensures the command runs successfully, otherwise the program stops with an error.”


## **Q5. Python with `subprocess.check_output()`**
```python
import subprocess
output = subprocess.check_output(["echo", "Hello from check_output"])
print(output.decode())
```
- **Explanation:**  
  - `check_output()` runs a command and **captures its output**.  
  - The result is in bytes, so `.decode()` converts it to a string.  
- **Viva Tip:** “This is used when I want to capture and use the output of a command.”


## **Q6. Python with `Popen()` and `communicate()`**
```python
import subprocess
process = subprocess.Popen(["echo", "Hello from Popen"], stdout=subprocess.PIPE)
output, error = process.communicate()
print(output.decode())
```
- **Explanation:**  
  - `Popen()` starts a process without waiting for it to finish immediately.  
  - `communicate()` waits for the process to complete and collects its output.  
- **Viva Tip:** “This gives more control over running processes compared to `check_call`.”


## **Q7. Python with `os.write()` and `os.read()`**
```python
import os
fd = os.open("testfile.txt", os.O_RDWR | os.O_CREAT)
os.write(fd, b"Hello from os.write!\n")
os.lseek(fd, 0, 0)
print(os.read(fd, 100).decode())
os.close(fd)
```
- **Explanation:**  
  - `os.open()` opens/creates a file at a low level (like in C).  
  - `os.write()` writes bytes into the file.  
  - `os.read()` reads from the file.  
  - `os.lseek()` moves the file pointer back to the start.  
- **Viva Tip:** “This demonstrates low-level file handling in Python.”


## **Q8. Python with `os.mkdir()` and `os.makedirs()`**
```python
import os
os.mkdir("single_dir")
os.makedirs("nested/dir/structure")
print("Directories created successfully!")
```
- **Explanation:**  
  - `os.mkdir()` creates a single directory.  
  - `os.makedirs()` creates nested directories in one go.  
- **Viva Tip:** “This shows how to create both single and multiple-level directories.”


## **Q9. Python with `os.listdir()` and `os.walk()`**
```python
import os
print("Files in current directory:", os.listdir("."))
for root, dirs, files in os.walk("."):
    print("Root:", root)
    print("Dirs:", dirs)
    print("Files:", files)
```
- **Explanation:**  
  - `os.listdir()` lists files in a directory.  
  - `os.walk()` recursively goes through all subdirectories and files.  
- **Viva Tip:** “This is useful for exploring directory structures.”


## **Q10. Python with `os.path.exists()`, `isfile()`, `isdir()`**
```python
import os
path = "testfile.txt"
print("Exists:", os.path.exists(path))
print("Is File:", os.path.isfile(path))
print("Is Directory:", os.path.isdir(path))
```
- **Explanation:**  
  - `os.path.exists()` checks if a path exists.  
  - `isfile()` checks if it’s a file.  
  - `isdir()` checks if it’s a directory.  
- **Viva Tip:** “This is used to check the status of a file or folder before working with it.”


# 🎤 How to Answer in Viva
- Always start with **what the function does**.  
- Then explain **why it’s used** (purpose).  
- Finally, give a **real-life use case** (e.g., “We use `os.path.exists()` before opening a file to avoid errors”).  

