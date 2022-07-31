<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

if($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
    die();
}

function clean($str) {
    $str = htmlentities($str);
    $no = array("'", '"', '`');
    $str = str_replace($no, '', $str);
    return $str;
}

function error($str) {
    http_response_code(500);
    return print_r(['error', $str]);
}

?>