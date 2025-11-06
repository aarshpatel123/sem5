from flask import Flask

app = Flask(__name__)


def home():
    return "Welcome to Home Page"


def about():
    return "This is About Page..!!"


app.add_url_rule('/', 'home', home)
app.add_url_rule('/about', 'about', about)

if __name__ == "__main__":
    app.run(debug=True)
