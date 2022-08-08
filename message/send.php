<?php

include '../config/header.php';
include '../config/database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    #Include PHPMailer and send the mail

    return print_r(json_encode(['success' => 'Mail sent correctly.']));
}


?>