<?php
require("../../connect.php");
require("../../general_functions.php");

if ($connect->connect_errno) {
    echo $connect->connect_error;
} else {
    $comment_id = $_POST["comment_id"];
    $post_id = $_POST["post_id"];
    $connect->query("DELETE FROM `lawsuits` WHERE `comment_id` = '$comment_id' AND `post_id` = '$post_id'");
}
header("Location: ../../../admin/delete_comments.php");
$connect->close();