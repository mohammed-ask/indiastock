<?php
include "main/session.php";
$xx['added_by'] = $employeeid;
$xx['added_on'] = date("Y-m-d H:i:s");
$xx['updated_by'] = $employeeid;
$xx['updated_on'] = date("Y-m-d H:i:s");
$xx['status'] = 0;
$xx['qty'] = $_POST['qty'];
$xx['price'] = $_POST['price'];
$xx['totalamount'] = $_POST['totalamount'];
$xx['userid'] = $employeeid;
$xx['type'] = $trademode;
$xx['symbol'] = $_POST['symbol'];
$xx['exchange'] = $_POST['exchange'];
$xx['limit'] = $usermargin;
$xx['trademethod'] = 'Sell';
$xx['tradestatus'] = 'Open';
$buy = $obj->insertnew("stocktransaction", $xx);

$remainfund = $investmentamount + $xx["totalamount"];
$xy['investmentamount'] = $remainfund;
$user = $obj->update("users", $xy, $employeeid);
if ($buy > 0) {
    echo "Redirect : " . $_POST['symbol'] . " has been bought successfully URLmarket";
} else {
    echo "Something went wrong";
}
