<?php
include "main/session.php";
// print_r($_POST);
$borrowedamt = $obj->selectfieldwhere("stocktransaction", "borrowedamt", "id=" . $_POST['tradeid'] . "");
$borrowedamt = empty($borrowedamt) ? 0 : $borrowedamt;
$borrowedprcnt = $obj->selectfieldwhere("stocktransaction", "borrowedprcnt", "id=" . $_POST['tradeid'] . "");
$xx['added_by'] = $employeeid;
$xx['added_on'] = date("Y-m-d H:i:s");
$xx['updated_by'] = $employeeid;
$xx['updated_on'] = date("Y-m-d H:i:s");
$xx['status'] = 1;
// $xx['symbol'] = $_POST['symbol'];
// $xx['exchange'] = $_POST['exchange'];
$xx['qty'] = $_POST['qty'];
$xx['price'] = $_POST['price'];
if ($borrowedamt > 0) {
    $profitAndLoss = $_POST['qty'] * ($_POST['price'] - $_POST['oldprice']);
    if ($profitAndLoss >= 0) {
        $custshare = 100 - $borrowedprcnt;
        $xx['profitamount'] = round($profitAndLoss * $custshare / 100, 2);
    } else {
        $xx['profitamount'] = $profitAndLoss;
    }
} else {
    $xx['profitamount'] = $_POST['qty'] * ($_POST['price'] - $_POST['oldprice']);
}
$xx['userid'] = $employeeid;
$xx['tradeid'] = $_POST['tradeid'];
// $xx['type'] = $_POST['type'];
// $xx['limit'] = $_POST['limit'];
// $xx['tradestatus'] = '';
$close = $obj->insertnew("closetradedetail", $xx);
if ($close > 0) {
    $yy["tradestatus"] = 'Close';
    $yy['status'] = 1;
    $trade = $obj->update("stocktransaction", $yy, $xx['tradeid']);
    if ($trade > 0) {
        $useramt = $_POST['amountpaid'] - $borrowedamt;
        $useramount = $useramt + $xx['profitamount'];
        $kk['investmentamount'] = $investmentamount + $useramount;
        $user = $obj->update("users", $kk, $employeeid);
        if ($user > 0) {
            echo "Redirect : Trade Closed Succesfully  URLportfolio";
        } else {
            echo "<div class='alert alert-danger'>Some Error Occured Please Contact Admin</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Some Error Occured Please Contact Admin</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Some Error Occured Please Contact Admin</div>";
}
