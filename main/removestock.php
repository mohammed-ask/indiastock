<?php
include "./session.php";
$delete = $obj->deletewhere("userstocks", "status =1 and Symbol = '" . $_POST['symbol'] . "' and Exch = '" . $_POST['exchange'] . "' and userid = '" . $employeeid . "'");
$wdelete = $obj->deletewhere("watchliststock", "status =1 and symbol = '" . $_POST['symbol'] . "' and exchange = '" . $_POST['exchange'] . "' and userid = '" . $employeeid . "'");
if ($delete > 0) {
    echo "Success";
} else {
    echo "Failed";
}
