import os

path = "testfile.txt"
# path = "../question-8/testfile.txt"
# path = "../question-8/nested_testing_dirs"

print("Exists: ", os.path.exists(path))
print("Is File: ", os.path.isfile(path))
print("Is Directory", os.path.isdir(path))
