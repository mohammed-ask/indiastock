<?php
include "session.php";
$path = "main/images/avatars";
if (!empty($_FILES['avatar']['name'])) {
    $imgreturn = $obj->uploadfilenew($path, $_FILES, "avatar", array("jpg", "jpeg", "png", "gif"));
    $xx['avatar'] = $imgreturn;
}
$xx['mobile'] = $_POST['mobile'];
$xx['trademode'] = $_POST['trademode'];
$xx['password'] = $_POST['password'];
$user = $obj->update("users", $xx, $employeeid);
echo "Redirect : Profile Updated Successfully URLprofile";
