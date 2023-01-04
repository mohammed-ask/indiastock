<?php
include "session.php";
$oldrequest = $obj->selectfieldwhere("withdrawalrequests", "count(id)", "status = 0 and userid = " . $employeeid . "");
$amount = $obj->selectfieldwhere("users", "investmentamount", "id=" . $employeeid . "");
if ($_POST['amount'] > $amount) {
    echo "<div  class='bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md' role='alert'>Your dont have requested amount in your wallet</div>";
    die;
} elseif ($oldrequest > 0) {
    echo "<div  class='bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md' role='alert'>Request Already Pending</div>";
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
    echo "Redirect : Withdrawal Request Sent URLrequestwithdrawal";
} else {
    echo "Some Error Occured";
}
