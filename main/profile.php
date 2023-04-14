<?php
include "main/session.php";
$rowprofile = $obj->selectextrawhere("users", "id=" . $employeeid . "")->fetch_assoc();
ob_start();
?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-4 align-self-center">
                <div class="media">
                    <div class="d-inline-block">
                        <img src="<?= $avatarpath ?>" alt="" class="thumb-lg rounded-circle">
                    </div>
                    <div class="media-body align-self-center ms-3">
                        <h5 class="fw-semibold mb-1 font-18"><?= $username ?></h5>
                        <p class="mb-0 font-13">India</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ms-auto align-self-center">
                <ul class="list-unstyled personal-detail mb-0">
                    <li class=""><i style="margin-right: 5px !important;" class="fa-solid fa-phone mr-3 text-secondary font-16 align-middle"></i> <b> Phone </b> : +91 <?= $rowprofile['mobile'] ?></li>
                    <li class="mt-2"><i style="margin-right: 5px !important;" class="fa-solid fa-envelope text-secondary font-16 align-middle mr-3"></i> <b> Email </b> : <?= $rowprofile['email'] ?></li>
                </ul>
            </div><!--end col-->

        </div>
        <div class="accordion mt-3" id="accordionSettings">
            <div class="accordion-item">
                <h2 class="accordion-header mt-0" id="bankAC">
                    <button class="accordion-button font-14" type="button" data-bs-toggle="collapse" data-bs-target="#settingOne" aria-expanded="true" aria-controls="settingOne">
                        Linked Bank Account
                    </button>
                </h2>
                <div id="settingOne" class="accordion-collapse collapse show" aria-labelledby="bankAC" data-bs-parent="#accordionSettings">
                    <div class="accordion-body">
                        <div class="border rounded">
                            <div class="bg-light d-flex justify-content-between">
                                <h5 class="m-0 font-15 p-3"> Bank Details</h5>
                                <div class="align-self-center me-3">
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("", "bankaccountchange","", "Change Bank Details")'>Edit</button>
                                </div>
                            </div>
                            <div class="row p-3">

                                <div class="col-4">
                                    <h6 class="m-0">Bank Name</h6>
                                    <p class="mb-0"><?= $rowprofile['bankname'] ?></p>
                                </div><!--end col-->
                                <div class="col-4">
                                    <h6 class="m-0">Account Number</h6>
                                    <p class="mb-0"><?= $rowprofile['accountno'] ?></p>
                                </div><!--end col-->
                                <div class="col-4">
                                    <h6 class="m-0">IFSC Code</h6>
                                    <p class="mb-0"><?= $rowprofile['ifsc'] ?></p>
                                </div><!--end col-->

                            </div><!--end row-->
                        </div>
                    </div><!--end accordion-body-->
                </div><!--end settingOne-->
            </div><!--end accordion-item-->


            <div class="accordion-item">
                <h2 class="accordion-header mt-0" id="General">
                    <button class="accordion-button collapsed font-14" type="button" data-bs-toggle="collapse" data-bs-target="#settingFive" aria-expanded="false" aria-controls="settingFive">
                        General Settings
                    </button>
                </h2>
                <div id="settingFive" class="accordion-collapse collapse" aria-labelledby="General" data-bs-parent="#accordionSettings">
                    <form class="row gy-2 gx-3 align-items-end" id="addtax" enctype="multipart/form-data">
                        <div class="accordion-body">
                            <h5 class="font-13">Change Profile Image</h5>
                            <div class="row row-cols-lg-auto g-3 align-items-center">
                                <div class="col-sm-3">
                                    <input class="form-control" type="file" id="myFile" name="avatar">
                                </div>
                            </div>

                            <h5 class="mt-3 font-13">Update Contact Number</h5>
                            <div class="row row-cols-lg-auto g-3 align-items-center">
                                <div class="col-12">
                                    <input class="form-control" name="mobile" data-bvalidator='digit,required,minlength[10],maxlength[10]' type="text" placeholder="" value="<?= $rowprofile['mobile'] ?>">
                                </div>

                                <!-- <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div> -->

                            </div>
                            <h5 class="mt-3 font-13">Trade Mode</h5>
                            <div class="form-check d-inline-block me-2">
                                <input class="form-check-input" value="Holding" type="radio" name="trademode" id="trademode1" <?= $rowprofile['trademode'] == 'Holding' ? "checked" : "" ?>>
                                <label class="form-check-label" for="trademode1">
                                    Holding
                                </label>
                            </div>
                            <div class="form-check mb-2 d-inline-block">
                                <input class="form-check-input" value="Intraday" type="radio" name="trademode" id="trademode2" <?= $rowprofile['trademode'] == 'Intraday' ? "checked" : "" ?>>
                                <label class="form-check-label" for="trademode2">
                                    Intraday
                                </label>
                            </div>
                            <h5 class="mt-3 font-13">Carry Forward Trade</h5>
                            <div style="margin-left:3px" class="row row-cols-lg-auto g-3 align-items-center">
                                <label class="switch">
                                    <input type="checkbox" name='carryforward' <?= $rowprofile['carryforward'] === 'Yes' ? 'checked' : '' ?> class="setactive" value="Yes">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <h5 class="mt-3 font-13">Change Password</h5>
                            <div class="row row-cols-lg-auto g-3 align-items-center">
                                <div class="col-12" style="position: relative;">
                                    <input class="form-control" value="<?= $rowprofile['password'] ?>" name="password" type="password" id="password" placeholder="Currant Password">
                                    <i id="eye" class="fa fa-eye" style="position: absolute; top:10px; right:15px" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div id="otpinput"></div>
                            <div class="col-12 mt-3">
                                <button type="button" class="btn btn-primary" id="otp" onclick="requestotp()">Submit OTP</button>
                                <button type="button" class="btn btn-primary" id="formsubmit" style="display: none;" onclick="sendForm('', '', 'updateprofile', 'resultid', 'addtax')">Submit</button>
                            </div>
                            <div id="resultid"></div>
                        </div><!--end accordion-body-->
                    </form>
                </div><!--end settingOne-->
            </div><!--end accordion-item-->

        </div> <!--end accordion-->
    </div><!--end card-body-->
</div><!--end card-->
<?php
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Indiastock: Profile";
$contentheader = "";
$pageheader = "";
include "main/templete.php"; ?>
<script>
    $(function() {

        $("#eye").click(() => {
            iconname = $("#eye").attr("class");
            if (iconname === 'fa fa-eye') {
                $('#password').attr('type', 'text')
                $("#eye").attr('class', 'fa fa-eye-slash')

            } else {
                $('#password').attr('type', 'password')
                $("#eye").attr('class', 'fa fa-eye')
            }
        })
    });

    function requestotp() {
        event.preventDefault();
        addoverlay()
        $.post("main/otpforprofile.php",
            function(data) {
                if (data === "Success") {
                    removeoverlay()
                    $("#otpinput").append(" <div class='mt-3 row row-cols-lg-auto g-3 align-items-center'><div class='col-12'><input class='form-control' name='otp' data-bvalidator='digit,required,minlength[4],maxlength[4]' type='text' placeholder='Enter OTP' value=''></div></div>")
                    $("#formsubmit").css("display", "block")
                    $("#otp").css("display", "none")
                }
            },
        );
    }
</script>