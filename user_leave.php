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
                    <?php echo file_get_contents("user_baseUI.html"); ?>

                    <div class="col py-3">
                        <h1> Nghỉ phép </h1>

                        <hr style="border: 2px solid blue">
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <table id="leave_table" class="table table-striped table-hover">
                                    <thead style="position: sticky; top: 0; ">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Họ và tên </th>
                                            <th scope="col">Lí do</th>
                                            <th scope="col">Chi tiết</th>
                                            <th scope="col">Ngày bắt đầu</th>
                                            <th scope="col">Ngày kết thúc</th>
                                            <th scope="col">Trạng thái</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        require_once ('connect_db.php');

                                        $query1 = "SELECT * from nghi_phep inner join nhan_vien_tbl on nghi_phep.id_nhanvien=nhan_vien_tbl.id_nv
                                        inner join login_tbl on login_tbl.id = nhan_vien_tbl.id_nv
                                        where username = ?";
                                        $stmt = $con->prepare($query1);
                                        $stmt->bind_param("s", $_SESSION['username']);
                                        $stmt->execute();
                                        $staff_result = $stmt->get_result();

                                        while ($row = $staff_result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['id_nhanvien']; ?></th>
                                                <td><?php echo $row['ten']; ?></td>
                                                <td><?php echo $row['ly_do']; ?></td>
                                                <td><?php echo $row['chi_tiet']; ?></td>
                                                <td><?php echo $row['ngay_bat_dau']; ?></td>
                                                <td><?php echo $row['ngay_ket_thuc']; ?></td>

                                                <td class="leave_status">
                                                    <?php
                                                    if ($row['trang_thai'] == 0) {
                                                        echo "Hàng chờ";
                                                    } elseif ($row['trang_thai'] == 1) {
                                                        echo "Đã duyệt";
                                                    } else {
                                                        echo "Trạng thái không xác định";
                                                    }
                                                    ?>
                                                </td>

                                            </tr>
                                            <?php
                                        }
                                        ?>

                                    </tbody>
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