<?php
include "main/session.php";
// print_r($_POST);
// die;
$aistat = $obj->selectfieldwhere("users", 'aitrading', 'id=' . $_POST['userid'] . '');
$price = $obj->searchstockapiwithtoken($_POST['symbol'], $_POST['exchtype'], $_POST['exchange']);
$data = $price[0];
if (!isset($data['MktLot'])) {
    echo "<div class='alert alert-warning'>You have entered incorrect details or incorrect symbol! Please enter correct details.</div>";
    die;
}
$userfund = $obj->selectfieldwhere("users", "investmentamount", "id = " . $_POST['userid'] . "");
if ($aistat === 'No' && $_POST['tradeby'] === 'AI') {
    echo "<div class='alert alert-warning'>This user has not selected AI trade mode.</div>";
    die;
} elseif ($_POST['tradeby'] === 'AI' && $aistat === 'Yes') {
    $aifund = $obj->selectfieldwhere("users", "aifund", "id = " . $_POST['userid'] . "");
    $userfund = $aifund;
    $xx['aitrade'] = 'Yes';
}
if ($_POST['totalamount'] > $userfund * $_POST['margin']) {
    echo "<div class='alert alert-warning'>User dont have enough fund eighter AI don't have enough fund Alloted</div>";
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
$xx['exchtype'] = $_POST['exchtype'];
$xx['type'] = $_POST['type'];
$xx['mktlot'] = $_POST['lot'];
$xx['limit'] = $_POST['margin'];
$xx['totalamount'] = $_POST['totalamount'];
$xx['token'] = $data['ScripCode'];
if ($xx['totalamount'] > $userfund) {
    $xx['borrowedamt'] = round($_POST['totalamount'] - $userfund, 2);
    $xx['borrowedprcnt'] = round($xx['borrowedamt'] / $_POST['totalamount'] * 100, 2);
}
$xx['trademethod'] = $_POST['trademethod'];
$xx['tradestatus'] = 'Open';
$xx['price'] = $_POST['price'];
$xx['datetime'] = changedateformatespecito($_POST['datetime'], "d/m/Y H:i:s", "Y-m-d H:i:s");
$stock = $obj->insertnew('stocktransaction', $xx);
$obj->saveactivity("Position Added by Admin", "", $stock, $employeeid, "Admin", "Position Added by Admin");
$remainfund = $userfund - $xx["totalamount"];
$xy['investmentamount'] = $remainfund < 0 ? 0 : $remainfund;
$user = $obj->update("users", $xy, $_POST['userid']);

if (is_numeric($stock) && $stock > 0) {
    echo "Redirect : Stock Added Successfully URLtodaytransactions";
}
