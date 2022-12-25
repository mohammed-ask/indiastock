<?php
include 'session.php';
/* @var $obj db */
$id = $_GET['hakuna'];
$res = $obj->delete("users", $id);
if ($res == 1) {
    echo "User Deleted Successfully";
}
