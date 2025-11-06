# ASP.NET Practical Asssignment - 3

## 🗂 Folder Structure (Markdown Format)

```
ADO_NET_Practicals/
│
├── Practical-1_VerifyConnection/
│   └── Program.cs
│
├── Practical-2_ADOObjects/
│   └── Program.cs
│
├── Practical-3_CreateOwnTable_AndBindDataGrid/
│   ├── Form1.cs
│   └── Form1.Designer.cs
│
├── Practical-4_BindData_UsingDataGrid/
│   ├── Form1.cs
│   └── Form1.Designer.cs
│
└── Practical-5_BindStudentDatabase_Repeater/
    ├── Default.aspx
    └── Default.aspx.cs
```

## 🧩 Practical 1 — Verify MySQL Connection using ADO.NET

**File:** `Practical-1_VerifyConnection/Program.cs`

```csharp
using System;
using MySql.Data.MySqlClient;

namespace VerifyMySQLConnection
{
    class Program
    {
        static void Main(string[] args)
        {
            string connStr = "server=localhost;user id=root;password=;database=testdb;";
            using (MySqlConnection conn = new MySqlConnection(connStr))
            {
                try
                {
                    conn.Open();
                    Console.WriteLine("✅ Connection established successfully!");
                }
                catch (Exception ex)
                {
                    Console.WriteLine("❌ Connection failed: " + ex.Message);
                }
            }
            Console.ReadKey();
        }
    }
}
```

📝 **Notes**

-   Install MySQL Connector:
    `Install-Package MySql.Data`

## 🧩 Practical 2 — Demonstrate DataReader, DataSet, DataAdapter, DataView

**File:** `Practical-2_ADOObjects/Program.cs`

```csharp
using System;
using System.Data;
using MySql.Data.MySqlClient;

namespace ADOObjectsDemo
{
    class Program
    {
        static void Main(string[] args)
        {
            string connStr = "server=localhost;user id=root;password=;database=testdb;";
            using (MySqlConnection conn = new MySqlConnection(connStr))
            {
                conn.Open();

                // --- DataReader                 Console.WriteLine("\n--- DataReader Example ---");
                MySqlCommand cmd = new MySqlCommand("SELECT * FROM students", conn);
                MySqlDataReader reader = cmd.ExecuteReader();
                while (reader.Read())
                {
                    Console.WriteLine($"{reader["id"]} - {reader["name"]}");
                }
                reader.Close();

                // --- DataSet, DataAdapter, DataView                 Console.WriteLine("\n--- DataSet, DataAdapter, DataView Example ---");
                MySqlDataAdapter adapter = new MySqlDataAdapter("SELECT * FROM students", conn);
                DataSet ds = new DataSet();
                adapter.Fill(ds, "students");

                DataTable table = ds.Tables["students"];
                DataView view = new DataView(table);
                view.RowFilter = "age > 18";  // example filter

                foreach (DataRowView row in view)
                {
                    Console.WriteLine($"{row["id"]} - {row["name"]} - {row["age"]}");
                }
            }
            Console.ReadKey();
        }
    }
}
```

## 🧩 Practical 3 — Create Own Table & Bind Data using DataGrid

**File:** `Practical-3_CreateOwnTable_AndBindDataGrid/Form1.cs`

```csharp
using System;
using System.Data;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace CreateTableAndBindData
{
    public partial class Form1 : Form
    {
        string connStr = "server=localhost;user id=root;password=;database=testdb;";

        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            using (MySqlConnection conn = new MySqlConnection(connStr))
            {
                conn.Open();
                MySqlCommand createTable = new MySqlCommand(
                    "CREATE TABLE IF NOT EXISTS employee (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50), city VARCHAR(50))", conn);
                createTable.ExecuteNonQuery();

                MySqlCommand insert = new MySqlCommand(
                    "INSERT INTO employee (name, city) VALUES ('Aarsh', 'Surat'), ('Riya', 'Ahmedabad')", conn);
                insert.ExecuteNonQuery();

                MySqlDataAdapter adapter = new MySqlDataAdapter("SELECT * FROM employee", conn);
                DataTable dt = new DataTable();
                adapter.Fill(dt);

                dataGridView1.DataSource = dt;
            }
        }
    }
}
```

**File:** `Form1.Designer.cs`

```csharp
namespace CreateTableAndBindData
{
    partial class Form1
    {
        private System.ComponentModel.IContainer components = null;
        private System.Windows.Forms.DataGridView dataGridView1;

        private void InitializeComponent()
        {
            this.dataGridView1 = new System.Windows.Forms.DataGridView();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).BeginInit();
            this.SuspendLayout();
            this.dataGridView1.Dock = System.Windows.Forms.DockStyle.Fill;
            this.ClientSize = new System.Drawing.Size(600, 400);
            this.Controls.Add(this.dataGridView1);
            this.Text = "Employee Table Binding Example";
            this.Load += new System.EventHandler(this.Form1_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).EndInit();
            this.ResumeLayout(false);
        }
    }
}
```

## 🧩 Practical 4 — Bind Data using DataGrid

**File:** `Practical-4_BindData_UsingDataGrid/Form1.cs`

```csharp
using System;
using System.Data;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace BindDataGridDemo
{
    public partial class Form1 : Form
    {
        string connStr = "server=localhost;user id=root;password=;database=testdb;";

        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            using (MySqlConnection conn = new MySqlConnection(connStr))
            {
                conn.Open();
                MySqlDataAdapter adapter = new MySqlDataAdapter("SELECT * FROM students", conn);
                DataTable dt = new DataTable();
                adapter.Fill(dt);
                dataGridView1.DataSource = dt;
            }
        }
    }
}
```

**File:** `Form1.Designer.cs`

```csharp
namespace BindDataGridDemo
{
    partial class Form1
    {
        private System.ComponentModel.IContainer components = null;
        private System.Windows.Forms.DataGridView dataGridView1;

        private void InitializeComponent()
        {
            this.dataGridView1 = new System.Windows.Forms.DataGridView();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).BeginInit();
            this.SuspendLayout();
            this.dataGridView1.Dock = System.Windows.Forms.DockStyle.Fill;
            this.ClientSize = new System.Drawing.Size(600, 400);
            this.Controls.Add(this.dataGridView1);
            this.Text = "Bind Data using DataGrid";
            this.Load += new System.EventHandler(this.Form1_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).EndInit();
            this.ResumeLayout(false);
        }
    }
}
```

## 🧩 Practical 5 — Bind Student Database using Repeater Control (ASP.NET)

**File:** `Practical-5_BindStudentDatabase_Repeater/Default.aspx`

```aspx
<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="Default.aspx.cs" Inherits="StudentRepeaterDemo.Default" %>
<!DOCTYPE html>
<html>
<head>
    <title>Student Data - Repeater</title>
</head>
<body>
    <form id="form1" runat="server">
        <h2>Student Details</h2>
        <asp:Repeater ID="Repeater1" runat="server">
            <HeaderTemplate>
                <table border="1">
                    <tr><th>ID</th><th>Name</th><th>Age</th></tr>
            </HeaderTemplate>
            <ItemTemplate>
                <tr>
                    <td><%# Eval("id") %></td>
                    <td><%# Eval("name") %></td>
                    <td><%# Eval("age") %></td>
                </tr>
            </ItemTemplate>
            <FooterTemplate></table></FooterTemplate>
        </asp:Repeater>
    </form>
</body>
</html>
```

**File:** `Default.aspx.cs`

```csharp
using System;
using System.Data;
using MySql.Data.MySqlClient;

namespace StudentRepeaterDemo
{
    public partial class Default : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            if (!IsPostBack)
            {
                BindRepeater();
            }
        }

        private void BindRepeater()
        {
            string connStr = "server=localhost;user id=root;password=;database=testdb;";
            using (MySqlConnection conn = new MySqlConnection(connStr))
            {
                conn.Open();
                MySqlDataAdapter da = new MySqlDataAdapter("SELECT * FROM students", conn);
                DataTable dt = new DataTable();
                da.Fill(dt);
                Repeater1.DataSource = dt;
                Repeater1.DataBind();
            }
        }
    }
}
```

## ✅ Summary

| Practical | Description                                            | UI Type           |
| --------- | ------------------------------------------------------ | ----------------- |
| 1         | Verify MySQL Connection                                | Console           |
| 2         | Demonstrate DataReader, DataSet, DataAdapter, DataView | Console           |
| 3         | Create table & bind to DataGrid                        | Windows Forms     |
| 4         | Bind data to DataGrid                                  | Windows Forms     |
| 5         | Bind Student DB via Repeater                           | ASP.NET Web Forms |

## 🔗 Working Resources

-   [Microsoft ADO.NET Overview](https://learn.microsoft.com/en-us/dotnet/framework/data/adonet/ado-net-overview)
-   [MySQL Connector for .NET](https://dev.mysql.com/downloads/connector/net/)
-   [ASP.NET Repeater Control Docs](https://learn.microsoft.com/en-us/dotnet/api/system.web.ui.webcontrols.repeater)
-   [DataGridView Class (WinForms)](https://learn.microsoft.com/en-us/dotnet/api/system.windows.forms.datagridview)
-   [ADO.NET DataAdapter and DataSet Tutorial](https://learn.microsoft.com/en-us/dotnet/framework/data/adonet/populating-a-dataset-from-a-dataadapter)
