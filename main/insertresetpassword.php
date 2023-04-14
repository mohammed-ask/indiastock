<?php
include './main/function.php';
include './main/conn.php';
$id = $_POST['id'];
$xx['password'] = $_POST['password'];
$obj->update("users", $xx, $id);
echo "Redirect : Password Change Successfully  URLindex";
