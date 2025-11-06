<?php
$responseAlert = false;
$updateRecordAlert = false;
$deleteRecordAlert = false;

$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Failed to connect with database ...!!!" . mysqli_connect_error());
}

// Handle form submissions (POST requests)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- DELETE RECORD ---
    if (isset($_POST["deleteId"])) {
        $id = $_POST["deleteId"];
        $sql = "DELETE FROM `notes` WHERE id='$id';";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: index.php?deleted=1");
            exit;
        }
    }

    // --- ADD or UPDATE RECORD ---
    else {
        $title = $_POST["title"] ?? '';
        $description = $_POST["description"] ?? '';

        // Update note
        if (!empty($_POST["id"])) {
            $id = $_POST["id"];
            $sql = "UPDATE `notes` SET `title`='$title', `description`='$description' WHERE `id`=$id";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: index.php?updated=1");
                exit;
            }
        }
        // Add new note
        else {
            $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description');";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: index.php?added=1");
                exit;
            } else {
                echo "Error adding note into the database ...!!!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>CRUD with PHP</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="fadein" class="position-fixed top-0 start-0 w-100 h-100 bg-white"
        style="animation: fadeinall 1s normal 0.3s both;"></div>

    <div id="loader-wrapper"
        class="position-fixed top-0 start-0 w-100 h-100 bg-white d-flex align-items-center justify-content-center z-3">
        <div class="spinner-border text-dark" role="status" style="width: 3rem; height: 3rem;">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <header class="position-fixed top-0 start-50 d-inline-block">
        <nav class="navbar navbar-expand-sm bg-body-tertiary text-center m-3 rounded-3 border border-2 shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">CRUD</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container">
        <div class="row">
            <div class="col-4 d-flex align-items-center justify-content-end vh-100 pe-4">
                <form action="/crud/index.php" method="post" class="p-3 rounded-3 shadow w-100" style="max-width: 400px;">
                    <h1 class="h3">Make a Note here...</h1>
                    <hr>
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Create Note</button>
                </form>

                <!-- Hidden delete form -->
                <form action="/crud/index.php" method="post" id="deleteNoteForm" class="d-none">
                    <input type="hidden" name="deleteId" id="deleteId">
                </form>
            </div>

            <div class="col-8 d-flex align-items-center justify-content-center vh-100">
                <div class="w-100">
                    <div class="table-responsive rounded-3 shadow" style="max-height: 70dvh; overflow: auto;">
                        <table class="table table-striped table-hover mb-0" id="notes" style="min-width: 600px;">
                            <thead class="table-light sticky-top" style="z-index: 1;">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $sql = "SELECT * FROM `notes`";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $no += 1;
                                    echo "
                                    <tr>
                                        <th scope='row'>{$no}</th>
                                        <td>{$row['title']}</td>
                                        <td>{$row['description']}</td>
                                        <td>
                                            <button
                                                class='btn btn-secondary btn-sm me-2 edit'
                                                data-id='{$row['id']}'
                                                data-title='{$row['title']}'
                                                data-description='{$row['description']}'
                                            >Edit</button>
                                            <button
                                                class='btn btn-danger btn-sm delete'
                                                data-id='{$row['id']}'
                                            >Delete</button>
                                        </td>
                                    </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if (mysqli_num_rows($result) == 0): ?>
                        <p class="text-center text-muted mt-3">No notes yet. Create one!</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <!-- ALERTS SECTION -->
    <?php
    if (isset($_GET["deleted"])) {
        echo "
            <section class='position-absolute bottom-0 end-0 p-3'>
                <div class='alert alert-danger alert-dismissible fade show rounded-3 shadow-sm' role='alert'>
                    Note deleted <strong>Successfully</strong>
                    <button type='button' class='btn-close border-0 shadow-none' data-bs-dismiss='alert'></button>
                </div>
            </section>
        ";
    }

    if (isset($_GET["updated"])) {
        echo "
            <section class='position-absolute bottom-0 end-0 p-3'>
                <div class='alert alert-success alert-dismissible fade show rounded-3 shadow-sm' role='alert'>
                    Note updated <strong>Successfully</strong>
                    <button type='button' class='btn-close border-0 shadow-none' data-bs-dismiss='alert'></button>
                </div>
            </section>
        ";
    }

    if (isset($_GET["added"])) {
        echo "
            <section class='position-absolute bottom-0 end-0 p-3'>
                <div class='alert alert-success alert-dismissible fade show rounded-3 shadow-sm' role='alert'>
                    Note added <strong>Successfully</strong>
                    <button type='button' class='btn-close border-0 shadow-none' data-bs-dismiss='alert'></button>
                </div>
            </section>
        ";
    }
    ?>

    <footer class="position-fixed bottom-0 start-50 bg-body-tertiary p-3 text-center rounded-3 border border-2 shadow-sm d-inline-block">
        <small>© <script>
                document.write(new Date().getFullYear())
            </script> Your company name. All Rights Reserved.</small>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>

    <script type="text/javascript">
        // Loader animation
        window.addEventListener('load', function() {
            setTimeout(function() {
                const fade = document.getElementById('fadein');
                if (fade) fade.remove();
            }, 1000);
        });

        $(window).on('load', function() {
            $("#loader-wrapper").fadeOut(700, function() {
                $(this).remove();
            });
        });

        // DataTable initialization
        new DataTable('#notes', {
            responsive: true,
            autoWidth: false,
            scrollX: true
        });

        // Edit button handler
        $(".edit").on("click", function() {
            let id = $(this).data("id");
            let title = $(this).data("title");
            let description = $(this).data("description");

            $("#id").val(id);
            $("#title").val(title);
            $("#description").val(description);

            $("button[type='submit']").text("Update Note");
        });

        // Delete button handler
        $(".delete").on("click", function() {
            let id = $(this).data("id");
            $("#deleteId").val(id);
            $("#deleteNoteForm").submit();
        });
    </script>
</body>

</html>