<?php

include '../config/header.php';
include '../config/database.php';

if(isset($_GET['post'])) {
    if(intval($_GET['post'], 10) == 0) return error('Post no encontrado.');
    $query = 'SELECT * FROM posts WHERE `deleted`=0 AND `id`='.clean($_GET['post']);
    $result = mysqli_query($conexion, $query);
    $object = mysqli_fetch_object($result);
    if(empty($object)) return error('Post no encontrado.');
    print_r(json_encode($object));
}else {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(!isset($_POST['token'])) return error('Invalid Token');
        $token = clean($_POST['token']);
        $userID = clean($_POST['user']);
        $query = 'SELECT id FROM users WHERE `id`='.$userID.' AND `token`="'.$token.'"';
        $result = mysqli_query($conexion, $query);
        if(mysqli_num_rows($result) < 1) return error('Invalid Token');

        $query = 'SELECT `id`, `title`, `subtitle`, `uploaded`, `hidden` FROM posts WHERE `deleted`=0';
        $result = mysqli_query($conexion, $query);
        $list = array();
        while($object = mysqli_fetch_object($result)) {
            array_push($list, $object);
        }
        print_r(json_encode($list));
    }else {
        $query = 'SELECT `id`, `title`, `subtitle`, `uploaded` FROM posts WHERE `deleted`=0 AND `hidden`=0';
        $result = mysqli_query($conexion, $query);
        $list = array();
        while($object = mysqli_fetch_object($result)) {
            array_push($list, $object);
        }
        print_r(json_encode($list));
    }
}

?>