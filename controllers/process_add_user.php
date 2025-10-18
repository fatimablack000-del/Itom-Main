<?php

  require_once '../includes/db_connect.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $course = trim($_POST['course']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($firstname) || empty($lastname) || empty($email) || empty($course) || empty($username) || empty($password)) { 
    echo "<script>
       alert('Please fill in all fields');
       window.location.href='../pages/add_user.php';
    </script>";
    exit();
  }

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, course, username, password) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssss", $firstname, $lastname, $email, $course, $username, $hashed_password);
  
  if ($stmt->execute()) {
    echo "<script>
       alert('User added successfully');
       window.location.href = '../pages/user_list.php';
    </script>";
  } else {
    echo "<script>
        alert('Failed to add user');
        window.location.href = '../pages/user_list.php';
    </script>";
  }

$stmt->close();
$conn->close();

} else {
    header("Location: ../pages/add_user.php");
exit();

}

  
