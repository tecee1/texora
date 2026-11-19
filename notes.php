<?php
session_start();
include("config.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM notes 
        WHERE uploaded_by='$user_id' 
        ORDER BY uploaded_at DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Notes | Texora</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow p-4">

<h2 class="mb-4">📚 My Lecture Notes</h2>

<a href="upload.php" class="btn btn-primary mb-3">
    Upload Another PDF
</a>

<table class="table table-bordered">

<thead>

<tr>
    <th>Title</th>
    <th>Date Uploaded</th>
    <th>Action</th>
</tr>

</thead>

<tbody>

<?php

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        $filename = $row["filename"];

        // Convert spaces and special characters correctly for the URL
        $fileUrl = "uploads/" . rawurlencode($filename);

?>

<tr>

<td>
    <?php echo htmlspecialchars($row["title"]); ?>
</td>

<td>
    <?php echo htmlspecialchars($row["uploaded_at"]); ?>
</td>

<td>

<a
    href="<?php echo htmlspecialchars($fileUrl); ?>"
    target="_blank"
    class="btn btn-success btn-sm">

    View PDF

</a>

</td>

</tr>

<?php

    }

} else {

?>

<tr>

<td colspan="3" class="text-center">

No lecture notes uploaded yet.

</td>

</tr>

<?php

}

?>

</tbody>

</table>

<a href="dashboard.php" class="btn btn-secondary">
    Back to Dashboard
</a>

</div>

</div>

</body>

</html>