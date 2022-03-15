<?php

require '../../general_functions.php';
require '../../connect.php';
require './hash_name.php';

$page_id = $_POST["id"];
$text = sanitize_string($_POST["text"]);
$video_name = sanitize_string($_POST["video-name"]);

if (!is_dir("../../../materials/materials/$page_id")){
    mkdir("../../../materials/materials/$page_id");

}

if ($connect->connect_errno) {
    echo $connect->connect_error;
} else {
    if (count($_FILES["materials"]["name"]) > 1) {
        $materials_text = "";
        $id = mt_rand(100000000000, 999999999999);
        for ($i = 0; $i < count($_FILES["materials"]["name"]); $i++) {
            $filename = $_FILES["materials"]["name"][$i];
            if (count(explode(".", $filename)) > 1) {
                $name = hash_video($filename);
                $materials_text = $materials_text . $name . " ";
                copy($_FILES["materials"]["tmp_name"][$i], "../../../materials/materials/$page_id/" . $name);
            }
        }

        $final_text = $connect->query("SELECT `material` FROM `materials` WHERE `id` = '$page_id'")->fetch_assoc()["material"] . $materials_text;
        $connect->query("UPDATE `materials` SET `material` = '$final_text' WHERE `id` = '$page_id'");
    } else if (strlen($text) > 0) {
        $connect->query("UPDATE `materials` SET `text` = '$text', `title` = '$video_name' WHERE `id` = '$page_id'");
    } else {
        $materials_text = "";
        $id = mt_rand(100000000000, 999999999999);
        $filename = $_FILES["materials"]["name"][0];
        if (count(explode(".", $filename)) > 1) {
            $name = hash_video($filename);
            $materials_text = $materials_text . $name . " ";
            copy($_FILES["materials"]["tmp_name"][0], "../../../materials/materials/$page_id/" . $name);
        }

        $final_text = $connect->query("SELECT `material` FROM `materials` WHERE `id` = '$page_id'")->fetch_assoc()["material"] . $materials_text;
        $connect->query("UPDATE `materials` SET `material` = '$final_text' WHERE `id` = '$page_id'");
    }
}


$connect->close();
header("Location: ../../../admin/upload.php?id=$page_id");
