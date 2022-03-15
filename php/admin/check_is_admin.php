<?php
    $all_admins = $connect->query("SELECT * FROM `admins`")->fetch_all();
    $user_id = $connect->query("SELECT `user_id` FROM `sessions`")->fetch_assoc()["user_id"];
    $result = 0;
    function check_is_admin () {
        global $all_admins,$user_id, $result;
        for ($i = 0; $i < count($all_admins); $i++) {
            if ($user_id == $_COOKIE["id"] and $all_admins[$i][3] == $_COOKIE["id"] ) {
                $result = $result+1;
            } 
            if ($result == 1) {
                return true;
            }
        }
    }
    
