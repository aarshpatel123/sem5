# ASP.NET Practical Asssignment - 2

## 🗂️ **Project Folder Structure**

```
ASPNet_Validation_Practicals/
│
├── RegularExpressionValidation/
│   ├── RegularExpressionValidation.aspx
│   ├── RegularExpressionValidation.aspx.cs
│   └── Web.config
│
├── RequiredFieldValidation/
│   ├── RequiredFieldValidation.aspx
│   ├── RequiredFieldValidation.aspx.cs
│   └── Web.config
│
├── CompareValidation/
│   ├── CompareValidation.aspx
│   ├── CompareValidation.aspx.cs
│   └── Web.config
│
├── RangeValidation/
│   ├── RangeValidation.aspx
│   ├── RangeValidation.aspx.cs
│   └── Web.config
│
├── CalendarVacation/
│   ├── CalendarVacation.aspx
│   ├── CalendarVacation.aspx.cs
│   └── Web.config
│
└── DataListControl/
    ├── DataListControl.aspx
    ├── DataListControl.aspx.cs
    └── Web.config
```

## 🧩 1. Regular Expression Validation

**File:** `RegularExpressionValidation.aspx`

```aspx
<%@ Page Language="C#" AutoEventWireup="true" CodeFile="RegularExpressionValidation.aspx.cs" Inherits="RegularExpressionValidation" %>

<!DOCTYPE html>
<html>
<head>
    <title>Regular Expression Validation</title>
</head>
<body>
    <form id="form1" runat="server">
        <h2>Email Validation Example</h2>
        <asp:Label ID="Label1" runat="server" Text="Enter Email: "></asp:Label>
        <asp:TextBox ID="txtEmail" runat="server"></asp:TextBox>

        <asp:RegularExpressionValidator
            ID="RegexValidator"
            runat="server"
            ControlToValidate="txtEmail"
            ErrorMessage="Enter a valid Email Address"
            ForeColor="Red"
            ValidationExpression="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
        </asp:RegularExpressionValidator>

        <br /><br />
        <asp:Button ID="btnSubmit" runat="server" Text="Submit" />
    </form>
</body>
</html>
```

**Code-behind:** `RegularExpressionValidation.aspx.cs`

```csharp
using System;
public partial class RegularExpressionValidation : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
    }
}
```

## 🧩 2. Required Field Validation

**File:** `RequiredFieldValidation.aspx`

```aspx
<%@ Page Language="C#" AutoEventWireup="true" CodeFile="RequiredFieldValidation.aspx.cs" Inherits="RequiredFieldValidation" %>

<!DOCTYPE html>
<html>
<head>
    <title>Required Field Validation</title>
</head>
<body>
    <form id="form1" runat="server">
        <h2>Required Field Example</h2>
        <asp:Label ID="Label1" runat="server" Text="Enter Your Name: "></asp:Label>
        <asp:TextBox ID="txtName" runat="server"></asp:TextBox>

        <asp:RequiredFieldValidator
            ID="RequiredFieldValidator1"
            runat="server"
            ControlToValidate="txtName"
            ErrorMessage="Name is required"
            ForeColor="Red">
        </asp:RequiredFieldValidator>

        <br /><br />
        <asp:Button ID="btnSubmit" runat="server" Text="Submit" />
    </form>
</body>
</html>
```

**Code-behind:** `RequiredFieldValidation.aspx.cs`

```csharp
using System;
public partial class RequiredFieldValidation : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
    }
}
```

## 🧩 3. Compare Validation (Password Check)

**File:** `CompareValidation.aspx`

```aspx
<%@ Page Language="C#" AutoEventWireup="true" CodeFile="CompareValidation.aspx.cs" Inherits="CompareValidation" %>

<!DOCTYPE html>
<html>
<head>
    <title>Compare Validation - Password Check</title>
</head>
<body>
    <form id="form1" runat="server">
        <h2>Password Validation Example</h2>
        <asp:Label ID="Label1" runat="server" Text="Enter Password: "></asp:Label>
        <asp:TextBox ID="txtPassword" TextMode="Password" runat="server"></asp:TextBox>

        <br /><br />
        <asp:Label ID="Label2" runat="server" Text="Confirm Password: "></asp:Label>
        <asp:TextBox ID="txtConfirm" TextMode="Password" runat="server"></asp:TextBox>

        <asp:CompareValidator
            ID="CompareValidator1"
            runat="server"
            ControlToValidate="txtConfirm"
            ControlToCompare="txtPassword"
            ErrorMessage="Passwords do not match!"
            ForeColor="Red">
        </asp:CompareValidator>

        <br /><br />
        <asp:Button ID="btnSubmit" runat="server" Text="Submit" OnClick="btnSubmit_Click" />
    </form>
</body>
</html>
```

**Code-behind:** `CompareValidation.aspx.cs`

```csharp
using System;
using System.Web.UI;

public partial class CompareValidation : Page
{
    protected void btnSubmit_Click(object sender, EventArgs e)
    {
        if (Page.IsValid)
        {
            Response.Write("<script>alert('Password Matched! Form Submitted.');</script>");
        }
    }
}
```

## 🧩 4. Range Validation (Age Check)

**File:** `RangeValidation.aspx`

```aspx
<%@ Page Language="C#" AutoEventWireup="true" CodeFile="RangeValidation.aspx.cs" Inherits="RangeValidation" %>

<!DOCTYPE html>
<html>
<head>
    <title>Range Validation - Age Check</title>
</head>
<body>
    <form id="form1" runat="server">
        <h2>Enter Your Age:</h2>
        <asp:TextBox ID="txtAge" runat="server"></asp:TextBox>

        <asp:RangeValidator
            ID="RangeValidator1"
            runat="server"
            ControlToValidate="txtAge"
            MinimumValue="1"
            MaximumValue="120"
            Type="Integer"
            ErrorMessage="Age must be between 1 and 120"
            ForeColor="Red">
        </asp:RangeValidator>

        <br /><br />
        <asp:Button ID="btnSubmit" runat="server" Text="Submit" />
    </form>
</body>
</html>
```

**Code-behind:** `RangeValidation.aspx.cs`

```csharp
using System;
public partial class RangeValidation : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
    }
}
```

## 🧩 5. Calendar Vacation Display

**File:** `CalendarVacation.aspx`

```aspx
<%@ Page Language="C#" AutoEventWireup="true" CodeFile="CalendarVacation.aspx.cs" Inherits="CalendarVacation" %>

<!DOCTYPE html>
<html>
<head>
    <title>Calendar Vacation Display</title>
</head>
<body>
    <form id="form1" runat="server">
        <h2>Select Your Vacation Dates</h2>
        <asp:Calendar ID="Calendar1" runat="server" OnSelectionChanged="Calendar1_SelectionChanged"></asp:Calendar>
        <br />
        <asp:Label ID="lblVacation" runat="server" ForeColor="Green"></asp:Label>
    </form>
</body>
</html>
```

**Code-behind:** `CalendarVacation.aspx.cs`

```csharp
using System;
public partial class CalendarVacation : System.Web.UI.Page
{
    protected void Calendar1_SelectionChanged(object sender, EventArgs e)
    {
        lblVacation.Text = "Your Vacation Date: " + Calendar1.SelectedDate.ToShortDateString();
    }
}
```

## 🧩 6. Data List Control Example

**File:** `DataListControl.aspx`

```aspx
<%@ Page Language="C#" AutoEventWireup="true" CodeFile="DataListControl.aspx.cs" Inherits="DataListControl" %>

<!DOCTYPE html>
<html>
<head>
    <title>DataList Control Example</title>
</head>
<body>
    <form id="form1" runat="server">
        <h2>Data List Example</h2>
        <asp:DataList ID="DataList1" runat="server" RepeatColumns="2" BorderWidth="1">
            <ItemTemplate>
                <div style="border:1px solid #ccc; margin:10px; padding:10px; width:150px;">
                    <b>ID:</b> <%# Eval("ID") %><br />
                    <b>Name:</b> <%# Eval("Name") %><br />
                    <b>City:</b> <%# Eval("City") %>
                </div>
            </ItemTemplate>
        </asp:DataList>
    </form>
</body>
</html>
```

**Code-behind:** `DataListControl.aspx.cs`

```csharp
using System;
using System.Data;

public partial class DataListControl : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!IsPostBack)
        {
            DataTable dt = new DataTable();
            dt.Columns.Add("ID");
            dt.Columns.Add("Name");
            dt.Columns.Add("City");

            dt.Rows.Add("1", "Aarsh", "Ahmedabad");
            dt.Rows.Add("2", "Neha", "Mumbai");
            dt.Rows.Add("3", "Karan", "Delhi");

            DataList1.DataSource = dt;
            DataList1.DataBind();
        }
    }
}
```

## ✅ **Summary of Features**

| Program | Concept            | ASP.NET Control Used         |
| ------- | ------------------ | ---------------------------- |
| 1       | Email Validation   | `RegularExpressionValidator` |
| 2       | Required Field     | `RequiredFieldValidator`     |
| 3       | Password Compare   | `CompareValidator`           |
| 4       | Age Range          | `RangeValidator`             |
| 5       | Vacation Selection | `Calendar`                   |
| 6       | Data Display       | `DataList`                   |

## 📚 Resources / References

-   [ASP.NET Validation Controls - Microsoft Docs](https://learn.microsoft.com/en-us/previous-versions/ms972423%28v=msdn.10%29)
-   [ASP.NET Calendar Control](https://learn.microsoft.com/en-us/dotnet/api/system.web.ui.webcontrols.calendar)
-   [ASP.NET DataList Class](https://learn.microsoft.com/en-us/dotnet/api/system.web.ui.webcontrols.datalist)
-   [W3Schools ASP.NET Validators](https://www.w3schools.com/aspnet/aspnet_validation.asp)
