<?php
require '../connect.php';
require './invalidate_session.php';
$user_id = $_POST["user_id"];
$session_id = $connect->query("SELECT `session_id` FROM `sessions` WHERE `user_id` = '$user_id' AND `valid` = '1'")->fetch_assoc()["session_id"];
invalidate_session($session_id);
setcookie('id','', 0, '/');
header("Location: ../../");