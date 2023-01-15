<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "headincludes.php"; ?>
</head>
<style>
    .help-block {
        color: red;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

<body id="body" data-layout="horizontal" class="" data-new-gr-c-s-check-loaded="14.1091.0" data-gr-ext-installed="">

    <!-- Top Bar Start -->
    <?php include "header.php"; ?>
    <!-- Top Bar End -->
    <div class="page-wrapper">

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
    <!-- end page-wrapper -->


    <div class="modal fade" id="SellStocks" tabindex="-1" aria-labelledby="SellStocksLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h6 class="modal-title m-0 mb-n1" id="SellStocksLabel">Apple Inc</h6>
                        <span class="font-10 d-block mb-1">nasdaq</span>
                        <span class="border border-danger px-1 rounded text-danger">S</span>
                    </div>
                    <div>
                        <h6 class="m-0 text-uppercase font-16 fw-bold">₹147.95 <i class="fa-solid fa-arrow-trend-down text-danger"></i></h6>
                        <div class="d-inline-block font-10"><span class="text-danger">-110.60</span> <span class="text-danger">(30.52%)</span></div>
                        <div class="text-success">Live <span><i class="fa-regular fa-circle-dot"></i></span></div>
                    </div>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>

                <div class="modal-body">
                    <div class="form-check d-inline-block me-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="sell_Limit">
                        <label class="form-check-label" for="sell_Limit">
                            Holding
                        </label>
                    </div>
                    <div class="form-check mb-2 d-inline-block">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="sell_SL" checked="">
                        <label class="form-check-label" for="sell_SL">
                            Trade
                        </label>
                    </div>
                    <form class="row gy-2 gx-3 align-items-end">
                        <div class="col-auto">
                            <label class="form-label" for="Quantity">Quantity</label>
                            <input type="text" class="form-control form-control-sm" id="Quantity">
                        </div>
                        <div class="col-auto">
                            <label class="form-label" for="Price">Price</label>
                            <input type="text" class="form-control form-control-sm" id="Price">
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                                <label class="form-check-label" for="autoSizingCheck">
                                    Limit
                                </label>
                            </div>
                        </div>
                    </form>
                    <div class="mt-3">
                        <a class="" data-bs-toggle="collapse" href="user-index.htmlSL_Option" aria-expanded="false" aria-controls="collapseExample">
                            Stop Loss <i class="fa-regular fa-circle-down"></i>
                        </a>
                        <div class="collapse" id="SL_Option">
                            <form class="row gy-2 gx-3 align-items-center mt-1">
                                <div class="col-auto">
                                    <label class="form-label" for="Trigger_Price">Trigger Price</label>
                                    <input type="text" class="form-control form-control-sm" id="Trigger_Price">
                                </div>
                                <div class="col-auto align-self-end">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="buy_SL">
                                        <label class="form-check-label" for="buy_SL">
                                            Stop Loss
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div> <!--end collapse-->
                    </div> <!--end /div-->
                    <button class="btn btn-danger w-100 my-3">SELL</button>
                    <div class="row">
                        <div class="col">
                            <small class="text-muted d-block">Require Fund</small>
                            <small>₹00.00</small>
                        </div><!--end col-->
                        <div class="col-auto">
                            <small class="text-muted d-block">Available Fund</small>
                            <small>₹8545.00</small>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end modal-body-->

            </div><!--end modal-content-->
        </div><!--end modal-dialog-->
    </div><!--end modal-->
    <!--end /div-->
    <!-- Javascript  -->

    <?php include "footerincludes.php" ?>




</body><!--end body-->

<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>