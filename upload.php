<?php
session_start();
include("config.php");

// User must be logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$message = "";

if (isset($_POST["upload"])) {

    if (isset($_FILES["pdf"]) && $_FILES["pdf"]["error"] == 0) {

        $fileName = $_FILES["pdf"]["name"];
        $tmpName = $_FILES["pdf"]["tmp_name"];

        $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if ($extension == "pdf") {

            if (!is_dir("uploads")) {
                mkdir("uploads", 0777, true);
            }

            $newName = time() . "_" . basename($fileName);

            if (move_uploaded_file($tmpName, "uploads/" . $newName)) {

                $title = pathinfo($fileName, PATHINFO_FILENAME);
                $user_id = $_SESSION["user_id"];

                $sql = "INSERT INTO notes(title, filename, uploaded_by)
                        VALUES('$title', '$newName', '$user_id')";

                if (mysqli_query($conn, $sql)) {

                    $message = '<div class="alert alert-success">
                                    PDF uploaded successfully!
                                </div>';

                } else {

                    $message = '<div class="alert alert-danger">
                                    PDF uploaded, but could not save to the database.
                                </div>';
                }

            } else {

                $message = '<div class="alert alert-danger">
                                Upload failed.
                            </div>';
            }

        } else {

            $message = '<div class="alert alert-danger">
                            Only PDF files are allowed.
                        </div>';
        }

    } else {

        $message = '<div class="alert alert-warning">
                        Please choose a PDF file.
                    </div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Upload Notes | Texora</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow p-5">

<h2>Upload Lecture Notes 📚</h2>

<?php echo $message; ?>

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label>Select PDF</label>

<input
type="file"
name="pdf"
class="form-control"
accept=".pdf"
required>

</div>

<button
type="submit"
name="upload"
class="btn btn-primary">

Upload PDF

</button>

<a href="dashboard.php" class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</body>
</html>