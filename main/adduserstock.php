<?php
include "./session.php";
$checkstock = $obj->selectfieldwhere("userstocks", "count(id)", "userid=" . $employeeid . " and Exch = '" . $_POST['exch'] . "' and Symbol='" . $_POST['stockname'] . "'");
if ($checkstock > 0) {
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
    $xx['ExchType'] = 'C';
    $stock = $obj->insertnew("userstocks", $xx);
    if ($stock > 0) {
        echo "Success";
    } else {
        echo "Failed";
    }
}
