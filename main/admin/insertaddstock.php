<?php
include "main/session.php";
$userfund = $obj->selectfieldwhere("users", "investmentamount", "id = " . $_POST['userid'] . "");
if ($userfund < $_POST['totalamount']) {
    echo "<div class='alert alert-warning'>User has insufficient fund</div>";
    die;
}
$xx['added_on'] = date("Y-m-d H:i:s");
$xx['added_by'] = $employeeid;
$xx['updated_on'] = date("Y-m-d H:i:s");
$xx['updated_by'] = $employeeid;
$xx['status'] = 0;
$xx['userid'] = $_POST['userid'];
$xx['qty'] = $_POST['qty'];
$xx['symbol'] = $_POST['symbol'];
$xx['exchange'] = $_POST['exchange'];
$xx['type'] = $_POST['type'];
$xx['limit'] = $_POST['margin'];
$xx['totalamount'] = $_POST['totalamount'];
$xx['trademethod'] = $_POST['trademethod'];
$xx['price'] = $_POST['price'];
$xx['datetime'] = changedateformatespecito($_POST['datetime'], "d/m/Y H:i:s", 'Y-m-d H:i:s');
$stock = $obj->insertnew('stocktransaction', $xx);
if (is_numeric($stock) && $stock > 0) {
    echo "Redirect : Stock Added Successfully URLtodaytransactions";
}
