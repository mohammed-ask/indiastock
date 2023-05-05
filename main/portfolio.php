<?php
include "session.php";
$todayprofit = $obj->selectfieldwhere("closetradedetail", "sum(profitamount)", "date(added_on) = date(CONVERT_TZ(NOW(),'+00:00','$timeskip')) and userid=$employeeid and status = 1");
$todayprofit = empty($todayprofit) ? 0 : $todayprofit;
$completedtotalprofitloss = $obj->selectfieldwhere("closetradedetail", "sum(profitamount)", "userid=$employeeid ");

// Invested Amount
$investamt = $obj->selectfieldwhere("stocktransaction", "sum(totalamount)", "userid=$employeeid and status = 0 and tradestatus = 'Open'");
$investamt = empty($investamt) ? 0 : $investamt;

$totalstocktraded = $obj->selectfieldwhere(
    "stocktransaction",
    "group_concat(distinct(stockid))",
    "status = 0 and userid = $employeeid and tradestatus='Open' and stockid != '' and stockid is not null"
);

if (!empty($totalstocktraded)) {
    $fetchshare = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "userid='" . $employeeid . "' and status = 1 and id in (" . $totalstocktraded . ")");
    $rowfetch = mysqli_fetch_all($fetchshare, 1);
    $stockdata = $obj->fivepaisaapi($rowfetch);
}
$stockdata = 'Error fetching candle data:' ? [] : $stockdata;
// echo "<pre>";
// print_r($stockdata);
// die;
$totalprofit = $completedtotalprofitloss;
$result = $obj->selectextrawhereupdate(
    "stocktransaction",
    "*",
    "status = 0 and userid = $employeeid and tradestatus='Open' and stockid != '' and stockid is not null"
);
// print_r(mysqli_fetch_all($result, MYSQLI_ASSOC));
// die;

if (!empty($stockdata)) {
    while ($row = $obj->fetch_assoc($result)) {
        $symbol = $row['symbol'];
        $excg = $row['exchange'];
        $pricedata = array_filter($stockdata, function ($data) use ($symbol, $excg) {
            if ($data['Symbol'] === $symbol && $data['Exch'] === $excg) {
                return $data;
            }
        });
        $keys = array_keys($pricedata)[0];
        //Adding Invested Amount

        // Adding Profit on Total Share
        $profitloss = ($row['price'] - $pricedata[$keys]['LastRate']) * $row['qty'] * $row['mktlot'];
        if ($row['trademethod'] === 'Sell') {
            if ($profitloss <= 0) {
                $profitloss = abs($profitloss);
            } else {
                $profitloss = -$profitloss;
            }
        }
        $totalprofit = $totalprofit + $profitloss;
    }
}

// Today Shares Only
$result2 = $obj->selectextrawhereupdate(
    "stocktransaction",
    "*",
    "date(added_on) = date(CONVERT_TZ(NOW(),'+00:00','$timeskip')) and status = 0 and userid = $employeeid and tradestatus='Open' and stockid != '' and stockid is not null"
);

if (!empty($stockdata)) {
    while ($row = $obj->fetch_assoc($result2)) {
        $symbol = $row['symbol'];
        $excg = $row['exchange'];
        $pricedata = array_filter($stockdata, function ($data) use ($symbol, $excg) {
            if ($data['Symbol'] === $symbol && $data['Exch'] === $excg) {
                return $data;
            }
        });
        $keys = array_keys($pricedata)[0];
        //Adding Invested Amount

        // Adding Profit on Total Share
        $profitloss = ($row['price'] - $pricedata[$keys]['LastRate']) * $row['qty'] * $row['mktlot'];
        if ($row['trademethod'] === 'Sell') {
            if ($profitloss <= 0) {
                $profitloss = abs($profitloss);
            } else {
                $profitloss = -$profitloss;
            }
        }
        $todayprofit = $todayprofit + $profitloss;
    }
}

$totalprofit = empty($totalprofit) ? 0 : $totalprofit;
$totalprofitprcnt = 0;
$stocktotalamt = $obj->selectfieldwhere("stocktransaction", "sum(totalamount)", " status in (0,1) and userid = $employeeid and tradestatus in ('Open','Close') and stockid != '' and stockid is not null");
if ($stocktotalamt != 0) {
    $totalprofitprcnt = $totalprofit * 100 / $stocktotalamt;
}

$todaystocktotalamt = $obj->selectfieldwhere("stocktransaction", "sum(totalamount)", "date(added_on) = date(CONVERT_TZ(NOW(),'+00:00','$timeskip')) and status in (1, 0) and userid = $employeeid and tradestatus in ('Open','Close') and stockid != '' and stockid is not null");
$todayprofitpercent = 0;
if ($todaystocktotalamt != 0) {
    $todayprofitpercent = $todayprofit * 100 / $todaystocktotalamt;
}
?>
<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col text-center">
                        <span class="h5">₹<?= round($investamt, 2) ?></span>
                        <h6 class="text-uppercase font-11 text-muted mt-2 m-0">Amount Invested</h6>

                        <h6 class="font-10 text-muted mt-2 m-0 portfolio-cbody">LIMIT-<span><?= $usermargin ?>x</span></h6>
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
                        <?php //Current Value 
                        ?>
                        <span class="h5">₹<?= round($investmentamount) ?></span>
                        <h6 class="text-uppercase font-11 text-muted mt-2 m-0">Current Value</h6>
                        <h6 class="text-uppercase font-10 text-muted mt-2 m-0 portfolio-cbody"><span style="display: inline-flex;justify-content:center;align-items:center"><span>Net Amount</span> <span><span class="profile-tooltip mt-0"><i style="color: #057c7c;" class="fa-solid fa-circle-info"></i>
                                        <p class="text-capitalize profile-tooltiptext">The net amount, including your profit & loss, available for withdrawal at any time.</p>
                                    </span></span></span></h6>


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
                        <span <?= $todayprofit >= 0 ? "class='h5 text-success'" : "class='h5 text-danger'" ?>>₹<?= round($todayprofit, 2) ?></span>
                        <h6 class="text-uppercase font-11 text-muted mt-2 m-0">Day's Profit/Loss</h6>
                        <h6 <?= $todayprofit >= 0 ? "class='text-uppercase font-10 mt-2 m-0 portfolio-cbody text-success'" : "class='text-uppercase font-10 mt-2 m-0 portfolio-cbody text-danger'" ?>><?= round($todayprofitpercent, 2) ?><span> % </span></h6>
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
                        <span <?= $totalprofit >= 0 ? "class='h5 text-success'" : "class='h5 text-danger'" ?>>₹<?= round($totalprofit) ?></span>
                        <h6 class="text-uppercase font-11 text-muted mt-2 m-0">Overall Profit/Loss</h6>
                        <h6 <?= $totalprofit >= 0 ? "class='text-uppercase font-10 mt-2 m-0 portfolio-cbody text-success'" : "class='text-uppercase font-10 mt-2 m-0 portfolio-cbody text-danger'" ?>><?= round($totalprofitprcnt, 2) ?><span> % </span></h6>
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
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#brokerstock" role="tab" aria-selected="false">By Broker</a>
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
                                        <th>Lot</th>
                                        <th>Qty.</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <!-- <th>Paid By User</th> -->
                                        <th>Buy/Sell</th>
                                        <th>Current Rate</th>
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
                                        <th>Lot</th>
                                        <th>Qty.</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Current Rate</th>
                                        <!-- <th>Paid By User</th> -->
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
                                        <th> Buy Date</th>
                                        <th>Buy Time</th>
                                        <th>Lot</th>
                                        <th>Qty.</th>
                                        <th>Buy Price</th>
                                        <th>Sell Price</th>
                                        <th>Total</th>
                                        <!-- <th>Paid By User</th> -->
                                        <th>Buy/Sell</th>
                                        <th>%P/L</th>
                                        <th>P/L</th>
                                        <!-- <th>Your P/L</th> -->
                                        <!-- <th>Broker Profit</th> -->
                                        <th>Type</th>
                                        <th>Close Time</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="brokerstock" role="tabpanel" aria-labelledby="Close-tab">
                        <div class="table-responsive dash-social">
                            <table id="example4" class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Stocks</th>
                                        <th>Open Time</th>
                                        <th>Close TIme</th>
                                        <th>Lot</th>
                                        <th>Qty.</th>
                                        <th>Buy Price</th>
                                        <th>Sell Price</th>
                                        <th>Total</th>
                                        <th>%P/L</th>
                                        <th>P/L</th>
                                        <!-- <th>Paid By User</th> -->
                                        <th>Buy/Sell</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>

                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end tab-pane-->



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

    // check if current day is a weekday (Monday to Friday)
    <?php if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
        // check if current time is between 9 am to 4 pm
        if ($hour >= 9 && $hour < 16) { ?>
            setInterval(function() {
                table.ajax.reload();
            }, <?= $apiinterval ?>);
            setInterval(function() {
                table2.ajax.reload();
            }, <?= $apiinterval ?>);
    <?php }
    } ?>

    function recalculateDataTableResponsiveSize() {
        $($.fn.dataTable.tables(true)).DataTable().responsive.recalc();
    }

    // $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
    //     recalculateDataTableResponsiveSize();
    // });


    // $('#myTab a').click(function(e) {
    //     e.preventDefault();
    //     $(this).tab('show');
    // });

    // // store the currently selected tab in the hash value
    $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
        recalculateDataTableResponsiveSize();
        // var id = $(e.target).attr("href").substr(1);
        // window.location.hash = id;
    });

    // on load of the page: switch to the currently selected tab
    var hash = window.location.hash;
    $('a[href="' + hash + '"]').tab('show');

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
    var table = $('#example4').DataTable({
        "ajax": "main/brokertradedata.php",
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