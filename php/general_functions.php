<?php
function sanitize_string($text) {
    return htmlentities(filter_var(trim($text), FILTER_DEFAULT));
}

function show_object($object) {
    echo "<pre>";
    print_r($object);
    echo "</pre>";
}
