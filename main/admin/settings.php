<?php
include "main/session.php";
/* @var $obj db */
ob_start();
$emp = $obj->selectextrawhereupdate("users", "id,firstname,lastname", "status=1");
$emp_data = mysqli_fetch_all($emp);
$state = $obj->selectextrawhereupdate("state_list", "id,state", "status=1");
$state_data = mysqli_fetch_all($state);
$country = $obj->selectextrawhereupdate("country", "id,country_name", "status=1");
$country_data = mysqli_fetch_all($country);
// $account_type = $obj->selectextrawhereupdate("bank_account_type", "id,name", "status=1");
// $account_type_data = mysqli_fetch_all($account_type);
$company = $obj->selectextrawhere("personal_detail", "status=11");
$row = $obj->fetch_assoc($company);
$path = $obj->fetchattachment($row['uploadfile_id']);
?>
<style>
    #vert-tabs-tab {
        display: block !important;
    }

    textarea {
        resize: none;
    }
</style>
<div class="card">
    <div class="card-header with-border">
        <h3 class="card-title with-border">Settings</h3>
        <div class="card-tools pull-right">
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <h4 class="m-4"><?php echo $row["company_name"] ?></h4>
                <div class="col-8 offset-2">
                    <div>
                        <img src="<?php echo "$path" ?>" style="width:100%;height:150px" alt="not available">
                    </div>
                </div>
            </div>
        </div>
        <div id="tabs">
            <ul>
                <li><a id="vert-tabs-profile-tab" href="#vert-tabs-profile"><i class="fa fa-clipboard" aria-hidden="true"></i> Company General Info </a></li>
                <li> <a id="vert-tabs-home-tab" href="#vert-tabs-home"><i class="fa fa-phone" aria-hidden="true"></i> Bank Account Detail</a></li>
                <li><a id="vert-tabs-address2-tab" href="#vert-tabs-address2"><i class="fa fa-address-card" aria-hidden="true"></i> Company Details</a></li>
            </ul>
            <div class="" id="vert-tabs-profile">
                <!-- <div class="card" style="background-color: white;"> -->
                <!-- <div class="card-header" style="background-color: #fdfdfd;">
                        <h3 class="card-title">General information</h3>
                        <div class="card-tools">
                            <a href="index.php" class="btn btn-default" data-card-widget="">
                                << Back </a>
                                    <button type="button" class="btn btn-tool" data-card-widget="">
                                        <i class="fas fa-times"></i>
                                    </button>
                        </div>
                    </div> -->
                <!-- <div class="card-body"> -->
                <form data-bvalidator-validate data-bvalidator-theme="gray" id="personaladd" onsubmit="event.preventDefault();sendForm('', '', 'insertpersonalaccount', 'resultid', 'personaladd');return 0;">
                    <input type="text" name="personal_detail" value="-1" hidden>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Company Name</label>
                            <input type="text" class="form-control" value="<?php
                                                                            if (isset($row["company_name"])) {
                                                                                echo $row["company_name"];
                                                                            }
                                                                            ?>" name="company_name" id="inputEmail4" placeholder="Company Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="short_name">Short Name</label>
                            <input type="text" class="form-control" name="short_name" value="<?php
                                                                                                if (isset($row["short_name"])) {
                                                                                                    echo $row["short_name"];
                                                                                                }
                                                                                                ?>" id="short_name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone">Phone No.</label>
                            <input type="text" class="form-control" name="phone" value="<?php
                                                                                        if (isset($row["phone"])) {
                                                                                            echo $row["phone"];
                                                                                        }
                                                                                        ?>" id="phone" pla ceholder="Phone Number">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" name="website" value="<?php
                                                                                            if (isset($row["website"])) {
                                                                                                echo $row["website"];
                                                                                            }
                                                                                            ?>" id="website" placeholder="www.samplesite.com">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="gst_no">GST No</label>
                            <input type="text" class="form-control" data-bvalidator="checkgst" name="gst_no" value="<?php
                                                                                                                    if (isset($row["gst_no"])) {
                                                                                                                        echo $row["gst_no"];
                                                                                                                    }
                                                                                                                    ?>" id="gst_no" placeholder="GST Number">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="email">E-Mail</label>
                            <input type="text" class="form-control" name="email" value="<?php
                                                                                        if (isset($row["email"])) {
                                                                                            echo $row["email"];
                                                                                        }
                                                                                        ?>" id="email" placeholder="Company E-mail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <textarea type="text" style="resize:none" class="form-control" name="address_line_1" value="" id="inputAddress" placeholder="1234 Main St"><?php
                                                                                                                                                                    if (isset($row["address_1"])) {
                                                                                                                                                                        echo $row["address_1"];
                                                                                                                                                                    }
                                                                                                                                                                    ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress2">City</label>
                        <input type="text" class="form-control" name="city" value="<?php
                                                                                    if (isset($row["city"])) {
                                                                                        echo $row["city"];
                                                                                    }
                                                                                    ?>" id="inputAddress2" placeholder="City">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="shipping_country" class="">Country</label>
                                <div class=" input-group sinput-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <select id="country" class="form-control select2" name="country_id" style="width: 100%;">
                                        <?php
                                        foreach ($country_data as list($id, $country)) {
                                            if ($id == $row["country_id"]) {
                                        ?>
                                                <option value="<?php echo $id ?>" selected><?php echo $country ?></option> <?php } else { ?>
                                                <option value="<?php echo $id ?>"> <?php echo $country ?></option>
                                        <?php }
                                                                                                                    } ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="form-group col-md-4">
                            <div id="indian_state">
                                <label for="shipping_state1" class=""> state</label>
                                <div class=" input-group sinput-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                    </div>
                                    <input name="state" type="text" class="form-control" value="<?php
                                                                                                if (isset($row["state"])) {
                                                                                                    echo $row["state"];
                                                                                                }
                                                                                                ?>" id="state1" placeholder=" State">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Pincode</label>
                            <input type="number" name="pincode" value="<?php
                                                                        if (isset($row["pincode"])) {
                                                                            echo $row["pincode"];
                                                                        }
                                                                        ?>" class="form-control" id="inputZip">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Company Logo</label>
                        <input type="file" class="form-control" name="logo_upload">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Favicon Logo</label>
                        <input type="file" class="form-control" name="favicon">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <div id="resultid"></div>
                    </div>
                </form>
                <!-- </div> -->
                <!-- </div> -->
            </div>
            <div id="vert-tabs-home">
                <!-- <div class="card" style="background-color: white;"> -->
                <!-- <div class="card-header" style="background-color: #fdfdfd;">
                        <h3 class="card-title">Bank information</h3>
                        <div class="card-tools">
                            <a href="index.php" class="btn btn-default" data-card-widget="">
                                << Back </a>
                                    <button type="button" class="btn btn-tool" data-card-widget="">
                                        <i class="fas fa-times"></i>
                                    </button>
                        </div>
                    </div> -->
                <!-- <div class="card-body"> -->
                <form data-bvalidator-validate data-bvalidator-theme="gray" id="personalbankadd" onsubmit="event.preventDefault();sendForm('', '', 'insert_personal_account.php', 'resultid1', 'personalbankadd');return 0;">
                    <div class="pl-4 pr-5">
                        <input type="text" name="bank_detail" value="-1" hidden>
                        <div class="form-group">
                            <label for="account_name" class="col-sm-12 col-form-label">Bank Name</label>
                            <div class="col-sm-12 input-group sinput-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input name="bank_name" type="text" class="form-control" value="<?php
                                                                                                if (isset($row["bank_name"])) {
                                                                                                    echo $row["bank_name"];
                                                                                                }
                                                                                                ?>" id="bank_name" placeholder="Bank Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="account_name" class="col-sm-12 col-form-label">Account Name</label>
                            <div class="col-sm-12 input-group sinput-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input name="account_name" type="text" class="form-control" value="<?php
                                                                                                    if (isset($row["account_name"])) {
                                                                                                        echo $row["account_name"];
                                                                                                    }
                                                                                                    ?>" id="account_name" placeholder="Account Name">
                            </div>
                        </div>
                        <!-- <div class="form-group">
                                    <label for="bank_Type" class="col-sm-12 col-form-label">Account Type</label>
                                    <div class="col-sm-12 input-group sinput-group">
                                        <div class="input-group-prepend">
                                        </div>
                                        <select id="account_type" class="form-control select2" name="account_type_id" style="width: 100%;">
                                            <?php
                                            // foreach ($account_type_data as list($id, $account_type)) {
                                            //     if ($id == $row["account_type_id"]) {
                                            ?>
                                                    <option value="<?php echo $id ?>" selected><?php echo $account_type ?></option> <?php //} else { 
                                                                                                                                    ?>
                                                    <option value="<?php echo $id ?>"> <?php echo $account_type ?></option>
                                            <?php
                                            //}
                                            //  }
                                            ?>
                                        </select>
                                    </div>
                                </div> -->
                        <div class="form-group">
                            <label for="account_no" class="col-sm-12 col-form-label">Account No.</label>
                            <div class="col-sm-12 input-group sinput-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                </div>
                                <input name="account_no" type="number" class="form-control" value="<?php
                                                                                                    if (isset($row["account_number"])) {
                                                                                                        echo $row["account_number"];
                                                                                                    }
                                                                                                    ?>" id="account_no" placeholder="Account Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="micr_code" class="col-sm-12 col-form-label">MICR Code</label>
                            <div class="col-sm-12 input-group sinput-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                </div>
                                <input name="micr_code" type="text" class="form-control" value="<?php
                                                                                                if (isset($row["micr_no"])) {
                                                                                                    echo $row["micr_no"];
                                                                                                }
                                                                                                ?>" id="micr_code" placeholder="MICR Code">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ifsc_code" class="col-sm-12 col-form-label">IFSC Code</label>
                            <div class="col-sm-12 input-group sinput-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                </div>
                                <input name="ifsc_code" type="text" class="form-control" value="<?php
                                                                                                if (isset($row["ifsc_code"])) {
                                                                                                    echo $row["ifsc_code"];
                                                                                                }
                                                                                                ?>" id="ifsc_code" placeholder="IFSC Code">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="swift_code" class="col-sm-12 col-form-label">SWIFT Code</label>
                            <div class="col-sm-12 input-group sinput-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                </div>
                                <input name="swift_code" type="text" value="<?php
                                                                            if (isset($row["swift_code"])) {
                                                                                echo $row["swift_code"];
                                                                            }
                                                                            ?>" class="form-control" id="swift_code" placeholder="SWIFT Code">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="branch_name" class="col-sm-12 col-form-label">Branch Name</label>
                            <div class="col-sm-12 input-group sinput-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                </div>
                                <input name="branch_name" type="text" value="<?php
                                                                                if (isset($row["branch_name"])) {
                                                                                    echo $row["branch_name"];
                                                                                }
                                                                                ?>" class="form-control" id="branch_name" placeholder="Branch Name">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <div id="resultid1"></div>
                    </div>
                </form>
                <!-- </div> -->

                <!-- </div> -->
            </div>
            <div id="vert-tabs-address2">
                <!-- <div class="card" style="background-color: white;"> -->
                <!-- <div class="card-header" style="background-color: #fdfdfd;">
                        <h3 class="card-title">Bank information</h3>

                        <div class="card-tools">
                            <a href="index.php" class="btn btn-default" data-card-widget="">
                                << Back </a>
                                    <button type="button" class="btn btn-tool" data-card-widget="">
                                        <i class="fas fa-times"></i>
                                    </button>
                        </div>
                    </div> -->
                <!-- <div class="card-body"> -->

                <form data-bvalidator-validate data-bvalidator-theme="gray" id="companydetailadd" onsubmit="event.preventDefault();sendForm('', '', 'insert_personal_account.php', 'resultid2', 'companydetailadd');return 0;">
                    <div class="pl-4 pr-5">
                        <input type="text" name="company_detail" value="-1" hidden>
                        <div class="form-group">
                            <label for="account_name" class="col-sm-3 col-form-label">Gumasta Number</label>
                            <div class="col-sm-8 input-group sinput-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input name="gumasta_no" type="text" class="form-control" value="<?php
                                                                                                    if (isset($row["gumasta_no"])) {
                                                                                                        echo $row["gumasta_no"];
                                                                                                    }
                                                                                                    ?>" id="gumasta_no" placeholder="Enter Company Gumasta">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="msme_no" class="col-sm-3 col-form-label">MSME No.</label>
                            <div class="col-sm-8 input-group sinput-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input name="msme_no" type="text" class="form-control" value="<?php
                                                                                                if (isset($row["msme_no"])) {
                                                                                                    echo $row["msme_no"];
                                                                                                }
                                                                                                ?>" id="msme_no" placeholder="Enter MSME No.">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sme_no" class="col-sm-3 col-form-label">SME No.</label>
                            <div class="col-sm-8 input-group sinput-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input name="sme_no" type="text" class="form-control" value="<?php
                                                                                                if (isset($row["sme_no"])) {
                                                                                                    echo $row["sme_no"];
                                                                                                }
                                                                                                ?>" id="sme_no" placeholder="Enter SME No.">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cin_no" class="col-sm-3 col-form-label">CIN No.</label>
                            <div class="col-sm-8 input-group sinput-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input name="cin_no" type="text" value="<?php
                                                                        if (isset($row["cin_no"])) {
                                                                            echo $row["cin_no"];
                                                                        }
                                                                        ?>" class="form-control" id="cin_no" placeholder="Enter CIN No.">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hsn_code" class="col-sm-3 col-form-label">HSN Code</label>
                            <div class="col-sm-8 input-group sinput-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input name="hsn_code" type="text" value="<?php
                                                                            if (isset($row["hsn_code"])) {
                                                                                echo $row["hsn_code"];
                                                                            }
                                                                            ?>" class="form-control" id="hsn_code" placeholder="Enter HSN Code">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sac_code" class="col-sm-3 col-form-label">SAC Code</label>
                            <div class="col-sm-8 input-group sinput-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input name="sac_code" type="text" value="<?php
                                                                            if (isset($row["sac_code"])) {
                                                                                echo $row["sac_code"];
                                                                            }
                                                                            ?>" class="form-control" id="sac_code" placeholder="Enter SAC Code">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tan_no" class="col-sm-3 col-form-label">TAN Number</label>
                            <div class="col-sm-8 input-group sinput-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input name="tan_no" type="text" value="<?php
                                                                        if (isset($row["tan_no"])) {
                                                                            echo $row["tan_no"];
                                                                        }
                                                                        ?>" class="form-control" id="tan_no" placeholder="Enter TAN Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pan_no" class="col-sm-3 col-form-label">PAN Number</label>
                            <div class="col-sm-8 input-group sinput-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input name="pan_no" type="text" value="<?php
                                                                        if (isset($row["pan_no"])) {
                                                                            echo $row["pan_no"];
                                                                        }
                                                                        ?>" class="form-control" id="pan_no" placeholder="Enter PAN Number">
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <div id="resultid2"></div>
                    </div>
                </form>
                <!-- </div> -->

                <!-- </div> -->
            </div>
        </div>
    </div>
    <!-- /.card-body -->


</div>





<?php
$pagemaincontent = ob_get_clean();
ob_clean();
$extracss = "";
$pageheader = "";
$extrajs = '
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

';
$breadcrumbs = '<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Add setting</li>
</ol>';
$pagemeta = "";
$pagetitle = "Add setting::.Settings-Quality";
$contentheader = "Settings";
$breadcrumb = '<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>';
include "main/admin/templete.php";
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').bValidator();

        $("#tabs").tabs().addClass("ui-tabs-vertical ui-helper-clearfix");
        $("#tabs li").removeClass("ui-corner-top").addClass("ui-corner-left");

    });

    $("#country").change(function() {
        var valu = $(this).val();
        if (valu == "1") {
            search(this.id, 'indian_state', 'main/fill_state.php', '')
        }
    })
    var val = $("#country").val();
    if (val == 1) {
        search("country", 'indian_state', 'main/fill_state.php', '<?= $row['indian_state'] ?>')
    }
    $("#country").change(function() {
        if ($(this).val() !== "1") {
            $("#indian_state").html(
                "<label for='shipping_state'> state</label>" +
                "<div class='input-group sinput-group'>" +
                "<div class='input-group-prepend'>" +
                "<span class='input-group-text'><i class='fa fa-envelope' aria-hidden='true'></i></span>" +
                "</div>" +
                "<input name='state' type='text' class='form-control' id='shipping_state' placeholder= 'State'>" +
                "</div>");
        }
    });
</script>