<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: pages/dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link href="assets/css/styles.css" rel="stylesheet">
</head>
<body class="bg-success">
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-header text-center">
                <h3>Please Login</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="controllers/process_login.php">
                    <div class="form-group mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Login</button>
                </form>
                <?php
                if (isset($_SESSION['error'])) {
                    echo "<p class='text-danger mt-3'>" . $_SESSION['error'] . "</p>";
                    unset($_SESSION['error']);
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
