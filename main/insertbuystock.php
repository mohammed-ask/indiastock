<?php
include 'main/session.php';
echo "<pre>";
print_r($_POST);
die;
$xx['added_on'] = $employeeid;
$xx['added_by'] = date("Y-m-d H:i:s");
$xx['updated_by'] = $employeeid;
$xx['updated_on'] = date("Y-m-d H:i:s");
$xx['status'] = 1;
$xx['qty'] = $_POST['qty'];
$xx['price'] = $_POST['price'];
$xx['totalamount'] = $_POST['totalamount'];
$xx['userid'] = $employeeid;
$xx['type'] = $trademode;
$xx['symbol'] = $_POST['symbol'];
$xx['exchange'] = $_POST['Exch'];
$buy = $obj->insertnew("users", $xx);
if ($buy > 0) {
    echo "Redirect : " . $_POST['symbol'] . " has been bought successfully URLfund";
} else {
    echo "Something went wrong";
}
