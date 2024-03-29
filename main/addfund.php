<?php
include "main/session.php";
?>

<!-- <div>
    <h2 class="m-0 text-center font-15 py-3 px-0 font-weight-700">We regret to inform you that, due to ongoing bank issues, we are temporarily unable to process payments. Your cooperation is crucial, as payments made during this period are non-refundable. Our team is actively working to resolve the situation, and we will notify you promptly once the payment system is back to normal. We understand the inconvenience and appreciate your patience. If you have urgent concerns, reach out to our customer support.
</h2>
</div> -->

<div>
    <h5 class="m-0 text-center font-15 py-3 px-0 font-weight-700">Pay Using Internet Banking, Mobile Banking Apps & UPI Options</h5>
</div>
<div class="border rounded">
    <div class="bg-light">
        <h5 style="padding-left:16px !important;" class="m-0 font-14 p-2"><?= "Bank: " . $bankname ?></h5>
    </div>

    <div class="row p-3" style="overflow-wrap: break-word;">

        <div class="col-4" style="border-right: 1px solid lightgray;">
            <h6 class="m-0">Holder Name</h6>
            <p class="mb-0"><?= $bankaccountname ?></p>
        </div>

        <div class="col-4" style="border-right: 1px solid lightgray;">
            <h6 class="m-0">Account No.</h6>
            <p class="mb-0"><?= $bankaccountno ?></p>
        </div>

        <div class="col-4">
            <h6 class="m-0">IFSC Code</h6>
            <p class="m-0"><?= $bankifsccode ?></p>
        </div>


    </div>
</div>
<div class="border rounded mt-3" style="overflow-wrap: break-word;">
    <div class="row p-3">
        <div class="col-4">
            <img id="scanqr-myImg" style="width:85px; max-width:90px; border: 1px solid lightgrey; padding: 3px;border-radius: 5px;" height="85px" class="m-0" src="<?= $qrimage ?>" alt="Scan QR & Pay">
            <div class="my-1" style="color: black; font-size: 10px; margin-left: 2px;"><i class="fa-solid fa-qrcode"></i> <span> Tap to zoom</span></div>
          
            <div id="scanqr-myModal" class="scanqr-modal">
                <span class="scanqr-close">&times;</span>
                <img class="scanqr-modal-content" id="scanqr-img01">
                <div id="scanqr-caption"></div>
            </div>

        </div>

        <div class="col-4">
            <h6 class="m-0">Scan & Pay</h6>
            <p class="mb-0">Pay Using any UPI</p>
            <img style="width: 185%; margin-top: 20%;" src="main/dist/userimages/upi-gateway.png" alt="">


        </div>
        <div class="col-4">
            <h6 class="m-0">Pay Using UPI ID</h6>
            <p class="mb-0"><?= $upiid ?></p>

        </div>

    </div>
</div>
<h5 style="margin-top: 25px !important; margin-bottom: 0px !important; text-align: center; font-size: 14px;" class="card-title my-3">** Pay First & Add Transaction Details Below **</h5>
<div class="modal-body">
    <form class="row gy-2 gx-3 align-items-end" id="addfund">
       
        <div class="col-6">
            <label class="form-label mb-0" for="Price">Amount</label>
            <input type="number" step="any" data-bvalidator="required" class="form-control form-control-sm" id="" name="amount" placeholder="Amount you add in Funds">
        </div>
        <div class="col-6">
            <label class="form-label mb-0" for="Price">Upload Screenshot</label>
            <input class="form-control form-control-sm" id="file-upload" name='paymentmethod' type="file" name="fileUpload" accept="image/*" />
        </div>

        <h5 style="margin-top: 30px !important; margin-bottom: 3px !important;" class="card-title my-3 text-danger">Important*</h5>
        <ul style="margin-left: 16px;" class="mb-0">
            <li>Your Payment will take 30 mins to 1hr to reflect in Your Account after reviewing by our team.</li>
            <li>You can see Credited amount in your fund section after 30mins to 1 hour after payment.</li>
            <li>There is no any hidden Charges like transaction fee, processing fee & more.</li>
        </ul>

        <button style="background-color: #4e4eff;" class="btn btn-success w-100 my-3" onclick="event.preventDefault();sendForm('', '', 'insertfund', 'resultid', 'addfund')">Send Payment Details For Approval</button>
        <div class="col-md-12" id="resultid"></div>
    </form>



</div>
<script>
    $("#modalfooterbtn").css('display', 'none')
</script>

<script>
    // Get the modal
    var modal = document.getElementById("scanqr-myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("scanqr-myImg");
    var modalImg = document.getElementById("scanqr-img01");
    var captionText = document.getElementById("scanqr-caption");
    img.onclick = function() {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("scanqr-close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
</script>