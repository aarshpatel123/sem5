# 🐚 Unix Practical Questions – Directories & Files



## 📂 Creating & Navigating

1. **Create a directory named `unix_practice` in your home directory**
   ```bash
   mkdir ~/unix_practice
   ```

2. **Navigate into `unix_practice`**
   ```bash
   cd ~/unix_practice
   ```

3. **Create two subdirectories named `docs` and `images`**
   ```bash
   mkdir docs images
   ```

4. **Check your current working directory**
   ```bash
   pwd
   ```

5. **List all files and directories in the current directory, including hidden ones**
   ```bash
   ls -a
   ```



## 📄 File Creation & Editing

6. **Create three text files in `docs` named `a.txt`, `b.txt`, and `c.txt`**
   ```bash
   touch docs/a.txt docs/b.txt docs/c.txt
   ```

7. **Write `"Welcome to Unix"` into `a.txt`**
   ```bash
   echo "Welcome to Unix" > docs/a.txt
   ```

8. **Append `"This is a practice session"` to `a.txt`**
   ```bash
   echo "This is a practice session" >> docs/a.txt
   ```

9. **Display the contents of `a.txt` on the screen**
   ```bash
   cat docs/a.txt
   ```

10. **Count the number of words in `a.txt`**
    ```bash
    wc -w docs/a.txt
    ```



## 📁 Copying, Moving & Renaming

11. **Copy `a.txt` to a new file named `a_copy.txt` in the same folder**
    ```bash
    cp docs/a.txt docs/a_copy.txt
    ```

12. **Move `b.txt` to the `images` directory**
    ```bash
    mv docs/b.txt images/
    ```

13. **Rename `c.txt` to `notes.txt`**
    ```bash
    mv docs/c.txt docs/notes.txt
    ```

14. **Copy all `.txt` files from `docs` to `unix_practice` directory**
    ```bash
    cp docs/*.txt .
    ```


## 🧹 Deleting & Cleaning Up

15. **Delete `a_copy.txt`**
    ```bash
    rm docs/a_copy.txt
    ```

16. **Delete the entire `unix_practice` directory in one command**
    ```bash
    rm -r ~/unix_practice
    ```

