<?php
session_start();
ob_start();
include 'function.php';
include 'conn.php';
$email = $_POST['email'];
$pwd = $_POST['password'];
$table = "users";
$condition = " (`email` = '" . $email . "' ) and type = 1";
$result = $obj->selectextrawhereupdate($table, "*", $condition);
$num = $obj->total_rows($result);
if ($num) {
    $row = $obj->fetch_assoc($result);

    $result12 = $obj->fixedselect($table, "id", $row['id']);
    $num12 = $obj->total_rows($result12);
    if ($num12) {
        $row12 = $obj->fetch_assoc($result12);

        $pwd1 = $row12['password'];
        if ($pwd == $pwd1) {
            if ($row['status'] != 1 || $row['activate'] !== 'Yes') {
                echo "Error : Can't Login! You Are Not Allowed To Login";
            } else {
                $data = array();

                $_SESSION['username'] = $row['username'];
                $_SESSION['userid'] = $row['id'];
                $_SESSION['useremail'] = $row['email'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['type'] = $row['type'];
                $_SESSION['name'] = $row['name'];

                $log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
                $log['username'] = $_SESSION['name'];
                $log['userid'] = $_SESSION['userid'];
                $log['datetime'] = date('Y-m-d H:i:s');
                $log['status'] = 1;
                $obj->insertnew('loginlog', $log);
                echo "Redirect : Logged in SuccessfullyURLadministrator";
            }
        } else {
            echo "Error : Password is incorrect.";
        }
    } else {


        echo "Error : Not Allow To login .";
    }
} else {
    echo "Error : Invalid Email and Password";
}
