from flask import Flask, render_template, request

app = Flask(__name__)


@app.route("/", methods=["GET", "POST"])
def home():
    if request.method == "POST":
        users_name = request.form["name"]
        return f"<h1>Hello, {users_name}!</h1>"
    return render_template("index.html")


if __name__ == "__main__":
    app.run(debug=True)
