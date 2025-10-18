<?php
require_once '../includes/db_connect.php';

if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        echo "<script>
            alert('User deleted successfully');
            window.location.href = '../pages/user_list.php';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Error deleting user');
            window.location.href = '../pages/user_list.php';
        </script>";
    }

    $stmt->close();
} else {
    echo "<script>
        alert('Invalid request');
        window.location.href = '../pages/user_list.php';
    </script>";
}

$conn->close();
?>