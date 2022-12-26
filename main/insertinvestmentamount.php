<?php
include "session.php";
$id = $_POST['id'];
unset($_POST['id']);
$fund['added_on'] = date('Y-m-d H:i:s');
$fund['added_by'] = $employeeid;
$fund['updated_on'] = date('Y-m-d H:i:s');
$fund['updated_by'] = $employeeid;
$fund['amount'] = $_POST['amount'];
$fund['remark'] = $_POST['remark'];
$fund['date'] = changedateformate($_POST['date']);
$fund['userid'] = $id;
$fund['status'] = 1;
$obj->insertnew('userinvestmentlog', $fund);
$oldamt = $obj->selectfieldwhere('users', 'investmentamount', 'id=' . $id . '');
$oldamt = (empty($oldamt)) ? 0 : $oldamt;
$newamt = $oldamt + $fund['amount'];
$xx['investmentamount'] = $newamt;
$ures = $obj->update('users', $xx, $id);
if ($ures == 1) {
    echo "Redirect : Fund has been added to user URLusers";
}
