# ASP.NET Practical Asssignment - 4

## ASP.NET WebForms — State Management (Login/Home/Logout) + Web Service

This document contains a complete, minimal ASP.NET WebForms project that demonstrates:

-   State management using `Session` (Login -> Home -> Logout)
-   A simple ASMX web service (`ExampleService.asmx`) and how to call it from the website (client-side `fetch`).

## Project File Structure

```
AspNetSessionWebServiceProject/
├── ExampleService.asmx
├── ExampleService.asmx.cs
├── App_Code/
│   └── UserStore.cs
├── Login.aspx
├── Login.aspx.cs
├── Home.aspx
├── Home.aspx.cs
├── Logout.aspx
├── Logout.aspx.cs
├── Web.config
└── Global.asax
```

## 1) `App_Code/UserStore.cs` (simple in-memory user validator)

```csharp
using System.Collections.Generic;

public static class UserStore
{
    // Simple in-memory user store (username -> password)
    private static Dictionary<string, string> _users = new Dictionary<string, string>
    {
        { "admin", "admin123" },
        { "user", "password" }
    };

    public static bool ValidateUser(string username, string password)
    {
        if (string.IsNullOrEmpty(username) || string.IsNullOrEmpty(password))
            return false;

        if (_users.ContainsKey(username) && _users[username] == password)
            return true;

        return false;
    }
}
```

## 2) `Login.aspx`

```aspx
<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Login.aspx.cs" Inherits="Login" %>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Login - ASP.NET Session Demo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .box { width: 320px; padding: 20px; border: 1px solid #ccc; border-radius: 6px; }
        label, input { display:block; width:100%; margin-bottom:10px; }
        input[type=text], input[type=password] { padding:8px; }
        input[type=submit] { padding:8px 12px; }
        .error { color:red; }
    </style>
</head>
<body>
    <form id="form1" runat="server">
    <div class="box">
        <h2>Login</h2>
        <asp:Label ID="lblError" runat="server" CssClass="error"></asp:Label>

        <asp:Label ID="Label1" runat="server" Text="Username"></asp:Label>
        <asp:TextBox ID="txtUsername" runat="server"></asp:TextBox>

        <asp:Label ID="Label2" runat="server" Text="Password"></asp:Label>
        <asp:TextBox ID="txtPassword" runat="server" TextMode="Password"></asp:TextBox>

        <asp:Button ID="btnLogin" runat="server" Text="Login" OnClick="btnLogin_Click" />
    </div>
    </form>
</body>
</html>
```

## 3) `Login.aspx.cs` (code-behind)

```csharp
using System;

public partial class Login : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        // If user already logged in, redirect to Home
        if (Session["User"] != null)
        {
            Response.Redirect("Home.aspx");
        }
    }

    protected void btnLogin_Click(object sender, EventArgs e)
    {
        string username = txtUsername.Text.Trim();
        string password = txtPassword.Text;

        if (UserStore.ValidateUser(username, password))
        {
            // Set session
            Session["User"] = username;
            // Optionally set other session data
            Session["LoggedInAt"] = DateTime.Now.ToString();

            Response.Redirect("Home.aspx");
        }
        else
        {
            lblError.Text = "Invalid username or password.";
        }
    }
}
```

## 4) `Home.aspx`

```aspx
<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Home.aspx.cs" Inherits="Home" %>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Home - ASP.NET Session Demo</title>
    <script type="text/javascript">
        async function callService() {
            const name = document.getElementById('txtServiceName').value || 'Guest';
            const response = await fetch('ExampleService.asmx/GetMessage', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json; charset=utf-8'
                },
                body: JSON.stringify({ name: name })
            });
            const json = await response.json();
            // ASMX returns { "d": result }
            document.getElementById('serviceResult').innerText = json.d;
        }
    </script>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
    </style>
</head>
<body>
    <form id="form1" runat="server">
        <h2>Home Page</h2>
        <asp:Label ID="lblWelcome" runat="server" Text=""></asp:Label>
        <br /><br />

        <a href="Logout.aspx">Logout</a>

        <hr />
        <h3>Call ExampleService (web service)</h3>
        <input id="txtServiceName" placeholder="Enter name" />
        <button type="button" onclick="callService()">Call Service</button>
        <div id="serviceResult" style="margin-top:10px;font-weight:bold;"></div>
    </form>
</body>
</html>
```

## 5) `Home.aspx.cs` (code-behind)

```csharp
using System;

public partial class Home : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Session["User"] == null)
        {
            // Not logged in — redirect to login
            Response.Redirect("Login.aspx");
            return;
        }

        if (!IsPostBack)
        {
            lblWelcome.Text = "Welcome, " + Session["User"].ToString() + "!";
        }
    }
}
```

## 6) `Logout.aspx` (simple page that clears session)

```aspx
<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Logout.aspx.cs" Inherits="Logout" %>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Logout</title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <h3>Logging out...</h3>
        </div>
    </form>
</body>
</html>
```

`Logout.aspx.cs`

```csharp
using System;

public partial class Logout : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        // Clear session and redirect to login
        Session.Clear();
        Session.Abandon();
        // Optionally clear cookies if needed
        Response.Redirect("Login.aspx");
    }
}
```

## 7) `ExampleService.asmx` (ASMX web service declaration)

```xml
<%@ WebService Language="C#" CodeBehind="ExampleService.asmx.cs" Class="ExampleService" %>
```

`ExampleService.asmx.cs`

```csharp
using System;
using System.Web.Services;
using System.Web.Script.Services;

[WebService(Namespace = "http://tempuri.org/")]
[WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
[System.ComponentModel.ToolboxItem(false)]
[ScriptService] // allow calling from script (JSON)
public class ExampleService : System.Web.Services.WebService
{
    [WebMethod]
    public string Hello()
    {
        return "Hello from server!";
    }

    [WebMethod]
    public int Add(int a, int b)
    {
        return a + b;
    }

    [WebMethod]
    [ScriptMethod(ResponseFormat = ResponseFormat.Json)]
    public string GetMessage(string name)
    {
        return $"Server says: Hello, {name}! (time: {DateTime.Now})";
    }
}
```

## 8) `Global.asax` (optional)

```csharp
<%@ Application Language="C#" %>

<script runat="server">
    void Application_Start(object sender, EventArgs e)
    {
        // Code that runs on application startup
    }

    void Session_Start(object sender, EventArgs e)
    {
    }

    void Application_End(object sender, EventArgs e) { }
    void Session_End(object sender, EventArgs e) { }
</script>
```

## 9) `Web.config` (minimal, enabling script services and session defaults)

```xml
<?xml version="1.0"?>
<configuration>
  <system.web>
    <compilation debug="true" targetFramework="4.7.2" />
    <httpRuntime targetFramework="4.7.2" />

    <!-- Session settings (default in-proc) -->
    <sessionState mode="InProc" timeout="20" />

    <!-- Allow script services to be called from client -->
    <pages controlRenderingCompatibilityVersion="3.5" clientIDMode="AutoID" />
  </system.web>

  <system.webServer>
    <modules runAllManagedModulesForAllRequests="true" />
  </system.webServer>
</configuration>
```

## How it works — Quick notes

-   Login page uses `UserStore.ValidateUser` (in `App_Code`) to check credentials.
-   On successful login we set `Session["User"] = username;` and redirect to Home.
-   Home page checks `Session["User"]` and if absent redirects back to Login.
-   Logout page clears the session and abandons it.
-   `ExampleService.asmx` is an ASMX web service with methods that can be called server-side or client-side via `fetch` (JSON) as shown in `Home.aspx`.

## Deployment / Build notes

1. Create an **ASP.NET Web Site** or **Web Application** project in Visual Studio (the file layout above matches a simple web site layout).
2. Ensure `ExampleService.asmx` is in the project root and that the `.asmx.cs` code-behind class name matches the class attribute used in the directive.
3. If you prefer strongly-typed Web Application projects, you may need to adjust `CodeBehind` / `Inherits` attributes appropriately.
4. Ensure `App_Code` folder exists (Web Site projects treat it specially).

## Security & production notes

-   This example uses an in-memory user store and plaintext passwords for demo only. In production:
    -   Store hashed & salted passwords (e.g., PBKDF2/BCrypt/Argon2).
    -   Use HTTPS.
    -   Consider Forms Authentication or ASP.NET Identity instead of plain `Session`.
    -   Move session state out of InProc (SQL Server, Redis) if you have multiple web servers.

## Troubleshooting

-   If ASMX JSON calls return 500, check that [ScriptService] attribute is present and that `Content-Type` is `application/json`.
-   If `Session` disappears between requests, ensure your app pool isn't recycling rapidly, and that cookies are enabled in the browser.

Done — I created a full, ready-to-copy project document named **ASP.NET-Session-Login-WebService-FullProject** in the canvas (you can open it in the editor panel). It contains the complete file tree and full source code for every file (Login, Home, Logout, the ASMX web service, `App_Code/UserStore`, `Web.config`, and more) plus notes on how to build, deploy, and secure the app.

Below are a few working resource links you asked for (clickable):

-   Microsoft: ASP.NET Web Forms overview — [https://learn.microsoft.com/en-us/aspnet/web-forms/overview/](https://learn.microsoft.com/en-us/aspnet/web-forms/overview/)
-   Microsoft: Session State in ASP.NET (classic guidance) — [https://learn.microsoft.com/en-us/previous-versions/aspnet/ms178581(v=vs.140)](https://learn.microsoft.com/en-us/previous-versions/aspnet/ms178581%28v=vs.140%29)
-   Microsoft: XML Web Services (ASMX) overview — [https://learn.microsoft.com/en-us/previous-versions/dotnet/netframework-4.0/bb398998(v=vs.100)](https://learn.microsoft.com/en-us/previous-versions/dotnet/netframework-4.0/bb398998%28v=vs.100%29)
-   Tutorial: Calling ASMX services from JavaScript / AJAX (tutorial + examples) — [https://www.tutorialspoint.com/asp.net/asp.net_web_services.htm](https://www.tutorialspoint.com/asp.net/asp.net_web_services.htm)
-   Quick reference (W3Schools) — [https://www.w3schools.com/asp/asp_ref_session.asp](https://www.w3schools.com/asp/asp_ref_session.asp)

If you want, I can now:

-   Convert the project to an **ASP.NET MVC** or **ASP.NET Core** equivalent, or
-   Add client-side validation, or
-   Show how to consume the ASMX service from server-side code (C#) as well.

Which would you like next?
