<?php
include "main/session.php";
if (!empty($_POST['id'])) {
    $_POST['updated_by'] = $employeeid;
    $_POST['updated_on'] = date("Y-m-d H:i:s");
    $_POST['dob'] = changedateformate($_POST['dob']);
    $obj->update('nominee', $_POST, $_POST['id']);
    echo "Redirect : Nominee Updated Successfully URLprofile";
} else {
    echo "<div class='alert alert-warning'>Nominee Does not exist </div>";
}
