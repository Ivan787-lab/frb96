<?php

require '../general_functions.php';
require '../connect.php';
require './create_session.php';

if ($connect->connect_errno) {
    echo $connect->connect_error;
} else {
    $id = mt_rand(100000000000, 999999999999);
    $session_id = mt_rand(100000000000, 999999999999);
    $ip = $_SERVER["REMOTE_ADDR"];
    $name = sanitize_string($_POST["name"]);
    $password = sanitize_string($_POST["password"]);
    
    $all_admin = $connect->query("SELECT * FROM `admins`")->fetch_all();
    
    for ($i = 0; $i < count($all_admin); $i++) {
        echo $name.' '.$password.'<br/>';
        echo $all_admin[$i][0].' '.$all_admin[$i][1].'<br/>';
        if ($name == $all_admin[$i][0] and $password == $all_admin[$i][1]) {
            $connect->query("INSERT INTO `inputs`(`ip`, `result`, `id` VALUES('$ip','1','$id')");
            create_session($all_admin[$i][3],$session_id);
            setcookie('id',$all_admin[$i][3],time() + (86400 * 30) * 12, '/');
            header("Location: ../../admin/");
        } else {
            $connect->query("INSERT INTO `inputs` VALUES('$ip','0')");
            header("Location: ../../");
        }
    }
    $connect->close();
}

