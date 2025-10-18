<?php
include '../includes/header.php';
require_once '../includes/db_connect.php';

// Check if ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>
            alert('No user selected.');
            window.location.href = 'user_list.php';
          </script>";
    exit;
}

$id = intval($_GET['id']);

// Fetch user details
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<script>
            alert('User not found.');
            window.location.href = 'user_list.php';
          </script>";
    exit;
}

$user = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<body class="sb-nav-fixed">
    <?php include '../includes/navbar.php'; ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include '../includes/sidebar.php'; ?>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit User</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="user_list.php">User List</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>

                    <div class="card mb-4 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <i class="fas fa-user-edit me-1"></i>
                            Edit User Information
                        </div>

                        <div class="card-body">
                            <form action="../controllers/process_edit_user.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="firstname" class="form-control" 
                                               value="<?php echo htmlspecialchars($user['firstname']); ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="lastname" class="form-control" 
                                               value="<?php echo htmlspecialchars($user['lastname']); ?>" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" 
                                               value="<?php echo htmlspecialchars($user['email']); ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Course</label>
                                        <input type="text" name="course" class="form-control" 
                                               value="<?php echo htmlspecialchars($user['course']); ?>" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control" 
                                               value="<?php echo htmlspecialchars($user['username']); ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Password 
                                            <small class="text-muted">(Leave blank if not changing)</small>
                                        </label>
                                        <input type="password" name="password" class="form-control" 
                                               placeholder="Enter new password (optional)">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="user_list.php" class="btn btn-secondary me-2">Cancel</a>
                                    <button type="submit" class="btn btn-success">Update User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>

            <?php include '../includes/footer.php'; ?>
        </div>
    </div>

    <?php include '../includes/scripts.php'; ?>
</body>
</html>
