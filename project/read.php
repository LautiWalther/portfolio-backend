<?php

include '../config/header.php';
include '../config/database.php';

$query = 'SELECT * FROM projects WHERE `deleted`=0';
$result = mysqli_query($conexion, $query);
$list = array();
while($object = mysqli_fetch_object($result)) {
    array_push($list, $object);
}
print_r(json_encode($list));

?>