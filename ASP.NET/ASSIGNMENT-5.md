# ASP.NET Practical Asssignment - 5

## 🧩 **Project Title:** ASP.NET User Controls Practical

### 📁 Folder Structure

```
UserControlDemo/
│
├── DateTimeUserControl.ascx
├── DateTimeUserControl.ascx.cs
│
├── ColorUserControl.ascx
├── ColorUserControl.ascx.cs
│
├── Default.aspx
├── Default.aspx.cs
│
├── Web.config
└── App_Data/
```

## 🧠 **1️⃣ User Control for Displaying Current Date and Time**

### **DateTimeUserControl.ascx**

```aspx
<%@ Control Language="C#" AutoEventWireup="true" CodeFile="DateTimeUserControl.ascx.cs" Inherits="DateTimeUserControl" %>
<asp:Label ID="lblDateTime" runat="server" Font-Size="Large" ForeColor="Blue"></asp:Label>
```

### **DateTimeUserControl.ascx.cs**

```csharp
using System;
using System.Web.UI;

public partial class DateTimeUserControl : UserControl
{
    protected void Page_Load(object sender, EventArgs e)
    {
        lblDateTime.Text = "Current Date and Time: " + DateTime.Now.ToString("F");
    }

    public void RefreshDateTime()
    {
        lblDateTime.Text = "Current Date and Time: " + DateTime.Now.ToString("F");
    }
}
```

## **2️⃣ User Control for Selecting Color**

### **ColorUserControl.ascx**

```aspx
<%@ Control Language="C#" AutoEventWireup="true" CodeFile="ColorUserControl.ascx.cs" Inherits="ColorUserControl" %>
<asp:DropDownList ID="ddlColors" runat="server">
    <asp:ListItem>Red</asp:ListItem>
    <asp:ListItem>Blue</asp:ListItem>
    <asp:ListItem>Green</asp:ListItem>
    <asp:ListItem>Yellow</asp:ListItem>
    <asp:ListItem>Orange</asp:ListItem>
    <asp:ListItem>Purple</asp:ListItem>
</asp:DropDownList>
```

### **ColorUserControl.ascx.cs**

```csharp
using System;
using System.Web.UI;

public partial class ColorUserControl : UserControl
{
    public string SelectedColor
    {
        get { return ddlColors.SelectedValue; }
    }
}
```

## **3️⃣ Web Form to Use Both User Controls**

### **Default.aspx**

```aspx
<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Default.aspx.cs" Inherits="_Default" %>
<%@ Register Src="~/DateTimeUserControl.ascx" TagName="DateTimeUserControl" TagPrefix="uc1" %>
<%@ Register Src="~/ColorUserControl.ascx" TagName="ColorUserControl" TagPrefix="uc2" %>

<!DOCTYPE html>
<html>
<head runat="server">
    <title>User Controls Demo</title>
</head>
<body>
    <form id="form1" runat="server">
        <div style="padding: 20px; text-align:center;">
            <h2>ASP.NET User Control Practical</h2>

            <uc1:DateTimeUserControl ID="DateTimeUserControl1" runat="server" />
            <br /><br />
            <asp:Button ID="btnRefresh" runat="server" Text="Refresh Date & Time" OnClick="btnRefresh_Click" />

            <hr />

            <uc2:ColorUserControl ID="ColorUserControl1" runat="server" />
            <br /><br />
            <asp:Button ID="btnChangeColor" runat="server" Text="Change Background Color" OnClick="btnChangeColor_Click" />
        </div>
    </form>
</body>
</html>
```

### **Default.aspx.cs**

```csharp
using System;
using System.Web.UI;

public partial class _Default : Page
{
    protected void btnRefresh_Click(object sender, EventArgs e)
    {
        DateTimeUserControl1.RefreshDateTime();
    }

    protected void btnChangeColor_Click(object sender, EventArgs e)
    {
        string selectedColor = ColorUserControl1.SelectedColor;
        form1.Style["background-color"] = selectedColor;
    }
}
```

## ⚙️ **Web.config (Basic Configuration)**

```xml
<?xml version="1.0"?>
<configuration>
  <system.web>
    <compilation debug="true" targetFramework="4.7.2" />
    <pages controlRenderingCompatibilityVersion="4.0" />
  </system.web>
</configuration>
```

## 🧾 **How It Works**

### ✅ **Part 1: DateTime User Control**

-   Displays the current system **date and time**.
-   When the “Refresh Date & Time” button is clicked, the user control updates with the **latest** time.

### ✅ **Part 2: Color User Control**

-   Displays a **list of colors** in a dropdown menu.
-   When the “Change Background Color” button is clicked, it changes the **background color** of the Web Form to the selected color.

## 📘 **Summary**

| Feature                 | Description                           |
| ----------------------- | ------------------------------------- |
| **DateTimeUserControl** | Shows and refreshes current date/time |
| **ColorUserControl**    | Allows color selection from dropdown  |
| **Default.aspx**        | Integrates both controls with buttons |
| **Languages Used**      | C#, ASP.NET Web Forms                 |
| **Framework**           | .NET Framework 4.7.2                  |

## 🔗 **Working Resources**

-   [ASP.NET User Controls Documentation (Microsoft)](https://learn.microsoft.com/en-us/previous-versions/aspnet/zt27tfhy%28v=vs.100%29)
-   [ASP.NET Web Forms Overview](https://learn.microsoft.com/en-us/aspnet/web-forms/)
-   [DropDownList Control in ASP.NET](https://learn.microsoft.com/en-us/dotnet/api/system.web.ui.webcontrols.dropdownlist)
-   [ASP.NET Page Lifecycle Events](https://learn.microsoft.com/en-us/previous-versions/aspnet/ms178472%28v=vs.100%29)
