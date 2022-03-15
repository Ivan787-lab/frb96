<?php
require("../../connect.php");
require '../../general_functions.php';

$id = $_POST["id"];
$filename = $_POST["filename"];

if ($connect->connect_errno) {
    echo $connect->connect_error;
} else {
    $all_materials_str = $connect->query("SELECT `material` FROM `materials` WHERE `id` = '$id'")->fetch_all();
    $all_materials_arr = explode(" ",$all_materials_str[0][0]);
    $pos_of_deleted_material = array_search($filename,$all_materials_arr);

    unset($all_materials_arr[$pos_of_deleted_material]);
    
    $all_materials_str = implode(" ", $all_materials_arr);
    $connect->query("UPDATE `materials` SET `material`='$all_materials_str' WHERE `id`='$id'");

    echo $filename;
    echo $id;

    unlink('../../../materials/materials/'.$id.'/'.$filename);
    
}