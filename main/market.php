<?php
include "session.php";
$watchlistsym = [];
$sexchange = [];
$expiredstock = $obj->selectfieldwhere("userstocks", "group_concat(distinct(id))", "userid='" . $employeeid . "' and STR_TO_DATE(Expiry, '%Y%m%d') < date(CONVERT_TZ(NOW(),'+00:00','$timeskip'))  and Expiry != '' and Expiry is not null and status = 1");
if (!empty($expiredstock)) {
    $obj->deletewhere("userstocks", "id in (" . $expiredstock . ")");
    $obj->deletewhere("watchliststock", "userstockid in (" . $expiredstock . ")");
}
$wexch = $obj->selectfieldwhere("watchliststock", "group_concat(distinct(exchange))", "userid='" . $employeeid . "' and status = 1");
if (!empty($wexch)) {
    $sexchange = explode(",", $wexch);
}
$wsymbol = $obj->selectfieldwhere("watchliststock", "group_concat(distinct(symbol))", "userid='" . $employeeid . "' and status = 1");
if (!empty($wsymbol)) {
    $watchlistsym = explode(",", $wsymbol);
}
$fetchshare = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "userid='" . $employeeid . "' and status = 1");
$rowfetch = mysqli_fetch_all($fetchshare, 1);
// print_r($rowfetch);
array_push($rowfetch, ["Exch" => "N", "ExchType" => "C", "Symbol" => "NIFTY", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""], ["Exch" => "B", "ExchType" => "C", "Symbol" => "SENSEX", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""]);
// echo "<pre>";
// print_r($rowfetch);
// echo "</pre>";
$stockdata = $obj->fivepaisaapi($rowfetch);
// echo "<pre>";
// print_r($stockdata);
// echo "</pre>";
// die;
$stockdata = $stockdata == 'Error fetching candle data:' ? [] : $stockdata;
$marketdata = array_filter($stockdata, function ($data) {
    if ($data['Symbol'] === 'NIFTY' || $data['Symbol'] === 'SENSEX') {
        return $data;
    }
});
$stockdata = array_filter($stockdata, function ($data) {
    // if ($data['Symbol'] !== 'NIFTY' && $data['Symbol'] !== 'SENSEX') {
    return $data;
    // }
});
$wstocks = array_filter($stockdata, function ($data) use ($watchlistsym, $sexchange) {
    if (in_array($data['Symbol'], $watchlistsym) && in_array($data['Exch'], $sexchange))
        return $data;
});
if ($marketmaintanance) {
    include "maintenance.php";
?>
<?php } else { ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">

                    <li class="nav-item  parent-menu-item" style="list-style: none; display: inline-flex; align-items: center;">
                        <div>
                            <a class="nav-link" href="search" style="    border: 1px solid lightblue; border-radius: 5px; padding: 5px 10px; font-weight: 500;" id="navbarMarket" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("", "searchstock","", "Search Stock by Symbol")'>
                                <span><i class="fa fa-search"></i> Search & Add</span>
                            </a><i class=""></i>
                        </div>
                        <div style=" margin-left: 16px;"> (Add Upto 50 Stocks)</div>
                        <div class="profile-tooltip-market mt-0"><i style="color: #057c7c;" class="fa-solid fa-circle-info"></i>
                            <p class="text-capitalize profile-tooltiptext-market">You can add up to 50 stocks. If you want to add one or more stocks after reaching the limit, you will need to remove an existing stock from the list before adding the new one(s)</p>
                        </div>
                        </span>
                    </li>

                </div><!--end col-->
            </div><!--end row-->
        </div><!--end card-body-->
    </div><!--end card-->

    <div class="row" id="userstock">

        <div class="national-data">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12 mt-2 mb-2">
                        <div class="page-title-box d-inline-block d-md-flex justify-content-start justify-content-md-between align-items-center">
                            <div class="my-3 my-md-0 ps-2">
                                <?php foreach ($marketdata as $mdata) {  ?>
                                    <div class="nifty-50 d-inline-block me-3">
                                        <div class="font-11 fw-semibold"><?= $mdata['Symbol'] ?></div>
                                        <div class="d-inline-block font-11"><?= $mdata['LastRate'] ?> <span <?= $mdata['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>><?= $mdata['Chg'] ?> </span>
                                            <span <?= $mdata['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>>(<?= round($mdata['ChgPcnt'], 2) ?>%)</span>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php
        foreach ($stockdata as $data) { ?>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <a href="#" class="">
                            <div class="d-flex justify-content-between">
                                <div class="align-self-center">
                                    <h6 class="m-0 text-uppercase font-13"><?= $obj->selectfieldwhere("userstocks", "Symbol", "symboltoken='" . $data['Token'] . "' and userid = '" . $employeeid . "'") ?></h6>
                                    <p class="text-uppercase font-10 mb-0"><?php $exc = $data['Exch'] == 'B' ? ' BSE' : ' NSE';
                                                                            echo  $exc  ?></p>
                                </div>
                                <div>
                                    <h6 class="m-0 text-uppercase font-11">₹<?= $data['LastRate'] ?>
                                        <?php if ($data['ChgPcnt'] > 0) { ?>
                                            <i class="fa-solid fa-arrow-trend-up text-success"></i>
                                        <?php } else { ?>
                                            <i class="fa-solid fa-arrow-trend-down text-danger"></i>
                                        <?php } ?>
                                    </h6>
                                    <div class="d-inline-block font-10"><span <?= $data['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>><?= $data['Chg'] ?></span> <span <?= $data['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>>(<?= round($data['ChgPcnt'], 2) ?>%)</span></div>
                                </div>
                                <div>
                                    <i class="fa fa-times" style="color:grey" aria-hidden="true" onclick="removestock('<?= $data['Token'] ?>','<?= $data['Exch']  ?>')"></i>
                                </div>
                            </div><!-- end /div -->
                        </a> <!--end-->
                        <hr class="hr-dashed">
                        <div class="row mt-3 text-center">
                            <!-- <div class="col-6 col-md-3 border-end">
                            <p class="mb-1 text-muted">Open</p>
                            <span>₹144.45</span>
                        </div> -->
                            <div class="col-6 col-md-4 border-end">
                                <p class="mb-1 text-muted">High</p>
                                <span><?= $currencysymbol ?><?= $data['High'] ?></span>
                            </div>
                            <div class="col-6 col-md-4 border-end">
                                <p class="mb-1 text-muted">Low</p>
                                <span><?= $currencysymbol ?><?= $data['Low'] ?></span>
                            </div>
                            <div class="col-6 col-md-4">
                                <p class="mb-1 text-muted">Close</p>
                                <span><?= $currencysymbol ?><?= $data['PClose'] ?></span>
                            </div>
                        </div>

                        <hr class="hr-dashed">

                        <div class="d-flex justify-content-between">
                            <div class="action-icons">
                                <ul class="list-inline">
                                    <li class="list-inline-item align-self-center mx-0 bg-success" style="padding: 3px 8px 3px 8px !important;
                                                    font-weight: 500 !important; margin-right: 10px !important;">
                                        <a style="cursor:pointer" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("<?= $data["Token"] ?>", "buystock","", "Buy Stock")'><i class=""></i> Buy</a>
                                    </li><!--end /li-->
                                    <li class="list-inline-item align-self-center mx-0 bg-danger" style="padding: 3px 8px 3px 8px !important;
                                                    font-weight: 500 !important; margin-right: 10px !important;">
                                        <a style="cursor:pointer" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("<?= $data["Token"] ?>", "sellstock","", "Sell Stock")'>Sell</a>
                                    </li><!--end /li-->
                                    <li <?= (in_array($data['Symbol'], $watchlistsym) && in_array($data['Exch'], $sexchange)) ?  "style='background-color:#0073cf;cursor:pointer'" : "style='cursor:pointer'" ?> class="list-inline-item align-self-center mx-0">

                                        <i <?= (in_array($data['Symbol'], $watchlistsym) && in_array($data['Exch'], $sexchange)) ?  "style='color:white'" : "" ?> onclick="addtowatchlist('<?= $data['Symbol'] ?>','<?= $data['Exch']  ?>','<?= $data['Token']  ?>')" class="fa-solid fa-plus email-action-icons-item"></i>
                                    </li><!--end /li-->
                                </ul><!--end /ul-->

                            </div> <!--end action-icons-->

                            <div>
                                <?php
                                if ($data['ExchType'] === 'D' || $data['ExchType'] === 'U') {
                                    $data['Symbol'] = $obj->selectfieldwhere("userstocks", "Symbol", "symboltoken=" . $data['Token'] . "");
                                }
                                ?>
                                <a href="viewchart?token=<?= $data['Token'] ?>&exchangetype=<?= $data['ExchType'] ?>&exchange=<?= $data['Exch'] ?>">
                                    <p class="mb-0 text-muted">View Chart <span><i class="fa-solid fa-arrow-right"></i></span></p>
                                </a>
                            </div>
                        </div>

                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        <?php } ?>
    </div><!--end row-->
<?php
}
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Live Market - PMS Equity";
$contentheader = "";
$pageheader = "";
$watchliststocks = $wstocks;
include "main/templete.php"; ?>
<script>
    let myinterval = null;
    // check if current day is a weekday (Monday to Friday)
    <?php if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
        // check if current time is between 9 am to 4 pm
        if ($hour >= 9 && $hour < 24) { ?>
            setInterval(() => {
                console.log('counting market')
                $('#userstock').html()
                $.post("main/getlivemarketdata.php", {
                        wexcg: '<?= implode(",", $sexchange) ?>',
                        wsymbol: '<?= implode(",", $watchlistsym) ?>'
                    },

                    function(data) {
                        $('#userstock').html(data)
                        let sidedata = $('#sidebarcolumn').html()
                        $("#watchlist_2").html(sidedata)
                    },
                );
            }, <?= $apiinterval ?>)
    <?php }
    } ?>

    $('#myModal').on('hidden.bs.modal', function() {
        // refresh current page
        clearInterval(myinterval)
    })

    function removestock(token, excg) {
        let text = "Are you sure you want to remove this stock";
        if (confirm(text) == true) {
            $.post("main/removestock.php", {
                    token: token,
                    exchange: excg
                },
                function(data) {
                    if (data === 'Success') {
                        window.location.reload()
                    } else if ('Failed') {
                        alertify.alert("Can't remove this stock, Your position is still open")
                    }
                },
            );
        } else {
            text = "You canceled!";
        }
    }

    function addtowatchlist(symbol, excg, token) {
        $.post("main/addtowatchlist.php", {
                symbol: symbol,
                exchange: excg,
                token: token,
            },
            function(data) {
                if (data === 'Success') {
                    window.location.reload()
                } else if (data === 'Deleted') {
                    window.location.reload()
                } else {
                    alertify.alert('result', 'Some Error Occured', function() {
                        window.location.reload()
                    })
                }
            },
        );
    }

    function removewatchlist(symbol, excg) {
        $.post("main/removefromwatchlist.php", {
                symbol: symbol,
                exchange: excg
            },
            function(data) {
                if (data === 'Deleted') {
                    window.location.reload()
                } else {
                    alertify.alert('result', 'Some Error Occured', function() {
                        window.location.reload()
                    })
                }
            },
        );
    }
</script>