<?php
include 'main/session.php';
// echo "<pre>";
// print_r($_POST);
// die;
if ($_POST['totalamount'] > $investmentamount) {
    echo "<div class='alert alert-warning'>You dont have enough fund</div>";
} else {
    $xx['added_by'] = $employeeid;
    $xx['added_on'] = date("Y-m-d H:i:s");
    $xx['updated_by'] = $employeeid;
    $xx['updated_on'] = date("Y-m-d H:i:s");
    $xx['status'] = 1;
    $xx['qty'] = $_POST['qty'];
    $xx['price'] = $_POST['price'];
    $xx['totalamount'] = $_POST['totalamount'];
    $xx['userid'] = $employeeid;
    $xx['type'] = $trademode;
    $xx['symbol'] = $_POST['symbol'];
    $xx['exchange'] = $_POST['exchange'];
    $xx['limit'] = $usermargin;
    $xx['trademethod'] = 'Buy';
    $xx['tradestatus'] = 'Open';
    $buy = $obj->insertnew("stocktransaction", $xx);

    $remainfund = $investmentamount - $xx["totalamount"];
    $xy['investmentamount'] = $remainfund;
    $user = $obj->update("users", $xy, $employeeid);
    die;
    if ($buy > 0) {
        echo "Redirect : " . $_POST['symbol'] . " has been bought successfully URLmarket";
    } else {
        echo "Something went wrong";
    }
}
