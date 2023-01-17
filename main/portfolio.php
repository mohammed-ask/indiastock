<?php
include "session.php";


?>
<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col text-center">
                        <span class="h5">₹58,451.25</span>
                        <h6 class="text-uppercase font-11 text-muted mt-2 m-0">Amount Invested</h6>

                        <h6 class="font-10 text-muted mt-2 m-0 portfolio-cbody">LIMIT-<span>5x</span></h6>
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
                        <span class="h5">₹71,235.50</span>
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
                        <span class="h5 text-success">₹2,254.25</span>
                        <h6 class="text-uppercase font-11 text-muted mt-2 m-0">Day's Profit/Loss</h6>
                        <h6 class="text-uppercase font-10 mt-2 m-0 portfolio-cbody text-success">34.02<span> % </span></h6>
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
                        <span class="h5 text-danger">₹13,542.15</span>
                        <h6 class="text-uppercase font-11 text-muted mt-2 m-0">Overall Profit/Loss</h6>
                        <h6 class="text-uppercase font-10 mt-2 m-0 portfolio-cbody text-danger">54.60<span> % </span></h6>
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
                                    <!-- <tr>
                                        <td>Apple INC</td>
                                        <td>12Jan, 2023</td>
                                        <td>10:12 PM</td>
                                        <td>100</td>
                                        <td>147.70</td>
                                        <td>14770</td>
                                        <td class="text-danger">Sell</td>
                                        <td class="text-success">0.80</td>
                                        <td class="text-success">800</td>
                                        <td>
                                            <a class="btn btn-sm btn-success" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#BuyStocks">B</a>
                                            <a class="btn btn-sm btn-danger" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#SellStocks">S</a>
                                        </td>
                                    </tr> -->

                                </tbody>
                            </table>
                        </div>
                    </div><!--end tab-pane-->
                    <div class="tab-pane fade" id="Carry_Forward" role="tabpanel" aria-labelledby="Mutual-funds-tab">
                        <div class="table-responsive dash-social">
                            <table id="datatable" class="table table-bordered">
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
                                    </tr><!--end tr-->
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Tesla Ayutu INC</td>
                                        <td>12Jan, 2023</td>
                                        <td>10:12 PM</td>
                                        <td>100</td>
                                        <td>147.70</td>
                                        <td>14770</td>
                                        <td class="text-danger">Sell</td>
                                        <td class="text-success">0.80</td>
                                        <td class="text-success">800</td>
                                        <td>
                                            <a class="btn btn-sm btn-success" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#BuyStocks">B</a>
                                            <a class="btn btn-sm btn-danger" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#SellStocks">S</a>
                                        </td>
                                    </tr><!--end tr-->

                                    <tr>
                                        <td>Book Abc INC</td>
                                        <td>12Jan, 2023</td>
                                        <td>10:12 PM</td>
                                        <td>100</td>
                                        <td>147.70</td>
                                        <td>14770</td>
                                        <td class="text-success">Buy</td>
                                        <td class="text-danger">7.80</td>
                                        <td class="text-success">800</td>
                                        <td>
                                            <a class="btn btn-sm btn-success" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#BuyStocks">B</a>

                                            <a class="btn btn-sm btn-danger" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#SellStocks">S</a>
                                        </td>
                                    </tr><!--end tr-->

                                    <tr>
                                        <td>MC Xyz INC</td>
                                        <td>12Jan, 2023</td>
                                        <td>10:12 PM</td>
                                        <td>100</td>
                                        <td>147.70</td>
                                        <td>14770</td>
                                        <td class="text-danger">Sell</td>
                                        <td class="text-success">10.07</td>
                                        <td class="text-success">800</td>
                                        <td>
                                            <a class="btn btn-sm btn-success" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#BuyStocks">B</a>
                                            <a class="btn btn-sm btn-danger" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#SellStocks">S</a>
                                        </td>
                                    </tr><!--end tr-->

                                    <tr>
                                        <td>Zya INC</td>
                                        <td>12Jan, 2023</td>
                                        <td>10:12 PM</td>
                                        <td>100</td>
                                        <td>147.70</td>
                                        <td>14770</td>
                                        <td class="text-danger">Sell</td>
                                        <td class="text-success">0.80</td>
                                        <td class="text-success">800</td>
                                        <td>
                                            <a class="btn btn-sm btn-success" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#BuyStocks">B</a>
                                            <a class="btn btn-sm btn-danger" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#SellStocks">S</a>
                                        </td>
                                    </tr><!--end tr-->

                                    <tr>
                                        <td>Axy INC</td>
                                        <td>12Jan, 2023</td>
                                        <td>10:12 PM</td>
                                        <td>100</td>
                                        <td>147.70</td>
                                        <td>14770</td>
                                        <td class="text-danger">Sell</td>
                                        <td class="text-success">0.80</td>
                                        <td class="text-success">800</td>
                                        <td>
                                            <a class="btn btn-sm btn-success" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#BuyStocks">B</a>
                                            <a class="btn btn-sm btn-danger" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#SellStocks">S</a>
                                        </td>
                                    </tr><!--end tr-->


                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="..." class="float-end">
                            <ul class="pagination pagination-sm mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul><!--end pagination-->
                        </nav><!--end nav-->
                    </div><!--end tab-pane-->

                    <div class="tab-pane fade" id="Close" role="tabpanel" aria-labelledby="Close-tab">
                        <div class="table-responsive dash-social">
                            <table id="datatable" class="table table-bordered">
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
                                    </tr><!--end tr-->
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Ayutu INC</td>
                                        <td>12Jan, 2023</td>
                                        <td>10:12 PM</td>
                                        <td>100</td>
                                        <td>147.70</td>
                                        <td>14770</td>
                                        <td class="text-danger">Sell</td>
                                        <td class="text-success">0.80</td>
                                        <td class="text-success">800</td>
                                        <td class="text-warning">Closed</td>
                                    </tr><!--end tr-->

                                    <tr>
                                        <td>Abc INC</td>
                                        <td>12Jan, 2023</td>
                                        <td>10:12 PM</td>
                                        <td>100</td>
                                        <td>147.70</td>
                                        <td>14770</td>
                                        <td class="text-success">Buy</td>
                                        <td class="text-danger">7.80</td>
                                        <td class="text-success">800</td>
                                        <td class="text-warning">Closed</td>
                                    </tr><!--end tr-->

                                    <tr>
                                        <td>MC Xyz INC</td>
                                        <td>12Jan, 2023</td>
                                        <td>10:12 PM</td>
                                        <td>100</td>
                                        <td>147.70</td>
                                        <td>14770</td>
                                        <td class="text-danger">Sell</td>
                                        <td class="text-success">10.07</td>
                                        <td class="text-success">800</td>
                                        <td class="text-warning">Closed</td>
                                    </tr><!--end tr-->

                                    <tr>
                                        <td>Zya INC</td>
                                        <td>12Jan, 2023</td>
                                        <td>10:12 PM</td>
                                        <td>100</td>
                                        <td>147.70</td>
                                        <td>14770</td>
                                        <td class="text-danger">Sell</td>
                                        <td class="text-success">0.80</td>
                                        <td class="text-success">800</td>
                                        <td class="text-warning">Closed</td>
                                    </tr><!--end tr-->

                                    <tr>
                                        <td>Axy INC</td>
                                        <td>12Jan, 2023</td>
                                        <td>10:12 PM</td>
                                        <td>100</td>
                                        <td>147.70</td>
                                        <td>14770</td>
                                        <td class="text-danger">Sell</td>
                                        <td class="text-success">0.80</td>
                                        <td class="text-success">800</td>
                                        <td class="text-warning">Closed</td>
                                    </tr><!--end tr-->


                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="..." class="float-end">
                            <ul class="pagination pagination-sm mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul><!--end pagination-->
                        </nav><!--end nav-->
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
$pagetitle = "Indiastock: Portfolio";
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
    }, 500000);
</script>