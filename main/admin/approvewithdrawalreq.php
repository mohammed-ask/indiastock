<?php
include "main/session.php";
$obj->saveactivity("Withdrawal Request Approved/Reject", "", $_GET["hakuna"], $_GET["hakuna"], "User", "Withdrawal Request Approved/Reject");
$id = $_GET['hakuna'];
if ($_GET['what'] === 'Approve') {
    $xx['status'] = 1;
    $xx["approvedon"] = date('Y-m-d H:i:s');
    $xx['approvedby'] = $employeeid;
    $obj->update("withdrawalrequests", $xx, $id);
} elseif ($_GET['what'] === 'Reject') {
    $yy['status'] = 91;
    $yy["approvedon"] = date('Y-m-d H:i:s');
    $yy['approvedby'] = $employeeid;
    $obj->update("withdrawalrequests", $yy, $id);
}
