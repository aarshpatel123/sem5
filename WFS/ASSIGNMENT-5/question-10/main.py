from flask import Flask, redirect

app = Flask(__name__)


@app.route("/")
def home():
    return redirect("welcome")


@app.route("/welcome")
def welcome():
    return "Welcome to the New Home Page..!!"


if __name__ == "__main__":
    app.run(debug=True)
