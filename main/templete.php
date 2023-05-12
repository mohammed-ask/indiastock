<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "headincludes.php"; ?>
</head>
<style>
    #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8) url(main/images/loader.gif) no-repeat center center;
        z-index: 10000;
    }

    .help-block {
        color: red;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }


    .switch {
        position: relative;
        display: inline-block;
        width: 42px;
        height: 20px;
    }

    .switch input {
        display: none;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #eb8a88;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 15px;
        width: 15px;
        left: 0px;
        bottom: 3px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #945afa;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #945afa;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(40px);
        -ms-transform: translateX(40px);
        transform: translateX(25px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    <?php
    if ($_SERVER['REQUEST_URI'] === '/portfolio' || $_SERVER['REQUEST_URI'] === '/mail' || $_SERVER['REQUEST_URI'] === '/fund' || $_SERVER['REQUEST_URI'] === '/profile' || parse_url($_SERVER['REQUEST_URI'])['path'] === '/viewchart') { ?>.nopad {
        padding-top: 85px !important;
    }

    <?php } ?>
</style>

<body id="body" data-layout="horizontal" class="" data-new-gr-c-s-check-loaded="14.1091.0" data-gr-ext-installed="">

    <!-- Top Bar Start -->
    <?php include "header.php"; ?>
    <!-- Top Bar End -->
    <div class="page-wrapper nopad">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-lg-9">
                        <!--end row-->
                        <?php echo $pagemaincontent ?>
                    </div><!--end col-->


                    <?php include "sidecolumn.php" ?>
                    <!--end col-->
                </div><!--end row-->
                <div class="row">
                    <div class="col-12">
                    </div><!--end col-->
                </div><!--end row-->


            </div><!-- container -->




            <!-- Footer Start -->
            <?php include "footer.php" ?>
            <!-- end Footer -->

        </div>
        <!-- end page content -->
    </div>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title m-0 mb-n1" id="modalheading">Add Service Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modaldata">
                </div>
                <div class="p-3">
                    <button type="button" class="btn btn-success w-10 my-3" id="modalfooterbtn" onclick="$('#modalsubmit').click();">Submit</button>
                    <!-- <button type="button" class="btn btn-primary" id="modalfooterbtn" onclick="$('#modalsubmit').click();">Save changes</button> -->
                    <!-- <button type="button" class="btn btn-info" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript  -->

    <?php include "footerincludes.php" ?>




</body><!--end body-->

<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>