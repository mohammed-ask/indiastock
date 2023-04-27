<?php
include 'main/session.php';
$head = "login";
if (($_SERVER['HTTP_HOST'] == 'localhost')) {
    $head = "/indiastock";
}
if (str_contains($_SERVER['REQUEST_URI'], "admin")) {
    $head = '/adminlogin';
}
$index =  $head;
$test = $obj->logout();
header("location:$index");
