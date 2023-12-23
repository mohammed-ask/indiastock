<?php
include "main/session.php";
$obj->updatewhere('fundrequest', ["visible" => $_GET['what'] === 'hide' ? 'No' : 'Yes'], "id=" . $_GET["hakuna"] . "");
