<?php
require("../../connect.php");

$id = $_POST["id"];
if ($connect->connect_errno) {
    echo $connect->connect_error;
} else {
    $likes_q_old = $connect->query("SELECT `likes` FROM `post_actions` WHERE `id` = '$id'")->fetch_assoc()["likes"];
    $likes_q_new = $likes_q_old - 1;

    $connect->query("UPDATE `post_actions` SET `likes` = '$likes_q_new' WHERE `id` = '$id'");
    echo $likes_q_new;
}
$connect->close();
