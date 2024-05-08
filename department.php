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
        <link rel="stylesheet" href="main.css">
        <title>Home Page</title>
    </head>

    <body>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="\Datatables\datatables.js"></script>
        <script src="\Datatables\datatables.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>

        <!-- Side Bar -->
        <div class="side_bar">
            <div class="container-fluid">
                <div class="row flex-nowrap">
                    <?php echo file_get_contents("baseUI.html"); ?>

                    <div class="col py-3">
                        <h1>Phòng ban</h1>

                        <hr style="border: 2px solid blue">
                        <br>

                        <div class="card">
                            <div class="card-body">

                                <table id="department_table" class="table table-striped table-hover">
                                    <thead style="position: sticky; top: 0; ">
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Chức Vụ</th>
                                            <th scope="col">Ngày Thêm</th>
                                            <th scope="col">Hành Động</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        require_once ('connect_db.php');

                                        $query = "SELECT * FROM chuc_vu_tbl";

                                        $result = $con->query($query);

                                        while ($row = $result->fetch_assoc()) {
                                            if ($row['id_cv'] == 0) {
                                                continue;
                                            }
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['id_cv']; ?></th>
                                                <td><?php echo $row['chuc_vu']; ?></td>
                                                <td><?php echo $row['ngay_them']; ?></td>
                                                <td>
                                                    <a href="edit_department.php?id=<?php echo $row['id_cv']; ?>"
                                                        class="btn btn-success px-4">Sửa</a>
                                                    <a onclick="return confirm('Bạn có chắc muốn xoá chức vụ này không?');"
                                                        href="delete_department.php?id=<?php echo $row['id_cv']; ?>"
                                                        class="btn btn-danger px-4">Xóa</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                    </tbody>

                                    <script>
                                        $(document).ready(function () {
                                            new DataTable('#department_table', {
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

    </body>

    </html>
    <?php
} else {
    header("Location: error.html");
    exit();
}
?>