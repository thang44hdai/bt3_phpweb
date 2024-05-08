<?php

session_start();
$id = $_GET['id'];
require_once ('connect_db.php');

$query = "DELETE from nhan_vien_tbl WHERE id_nv = $id";

$result = $con->query($query);

header("Location: staff.php");
exit();

?>