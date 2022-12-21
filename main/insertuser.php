<?php
include 'function.php';
include 'conn.php';
$emailcount = $obj->selectfieldwhere('users', "count(id)", "email='" . $_POST['email'] . "' and status != 99");
$empcode = $obj->selectfieldwhere('users', 'count(id)', 'usercode="' . trim($_POST['employeeref']) . '" and type = 1');
if ($emailcount > 0) {
    echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>Sorry! This Mail Already Exists </div>";
} elseif ($empcode != 1 && !empty($_POST['employeeref'])) {
    echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>Sorry! Employee ID Does Not Match With Our Existing Employees  </div>";
} else {

    $x = array();
    $tb_name = 'users';
    $result4 = $obj->selectextrawhere('codegenerator', "`category` like 'uniqueid'");
    $num4 = $obj->total_rows($result4);
    $codegeneratorid = 0;
    $codenumber = 0;
    if ($num4) {
        $row4 = $obj->fetch_assoc($result4);
        $codegeneratorid = $row4['id'];
        $codenumber = $row4['number'] + 1;
        $generatedcode = sprintf('%04d', $codenumber);
        // $month = strtoupper(date("M", strtotime($date)));
        $uniqueid = str_replace(array("{prefix}", "{number}"), array($row4['prefix'], $generatedcode), $row4['pattern']);
    } else {
        $cg['prefix'] = "USER";
        $cg['number'] = 0;
        $cg['pattern'] = "{prefix}{number}";
        $cg['category'] = "uniqueid";
        // $fsed = getfirstandlastday($date);
        $cg['addedon'] = date("Y-m-d H:i:s");
        $cg['addedby'] = $employeeid;
        $cg['status'] = 1;
        $codegeneratorid = $obj->insertnew("codegenerator", $cg);
        $codenumber = 1;
        $generatedcode = sprintf('%04d', $codenumber);
        $uniqueid = str_replace(array("{prefix}", "{number}"), array($cg['prefix'], $generatedcode), $cg['pattern']);
    }
    $n['number'] = $codenumber;
    $obj->update("codegenerator", $n, $codegeneratorid);
    $x['usercode'] = $uniqueid;
    $x['added_on'] = date('Y-m-d H:i:s');
    // $x['added_by'] = $employeeid;
    $x['updated_on'] = date('Y-m-d H:i:s');
    // $x['updated_by'] = $employeeid;
    $x['status'] = 0;
    $x['name'] = $_POST['username'];
    $x['email'] = $_POST['email'];
    $x['mobile'] = $_POST['mobileno'];
    $x['address'] = $_POST['address'];
    $x['dob'] = $_POST['dob'];
    $x['adharno'] = $_POST['adharno'];
    $x['panno'] = $_POST['panno'];
    $x['bankname'] = $_POST['bankname'];
    $x['accountno'] = $_POST['accountno'];
    $x['ifsc'] = $_POST['ifsc'];
    $x['employeeref'] = $_POST['employeeref'];
    $x['password'] = md5($_POST['password']);
    $x['policyread'] = $_POST['policyread'];
    $x['type'] = 2;
    $x['role'] = 2;

    $pradin = $obj->insertnew($tb_name, $x);

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

    echo "Redirect : Registration Successfull URLlogin";
}
