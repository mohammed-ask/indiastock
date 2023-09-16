<?php
include "main/session.php";
// print_r($_POST);
if($_POST['aifund'] > $investmentamount){
    echo '<div class="alert alert-warning">Cant\'t allot more than investment amount</div>';
    die;
}
$xx['aifund'] = $_POST['aifund'];
$xx['aitrading'] = 'Yes';
$obj->update('users',$xx,$employeeid);

$obj->update('users', $xx, $employeeid);

$yy['userid'] = $employeeid;
$yy['added_on'] = date('Y-m-d H:i:s');
$yy['status'] = 1;
$obj->insertnew('aitraders', $yy);
echo "Redirect :  URLportfolio";
