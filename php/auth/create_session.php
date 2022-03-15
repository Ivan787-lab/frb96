<?php
require '../connect.php';

if ($connect->connect_errno) {
    echo $connect->connect_error;
} else {
    function create_session ($user_id,$session_id) {
        global $connect;
        $connect->query("INSERT INTO `sessions`(`user_id`, `session_id`) VALUES('$user_id','$session_id')");
    }
}