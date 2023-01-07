<?php
include './main/function.php';
include './main/conn.php';
$xx['name'] = $_POST['name'];
$xx['surname'] = $_POST['surname'];
$xx['phone'] = $_POST['number'];
$xx['email'] = $_POST['email'];
$xx['message'] = $_POST['message'];
$xx['added_on'] = date('Y-m-d H:i:s');
$xx['status'] = 1;
$pradin = $obj->insertnew('messages', $xx);
if ($pradin) {
    echo "Redirect : Message Sent Successfully URL ";
}
