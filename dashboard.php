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

<title>Dashboard | Texora AI</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body {
    background: #f4f7fb;
    font-family: Arial, sans-serif;
}

.dashboard-card {
    margin-top: 50px;
    border: none;
    border-radius: 20px;
}

.welcome {
    font-size: 32px;
    font-weight: bold;
}

.feature-card {
    border: none;
    border-radius: 15px;
    transition: 0.2s;
}

.feature-card:hover {
    transform: translateY(-3px);
}

.feature-icon {
    font-size: 40px;
}

.logout-btn {
    width: 100%;
}

</style>

</head>

<body>

<div class="container">

<div class="card dashboard-card shadow p-5">

<h1 class="welcome">
Welcome,
<?php echo htmlspecialchars($_SESSION["fullname"]); ?> 👋
</h1>

<p class="text-muted mt-2">
Welcome to <strong>Texora AI Study Assistant</strong>.
</p>

<hr>

<div class="row g-4 mt-2">

<!-- Ask AI -->

<div class="col-md-4">

<div class="card feature-card shadow-sm p-4 text-center">

<div class="feature-icon">🤖</div>

<h4 class="mt-3">
Ask Texora AI
</h4>

<p class="text-muted">
Ask questions about your school work.
</p>

<a href="ask.php" class="btn btn-primary">
Ask AI
</a>

</div>

</div>


<!-- Upload Notes -->

<div class="col-md-4">

<div class="card feature-card shadow-sm p-4 text-center">

<div class="feature-icon">📤</div>

<h4 class="mt-3">
Upload Notes
</h4>

<p class="text-muted">
Upload your lecture notes as PDF.
</p>

<a href="upload.php" class="btn btn-primary">
Upload Notes
</a>

</div>

</div>


<!-- My Notes -->

<div class="col-md-4">

<div class="card feature-card shadow-sm p-4 text-center">

<div class="feature-icon">📚</div>

<h4 class="mt-3">
My Notes
</h4>

<p class="text-muted">
View your uploaded lecture notes.
</p>

<a href="notes.php" class="btn btn-success">
View Notes
</a>

</div>

</div>


<!-- Summarize -->

<div class="col-md-6">

<div class="card feature-card shadow-sm p-4 text-center">

<div class="feature-icon">📝</div>

<h4 class="mt-3">
Summarize Notes
</h4>

<p class="text-muted">
Turn long lecture notes into simple summaries.
</p>

<a href="summarize.php" class="btn btn-warning">
Summarize
</a>

</div>

</div>


<!-- Practice Questions -->

<div class="col-md-6">

<div class="card feature-card shadow-sm p-4 text-center">

<div class="feature-icon">❓</div>

<h4 class="mt-3">
Practice Questions
</h4>

<p class="text-muted">
Generate questions to prepare for your tests.
</p>

<a href="questions.php" class="btn btn-info">
Generate Questions
</a>

</div>

</div>

</div>

<hr class="mt-5">

<div class="text-center">

<p>
<strong>Email:</strong>
<?php echo htmlspecialchars($_SESSION["email"]); ?>
</p>

<p>
<strong>Role:</strong>
<?php echo htmlspecialchars($_SESSION["role"]); ?>
</p>

<a href="logout.php" class="btn btn-danger logout-btn">
Logout
</a>

</div>

</div>

</div>

</body>

</html>