<?php
require '../connect.php';
echo $_POST["user_id"];
if ($connect->connect_errno) {
    echo $connect->connect_error;
} else {
    function invalidate_session($session_id)
    {
        global $connect;
        $connect->query("DELETE FROM `sessions` WHERE `session_id` = '$session_id'");
    }
}
