<?php

session_start();
$error = "";

if (isset($_POST['submit'])) {
    if (empty($_POST['department_name'])) {
        $error = "Vui lòng không để trống!";
    } else {
        $department_name = $_POST['department_name'];
        $id = $_GET['id'];

        require_once ('connect_db.php');

        $query = "UPDATE chuc_vu_tbl SET chuc_vu ='$department_name' WHERE id_cv = $id";

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
        <link rel="stylesheet" href="main.css">
        <title>Home Page</title>
    </head>

    <body>
        <!-- Side Bar -->
        <div class="side_bar fixed-top">
            <div class="container-fluid">
                <div class="row flex-nowrap">
                    <?php echo file_get_contents("baseUI.html"); ?>

                    <div class="col py-3 main">
                        <h1>Sửa Chức Vụ</h1>

                        <hr style="border: 2px solid blue">
                        <br>

                        <div class="card">
                            <div class="card-body">
                                <form method="post">
                                    <label class="form-label">Tên Chức Vụ</label>
                                    <input class="form-control form-control-lg" type="text" name="department_name"
                                        placeholder="Tên chức vụ">
                                    <span class="error">* <?php echo $error ?></span>
                                    <br>
                                    <input type="submit" name="submit" class="btn btn-lg btn-success float-end"
                                        value="Cập nhật"></input>
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