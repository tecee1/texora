<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Ask Texora AI</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body {
    background: #f4f7fb;
}

.ai-card {
    margin-top: 60px;
    border: none;
    border-radius: 20px;
}

textarea {
    min-height: 180px;
    resize: vertical;
}

.answer-box {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 20px;
    margin-top: 25px;
}

</style>

</head>

<body>

<div class="container">

<div class="card ai-card shadow p-5">

<h1 class="text-center">
🤖 Ask Texora AI
</h1>

<p class="text-center text-muted">
Ask questions about your studies.
</p>

<form method="POST">

<div class="mb-3">

<label class="form-label">
What would you like to know?
</label>

<textarea
name="question"
class="form-control"
placeholder="Example: Explain Newton's First Law in simple terms..."
required></textarea>

</div>

<button
type="submit"
name="ask"
class="btn btn-primary w-100">

Ask Texora AI 🤖

</button>

</form>

<?php

if (isset($_POST["ask"])) {

    $question = htmlspecialchars($_POST["question"]);

?>

<div class="answer-box">

<h5>🧠 Your Question</h5>

<p>
<?php echo $question; ?>
</p>

<hr>

<h5>🤖 Texora's Answer</h5>

<p class="text-muted">

AI response will appear here.

</p>

</div>

<?php

}

?>

<a href="dashboard.php" class="btn btn-secondary mt-3">
← Back to Dashboard
</a>

</div>

</div>

</body>

</html>