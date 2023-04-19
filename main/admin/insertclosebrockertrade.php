<?php
include "main/session.php";
$investmentamount = $obj->selectfieldwhere("users", "investmentamount", "id=" . $_POST['userid'] . "");
$xx['added_by'] = $employeeid;
$xx['added_on'] = date("Y-m-d H:i:s");
$xx['updated_by'] = $employeeid;
$xx['updated_on'] = date("Y-m-d H:i:s");
$xx['status'] = 1;
// $xx['symbol'] = $_POST['symbol'];
// $xx['exchange'] = $_POST['exchange'];
$xx['qty'] = $_POST['qty'];
$xx['price'] = $_POST['cprice'];
$xx['profitamount'] = $_POST['qty'] * ($_POST['cprice'] - $_POST['oldprice']);
$xx['userid'] = $_POST['userid'];
$xx['tradeid'] = $_POST['id'];
// $xx['type'] = $_POST['type'];
// $xx['limit'] = $_POST['limit'];
// $xx['tradestatus'] = '';
$close = $obj->insertnew("closetradedetail", $xx);
if ($close > 0) {
    $yy["tradestatus"] = 'Close';
    $yy['status'] = 1;
    $trade = $obj->update("stocktransaction", $yy, $xx['tradeid']);
    if ($trade > 0) {
        $useramount = $_POST['amountpaid'] + $xx['profitamount'];
        $kk['investmentamount'] = $investmentamount + $useramount;
        $user = $obj->update("users", $kk, $_POST['id']);
        if ($user > 0) {
            echo "Redirect : Trade Closed Succesfully  URLindex";
        } else {
            echo "<div class='alert alert-danger'>Some Error Occured Please Contact Admin</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Some Error Occured Please Contact Admin</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Some Error Occured Please Contact Admin</div>";
}
