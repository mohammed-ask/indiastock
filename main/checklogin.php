<?php
session_start();
ob_start();
include 'function.php';
include 'conn.php';
$username = $_POST['username'];
$pwd = md5($_POST['password']);
$table = "users";
$condition = " (`username` = '" . $username . "' )  and status=1 and type = 1";
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
            if ($row['status'] != 1) {
                echo "Error : User is not allowed to login.";
            } else {
                $data = array();

                $_SESSION['username'] = $row['username'];
                $_SESSION['userid'] = $row['id'];
                $_SESSION['useremail'] = $row['email'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['type'] = $row['type'];
                $_SESSION['name'] = $row['firstname'] . ' ' . $row['lastname'];
               
                   echo "Redirect : Logged in SuccessfullyURLindex";
            }
        } else {
            echo "Error : Password is incorrect.";
        }
    } else {


        echo "Error : Not Allow To login .";
    }
} else {


    echo "Error : User not registered.";
}
