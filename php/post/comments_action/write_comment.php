<?php
require("../../connect.php");
require("../../general_functions.php");

if ($connect->connect_errno) {
    echo $connect->connect_error;
} else {
    $name = sanitize_string($_POST["name"]);
    $text = sanitize_string($_POST["text"]);
    $email = sanitize_string($_POST["email"]);
    $id = mt_rand(100000000000,999999999999);
    $post_id = $_POST["post_id"];

    $connect->query("INSERT INTO `comments` (`title`,`text`,`email`,`id`,`post_id`) VALUES ('$name', '$text', '$email', '$id', '$post_id')");
    
    $all_comments = $connect->query("SELECT * FROM `comments` WHERE `post_id` = '$post_id' ORDER BY `date` DESC")->fetch_all();

    $final_array = array();

    for ($i=0; $i < count($all_comments); $i++) { 
        $comment = array(
            'name' => $all_comments[$i][0],
            'text' => $all_comments[$i][1],
            'id' => $all_comments[$i][4],
            'post_id' => $all_comments[$i][5]
        );
        array_push($final_array,$comment);
    }
    echo json_encode($final_array);
}
$connect->close();
