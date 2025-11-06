import os

print("Files in current Directory: ", os.listdir("../question-8"))

print("\nWalking through directories:")
for root, dirs, files in os.walk("."):
    print("Root: ", root)
    print("Dirs: ", dirs)
    print("Files: ", files)
