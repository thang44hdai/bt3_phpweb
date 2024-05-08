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
        <link rel="stylesheet" href="main.css">
        <title>Home Page</title>
    </head>

    <body>
        <!-- Side Bar -->
        <div class="side_bar fixed-top">
            <div class="container-fluid">
                <div class="row flex-nowrap">
                    <?php echo file_get_contents("baseUI.html"); ?>

                    <div class="col py-3">
                        <h1>Nghỉ phép</h1>

                        <hr style="border: 2px solid blue">
                        <br>

                        <div class="card">

                            <div class="card-body">

                                <table id="staff_table" class="table table-striped table-hover">
                                    <thead style="position: sticky; top: 0; ">
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Avatar</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Ngày sinh</th>
                                            <th scope="col">Lí do</th>
                                            <th scope="col">Chi tiết</th>
                                            <th scope="col">Ngày xin nghỉ</th>
                                            <th scope="col">Ngày trở lại</th>
                                            <th scope="col">Thao Tác</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        require_once ('connect_db.php');

                                        $query = "SELECT * FROM nghi_phep inner join nhan_vien_tbl on nghi_phep.id_nhanvien=nhan_vien_tbl.id_nv";
                                        $staff_result = $con->query($query);

                                        while ($row = $staff_result->fetch_assoc()) {
                                            if ($row['trang_thai'] == 0) {
                                                ?>

                                                <tr>
                                                    <th scope="row"><?php echo $row['id_nhanvien']; ?></th>
                                                    <td><img src="<?php echo $row['anh']; ?>" alt="default avatar" height="50px"
                                                            width="50px"></td>
                                                    <td><?php echo $row['ten']; ?></td>
                                                    <td><?php echo $row['ngay_sinh']; ?></td>
                                                    <td><?php echo $row['ly_do']; ?></td>
                                                    <td><?php echo $row['chi_tiet']; ?></td>
                                                    <td><?php echo $row['ngay_bat_dau']; ?></td>
                                                    <td><?php echo $row['ngay_ket_thuc']; ?></td>
                                                    <td>
                                                        <a href="accept_leave.php?id=<?php echo $row['id']; ?>"
                                                            class="btn btn-success px-4 ">Chấp nhận</a>
                                                        <a href="reject_leave.php?id=<?php echo $row['id']; ?>"
                                                            class="btn btn-danger px-4">Từ chối</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
    <?php
} else {
    header("Location: error.html");
    exit();
}
?>