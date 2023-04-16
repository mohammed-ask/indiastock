<?php
include "main/session.php";
$id = $_GET['hakuna'];
$rowbank = $obj->selectextrawhereupdate("users", "bankname,accountno,ifsc", "id=" . $id . "")->fetch_assoc();
?>
<div class="px-3 py-2 mb-8 bg-white rounded-lg ">
    <span>
        <p class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">Bank Name:<?= $rowbank['bankname'] ?> <br> A/c No.:<?= $rowbank['accountno'] ?> <br>IFSC:<?= $rowbank['ifsc'] ?></p>

    </span>
</div>