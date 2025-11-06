import subprocess

try:
    subprocess.check_call(["python", "--version"])
    subprocess.check_call(["echo", "Hello from Python by Aarsh..!!"])
    print("Command run successfully..!!")
except subprocess.CalledProcessError:
    print("Error executing code..!!")
