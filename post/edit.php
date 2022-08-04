<?php

include '../config/header.php';
include '../config/database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!isset($_POST['token'])) return error('Invalid Token');
    if(!isset($_GET['post'])) return error('Invalid post ID');
    $postID = clean($_GET['post']);
    $userID = clean($_POST['user']);
    $token = clean($_POST['token']);
    $post = json_decode($_POST['post']);

    $query = 'SELECT id FROM users WHERE `id`='.$userID.' AND `token`="'.$token.'"';
    $result = mysqli_query($conexion, $query);
    if(mysqli_num_rows($result) < 1) return error('Invalid Token or ID');

    $newFileName = $post->image;

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
        // get details of the uploaded file
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // sanitize file-name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // check if file has one of the following extensions
        $allowedfileExtensions = array('jpg', 'png', 'jpeg');

        if (in_array($fileExtension, $allowedfileExtensions)) {
            // directory in which the uploaded file will be moved
            $uploadFileDir = '../images/';
            $dest_path = $uploadFileDir . $newFileName;

            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                print_r('Uploaded');
            }
            else {
                print_r('There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.');
            }
        }
    }

    mysqli_query($conexion, 'UPDATE posts SET `text`="'.$post->text.'", `title`="'.$post->title.'", `subtitle`="'.$post->subtitle.'", `image`="'.$newFileName.'" WHERE `id`='.$postID);
}

?>