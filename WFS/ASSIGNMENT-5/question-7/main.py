from flask import Flask, session

app = Flask(__name__)
app.secret_key = "thisissessionssecretkey"

@app.route("/")
def home():
    username = session.get("username")
    if username:
        return f"Hello, {username}!"
    else:
        return "Hello World!"


@app.route("/set")
def set_session():
    session["username"] = "Aarsh"
    return "Session Created"


@app.route("/remove")
def remove_session():
    session.pop("username", None)
    return "Session Removed"


if __name__ == "__main__":
    app.run(debug=True)
