<?php
include "session.php";
$obj->saveactivity("Customer Approved/Reject", "", $_GET["hakuna"], $_GET["hakuna"], "User", "Customer Approved/Reject");
$id = $_GET['hakuna'];
if ($_GET['what'] === 'Approve') {
    $xx['status'] = 1;
    $xx["approveon"] = date('Y-m-d H:i:s');
    $xx['approveby'] = $employeeid;
    $obj->update("users", $xx, $id);
} elseif ($_GET['what'] === 'Reject') {
    $yy['status'] = 91;
    $yy["approveon"] = date('Y-m-d H:i:s');
    $yy['approveby'] = $employeeid;
    $obj->update("users", $yy, $id);
}
