# ASP.NET Practical Asssignment - 1

## 🗂️ Folder Structure

```
CSharp_WindowsForms_Projects/
│
├── 1_LabelTextBoxButtonDemo/
│   ├── LabelTextBoxButtonDemo.csproj
│   ├── Program.cs
│   └── MainForm.cs
│
├── 2_RegistrationForm/
│   ├── RegistrationForm.csproj
│   ├── Program.cs
│   └── RegistrationForm.cs
│
├── 3_LoginForm/
│   ├── LoginForm.csproj
│   ├── Program.cs
│   └── LoginForm.cs
│
└── README.md
```


# C# Windows Forms Projects

This repository contains three simple Windows Forms applications written in C# to demonstrate the use of **Label**, **TextBox**, and **Button** controls, and basic form functionality like registration and login.

## Projects Included

### 1️⃣ LabelTextBoxButtonDemo

-   Demonstrates the use of Label, TextBox, and Button controls.
-   When the button is clicked, it displays a message using the entered text.

### 2️⃣ RegistrationForm

-   A simple registration form that takes user details (Name, Email, Contact).
-   On clicking **Submit**, it displays all entered details in a message box.

### 3️⃣ LoginForm

-   A simple login form that checks the entered username and password.
-   Displays a success or failure message based on credentials.

## How to Run

1. Open any folder (e.g., `2_RegistrationForm`) in **Visual Studio**.
2. Build and run the project (press **F5** or click ▶️).
3. Interact with the form as per instructions.

## Requirements

-   Visual Studio 2022 or newer
-   .NET Framework 4.7+ or .NET 6 (Windows Forms)
```

## 1️⃣ Label, TextBox, and Button Demo

**📄 File: `Program.cs`**

```csharp
using System;
using System.Windows.Forms;

namespace LabelTextBoxButtonDemo
{
    static class Program
    {
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);
            Application.Run(new MainForm());
        }
    }
}
```

**📄 File: `MainForm.cs`**

```csharp
using System;
using System.Windows.Forms;

namespace LabelTextBoxButtonDemo
{
    public class MainForm : Form
    {
        Label lblName;
        TextBox txtName;
        Button btnShow;

        public MainForm()
        {
            this.Text = "Label, TextBox, and Button Demo";
            this.Width = 400;
            this.Height = 200;

            lblName = new Label();
            lblName.Text = "Enter your name:";
            lblName.Location = new System.Drawing.Point(30, 30);

            txtName = new TextBox();
            txtName.Location = new System.Drawing.Point(150, 30);
            txtName.Width = 180;

            btnShow = new Button();
            btnShow.Text = "Show Message";
            btnShow.Location = new System.Drawing.Point(150, 70);
            btnShow.Click += BtnShow_Click;

            this.Controls.Add(lblName);
            this.Controls.Add(txtName);
            this.Controls.Add(btnShow);
        }

        private void BtnShow_Click(object sender, EventArgs e)
        {
            MessageBox.Show("Hello, " + txtName.Text + "!", "Greeting");
        }
    }
}
```

## 2️⃣ Registration Form

**📄 File: `Program.cs`**

```csharp
using System;
using System.Windows.Forms;

namespace RegistrationForm
{
    static class Program
    {
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);
            Application.Run(new RegistrationForm());
        }
    }
}
```

**📄 File: `RegistrationForm.cs`**

```csharp
using System;
using System.Windows.Forms;

namespace RegistrationForm
{
    public class RegistrationForm : Form
    {
        Label lblName, lblEmail, lblContact;
        TextBox txtName, txtEmail, txtContact;
        Button btnSubmit;

        public RegistrationForm()
        {
            this.Text = "Registration Form";
            this.Width = 400;
            this.Height = 300;

            lblName = new Label() { Text = "Name:", Location = new System.Drawing.Point(30, 30) };
            lblEmail = new Label() { Text = "Email:", Location = new System.Drawing.Point(30, 80) };
            lblContact = new Label() { Text = "Contact:", Location = new System.Drawing.Point(30, 130) };

            txtName = new TextBox() { Location = new System.Drawing.Point(150, 30), Width = 200 };
            txtEmail = new TextBox() { Location = new System.Drawing.Point(150, 80), Width = 200 };
            txtContact = new TextBox() { Location = new System.Drawing.Point(150, 130), Width = 200 };

            btnSubmit = new Button() { Text = "Submit", Location = new System.Drawing.Point(150, 180) };
            btnSubmit.Click += BtnSubmit_Click;

            Controls.Add(lblName);
            Controls.Add(lblEmail);
            Controls.Add(lblContact);
            Controls.Add(txtName);
            Controls.Add(txtEmail);
            Controls.Add(txtContact);
            Controls.Add(btnSubmit);
        }

        private void BtnSubmit_Click(object sender, EventArgs e)
        {
            string details = $"Name: {txtName.Text}\nEmail: {txtEmail.Text}\nContact: {txtContact.Text}";
            MessageBox.Show(details, "Registration Details");
        }
    }
}
```

## 3️⃣ Login Form

**📄 File: `Program.cs`**

```csharp
using System;
using System.Windows.Forms;

namespace LoginFormApp
{
    static class Program
    {
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);
            Application.Run(new LoginForm());
        }
    }
}
```

**📄 File: `LoginForm.cs`**

```csharp
using System;
using System.Windows.Forms;

namespace LoginFormApp
{
    public class LoginForm : Form
    {
        Label lblUser, lblPass;
        TextBox txtUser, txtPass;
        Button btnLogin;

        public LoginForm()
        {
            this.Text = "Login Form";
            this.Width = 350;
            this.Height = 220;

            lblUser = new Label() { Text = "Username:", Location = new System.Drawing.Point(30, 40) };
            lblPass = new Label() { Text = "Password:", Location = new System.Drawing.Point(30, 80) };

            txtUser = new TextBox() { Location = new System.Drawing.Point(130, 40), Width = 150 };
            txtPass = new TextBox() { Location = new System.Drawing.Point(130, 80), Width = 150, PasswordChar = '*' };

            btnLogin = new Button() { Text = "Login", Location = new System.Drawing.Point(130, 120) };
            btnLogin.Click += BtnLogin_Click;

            Controls.Add(lblUser);
            Controls.Add(lblPass);
            Controls.Add(txtUser);
            Controls.Add(txtPass);
            Controls.Add(btnLogin);
        }

        private void BtnLogin_Click(object sender, EventArgs e)
        {
            string username = txtUser.Text;
            string password = txtPass.Text;

            if (username == "admin" && password == "1234")
                MessageBox.Show("Login Successful!", "Welcome");
            else
                MessageBox.Show("Invalid Username or Password", "Error");
        }
    }
}
```

## ✅ Summary

| Project Name               | Description                                           |
| -------------------------- | ----------------------------------------------------- |
| **LabelTextBoxButtonDemo** | Demonstrates Label, TextBox, and Button functionality |
| **RegistrationForm**       | Collects and displays registration data               |
| **LoginForm**              | Simple authentication form                            |

## 📚 Resources / References

-   [Microsoft Docs – Windows Forms Overview](https://learn.microsoft.com/en-us/dotnet/desktop/winforms/overview/)
-   [Microsoft Docs – Label Class](https://learn.microsoft.com/en-us/dotnet/api/system.windows.forms.label)
-   [Microsoft Docs – TextBox Class](https://learn.microsoft.com/en-us/dotnet/api/system.windows.forms.textbox)
-   [Microsoft Docs – Button Class](https://learn.microsoft.com/en-us/dotnet/api/system.windows.forms.button)
-   [TutorialsTeacher – C# Windows Forms](https://www.tutorialsteacher.com/csharp/create-first-csharp-windows-form)
-   [GeeksforGeeks – Windows Forms in C#](https://www.geeksforgeeks.org/windows-forms-in-c-sharp/)
