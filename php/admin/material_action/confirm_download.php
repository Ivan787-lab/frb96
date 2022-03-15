<?php

require '../../general_functions.php';
require '../../connect.php';

$page_id = $_POST["id"];
$uploaded_user = $_POST["uploaded_user"];

if ($connect->connect_errno) {
    echo $connect->connect_error;
} else {
    $connect->query("UPDATE `materials` SET `status` = '1',`uploaded_user` = '$uploaded_user' WHERE `id` = '$page_id'");

    $connect->query("INSERT INTO `post_actions`(`id`) VALUES ('$page_id')");
}
$connect->close();
header("Location: ../../../admin/");
