<?php
include "main/session.php";
$obj->saveactivity("Fund Request Request Approved/Disapprove", "", $_GET["hakuna"], $_GET["hakuna"], "User", "Fund Request Request Approved/Disapprove");
$id = $_GET['hakuna'];
$fund = $obj->selectfieldwhere("fundrequest", "amount", "id=" . $id . "");
$userid = $obj->selectfieldwhere("fundrequest", "userid", "id=" . $id . "");
$investmentamount = $obj->selectfieldwhere("users", "investmentamount", "id=" . $userid . "");
if ($_GET['what'] === 'Approve') {
    $xx['status'] = 1;
    $xx["approvedon"] = date('Y-m-d H:i:s');
    $xx['approvedby'] = $employeeid;
    $obj->update("fundrequest", $xx, $id);
    $kk['investmentamount'] = $investmentamount + $fund;
    $obj->update("users", $kk, $userid);
} elseif ($_GET['what'] === 'Reject') {
    $yy['status'] = 91;
    $yy["approvedon"] = date('Y-m-d H:i:s');
    $yy['approvedby'] = $employeeid;
    $obj->update("fundrequest", $yy, $id);
}
