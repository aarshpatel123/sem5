from flask import Flask, render_template, request, send_from_directory
import os

app = Flask(__name__)
UPLOAD_FOLDER = "uploads"
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER

# Ensure uploads folder exists
os.makedirs(UPLOAD_FOLDER, exist_ok=True)

@app.route('/')
def index():
    files = os.listdir(app.config['UPLOAD_FOLDER'])  # list uploaded files
    return render_template("index.html", files=files)

@app.route('/upload', methods=['POST'])
def upload():
    file = request.files['file']
    if file.filename == "":
        return "No File Selected!"

    file.save(os.path.join(app.config['UPLOAD_FOLDER'], file.filename))
    return "File Uploaded Successfully!"

@app.route('/uploads/<filename>')
def view_file(filename):
    """Serve uploaded file so user can view or download later."""
    return send_from_directory(app.config['UPLOAD_FOLDER'], filename)

if __name__ == "__main__":
    app.run(debug=True)
