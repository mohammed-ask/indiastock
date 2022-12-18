<?php
include 'main/session.php';
$test = $obj->logout();
header("location:login");
