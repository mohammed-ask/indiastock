<?php
include "session.php";
// Total Fund
$fundadded = $obj->selectfieldwhere("fundrequest", 'sum(amount)', "userid=" . $employeeid . " and status = 1");
$fundadded = empty($fundadded) ? 0 : $fundadded;
$fundwithdraw = $obj->selectfieldwhere("withdrawalrequests", 'sum(amount)', "userid=" . $employeeid . " and status = 1");
$fundwithdraw = empty($fundwithdraw) ? 0 : $fundwithdraw;

//Today Profit
$todayprofit = $obj->selectfieldwhere("closetradedetail", "sum(totalprofit)", "date(added_on) = date(CONVERT_TZ(NOW(),'+00:00','$timeskip')) and userid=$employeeid and status = 1");
$todayprofit = empty($todayprofit) ? 0 : $todayprofit;

//Overall Profit
$completedtotalprofit = $obj->selectfieldwhere("closetradedetail", "sum(totalprofit)", "userid=$employeeid and totalprofit > 0");

//Overall Loss
$completedtotalloss = $obj->selectfieldwhere("closetradedetail", "sum(totalprofit)", "userid=$employeeid and totalprofit < 0");
$completedtotalloss = empty($completedtotalloss) ? 0 : $completedtotalloss;

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
$stockdata = isset($stockdata) && $stockdata !== 'Error fetching candle data:' ? $stockdata : [];
// echo "<pre>";
// print_r($stockdata);
// die;
$totalprofit = $completedtotalprofit;
$totalloss = $completedtotalloss;
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
        $token = $obj->selectfieldwhere("userstocks", "symboltoken", "id=" . $row['stockid'] . "");

        $pricedata = array_filter($stockdata, function ($data) use ($symbol, $excg, $token) {
            if ($data['Token'] == $token) {
                return $data;
            }
        });
        $keys = array_keys($pricedata)[0];
        //Adding Invested Amount

        // Adding Profit on Total Share
        $profitloss = ($pricedata[$keys]['LastRate'] - $row['price']) * $row['qty'] * $row['mktlot'];
        if ($row['trademethod'] === 'Sell') {
            if ($profitloss <= 0) {
                $profitloss = abs($profitloss);
            } else {
                $profitloss = -$profitloss;
            }
        }
        if ($profitloss > 0) {
            $totalprofit = $totalprofit + $profitloss;
        } else {
            $totalloss = $totalloss + ($profitloss);
        }
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
        $token = $obj->selectfieldwhere("userstocks", "symboltoken", "id=" . $row['stockid'] . "");
        $pricedata = array_filter($stockdata, function ($data) use ($symbol, $excg, $token) {
            if ($data['Token'] == $token) {
                return $data;
            }
        });
        $keys = array_keys($pricedata)[0];
        //Adding Invested Amount

        // Adding Profit on Total Share
        $profitloss = ($pricedata[$keys]['LastRate'] - $row['price']) * $row['qty'] * $row['mktlot'];
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
$stocktotalamt = $obj->selectfieldwhere("stocktransaction", "sum(totalamount)", " userid = $employeeid and ((status in (1, 0) and tradestatus in ('Open','Close') and stockid != '' and stockid is not null) || (status = 1 and tradestatus = 'Close' and (stockid = '' || stockid is null)))");
if ($stocktotalamt != 0) {
    $totalprofitprcnt = $totalprofit * 100 / $stocktotalamt;
}

$todaystocktotalamt = $obj->selectfieldwhere("stocktransaction", "sum(totalamount)", "date(added_on) = date(CONVERT_TZ(NOW(),'+00:00','$timeskip'))  and userid = $employeeid and ((status in (1, 0) and tradestatus in ('Open','Close') and stockid != '' and stockid is not null) || (status = 1 and tradestatus = 'Close' and (stockid = '' || stockid is null)))");
$todayprofitpercent = 0;
if ($todaystocktotalamt != 0) {
    $todayprofitpercent = $todayprofit * 100 / $todaystocktotalamt;
}
if ($portfoliomaintanance) {
    include "maintenance.php";
?>
<?php } else { ?>
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
                            <span class='h5 text-success'>₹<?= round($totalprofit) ?></span>
                            <h6 class="text-uppercase font-11 text-muted mt-2 m-0">Overall Profit</h6>
                            <h6 class="mt-0"><br></h6>
                            <!--<h6 class='text-uppercase font-10 mt-2 m-0 portfolio-cbody text-success'><?= round($totalprofitprcnt, 2) ?><span> % </span></h6> -->
                        </div><!--end col-->
                    </div> <!-- end row -->
                </div><!--end card-body-->
            </div> <!--end card-->
        </div><!--end col-->
    </div><!--end row-->


    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col text-center">
                            <div style="display: inline-flex;"> <span class='m-0 h5 text-danger'>₹<?= round($totalloss) ?></span><span>
                                    <!-- <h6 style="width: max-content; border: none; margin-top: 2px!important; margin-left: 12% !important;" class='text-uppercase font-10 mt-2 m-0 portfolio-cbody text-danger'>(<?= round($totalprofitprcnt, 2) ?><span> % )</span></h6> -->
                                </span></div>
                            <h6 class="text-uppercase font-11 text-muted mt-2 m-0">Overall Loss</h6>

                        </div><!--end col-->
                    </div> <!-- end row -->
                </div><!--end card-body-->
            </div> <!--end card-->
        </div><!--end col-->
        <div class="col-md-6 col-lg-3 mobile-card-display-none">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col text-center">
                            <span class="h5 text-success">₹<?= round($fundadded, 2) ?></span>
                            <h6 class="text-uppercase font-11 text-muted mt-2 m-0">Total Fund Added</h6>
                        </div><!--end col-->
                    </div> <!-- end row -->
                </div><!--end card-body-->
            </div> <!--end card-body-->
        </div><!--end col-->

        <div class="col-md-6 col-lg-3 mobile-card-display-none">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col text-center">
                            <span class='h5 text-danger'>₹<?= round($fundwithdraw, 2) ?></span>
                            <h6 class="text-uppercase font-11 text-muted mt-2 m-0">Total Fund Withdrawal</h6>

                        </div><!--end col-->
                    </div> <!-- end row -->
                </div><!--end card-body-->
            </div> <!--end card-body-->
        </div><!--end col-->
        <div class="col-md-6 col-lg-3 mobile-card-display-none">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col text-center">
                            <?php //Current Value 
                            ?>
                            <span class="h5">₹<?= round($investmentamount) ?></span>
                            <h6 class="text-uppercase font-11 text-muted mt-2 m-0">Avialable Fund</h6>

                        </div><!--end col-->
                    </div> <!-- end row -->
                </div><!--end card-body-->
            </div> <!--end card-body-->
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
                                    <a class="nav-link active" data-bs-toggle="tab" href="#Today" role="tab" aria-selected="true">Intraday</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#Carry_Forward" role="tab" aria-selected="false">Holding</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#Close" role="tab" aria-selected="false">Close</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#brokerstock" role="tab" aria-selected="false">By Broker</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#aistock" role="tab" aria-selected="false">By AI</a>
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
                                            <th>Stop Loss</th>
                                            <th>Target</th>
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
                                            <th>Stop Loss</th>
                                            <th>Target</th>
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
                                            <th>Open_Time</th>
                                            <th>Close_Time</th>
                                            <th>Lot</th>
                                            <th>Qty.</th>
                                            <th>Buy_Price</th>
                                            <th>Sell_Price</th>
                                            <th>Total</th>
                                            <!-- <th>Paid By User</th> -->
                                            <th>Buy/Sell</th>
                                            <th>Stop Loss</th>
                                            <th>Stop_Loss_Triggered</th>
                                            <th>Target</th>
                                            <th>Target_Triggered</th>
                                            <th>P/L %</th>
                                            <th>P/L</th>
                                            <!-- <th>Your P/L</th> -->
                                            <!-- <th>Broker Profit</th> -->
                                            <th>Status</th>
                                            <th>Added By</th>
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
                                            <th>Open_Time</th>
                                            <th>Close_Time</th>
                                            <th>Lot</th>
                                            <th>Qty.</th>
                                            <th>Buy_Price</th>
                                            <th>Sell_Price</th>
                                            <th>Total</th>
                                            <th>P/L %</th>
                                            <th>P/L</th>
                                            <!-- <th>Paid By User</th> -->
                                            <th>Buy/Sell</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="aistock" role="tabpanel" aria-labelledby="Close-tab">
                            <?php
                            $aistat = $obj->selectfieldwhere("users", 'aitrading', 'id=' . $employeeid . '')
                            ?>
                            <span><strong>AI Trade Mode</strong></span>
                            <label class="switch" onclick="givealert('<?= $aistat ?>')">
                                <input type="checkbox" <?= $aistat === 'Yes' ? 'disabled' : '' ?> name='aitrading' <?= $aistat === 'Yes' ? 'checked' : '' ?> data-type="aitrading" class="setactive" value="<?= $aistat ?>">
                                <span class="slider round"></span>
                            </label>
                            <?php
                            if ($aistat === 'Yes') { ?>
                                <img src="main/images/loader.gif" style="width: 100%;height:120px" />
                            <?php } else { ?>
                                <div class="table-responsive dash-social">
                                    <table id="example5" class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Stocks</th>
                                                <th>Open Time</th>
                                                <th>Close Time</th>
                                                <th>Lot</th>
                                                <th>Qty.</th>
                                                <th>Buy Price</th>
                                                <th>Sell Price</th>
                                                <th>Total</th>
                                                <th>%P/L</th>
                                                <th>P/L</th>
                                                <!-- <th>Paid By User</th> -->
                                                <th>Buy/Sell</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
                        </div>
                        <!--end tab-pane-->



                    </div><!--end tab-content-->

                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
<?php
}
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
        "pageLength": 15,
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
        "pageLength": 15,
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
    let todayinterval = null;
    <?php if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
        if ($hour >= 9 && $hour < 24) { ?>
            todayinterval = setInterval(function() {
                table.ajax.reload(null, false);
            }, <?= $apiinterval ?>);
    <?php }
    } ?>
    let holdinginterval = null;

    $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
        recalculateDataTableResponsiveSize();
        var id = $(e.target).attr("href").substr(1);
        // window.location.hash = id;
        <?php if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
            // check if current time is between 9 am to 4 pm
            if ($hour >= 9 && $hour < 24) { ?>
                if (id === 'Today') {
                    todayinterval = setInterval(function() {
                        table.ajax.reload(null, false);
                    }, <?= $apiinterval ?>);
                    clearInterval(holdinginterval)
                }
                if (id === 'Carry_Forward') {
                    holdinginterval = setInterval(function() {
                        table2.ajax.reload(null, false);
                    }, <?= $apiinterval ?>);
                    clearInterval(todayinterval)
                }
                if (id !== 'Today' && id !== 'Carry_Forward') {
                    clearInterval(todayinterval)
                    clearInterval(holdinginterval)
                }
        <?php }
        } ?>
    });

    // on load of the page: switch to the currently selected tab
    var hash = window.location.hash;
    $('a[href="' + hash + '"]').tab('show');

    var table3 = $('#example3').DataTable({
        "ajax": "main/closetradedata.php",
        "processing": false,
        "serverSide": true,
        "pageLength": 15,
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
    var table4 = $('#example4').DataTable({
        "ajax": "main/brokertradedata.php",
        "processing": false,
        "serverSide": true,
        "pageLength": 15,
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
    var table4 = $('#example5').DataTable({
        "ajax": "main/aitradedata.php",
        "processing": false,
        "serverSide": true,
        "pageLength": 15,
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

    $(document).on("click", ".setactive", function() {
        value = $(this).val();
        type = $(this).data("type");
        $.ajax({
            type: "post",
            url: "./main/setaitrading.php",
            data: {
                value: value,
                type: type
            },
            success: function(response) {
                if (response == 'Success') {
                    location.reload(true);
                }
            }
        });
    })

    function givealert(stat) {
        if (stat === 'Yes') {
            alertify.alert('Don\'t worry it will automatically turn off at 11PM')
        }
    }
</script>