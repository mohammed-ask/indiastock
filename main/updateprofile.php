<?php
include "session.php";
if ($_SESSION['otp'] == $_POST['otp']) {
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
} else {
    echo "<div class='alert alert-danger'>OTP does not match</div>";
}
