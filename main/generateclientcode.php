<?php
include './main/function.php';
include './main/conn.php';
$user = $obj->selectextrawhere("users", 'status = 1 and type = 2');
echo "<pre>";
$i = 1;
while ($rowuser = $user->fetch_assoc()) {
    print_r($rowuser);
    $leadingZeros = ($i >= 1 && $i <= 9) ? '0' : '';
    $xx['usercode'] = 'PM04' . $leadingZeros . $i;
    $obj->update('users', $xx, $rowuser['id']);
    $i++;
}
