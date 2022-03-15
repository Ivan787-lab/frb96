<?php
require("../../connect.php");

$id_of_admin = $_POST["id"];

if ($connect->connect_errno) {
    echo $connect->connect_error;
} else {
    $connect->query("DELETE FROM `admins` WHERE `admins`.`id` = '$id_of_admin'");
    $all_admins =  $connect->query("SELECT *  FROM `admins`")->fetch_all();
    $all_admins = json_encode($all_admins);
    echo $all_admins;
}
$connect->close();
