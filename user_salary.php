<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_type']) && $_SESSION['logged_in']) {
    $username = $_SESSION['username'];
    require_once ('connect_db.php');
    $query1 = "SELECT * FROM luong_tbl
    INNER JOIN nhan_vien_tbl ON luong_tbl.id_nhanvien = nhan_vien_tbl.id_nv
    INNER JOIN login_tbl ON login_tbl.id = luong_tbl.id_nhanvien
    WHERE login_tbl.username = ?";
    $stmt = $con->prepare($query1);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $staff_result = $stmt->get_result();

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
        <div class="side_bar">
            <div class="container-fluid">
                <div class="row flex-nowrap">
                    <?php echo file_get_contents("user_baseUI.html"); ?>
                    <div class="col py-3">
                        <h1>Lương</h1>
                        <hr style="border: 2px solid blue">
                        <br>
                        <div class="card">
                            <div class="card-body mt-5">
                                <table class="table table-striped table-hover">
                                    <thead style="position: sticky; top: 1;">
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Avatar</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Lương Cơ Bản</th>
                                            <th scope="col">Phụ Cấp</th>
                                            <th scope="col">Tổng Lương</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $staff_result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['id_nv']; ?></th>
                                                <td><img src="<?php echo $row['anh']; ?>" alt="user_avatar" height="50px"
                                                        width="50px"></td>
                                                <td><?php echo $row['ten']; ?></td>
                                                <td><?php echo $row['luong_co_ban']; ?></td>
                                                <td><?php echo $row['phu_cap']; ?></td>
                                                <td><?php echo $row['tong_luong']; ?></td>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
    <?php
} else {
    header("Location: error.html");
    exit();
}
?>