<?php
include "main/session.php";
$id = $_POST['id'];
unset($_POST['id']);
$xx['updated_on'] = date('Y-m-d H:i:s');
$xx['updated_by'] = $employeeid;
$xx['status'] = 1;
$xx['mobile'] = $_POST['phone'];
$xx['name'] = $_POST['name'];
$xx['role'] = $_POST['role'];
$xx['email'] = $_POST['email'];
$xx['password'] = $_POST['password'];
$xx['activate'] = $_POST['activate'];
$pradin = $obj->update("users", $xx, $id);
if (is_numeric($pradin) && $pradin > 0) {
    echo "Redirect : Employee Updated Successfully URLemployeelist";
}
