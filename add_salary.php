<?php

session_start();

require_once ('connect_db.php');

$id_nv = $date = "";
$luong_co_ban = $phu_cap = $tong_luong = 0;
$idErr = $cbErr = $pcErr = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["id_nv"])) {
        $idErr = "Chưa nhập ID nhân viên";
    } else {
        $id_nv = test_input($_POST["id_nv"]);
        if (!preg_match("/^[0-9' ]*$/", $id_nv)) {
            $idErr = "Chỉ bao gồm chữ số";
        }
    }

    if (empty($_POST["date"])) {
        $date = "";
    } else {
        $date = test_input($_POST["date"]);
    }

    if (empty($_POST["luong_co_ban"])) {
        $cbErr = "Chưa nhập lương cơ bản";
    } else {
        $luong_co_ban = test_input($_POST["luong_co_ban"]);
        if (!preg_match("/^[0-9' ]*$/", $luong_co_ban)) {
            $cbErr = "Chỉ bao gồm chữ số";
        }
    }

    if (empty($_POST["phu_cap"])) {
        $pcErr = "Chưa nhập phụ cấp";
    } else {
        $phu_cap = test_input($_POST["phu_cap"]);
        if (!preg_match("/^[0-9' ]*$/", $phu_cap)) {
            $pcErr = "Chỉ bao gồm chữ số";
        }
    }

    $tong_luong = $luong_co_ban + $phu_cap;
}

function checkErr($idErr, $cbErr, $pcErr)
{
    if (!empty($idErr) || !empty($cbErr) || !empty($pcErr)) {
        return false;
    }
    return true;
}

if (isset($_POST['submit'])) {
    if (!empty($id_nv) && !empty($date) && !empty($luong_co_ban) && !empty($phu_cap) && !empty($tong_luong) && checkErr($idErr, $cbErr, $pcErr)) {
        $query = "INSERT INTO luong_tbl(id_luong, id_nhanvien, luong_co_ban, phu_cap, tong_luong, ngay_them, ngay_cap_nhat) 
            VALUES (NULL,'$id_nv','$luong_co_ban','$phu_cap','$tong_luong',NULL,'$date')";

        $con->query($query);

        header("Location: salary.php");
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
        <link href="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="main.css">
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
                    <?php echo file_get_contents("baseUI.html"); ?>

                    <div class="col py-3">
                        <h1>Lương</h1>

                        <hr style="border: 2px solid blue">
                        <br><br>

                        <div class="card card-registration">

                            <div class="card-body">

                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Thêm bảng lương mới</h3>
                                <form method="post">

                                    <div class="row">
                                        <div class="col-md-6 mb-4">

                                            <div class="form-outline">
                                                <label class="form-label" for="firstName">ID Nhân Viên</label> <span
                                                    class="error text-danger"> * <?php echo $idErr; ?></span>
                                                <input type="text" name="id_nv" class="form-control form-control-lg" />
                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-4 d-flex align-items-center">

                                            <div class="form-outline datepicker w-100">
                                                <label for="birthdayDate" class="form-label">Ngày Cập Nhật</label> <span
                                                    class="error text-danger"> * </span>
                                                <input type="date" class="form-control form-control-lg" name="date" />

                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4 mb-4 pb-2">

                                            <div class="form-outline">
                                                <label class="form-label" for="emailAddress">Lương Cơ Bản</label> <span
                                                    class="error text-danger"> * <?php echo $cbErr; ?></span>
                                                <input type="text" name="luong_co_ban" id="luong_co_ban"
                                                    class="form-control form-control-lg"
                                                    oninput="updateSalary(this.value)" />

                                            </div>

                                        </div>
                                        <div class="col-md-4 mb-4 pb-2">

                                            <div class="form-outline">
                                                <label class="form-label" for="phoneNumber">Phụ Cấp</label> <span
                                                    class="error text-danger"> * <?php echo $pcErr; ?></span>
                                                <input type="tel" name="phu_cap" id="phu_cap"
                                                    class="form-control form-control-lg"
                                                    oninput="updateSalary(this.value )" />
                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-4 pb-2">

                                            <div class="form-outline">
                                                <label class="form-label" for="phoneNumber">Tổng Lương</label> <span
                                                    class="error text-danger"> * </span>
                                                <input type="tel" name="tong_luong" class="form-control form-control-lg"
                                                    id="tong_luong" />
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mt-4 pt-2">
                                        <input class="btn btn-success btn-lg float-end" type="submit" name="submit"
                                            value="Thêm mới" />
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        </div>



        <script>
            function updateSalary(val) {
                console.log(val);
                let cb = document.getElementById('luong_co_ban').value === '' ? 0 : document.getElementById('luong_co_ban').value;
                let pc = document.getElementById('phu_cap').value === '' ? 0 : document.getElementById('phu_cap').value;
                document.getElementById('tong_luong').value = parseInt(cb) + parseInt(pc);
            }

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
    <?php
} else {
    header("Location: error.html");
    exit();
}
?>