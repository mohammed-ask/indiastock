<?php
include 'main/session.php';
$oldtotal = $obj->selectfieldwhere("stocktransaction", 'totalamount', 'id=' . $_POST['id'] . '');
$investmentamount = $obj->selectfieldwhere("users", 'investmentamount', 'id=' . $_POST['userid'] . '');
$usermargin = $obj->selectfieldwhere("users", '`limit`', 'id=' . $_POST['userid'] . '');
$xx['price'] = $_POST['price'];
$xx['totalamount'] = ($xx['price'] / $usermargin) * $_POST['qty'];
$stock = $obj->update("stocktransaction", $xx, $_POST['id']);
$obj->saveactivity("Stock Price Edited by User", "", $_POST['id'], $employeeid, "Admin", "Stock Price Edited by User");
if ($oldtotal - $xx['totalamount'] > 0) {
    $yy['investmentamount'] = round($investmentamount + ($oldtotal - $xx['totalamount']), 2);
    $obj->update("users", $yy, $_POST['userid']);
} else {
    $yy['investmentamount'] = round($investmentamount - ($xx['totalamount'] - $oldtotal), 2);
    $obj->update("users", $yy, $_POST['userid']);
}
echo "Redirect : Price Updated Successfully URLindex";
