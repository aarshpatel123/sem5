import subprocess

# output = subprocess.check_output(["python","--version"])
output = subprocess.check_output(["echo", "Testing check_output method"])
print(output.decode())
