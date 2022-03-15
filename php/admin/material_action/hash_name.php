<?php

function hash_video ($text) {
    $get_mime = explode('.',$text);
    $mime = strtolower(end($get_mime));
    $name = mt_rand(100000000000,999999999999).'.'.$mime;
    return $name;
}