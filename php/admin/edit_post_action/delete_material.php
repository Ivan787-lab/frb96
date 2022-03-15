<?php
require("../../connect.php");
require '../../general_functions.php';

$id = $_POST["id"];

if ($connect->connect_errno) {
    echo $connect->connect_error;
} else {
    $connect->query("DELETE FROM `materials` WHERE `materials`.`id` = '$id'");
}
$connect->close();
header("Location: ../../../admin/edit.php");