<?php
include 'main/session.php';
$head = "index";
if (($_SERVER['HTTP_HOST'] == 'localhost')) {
    $head = "/indiastock";
}
$index =  $head;
$test = $obj->logout();
header("location:$index");
