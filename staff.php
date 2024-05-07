<?php

session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_type']) && $_SESSION['logged_in']) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="\assets\styles.css">
        <title>Home Page</title>
    </head>

    <body>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="\Datatables\datatables.js"></script>
        <script src="\Datatables\datatables.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>

        <!-- Side Bar -->
        <div class="side_bar">
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
                                    <img src="/assets/img/default_avatar.jpg" alt="hugenerd" width="50" height="50"
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

                    <div class="col py-3">
                        <h1>Nhân Viên</h1>

                        <hr style="border: 2px solid blue">
                        <br>
                        <a href="add_staff.php" class="btn btn-lg btn-success">Thêm Mới</a>
                        <br><br><br>

                        <div class="card">

                            <div class="card-body">

                                <table id="staff_table" class="table table-striped table-hover">
                                    <thead style="position: sticky; top: 0; ">
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Avatar</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Ngày Sinh</th>
                                            <th scope="col">Giới Tính</th>
                                            <th scope="col">Số Điện Thoại</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Địa Chỉ</th>
                                            <th scope="col">Chức Vụ</th>
                                            <th scope="col">Ngày Vào Làm</th>
                                            <th scope="col">Thao Tác</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        require_once ('connect_db.php');

                                        $query = "SELECT * FROM nhan_vien_tbl inner join chuc_vu_tbl on nhan_vien_tbl.id_chuc_vu=chuc_vu_tbl.id_cv";
                                        $staff_result = $con->query($query);

                                        while ($row = $staff_result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['id_nv']; ?></th>
                                                <td><img src="<?php echo $row['anh']; ?>" alt="default avatar" height="50px"
                                                        width="50px"></td>
                                                <td><?php echo $row['ten']; ?></td>
                                                <td><?php echo $row['ngay_sinh']; ?></td>
                                                <td><?php echo $row['gioi_tinh']; ?></td>
                                                <td><?php echo $row['so_dien_thoai']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['dia_chi']; ?></td>
                                                <td><?php echo $row['chuc_vu']; ?></td>
                                                <td><?php echo $row['ngay_vao_lam']; ?></td>
                                                <td>
                                                    <a href="edit_staff.php?id=<?php echo $row['id_nv']; ?>"
                                                        class="btn btn-success px-4 ">Sửa</a>
                                                    <a onclick="return confirm('Bạn có chắc muốn xoá nhân viên này không?');"
                                                        href="delete_staff.php?id=<?php echo $row['id_nv']; ?>"
                                                        class="btn btn-danger px-4">Xoá</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                    </tbody>

                                    <script>
                                        $(document).ready(function () {
                                            new DataTable('#staff_table', {
                                                language: {
                                                    info: 'Trang _PAGE_/_PAGES_',
                                                    infoEmpty: 'Không có dữ liệu',
                                                    infoFiltered: '(Lọc từ _MAX_ item)',
                                                    lengthMenu: 'Hiển thị _MENU_ item / trang',
                                                    zeroRecords: 'Không có item tương ứng',
                                                    search: 'Tìm kiếm'
                                                }
                                            });
                                        });
                                    </script>

                                </table>
                            </div>
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