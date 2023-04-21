<?php
include "main/session.php";
$obj->saveactivity("Customer Bank Account Approved/Reject", "", $_GET["hakuna"], $_GET["hakuna"], "User", "Customer Bank Account Approved/Reject");
$id = $_GET['hakuna'];
$rowbank = $obj->selectextrawhere("bankaccountchange", "id=" . $id . "")->fetch_assoc();
if ($_GET['what'] === 'Approve') {
    $xx['status'] = 1;
    $xx["approvedon"] = date('Y-m-d H:i:s');
    $xx['approvedby'] = $employeeid;
    $obj->update("bankaccountchange", $xx, $id);
    $tt['bankname'] = $rowbank['bankname'];
    $tt['accountno'] = $rowbank['accountno'];
    $tt['ifsc'] = $rowbank['ifsc'];
    $obj->update("users", $tt, $rowbank['userid']);
} elseif ($_GET['what'] === 'Reject') {
    $yy['status'] = 91;
    $yy["approvedon"] = date('Y-m-d H:i:s');
    $yy['approvedby'] = $employeeid;
    $obj->update("bankaccountchange", $yy, $id);
}
