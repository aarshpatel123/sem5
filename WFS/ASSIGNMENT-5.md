# WFS Practical Assignment - 5

---

## 🧠 **Q1. Create a basic Flask web application that displays “Welcome to Flask Framework”**

### ✅ **Code**

```python
from flask import Flask
app = Flask(__name__)

@app.route('/')
def home():
    return "Welcome to Flask Framework"

if __name__ == "__main__":
    app.run(debug=True)
```

### ⚙️ **Steps**

1. Save as `app1.py`
2. Run:

   ```bash
   python app1.py
   ```
3. Open browser → [http://127.0.0.1:5000/](http://127.0.0.1:5000/)

### 🖥️ **Output**

```
Welcome to Flask Framework
```

---

## 🧠 **Q2. Develop a Flask program using the route() decorator to handle multiple URL paths like /home and /about.**

### ✅ **Code**

```python
from flask import Flask
app = Flask(__name__)

@app.route('/home')
def home():
    return "This is Home Page"

@app.route('/about')
def about():
    return "This is About Page"

if __name__ == "__main__":
    app.run(debug=True)
```

### ⚙️ **Steps**

1. Save as `app2.py`
2. Run → `python app2.py`
3. Visit:

   * [http://127.0.0.1:5000/home](http://127.0.0.1:5000/home)
   * [http://127.0.0.1:5000/about](http://127.0.0.1:5000/about)

### 🖥️ **Output**

```
/home → This is Home Page
/about → This is About Page
```

---

## 🧠 **Q3. Write a Flask app that uses add_url_rule() method instead of the route() decorator.**

### ✅ **Code**

```python
from flask import Flask
app = Flask(__name__)

def index():
    return "Welcome using add_url_rule()"

def about():
    return "About Page created using add_url_rule()"

app.add_url_rule('/', 'index', index)
app.add_url_rule('/about', 'about', about)

if __name__ == "__main__":
    app.run(debug=True)
```

### ⚙️ **Steps**

1. Save as `app3.py`
2. Run → `python app3.py`
3. Visit:

   * `/`
   * `/about`

### 🖥️ **Output**

```
/ → Welcome using add_url_rule()
/about → About Page created using add_url_rule()
```

---

## 🧠 **Q4. Build a Flask application that accepts user input from an HTML form and displays it on another page.**

### ✅ **Code**

**app4.py**

```python
from flask import Flask, render_template, request
app = Flask(__name__)

@app.route('/')
def index():
    return '''
        <form method="POST" action="/display">
            Enter your name: <input type="text" name="username">
            <input type="submit" value="Submit">
        </form>
    '''

@app.route('/display', methods=['POST'])
def display():
    name = request.form['username']
    return f"Hello {name}, Welcome!"

if __name__ == "__main__":
    app.run(debug=True)
```

### ⚙️ **Steps**

1. Save as `app4.py`
2. Run → `python app4.py`
3. Visit `/`
4. Enter any name and submit.

### 🖥️ **Output**

```
Input: John
Display → Hello John, Welcome!
```

---

## 🧠 **Q5. Create a Flask app using both GET and POST methods to handle form submission.**

### ✅ **Code**

```python
from flask import Flask, request
app = Flask(__name__)

@app.route('/', methods=['GET', 'POST'])
def form():
    if request.method == 'POST':
        name = request.form['name']
        return f"Form submitted using POST method! Hello {name}"
    return '''
        <form method="POST">
            Name: <input type="text" name="name">
            <input type="submit">
        </form>
    '''

if __name__ == "__main__":
    app.run(debug=True)
```

### ⚙️ **Steps**

1. Save as `app5.py`
2. Run → `python app5.py`
3. Visit `/`
4. Enter name → click submit.

### 🖥️ **Output**

```
Form submitted using POST method! Hello Aarav
```

---

## 🧠 **Q6. Design a Flask app using Jinja2 templates to display dynamic data such as student name and marks.**

### ✅ **Code**

**app6.py**

```python
from flask import Flask, render_template
app = Flask(__name__)

@app.route('/')
def student():
    student = {"name": "Aarav", "marks": 92}
    return render_template("student.html", student=student)

if __name__ == "__main__":
    app.run(debug=True)
```

**templates/student.html**

```html
<!DOCTYPE html>
<html>
<body>
<h3>Student Information</h3>
<p>Name: {{ student.name }}</p>
<p>Marks: {{ student.marks }}</p>
</body>
</html>
```

### ⚙️ **Steps**

1. Save files in same folder.
2. Run → `python app6.py`
3. Visit `/`

### 🖥️ **Output**

```
Student Information
Name: Aarav
Marks: 92
```

---

## 🧠 **Q7. Develop a Flask app that creates a session variable to store a username and then removes it using session.pop().**

### ✅ **Code**

```python
from flask import Flask, session
app = Flask(__name__)
app.secret_key = "key123"

@app.route('/set')
def set_session():
    session['username'] = 'John'
    return "Session Variable 'username' Created!"

@app.route('/remove')
def remove_session():
    session.pop('username', None)
    return "Session Variable Removed!"

if __name__ == "__main__":
    app.run(debug=True)
```

### ⚙️ **Steps**

1. Save as `app7.py`
2. Run → `python app7.py`
3. Visit:

   * `/set` → creates session
   * `/remove` → removes session

### 🖥️ **Output**

```
/set → Session Variable 'username' Created!
/remove → Session Variable Removed!
```

---

## 🧠 **Q8. Write a Flask program that allows users to upload a file and save it to a specific folder.**

### ✅ **Code**

**app8.py**

```python
from flask import Flask, render_template, request
import os

app = Flask(__name__)
UPLOAD_FOLDER = "uploads"
os.makedirs(UPLOAD_FOLDER, exist_ok=True)
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER

@app.route('/')
def upload_form():
    return '''
        <form method="POST" enctype="multipart/form-data" action="/upload">
            Select File: <input type="file" name="file">
            <input type="submit" value="Upload">
        </form>
    '''

@app.route('/upload', methods=['POST'])
def upload():
    file = request.files['file']
    file.save(os.path.join(app.config['UPLOAD_FOLDER'], file.filename))
    return f"File '{file.filename}' uploaded successfully!"

if __name__ == "__main__":
    app.run(debug=True)
```

### ⚙️ **Steps**

1. Save as `app8.py`
2. Run → `python app8.py`
3. Visit `/`, upload any file.

### 🖥️ **Output**

```
File 'demo.txt' uploaded successfully!
```

---

## 🧠 **Q9. Implement URL building in Flask using url_for() to navigate between different pages.**

### ✅ **Code**

```python
from flask import Flask, redirect, url_for
app = Flask(__name__)

@app.route('/')
def home():
    return "Home Page <a href='/goto_about'>Go to About</a>"

@app.route('/about')
def about():
    return "Welcome to About Page"

@app.route('/goto_about')
def goto_about():
    return redirect(url_for('about'))

if __name__ == "__main__":
    app.run(debug=True)
```

### ⚙️ **Steps**

1. Save as `app9.py`
2. Run → `python app9.py`
3. Visit `/` → click "Go to About"

### 🖥️ **Output**

```
Home Page → redirects → Welcome to About Page
```

---

## 🧠 **Q10. Create a Flask app that redirects users from one route to another using redirect() function.**

### ✅ **Code**

```python
from flask import Flask, redirect
app = Flask(__name__)

@app.route('/')
def index():
    return redirect("/welcome")

@app.route('/welcome')
def welcome():
    return "Redirected successfully to Welcome Page!"

if __name__ == "__main__":
    app.run(debug=True)
```

### ⚙️ **Steps**

1. Save as `app10.py`
2. Run → `python app10.py`
3. Visit `/`

### 🖥️ **Output**

```
Redirected successfully to Welcome Page!
```
