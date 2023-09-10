<?php
include "./session.php";
$type = $_POST['type'];
$value = $_POST['value'];
if ($value === 'No') {
    $obj->update('users', [$type => 'Yes'], $employeeid);
} elseif ($value === 'Yes') {
    $obj->update('users', [$type => 'No'], $employeeid, 1);
}
echo "Success";
