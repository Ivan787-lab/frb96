<?php

function show_view($id)
{
    global $connect;

    $views_q = $connect->query("SELECT `views` FROM `post_actions` WHERE `id` = '$id'")->fetch_assoc()["views"];
    
    $new_views_q = $views_q + 1;
    $connect->query("UPDATE `post_actions` SET `views` = '$new_views_q' WHERE `id` = '$id'");

    return $connect->query("SELECT `views` FROM `post_actions` WHERE `id` = '$id'")->fetch_assoc()["views"];
}

