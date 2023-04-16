<?php
include "main/session.php";
// print_r($_POST);
$xx['added_by'] = $employeeid;
$xx['added_on'] = date("Y-m-d H:i:s");
$xx['updated_by'] = $employeeid;
$xx['updated_on'] = date("Y-m-d H:i:s");
$xx['status'] = 1;
// $xx['symbol'] = $_POST['symbol'];
// $xx['exchange'] = $_POST['exchange'];
$xx['qty'] = $_POST['qty'];
$xx['price'] = $_POST['price'];
$xx['profitamount'] = $_POST['qty'] * ($_POST['price'] - $_POST['oldprice']);
$xx['userid'] = $employeeid;
$xx['tradeid'] = $_POST['tradeid'];
// $xx['type'] = $_POST['type'];
// $xx['limit'] = $_POST['limit'];
// $xx['tradestatus'] = '';
$close = $obj->insertnew("closetradedetail", $xx);
if ($close > 0) {
    $yy["tradestatus"] = 'Close';
    $trade = $obj->update("stocktransaction", $yy, $xx['tradeid']);
    if ($trade > 0) {
        $useramount = $_POST['amountpaid'] + $xx['profitamount'];
        $kk['investmentamount'] = $investmentamount + $useramount;
        $kk['status'] = 1;
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
