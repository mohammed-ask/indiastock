<?php
include 'main/session.php';
// echo "<pre>";
// print_r($_POST);
// die;
$aitrading = $obj->selectfieldwhere("users", "aitrading", "id='" . $employeeid . "'");
if($aitrading==='Yes'){
    $aifund = $obj->selectfieldwhere("users", "aifund", "id='" . $employeeid . "'");
    if(!empty($aifund)){
    $investmentamount = $investmentamount - $aifund;
    }
}
if (isset($_POST['stoplossenabled']) && $_POST['stoploss'] >= $_POST['price']) {
    echo "<div class='alert alert-warning'>Stop Loss cannot be above or equal to Current rate</div>";
    die;
} elseif (isset($_POST['stoplossenabled']) &&  $_POST['stoploss'] < ($_POST['price'] - $_POST['price'] * 20 / 100)) {
    echo "<div class='alert alert-warning'>Stop Loss cannot be less than 20% of Current rate</div>";
    die;
} elseif (isset($_POST['targetenabled']) &&  $_POST['target'] <= $_POST['price']) {
    echo "<div class='alert alert-warning'>Target cannot be less than or equal to Current rate</div>";
    die;
}
if ($_POST['totalamount'] > $investmentamount * $usermargin) {
    echo "<div class='alert alert-warning'>You dont have enough fund or you have alloted to AI</div>";
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
    $token = $obj->selectfieldwhere("userstocks", "symboltoken", "id='" . $_POST['stockid'] . "'");
    $xx['symbol'] = $symbol;
    $xx['exchange'] = $_POST['exchange'];
    $xx['exchtype'] = $_POST['exchangetype'];
    $xx['stockid'] = $_POST['stockid'];
    $xx['limit'] = $usermargin;
    $xx['mktlot'] = $_POST['lot'];
    $xx['trademethod'] = 'Buy';
    $xx['tradestatus'] = 'Open';
    $xx['token'] = $token;
    if (isset($_POST['stoplossenabled']) && !empty($_POST['stoploss'])) {
        $xx['stoplossamt'] = $_POST['stoploss'];
    }
    if (isset($_POST['targetenabled']) && !empty($_POST['target'])) {
        $xx['target'] = $_POST['target'];
    }
    $buy = $obj->insertnew("stocktransaction", $xx);
    $obj->saveactivity("Stock Buy by User", "", $buy, $employeeid, "User", "Stock Buy by User");
    $remainfund = $investmentamount - $xx["totalamount"];
    $xy['investmentamount'] = $remainfund < 0 ? 0 : $remainfund;
    $user = $obj->update("users", $xy, $employeeid);
    if ($buy > 0) {
        echo "Redirect : " . $_POST['symbol'] . " has been bought successfully URLmarket";
    } else {
        echo "Something went wrong, please try again later";
    }
}
