<?php
include "main/session.php";
?>
<div class="modal-body">
    <form class="row gy-2 gx-3 align-items-end" id="addfund">
        <div class="col-12">
            <label class="form-label" for="Quantity">Amount which AI can use </label>
            <input type="number" data-bvalidator="required,number" class="form-control form-control-sm" id="" name="aifund" placeholder="">
        </div>
        <button style="background-color: #057c7c;" class="btn btn-success w-100 my-3 d-none" onclick="event.preventDefault();sendForm('', '', 'insertaifund', 'resultid', 'addfund')" id="modalsubmit"></button>
        <div class="col-md-12" id="resultid"></div>
    </form>
</div><!--end modal-body-->