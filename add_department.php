<?php

session_start();
$error = "";

if (isset($_POST['submit'])) {
    if (empty($_POST['department_name'])) {
        $error = "Vui lòng không để trống!";
    } else {
        $department_name = $_POST['department_name'];

        require_once ('connect_db.php');

        $query = "INSERT INTO chuc_vu_tbl(id_cv, chuc_vu, ngay_them) VALUES (NULL,'$department_name',NULL);";

        $con->query($query);

        header("Location: department.php");
        exit();
    }
}


if (isset($_SESSION['username']) && isset($_SESSION['user_type']) && $_SESSION['logged_in']) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="\assets\styles.css">
        <title>Home Page</title>
    </head>

    <body>
        <!-- Side Bar -->
        <div class="side_bar fixed-top">
            <div class="container-fluid">
                <div class="row flex-nowrap">
                    <div class="col-auto col-md-3 col-xl-2 col-2 bg-dark">
                        <div
                            class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

                            <div class="title">
                                <p>Hệ thống quản lý nhân viên</p>
                            </div>
                            <hr style="border: 2px solid white; min-width: 100%">
                            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                                id="menu" style="min-width: 100%">
                                <li class="nav-item side-item">
                                    <a href="home.php" class="nav-link align-middle px-0 text-white">
                                        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Trang chủ</span>
                                    </a>
                                </li>
                                <li class="nav-item side-item dropdown">
                                    <a class="nav-link dropdown-toggle px-0 align-middle text-white" href="#"
                                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fs-4 bi bi-table"></i> <span class="ms-1 d-none d-sm-inline">Phòng
                                            ban</span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="department.php">Xem Phòng ban</a></li>
                                        <li><a class="dropdown-item" href="add_department.php">Thêm Phòng ban</a></li>
                                        <!-- Các mục dropdown khác có thể thêm vào đây -->
                                    </ul>
                                </li>

                                <li class="nav-item side-item dropdown">
                                    <a class="nav-link dropdown-toggle px-0 align-middle text-white" href="#"
                                        id="navbarDropdownStaff" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fs-4 bi bi-people"></i> <span class="ms-1 d-none d-sm-inline">Nhân
                                            viên</span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownStaff">
                                        <li><a class="dropdown-item" href="staff.php">Xem Nhân viên</a></li>
                                        <li><a class="dropdown-item" href="add_staff.php">Thêm Nhân viên</a></li>
                                        <!-- Các mục dropdown khác có thể thêm vào đây -->
                                    </ul>
                                </li>

                                <li class="nav-item side-item dropdown">
                                    <a class="nav-link dropdown-toggle px-0 align-middle text-white" href="#"
                                        id="navbarDropdownSalary" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fs-4 bi bi-cash-coin"></i> <span
                                            class="ms-1 d-none d-sm-inline">Lương</span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownSalary">
                                        <li><a class="dropdown-item" href="salary.php">Xem Lương</a></li>
                                        <li><a class="dropdown-item" href="add_salary.php">Thêm Lương</a></li>
                                        <!-- Các mục dropdown khác có thể thêm vào đây -->
                                    </ul>
                                </li>

                                <li class="nav-item side-item dropdown">
                                    <a class="nav-link dropdown-toggle px-0 align-middle text-white" href="#"
                                        id="navbarDropdownLeave" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fs-4 bi bi-person-x"></i> <span class="ms-1 d-none d-sm-inline">Nghỉ
                                            phép</span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownLeave">
                                        <li><a class="dropdown-item" href="leave.php">Xem Nghỉ phép</a></li>
                                        <li><a class="dropdown-item" href="add_leave.php">Thêm Nghỉ phép</a></li>
                                        <!-- Các mục dropdown khác có thể thêm vào đây -->
                                    </ul>
                                </li>

                            </ul>

                            <hr style="border: 2px solid white; min-width: 100%">
                            <div class="dropdown pb-4">
                                <a href="#"
                                    class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="\assets\img\defautl_avatar.svg" alt="hugenerd" width="50" height="50"
                                        class="rounded-circle">
                                    <span class="d-none d-sm-inline mx-3">Admin</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark text-small shadow"
                                    aria-labelledby="dropdownUser1">
                                    <li><a class="dropdown-item" href="#">New project...</a></li>
                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col py-3 main">
                        <h1>Thêm Chức Vụ</h1>

                        <hr style="border: 2px solid blue">
                        <br><br>

                        <div class="card">
                            <div class="card-body">
                                <form method="post">
                                    <label class="form-label">Tên Chức Vụ</label>
                                    <input class="form-control form-control-lg" type="text" name="department_name"
                                        placeholder="Tên chức vụ">
                                    <span class="error">* <?php echo $error ?></span>
                                    <br>
                                    <input type="submit" name="submit" class="btn btn-lg btn-success float-end"
                                        value="Thêm mới"></input>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
    <?php
} else {
    header("Location: error.html");
    exit();
}
?>