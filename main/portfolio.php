<?php
include "session.php";
$todayprofit = $obj->selectfieldwhere("closetradedetail", "sum(profitamount)", "date(added_on) = curdate() and userid=$employeeid and status = 1");
$totalprofit = $obj->selectfieldwhere("closetradedetail", "sum(profitamount)", "userid=$employeeid and status = 1");
?>
<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col text-center">
                        <span class="h5">₹<?= $investmentamount - $totalprofit ?></span>
                        <h6 class="text-uppercase font-11 text-muted mt-2 m-0">Amount Invested</h6>

                        <h6 class="font-10 text-muted mt-2 m-0 portfolio-cbody">LIMIT-<span><?= $usermargin ?>x</span></h6>
                    </div><!--end col-->
                </div> <!-- end row -->
            </div><!--end card-body-->
        </div> <!--end card-body-->
    </div><!--end col-->
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body" style="padding-bottom: 42px;">
                <div class="row align-items-center">
                    <div class="col text-center">
                        <span class="h5">₹<?= $investmentamount ?></span>
                        <h6 class="text-uppercase font-11 text-muted mt-2 m-0">Current Value</h6>
                    </div><!--end col-->
                </div> <!-- end row -->
            </div><!--end card-body-->
        </div> <!--end card-body-->
    </div><!--end col-->
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col text-center">
                        <span class="h5 text-success">₹<?= $todayprofit ?></span>
                        <h6 class="text-uppercase font-11 text-muted mt-2 m-0">Day's Profit/Loss</h6>
                        <h6 class="text-uppercase font-10 mt-2 m-0 portfolio-cbody text-success">0<span> % </span></h6>
                    </div><!--end col-->
                </div> <!-- end row -->
            </div><!--end card-body-->
        </div> <!--end card-body-->
    </div><!--end col-->
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col text-center">
                        <span class="h5 text-danger">₹<?= $totalprofit ?></span>
                        <h6 class="text-uppercase font-11 text-muted mt-2 m-0">Overall Profit/Loss</h6>
                        <h6 class="text-uppercase font-10 mt-2 m-0 portfolio-cbody text-danger">0<span> % </span></h6>
                    </div><!--end col-->
                </div> <!-- end row -->
            </div><!--end card-body-->
        </div> <!--end card-->
    </div><!--end col-->
</div><!--end row-->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">All Positions</h4>
                    </div><!--end col-->
                    <div class="col-auto">
                        <ul class="nav nav-tabs tab-nagative-m" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#Today" role="tab" aria-selected="true">Today's</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Carry_Forward" role="tab" aria-selected="false">Carry Forward</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Close" role="tab" aria-selected="false">Close</a>
                            </li>
                        </ul>
                    </div><!--end col-->
                </div> <!--end row-->
            </div><!--end card-header-->
            <div class="card-body">
                <div class="tab-content" id="Amount_history">
                    <div class="tab-pane fade show active" id="Today" role="tabpanel" aria-labelledby="Stocks-tab">
                        <div class="table-responsive dash-social">
                            <table id="example1" class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Stocks</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Qty.</th>
                                        <th>Price</th>
                                        <th>Total Cost</th>
                                        <th>Buy/Sell</th>
                                        <th>% Day's P/L</th>
                                        <th>Day's P/L</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Carry_Forward" role="tabpanel" aria-labelledby="Mutual-funds-tab">
                        <div class="table-responsive dash-social">
                            <table id="example2" class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Stocks</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Qty.</th>
                                        <th>Price</th>
                                        <th>Total Cost</th>
                                        <th>Buy/Sell</th>
                                        <th>%P/L</th>
                                        <th>P/L</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="Close" role="tabpanel" aria-labelledby="Close-tab">
                        <div class="table-responsive dash-social">
                            <table id="example3" class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Stocks</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Qty.</th>
                                        <th>Buy Price</th>
                                        <th>Sell Price</th>
                                        <th>Buy/Sell</th>
                                        <th>%P/L</th>
                                        <th>P/L</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>

                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div><!--end tab-pane-->



                </div><!--end tab-content-->

            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
<?php
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Portfolio- PMS Equity";
$contentheader = "";
$pageheader = "";
$extrajs = "<script src='//cdn.datatables.net/plug-ins/1.13.1/api/fnReloadAjax.js'></script>";
include "main/templete.php"; ?>
<script>
    var table = $('#example1').DataTable({
        "ajax": "main/opentradedata.php",
        "processing": false,
        "serverSide": true,
        "pageLength": 25,
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "order": [
            [0, "desc"]
        ],
    })
    setInterval(function() {
        table.ajax.reload();
    }, 10000);

    var table2 = $('#example2').DataTable({
        "ajax": "main/holdingtradedata.php",
        "processing": false,
        "serverSide": true,
        "pageLength": 25,
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "order": [
            [0, "desc"]
        ],
    })
    setInterval(function() {
        table2.ajax.reload();
    }, 10000);
    var table = $('#example3').DataTable({
        "ajax": "main/closetradedata.php",
        "processing": false,
        "serverSide": true,
        "pageLength": 25,
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "order": [
            [0, "desc"]
        ],
    })
</script>