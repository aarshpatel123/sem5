from flask import Flask, render_template, request

app = Flask(__name__)


@app.route('/')
def hello_world():
    return render_template("index.html")


@app.route('/name', methods=["POST"])
def name():
    users_name = request.form["name"]
    return f"Hello, {users_name}!"


if __name__ == '__main__':
    app.run(debug=True)
