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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <!--ADD USER-->
                        USER FORM

                        <div class="card mb-4">
                            <div class="card-header">
                                Add User
                            </div>
                            <div class="card-body">
                                <form action="../controllers/process_add_user.php" method="POST">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="firstname" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lastname" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="course" class="form-label">Course</label>
                                            <input type="text" class="form-control" id="course" name="course" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Add User</button>
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
