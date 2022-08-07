<?php

include '../config/header.php';
include '../config/database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(intval($_POST['post'], 10) == 0) return error('Post no encontrado.');
    if(!isset($_POST['token'])) return error('Invalid Token');
    $token = clean($_POST['token']);
    $userID = clean($_POST['user']);
    $post = clean($_POST['post']);
    $visibility = clean($_POST['visibility']);
    $query = 'SELECT id FROM users WHERE `id`='.$userID.' AND `token`="'.$token.'"';
    $result = mysqli_query($conexion, $query);
    if(mysqli_num_rows($result) < 1) return error('Invalid Token');

    $query = 'UPDATE posts SET `hidden`='.$visibility.' WHERE `id`='.$post;
    mysqli_query($conexion, $query);
    print_r(json_encode(['success' => 'Post visibility changed.']));
}

?>