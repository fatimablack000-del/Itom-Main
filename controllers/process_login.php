<?php
session_start();
require_once '../includes/db_connect.php'; // Adjust path if needed

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Check for empty fields
    if (empty($username) || empty($password)) {
        echo "<script>
            alert('Username and password are required.');
            window.location.href = '../index.php';
        </script>";
        exit;
    }

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    if (!$stmt) {
        die("Database error: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password (using password_hash / password_verify)
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            echo "<script>
                alert('Login successful!');
                window.location.href = '../pages/dashboard.php';
            </script>";
        } else {
            echo "<script>
                alert('Invalid username or password.');
                window.location.href = '../index.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('User not found.');
            window.location.href = '../index.php';
        </script>";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../index.php");
    exit;
}
?>
