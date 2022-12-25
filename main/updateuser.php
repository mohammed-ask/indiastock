<?php
include 'function.php';
include 'conn.php';
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
    $x['added_on'] = date('Y-m-d H:i:s');
    // $x['added_by'] = $employeeid;
    $x['updated_on'] = date('Y-m-d H:i:s');
    // $x['updated_by'] = $employeeid;
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

    $pradin = $obj->update($tb_name, $x, $id);

    include 'main/mailsetting.php';

    // $mail->addAddress($x['email']);

    // $mail->Subject = "Trainer Assined For Practical Training";
    // $message = "Hello," . "<br/>";
    // $message .= "<h2>Welcome to </h2>" . "<br/>";
    // $message .= "<p>Congrats ! Your Are Successfully Registered Your Account Has Been Sent to Admin for Approval". "</p>" . "<br/>";
    // // $message .= "<p>If You are login in the system then <a href='" . BASE_URL . "practicalTraining.php'> click here to goto trainer Requests page</p>" . "<br/>";
    // $mail->Body = $message;
    // if (!$mail->Send()) {
    // }

    echo "Redirect : User Updated Successfully URLusers";
}
