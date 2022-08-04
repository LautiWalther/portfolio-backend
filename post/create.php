<?php

include '../config/header.php';
include '../config/database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!isset($_POST['token'])) return error('Invalid Token');
    $userID = clean($_POST['user']);
    $token = clean($_POST['token']);

    $query = 'SELECT id FROM users WHERE `id`='.$userID.' AND `token`="'.$token.'"';
    $result = mysqli_query($conexion, $query);
    if(mysqli_num_rows($result) < 1) return error('Invalid Token or ID');

    $date = new DateTime();
    $formatted = $date->format('Y-m-d H:i:sP');

    mysqli_query($conexion, 'INSERT INTO posts (`title`, `subtitle`, `text`, `hidden`, `uploaded`) VALUES ("New Post Title", "New Post Subtitle", "<h2>New Post Content<h2>", true, "'.$formatted.'")');

    $last = mysqli_insert_id($conexion);

    print_r(json_encode(['id' => $last]));
}

?>