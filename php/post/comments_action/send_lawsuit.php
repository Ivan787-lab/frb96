<?php
require("../../connect.php");
require("../../general_functions.php");

$comment_id = $_POST["comment_id"];
$post_id = $_POST["post_id"];
$lawsuit_id = mt_rand(10000000000,99999999999);

if ($connect->connect_errno) {
    echo $connect->connect_error;
} else {
    $connect->query("INSERT INTO `lawsuits`(`comment_id`, `post_id`, `lawsuit_id`) VALUES ('$comment_id','$post_id','$lawsuit_id')");
}
header("Location: ../../../materials/post.php?id=$post_id");