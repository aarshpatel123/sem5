import os

# creating a file descriptor
fd = os.open("testfile.txt", os.O_RDWR | os.O_CREAT)

# write to the file
os.write(fd, b"Hello from os.write\n")

# move cursor to start
os.lseek(fd, 0, 0)

# read content
print(os.read(fd, 100).decode())

# close the file descriptor
os.close(fd)


# Aarsh's code
# with open("testfile2.txt", "w") as file:
#     file.write("Hello world from Aarsh Patel.")

# with open("testfile2.txt", "r") as file:
#     file_data = file.read()
#     print(file_data)
