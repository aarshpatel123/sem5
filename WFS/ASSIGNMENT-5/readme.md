# Solution of Practical Assignment - 5

## ✅ **1. Basic Flask App – Display “Welcome to Flask Framework”**

### **app.py**

```python
from flask import Flask

app = Flask(__name__)

@app.route('/')
def home():
    return "Welcome to Flask Framework"

if __name__ == '__main__':
    app.run(debug=True)
```

### **How to Run**

```bash
pip install flask
python app.py
```

Open browser → [http://127.0.0.1:5000/](http://127.0.0.1:5000/)


## ✅ **2. Flask with Multiple Routes using `@app.route()`**

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


## ✅ **3. Using `add_url_rule()` Instead of Decorators**

```python
from flask import Flask

app = Flask(__name__)

def homepage():
    return "Welcome to Home using add_url_rule()"

def contact():
    return "This is Contact Page"

app.add_url_rule('/', 'home', homepage)
app.add_url_rule('/contact', 'contact', contact)

if __name__ == "__main__":
    app.run(debug=True)
```


## ✅ **4. Form Input + Display on Another Page**

### **app.py**

```python
from flask import Flask, render_template, request

app = Flask(__name__)

@app.route('/')
def index():
    return render_template("form.html")

@app.route('/display', methods=['POST'])
def display():
    name = request.form['username']
    return f"Hello {name}, welcome!"

if __name__ == "__main__":
    app.run(debug=True)
```

### **templates/form.html**

```html
<!DOCTYPE html>
<html>
<body>
    <form method="POST" action="/display">
        Enter Name: <input type="text" name="username">
        <input type="submit">
    </form>
</body>
</html>
```


## ✅ **5. Form Handling with GET & POST**

```python
from flask import Flask, render_template, request

app = Flask(__name__)

@app.route('/', methods=['GET', 'POST'])
def form():
    if request.method == 'POST':
        return f"POST method used! Name: {request.form['name']}"
    return '''
        <form method="POST">
            Name: <input type="text" name="name">
            <input type="submit">
        </form>
    '''

if __name__ == "__main__":
    app.run(debug=True)
```


## ✅ **6. Using Jinja2 Template – Display Student Data**

**app.py**

```python
from flask import Flask, render_template

app = Flask(__name__)

@app.route('/')
def student():
    student_info = {"name": "Aarav", "marks": 92}
    return render_template('student.html', data=student_info)

if __name__ == "__main__":
    app.run(debug=True)
```

**templates/student.html**

```html
<!DOCTYPE html>
<html>
<body>
    <h2>Student Details</h2>
    Name: {{ data.name }} <br>
    Marks: {{ data.marks }}
</body>
</html>
```


## ✅ **7. Using Sessions (`session.pop()`)**

```python
from flask import Flask, session

app = Flask(__name__)
app.secret_key = "abc123"

@app.route('/set')
def set_session():
    session['username'] = "John"
    return "Session created!"

@app.route('/remove')
def remove_session():
    session.pop('username', None)
    return "Session removed!"

if __name__ == "__main__":
    app.run(debug=True)
```


## ✅ **8. File Upload and Save**

**app.py**

```python
from flask import Flask, render_template, request
import os

app = Flask(__name__)
UPLOAD_FOLDER = "uploads"
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER

@app.route('/')
def index():
    return render_template("upload.html")

@app.route('/upload', methods=['POST'])
def upload():
    file = request.files['file']
    file.save(os.path.join(app.config['UPLOAD_FOLDER'], file.filename))
    return "File Uploaded Successfully!"

if __name__ == "__main__":
    os.makedirs("uploads", exist_ok=True)
    app.run(debug=True)
```

**templates/upload.html**

```html
<form action="/upload" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload">
</form>
```


## ✅ **9. URL Building using `url_for()`**

```python
from flask import Flask, url_for, redirect

app = Flask(__name__)

@app.route('/')
def home():
    return "Home Page - <a href='/about'>Go to About</a>"

@app.route('/about')
def about():
    return "This is About Page"

@app.route('/goto')
def goto():
    return redirect(url_for('about'))

if __name__ == "__main__":
    app.run(debug=True)
```


## ✅ **10. Redirect Users using `redirect()`**

```python
from flask import Flask, redirect

app = Flask(__name__)

@app.route('/')
def index():
    return redirect("/welcome")

@app.route('/welcome')
def welcome():
    return "You were redirected successfully!"

if __name__ == "__main__":
    app.run(debug=True)
```


### 📌 Folder Structure for Templates-Based Apps

```
project/
│ app.py
│ /uploads
└───/templates
       form.html
       student.html
       upload.html
```


### 🔗 Working Resource Links (Documentation & References)

* Flask Official Docs: [https://flask.palletsprojects.com](https://flask.palletsprojects.com)
* Jinja2 Templates: [https://jinja.palletsprojects.com](https://jinja.palletsprojects.com)
* File Uploads in Flask: [https://flask.palletsprojects.com/en/latest/patterns/fileuploads/](https://flask.palletsprojects.com/en/latest/patterns/fileuploads/)
* Redirect & url_for docs: [https://flask.palletsprojects.com/en/latest/api/#flask.redirect](https://flask.palletsprojects.com/en/latest/api/#flask.redirect)
