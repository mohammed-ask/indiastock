<?php
include "main/session.php";
$oldrequest = $obj->selectfieldwhere("withdrawalrequests", "count(id)", "status = 0 and userid = " . $employeeid . "");
$amount = $obj->selectfieldwhere("users", "investmentamount", "id=" . $employeeid . "");
if ($_POST['amount'] > $amount) {
    echo "<div  class='alert alert-danger'>Your dont have requested amount in your wallet</div>";
    die;
} elseif ($oldrequest > 0) {
    echo "<div  class='alert alert-danger'>Request Already Pending</div>";
    die;
} else {
    $xx['userid'] = $employeeid;
    $xx['added_on'] = date('Y-m-d H:i:s');
    $xx['added_by'] = $employeeid;
    $xx['updated_on'] = date('Y-m-d H:i:s');
    $xx['updated_by'] = $employeeid;
    $xx['status'] = 0;
    $xx['amount'] = $_POST['amount'];
    $xx['remark'] = $_POST['remark'];
    $wr = $obj->insertnew("withdrawalrequests", $xx);
}
if (is_integer($wr) && $wr > 0) {
    echo "Redirect : Withdrawal Request Sent URLfund";
} else {
    echo "Some Error Occured";
}
