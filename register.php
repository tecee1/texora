<?php
include("config.php");

$message = "";

if(isset($_POST["register"])){

    $fullname = mysqli_real_escape_string($conn, trim($_POST["fullname"]));
    $email = mysqli_real_escape_string($conn, trim($_POST["email"]));
    $password = trim($_POST["password"]);

    // Check if all fields are filled
    if(empty($fullname) || empty($email) || empty($password)){

        $message = '<div class="alert alert-danger">
                        Please fill in all fields.
                    </div>';

    }else{

        // Check if email already exists
        $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

        if(mysqli_num_rows($check) > 0){

            $message = '<div class="alert alert-danger">
                            Email already exists.
                        </div>';

        }else{

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert into database
            $sql = "INSERT INTO users(fullname,email,password)
                    VALUES('$fullname','$email','$hashedPassword')";

            if(mysqli_query($conn,$sql)){

                $message = '<div class="alert alert-success">
                                Registration Successful!
                            </div>';

            }else{

                $message = '<div class="alert alert-danger">
                                Registration Failed!
                            </div>';

            }

        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register | Texora</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow-lg border-0">

                <div class="card-body p-5">

                    <h2 class="text-center mb-4">
                        Create Your Account
                    </h2>

                    <?php echo $message; ?>

                    <form method="POST">

                        <div class="mb-3">

                            <label class="form-label">
                                Full Name
                            </label>

                            <input
                                type="text"
                                name="fullname"
                                class="form-control"
                                placeholder="Enter your full name"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Enter your email"
                                required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Create a password"
                                required>

                        </div>

                        <button
                            type="submit"
                            name="register"
                            class="btn btn-primary w-100">

                            Register

                        </button>

                    </form>

                    <div class="text-center mt-4">

                        Already have an account?

                        <a href="login.php">
                            Login
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>