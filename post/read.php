<?php

include '../config/header.php';
include '../config/database.php';

if(isset($_GET['post'])) {
    if(intval($_GET['post'], 10) == 0) return error('Post no encontrado.');
    $query = 'SELECT * FROM posts WHERE `deleted`=0 AND `hidden`=0 AND `id`='.clean($_GET['post']);
    $result = mysqli_query($conexion, $query);
    $object = mysqli_fetch_object($result);
    if(empty($object)) return error('Post no encontrado.');
    print_r(json_encode($object));
}else {
    $query = 'SELECT id, title, subtitle, uploaded FROM posts WHERE `deleted`=0 AND `hidden`=0';
    $result = mysqli_query($conexion, $query);
    $list = array();
    while($object = mysqli_fetch_object($result)) {
        array_push($list, $object);
    }
    print_r(json_encode($list));
}

?>