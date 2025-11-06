from flask import Flask, render_template

app = Flask(__name__)


@app.route("/")
def home():
    student_data = {
        "name": "Aarsh",
        "gender": "male",
        "age": 100,
    }
    return render_template("index.html", student=student_data)


if __name__ == "__main__":
    app.run(debug=True)
