import subprocess

process = subprocess.Popen(
    ["python", "--version"], stdout=subprocess.PIPE, stderr=subprocess.PIPE
)

# process = subprocess.Popen(
#     ["echo", "Hello from Popen"], stdout=subprocess.PIPE, stderr=subprocess.PIPE
# )

output, error = process.communicate()

print(output.decode())
