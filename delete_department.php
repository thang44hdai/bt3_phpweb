<?php

session_start();
$id = $_GET['id'];
require_once ('connect_db.php');

$query = "DELETE from chuc_vu_tbl WHERE id_cv = $id";

$result = $con->query($query);

header("Location: department.php");
exit();

?>