<?php
include "main/session.php";
$pmid = $_GET['hakuna'];

?>
<img src="../<?= $obj->fetchattachment($pmid) ?>" />
<script>
    $("#modalfooterbtn").css('display', 'none')
</script>