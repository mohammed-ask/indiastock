<?php
include "./session.php";
$delete = $obj->deletewhere("userstocks", "status =1 and symboltoken = '" . $_POST['token'] . "' and userid = '" . $employeeid . "'");
$wdelete = $obj->deletewhere("watchliststock", "status =1 and token = '" . $_POST['token'] . "' and userid = '" . $employeeid . "'");
if ($delete > 0) {
    echo "Success";
} else {
    echo "Failed";
}
