<?php
include "main/session.php";
$trademethod = $obj->selectfieldwhere("stocktransaction", "trademethod", "id=" . $_POST['id'] . "");
$borrowedamt = $obj->selectfieldwhere("stocktransaction", "borrowedamt", "id=" . $_POST['id'] . "");
$borrowedamt = empty($borrowedamt) ? 0 : $borrowedamt;
$borrowedprcnt = $obj->selectfieldwhere("stocktransaction", "borrowedprcnt", "id=" . $_POST['id'] . "");
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
if ($borrowedamt > 0) {
    $profitAndLoss = $_POST['qty'] * ($_POST['cprice'] - $_POST['oldprice']);
    if ($trademethod === 'Sell') {
        if ($profitAndLoss <= 0) {
            $profitAndLoss = abs($profitAndLoss);
        } else {
            $profitAndLoss = -$profitAndLoss;
        }
    }
    if ($profitAndLoss >= 0) {
        $custshare = 100 - $borrowedprcnt;
        $xx['profitamount'] = round($profitAndLoss * $custshare / 100, 2);
    } else {
        $xx['profitamount'] = $profitAndLoss;
    }
} else {
    $xx['profitamount'] = $_POST['qty'] * ($_POST['cprice'] - $_POST['oldprice']);
    if ($trademethod === 'Sell') {
        if ($xx['profitamount'] <= 0) {
            $xx['profitamount'] = abs($xx['profitamount']);
        } else {
            $xx['profitamount'] = -$xx['profitamount'];
        }
    }
}
// $xx['profitamount'] = $_POST['qty'] * ($_POST['cprice'] - $_POST['oldprice']);
$xx['userid'] = $_POST['userid'];
$xx['tradeid'] = $_POST['id'];
$xx['profitsettled'] = $xx['profitamount'] <= 0 ? 1 : 0;
// $xx['type'] = $_POST['type'];
// $xx['limit'] = $_POST['limit'];
// $xx['tradestatus'] = '';
$close = $obj->insertnew("closetradedetail", $xx);
if ($close > 0) {
    $yy["tradestatus"] = 'Close';
    $yy['status'] = 1;
    $trade = $obj->update("stocktransaction", $yy, $xx['tradeid']);
    if ($trade > 0) {
        if ($xx['profitamount'] >= 0) {
            $useramt = $_POST['amountpaid'] - $borrowedamt;
        } else {
            $useramt = $_POST['amountpaid'] - $borrowedamt - $xx['profitamount'];
        }
        $useramount = $useramt + $xx['profitamount'];
        $kk['investmentamount'] = $investmentamount + $useramount;
        $user = $obj->update("users", $kk, $_POST['userid']);
        if ($user > 0) {
            echo "Redirect : Trade Closed Succesfully  URLindex";
        } else {
            echo "<div class='alert alert-danger'>Some Error Occured Please Retry after some time.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Some Error Occured Please Retry after some time.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Some Error Occured Please Retry after some time.</div>";
}
