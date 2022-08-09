<?php

include '../config/header.php';
include '../config/database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(intval($_POST['project'], 10) == 0) return error('Projecto no encontrado.');
    if(!isset($_POST['token'])) return error('Invalid Token');
    $token = clean($_POST['token']);
    $userID = clean($_POST['user']);
    $project = clean($_POST['project']);
    $query = 'SELECT id FROM users WHERE `id`='.$userID.' AND `token`="'.$token.'"';
    $result = mysqli_query($conexion, $query);
    if(mysqli_num_rows($result) < 1) return error('Invalid Token');

    $query = 'UPDATE projects SET `deleted`=1 WHERE `id`='.$project;
    mysqli_query($conexion, $query);
    print_r(json_encode(['success' => 'Project deleted.']));
}



?>