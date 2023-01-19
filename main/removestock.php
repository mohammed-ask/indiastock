<?php
include "./session.php";
$delete = $obj->deletewhere("userstocks", "status =1 and Symbol = '" . $_POST['symbol'] . "' and Exch = '" . $_POST['exchange'] . "'");
if ($delete > 0) {
    echo "Success";
} else {
    echo "Failed";
}
