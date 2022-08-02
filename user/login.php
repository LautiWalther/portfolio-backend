<?php
include '../config/header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST['user']) || empty($_POST['password'])) {
        return error('Invalid username or password');
    }
    $user = clean($_POST['user']);
    $password = clean($_POST['password']);

    if(!$user || !$password) {
        return error('Invalid username or password');
    }

    $encpass = sha1($password);

    include '../config/database.php';

    $q = mysqli_query($conexion, 'SELECT `id`, `name`, `lastname`, `nickname`, `email`, `token` FROM users WHERE nickname="'.$user.'" AND password="'.$encpass.'"');
    if(mysqli_num_rows($q) >= 1) {
        $user_fetch = mysqli_fetch_object($q);
        $new_token = md5($encpass.'_'.time().'_'.$user_fetch->id);
        $user_fetch->token = $new_token;
        mysqli_query($conexion, 'UPDATE users SET token="'.$new_token.'" WHERE id='.$user_fetch->id);

        return print_r(json_encode($user_fetch));
    }else {
        return error('Invalid username or password');
    }

}else {
    return error('Invalid request method');
}

?>