<?php

include '../config/header.php';
include '../config/database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!isset($_POST['token'])) return error('Invalid Token');
    if(!isset($_POST['projectID'])) return error('Invalid project ID');
    $projectID = clean($_POST['projectID']);
    $userID = clean($_POST['user']);
    $token = clean($_POST['token']);
    $project = json_decode($_POST['project']);

    $query = 'SELECT id FROM users WHERE `id`='.$userID.' AND `token`="'.$token.'"';
    $result = mysqli_query($conexion, $query);
    if(mysqli_num_rows($result) < 1) return error('Invalid Token or ID');

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
                mysqli_query($conexion, 'UPDATE projects SET `title`="'.$project->title.'", `description`="'.$project->description.'", `link`="'.$project->link.'", `image`="'.$newFileName.'" WHERE `id`='.$projectID);
                print_r(json_encode(['status' => 'ok']));
            }
            else {
                print_r('There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.');
            }
        }
    }else {
        mysqli_query($conexion, "UPDATE projects SET `title`='$project->title', `description`='$project->description', `link`='$project->link' WHERE `id`=".$projectID);
        print_r(json_encode(['status' => 'ok']));
    }

}

?>