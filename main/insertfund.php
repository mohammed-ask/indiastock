<?php
include "main/session.php";
$chktid = $obj->selectfieldwhere("fundrequest", 'count(id)', 'transactionid="' . $_POST['transactionid'] . '"');
if ($chktid > 0) {
    echo "<div class='alert alert-warning'>Transaction Id is <strong>invalid</strong>, please enter <strong>valid</strong> transaction Id to complete payment.</div>";
    die;
}
$xx['added_on'] = date("Y-m-d H:i:s");
$xx['updated_on'] = date("Y-m-d H:i:s");
$xx['status'] = 0;
$xx['userid'] = $employeeid;
$xx['mobile'] = $_POST['mobile'];
$xx['transactionid'] = $_POST['transactionid'];
$xx['paymentmethod'] = $_POST['paymentmethod'];
$xx['amount'] = $_POST['amount'];
$fund = $obj->insertnew("fundrequest", $xx);
if ($fund > 0) {
    echo "Redirect : Add Fund Request successfully submitted  URLfund";
} else {
    echo "Something went wrong";
}
