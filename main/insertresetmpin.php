<?php
include './main/function.php';
include './main/conn.php';
$id = $_POST['id'];
$xx['mpin'] = $_POST['mpin'];
$obj->update("users", $xx, $id);
$obj->saveactivity("Password Reset", "", $id, $id, "User", "Password Reset");
echo "Redirect : MPIN updated successfully.  URLindex";
