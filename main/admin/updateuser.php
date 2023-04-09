<?php
include "main/session.php";
$id = $_POST['id'];
unset($_POST['id']);
$emailcount = $obj->selectfieldwhere('users', "count(id)", "email='" . $_POST['email'] . "' and status != 99 and id != '" . $id . "'");
// $empcode = $obj->selectfieldwhere('users', 'count(id)', 'usercode="' . trim($_POST['employeeref']) . '" and type = 1');
if ($emailcount > 0) {
    echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>Sorry! This Mail Already Exists </div>";
}
// if ($empcode != 1 && !empty($_POST['employeeref'])) {
//     echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>Sorry! Employee ID Does Not Match With Our Existing Employees  </div>";
// } 
else {
    $tb_name = 'users';
    $x = array();
    $x['updated_on'] = date('Y-m-d H:i:s');
    $x['updated_by'] = $employeeid;
    $x['status'] = 0;
    $x['name'] = $_POST['username'];
    $x['email'] = $_POST['email'];
    $x['mobile'] = $_POST['mobileno'];
    $x['address'] = $_POST['address'];
    $x['dob'] = changedateformate($_POST['dob']);
    $x['adharno'] = $_POST['adharno'];
    $x['panno'] = $_POST['panno'];
    $x['bankname'] = $_POST['bankname'];
    $x['accountno'] = $_POST['accountno'];
    $x['ifsc'] = $_POST['ifsc'];
    // $x['employeeref'] = $_POST['employeeref'];
    $x['password'] = md5($_POST['password']);
    $x['type'] = 2;
    $x['role'] = 2;
    // $x['investmentamount'] = $_POST['investmentamount'];
    $x['limit'] = $_POST['limit'];
    $x['starttime'] = $_POST['starttime'];
    $x['endtime'] = $_POST['endtime'];
    $pradin = $obj->update($tb_name, $x, $id);

    echo "Redirect : User Updated Successfully URLusers";
}
