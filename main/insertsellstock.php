<?php
include "main/session.php";
if ($_POST['totalamount'] > $investmentamount * $usermargin) {
    echo "<div class='alert alert-warning'>You dont have enough fund</div>";
} else {
    $xx['added_by'] = $employeeid;
    $xx['added_on'] = date("Y-m-d H:i:s");
    $xx['updated_by'] = $employeeid;
    $xx['updated_on'] = date("Y-m-d H:i:s");
    $xx['status'] = 0;
    $xx['qty'] = $_POST['qty'];
    $xx['price'] = $_POST['price'];
    $xx['totalamount'] = round($_POST['totalamount'], 2);
    if ($xx['totalamount'] > $investmentamount) {
        $xx['borrowedamt'] = round($_POST['totalamount'] - $investmentamount, 2);
        $xx['borrowedprcnt'] = round($xx['borrowedamt'] / $_POST['totalamount'] * 100, 2);
    }
    $xx['userid'] = $employeeid;
    $xx['type'] = $trademode;
    $symbol = $obj->selectfieldwhere("userstocks", "Symbol", "id='" . $_POST['stockid'] . "'");
    $xx['symbol'] = $symbol;
    $xx['exchange'] = $_POST['exchange'];
    $xx['stockid'] = $_POST['stockid'];
    $xx['limit'] = $usermargin;
    $xx['mktlot'] = $_POST['lot'];
    $xx['trademethod'] = 'Sell';
    $xx['tradestatus'] = 'Open';
    $sell = $obj->insertnew("stocktransaction", $xx);
    $obj->saveactivity("Stock Sell by User", "", $sell, $employeeid, "User", "Stock Sell by User");
    $remainfund = $investmentamount - $xx["totalamount"];
    $xy['investmentamount'] = $remainfund < 0 ? 0 : $remainfund;
    $user = $obj->update("users", $xy, $employeeid);
    if ($buy > 0) {
        echo "Redirect : " . $_POST['symbol'] . " has been sell successfully URLmarket";
    } else {
        echo "Something went wrong";
    }
}
