<?php
include "./session.php";
$limit = $obj->selectfieldwhere("userstocks", "count(id)", "(userid=" . $employeeid . " and status = 1) || status = 11");
$checkstock = $obj->selectfieldwhere("userstocks", "count(id)", "userid=" . $employeeid . " and Exch = '" . $_POST['exch'] . "' and Symbol='" . $_POST['stockname'] . "'");
if ($limit === '50') {
    echo "Limit Reached";
} else if ($checkstock > 0) {
    echo "Present";
} else {
    $xx['added_on'] = date("Y-m-d H:i:s");
    $xx['added_by'] = $employeeid;
    $xx['updated_on'] = date("Y-m-d H:i:s");
    $xx['updated_by'] = $employeeid;
    $xx['status'] = 1;
    $xx['userid'] = $employeeid;
    $xx['Exch'] = $_POST['exch'];
    $xx['Symbol'] = $_POST['stockname'];
    $xx['ExchType'] = $_POST['exchtype'];
    $xx['Expiry'] = $_POST['expiry'];
    $xx['OptionType'] = $_POST['optiontype'];
    $xx['StrikePrice'] = $_POST['strikerate'];
    $xx['mktlot'] = $_POST['lotsize'];
    $xx['symboltoken'] = $_POST['token'];
    $stock = $obj->insertnew("userstocks", $xx);
    if ($stock > 0) {
        echo "Success";
    } else {
        echo "Failed";
    }
}
