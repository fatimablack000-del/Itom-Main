<?php include '../includes/header.php'; ?>   

   <body class="sb-nav-fixed">

        <?php include '../includes/navbar.php'; ?>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include '../includes/sidebar.php'; ?>

            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">User List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                User
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Course</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                            require_once '../includes/db_connect.php';

                                            $sql = "SELECT id, username, email, course FROM users";
                                            $result = $conn->query($sql);

                                            if ($result && $result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>".htmlspecialchars($row['id'])."</td>";
                                                    echo "<td>".htmlspecialchars($row['username'])."</td>";
                                                    echo "<td>".htmlspecialchars($row['email'])."</td>";
                                                    echo "<td>".htmlspecialchars($row['course'])."</td>";
                                                    echo "<td>
                                                            <a href='user_edit.php?id=".$row['id']."' class='btn btn-sm btn-primary'>Edit</a>
                                                            <a href='../controllers/process_delete_user.php?id=".$row['id']."' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure?')\">Delete</a>
                                                        </td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='5'>No users found.</td></tr>";
                                            }
                                            ?>
                                    </tbody>
                                </table>
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
