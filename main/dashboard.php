<?php
include "main/session.php";
if (isset($_GET['RequestToken']) && !empty($_GET['RequestToken'])) {
    $obj->getaccesstoken();
}
$fetchshare = $obj->selectextrawhereupdate('userstocks inner join watchliststock on watchliststock.userstockid = userstocks.id', "Exch,ExchType,userstocks.Symbol,Expiry,StrikePrice,OptionType", "userstocks.userid='" . $employeeid . "' and userstocks.status = 1 and watchliststock.status = 1");
$rowfetch = mysqli_fetch_all($fetchshare, 1);
array_push($rowfetch, ["Exch" => "N", "ExchType" => "C", "Symbol" => "NIFTY", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""], ["Exch" => "B", "ExchType" => "C", "Symbol" => "SENSEX", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""]);
$stockdata = $obj->fivepaisaapi2($rowfetch);
$stockdata = $stockdata == 'Error fetching candle data:' ? [] : $stockdata;
$marketdata = array_filter($stockdata, function ($data) {
    if ($data['Symbol'] === 'NIFTY' || $data['Symbol'] === 'SENSEX') {
        return $data;
    }
});
$wstocks = array_filter($stockdata, function ($data) {
    if ($data['Symbol'] !== 'NIFTY' && $data['Symbol'] !== 'SENSEX') {
        return $data;
    }
});
$chartdata = $obj->getcandledata(999920000, 'N',  'C', '5m', date('Y-m-d'), date('Y-m-d'));
$data = $chartdata === "Error fetching candle data:" ? [] : $chartdata['candles'];
$chart_data = array();

foreach ($data as $row) {
    $dateString = $row[0];
    $date = DateTime::createFromFormat('Y-m-d\TH:i:s', $dateString, new DateTimeZone('UTC'));
    $utcTimestamp = $date->getTimestamp() * 1000;
    $chart_data[] = array($utcTimestamp, $row[1], $row[2], $row[3], $row[4], $row[5]);
}
/* @var $obj db */
if ($dashboardmaintanance) {
    include "maintenance.php";
?>
<?php } else { ?>
    <div class="national-data">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12 mt-2 mb-2">
                    <div class="page-title-box d-inline-block d-md-flex justify-content-start justify-content-md-between align-items-center">
                        <div class="my-md-0 m-subheader">
                            <?php foreach ($marketdata as $mdata) {  ?>
                                <div class="nifty-50 d-inline-block me-3 nifty-sensex-border">
                                    <div class="font-11 fw-semibold"><?= $mdata['Symbol'] ?></div>
                                    <div class="d-inline-block font-11"><?= $mdata['LastRate'] ?> <span <?= $mdata['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>><?= $mdata['Chg'] ?> </span>
                                        <span <?= $mdata['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>>(<?= round($mdata['ChgPcnt'], 2) ?>%)</span>
                                    </div>
                                </div>
                            <?php }
                            if (isset($_POST['postData'])) {
                                $postData = json_decode($_POST['postData'], true);
                                // Display the button
                                // echo '<button> Button</button>';
                            } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center mb-2">
                        <div class="col">
                            <p class="text-dark mb-0 fw-semibold">Fund Available</p>
                            <h3 class="my-1 font-20 fw-bold">₹<?= round($investmentamount) ?></h3>
                        </div><!--end col-->
                        <div class="col-auto align-self-center">
                            <img src="main/dist/userimages/money.png" class="thumb-lg" alt="...">
                        </div><!--end col-->
                    </div><!--end row-->
                    <button type="button" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("", "addfund","", "")' class="btn btn-sm btn-de-primary">Add Funds</button>
                </div><!--end card-body-->
            </div><!--end card-->


            <!-- -------------------------------For only Mobile App---------------- -->

<div class="d-web-none mt-4 mb-3">


<div class="row">

<div class="col-6">
    <div class="card" style="border-radius: 15px;">
<div class="card-body">
<div>
                                    <div class="font-11 fw-semibold">STOCK NAME</div>
                                    <div class="d-inline-block font-11"><span>₹</span> 19435.3 <div class="text-success">181.5 <span class="text-success">(0.94%)</span> </div>
                                        
                                    </div>
                                </div>
</div>
    </div>
</div>
<div class="col-6">
<div class="card" style="border-radius: 15px;">
<div class="card-body">

<div>
                                    <div class="font-11 fw-semibold">STOCK NAME</div>
                                    <div class="d-inline-block font-11"><span>₹</span>19435.3 <div class="text-success">181.5 <span class="text-success">(0.94%)</span></div>
                                        
                                    </div>
                                </div>
</div>
</div>

</div>

</div>

<div class="row">

<div class="col-6">
    <div class="card" style="border-radius: 15px;">
<div class="card-body">
<div>
                                    <div class="font-11 fw-semibold">STOCK NAME</div>
                                    <div class="d-inline-block font-11"><span>₹</span> 19435.3 <div class="text-success">181.5 <span class="text-success">(0.94%)</span> </div>
                                        
                                    </div>
                                </div>
</div>
    </div>
</div>
<div class="col-6">
<div class="card" style="border-radius: 15px;">
<div class="card-body">

<div>
                                    <div class="font-11 fw-semibold">STOCK NAME</div>
                                    <div class="d-inline-block font-11"><span>₹</span>19435.3 <div class="text-success">181.5 <span class="text-success">(0.94%)</span></div>
                                        
                                    </div>
                                </div>
</div>
</div>

</div>

</div>

</div>

            <div class="card d-app-none">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Live Market </h4>
                        </div><!--end col-->
                        <div class="col-auto">
                            <!-- <span class="stocks-list-badge bg-soft-primary ms-1">3</span> -->
                        </div><!--end col-->
                    </div> <!--end row-->
                </div><!--end card-header-->


                <!-- <div class="card-body"> -->


                <!-- Primary rss feed start-->

                <!-- <rssapp-carousel id="t9SQT8ey9rdv7r9h"></rssapp-carousel> -->
                <!-- <script src="https://widget.rss.app/v1/carousel.js" type="text/javascript" async></script> -->

                <!-- Primary free rss feed end -->

                <!-- .
.
.
.
.
 -->


                <!-- secondary free rss feed start (sw-rss-feed code) -->

                <script type="text/javascript">
                    rssfeed_url = new Array();
                    rssfeed_url[0] = "https://economictimes.indiatimes.com/markets/stocks/rssfeeds/2146842.cms";
                    rssfeed_frame_width = "auto";
                    rssfeed_frame_height = "300";
                    rssfeed_scroll = "on";
                    rssfeed_scroll_step = "5";
                    rssfeed_scroll_bar = "off";
                    rssfeed_target = "_blank";
                    rssfeed_font_size = "12";
                    rssfeed_font_face = "Poppins";
                    rssfeed_border = "off";
                    rssfeed_css_url = "";
                    rssfeed_title = "off";
                    rssfeed_title_name = "";
                    rssfeed_title_bgcolor = "#3366ff";
                    rssfeed_title_color = "#fff";
                    rssfeed_title_bgimage = "";
                    rssfeed_footer = "off";
                    rssfeed_footer_name = "rss feed";
                    rssfeed_footer_bgcolor = "#fff";
                    rssfeed_footer_color = "#333";
                    rssfeed_footer_bgimage = "";
                    rssfeed_item_title_length = "100";
                    rssfeed_item_title_color = "#666";
                    rssfeed_item_bgcolor = "#fff";
                    rssfeed_item_bgimage = "";
                    rssfeed_item_border_bottom = "on";
                    rssfeed_item_source_icon = "off";
                    rssfeed_item_date = "on";
                    rssfeed_item_description = "on";
                    rssfeed_item_description_length = "120";
                    rssfeed_item_description_color = "#666";
                    rssfeed_item_description_link_color = "#333";
                    rssfeed_item_description_tag = "off";
                    rssfeed_no_items = "0";
                    rssfeed_cache = "361ffc5774c186b7006b0d7072465c21";
                </script>
                <script type="text/javascript" src="//feed.surfing-waves.com/js/rss-feed.js"></script>

                <!-- secondary free rss feed end (sw-rss-feed code) -->


            </div><!--end card-->
        </div><!--end col-->
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-sm-3 app-date-width">
                            <label>Start Date</label>
                            <input type="date" id="startdate" name="startdate" value="<?php echo date('Y-m-d'); ?>" class="form-control" placeholder="startdate" />
                        </div>
                        <div class="col-sm-3 app-date-width">
                            <label>End Date</label>
                            <input type="date" id="enddate" name="enddate" value="<?php echo date('Y-m-d'); ?>" class="form-control" placeholder="enddate" />
                        </div>
                        <div class="offset-md-1 mt-2 col-auto">
                            <div class="toolbar">
                                <button class="btn btn-sm btn-outline-light" onclick="getactive(this.id)" id="one_month">1m</button>
                                <button class="btn btn-sm btn-outline-light active" onclick="getactive(this.id)" id="six_months">5m</button>
                                <button class="btn btn-sm btn-outline-light " onclick="getactive(this.id)" id="one_year">15m</button>
                                <button class="btn btn-sm btn-outline-light" onclick="getactive(this.id)" id="ytd">60m</button>
                                <button class="btn btn-sm btn-outline-light" onclick="getactive(this.id)" id="all">1d</button>
                            </div>
                        </div><!--end col-->
                    </div> <!--end row-->
                </div><!--end card-header-->
                <div class="card-body pb-0" style="padding-left: 0px !important; padding-right: 0px !important;">
                    <div id="container"></div>
                    <?php if ($chartdata === "Error fetching candle data:") { ?>
                        <div class='alert alert-danger dashboard-danger'>Due to a technical issue with the NSE server, the chart is currently unavailable</div>
                    <?php } ?>
                    
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->

    </div><!--end row-->


<!-- ------------------------------------------mobile app comming soon banner Start------------------- -->

<div class="coming-app-popup" id="coming-app-popup">
  <button class="coming-app-close-btn" id="coming-app-close-btn">X</button>
  <div class="coming-app-popup-content">
    <img style="border-radius: 10px;" width="100%" src="main/dist/userimages/PMS EQuity App Coming.gif" alt="app-coming-soon">
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const popup = document.getElementById("coming-app-popup");
    const closeBtn = document.getElementById("coming-app-close-btn");

    // Show the popup after 3 seconds
    setTimeout(function() {
      popup.style.display = "block";
    }, 3000); // 3000 milliseconds = 3 seconds

    // Close the popup when the close button is clicked
    closeBtn.addEventListener("click", function() {
      popup.classList.add("fade-out");
      setTimeout(function() {
        popup.style.display = "none";
        popup.classList.remove("fade-out");
      }, 500);
    });
  });
</script>

<style>

  .coming-app-popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
    animation: fade-in 0.5s ease-out; /* Apply the fade-in animation */
  }

  .coming-app-popup.fade-out {
    animation: fade-out 0.5s ease-in; /* Apply the fade-out animation */
  }

  .coming-app-popup-content {
    background-color: white;
    border-radius: 10px;
    padding: 3px;
    /* padding-bottom: 0px; */
    width: 50%;
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .coming-app-close-btn {
    padding: 6px 9px;
    background-color: white;
    color: #080606;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    font-weight: 700;
    position: absolute;
    top: 10%;
    left: 90%;  
  }

  @media screen and (max-width: 786px) {
    .coming-app-popup-content {
      width: 85%;
    }
  }

  @keyframes fade-in {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes fade-out {
    from {
      opacity: 1;
      transform: translateY(0);
    }
    to {
      opacity: 0;
      transform: translateY(-20px);
    }
  }
</style>

<!-- ------------------------------------------mobile app comming soon banner End------------------- -->





<?php
}
$pagemaincontent = ob_get_contents();
ob_end_clean();

$pagemeta = "";
$pagetitle = "Your Dashboard- PMS Equity";
$contentheader = "";
$pageheader = "";
$watchliststocks = $wstocks;
include "main/templete.php"; ?>
<script src="main/dist/js/highcharts.js?ver=<?php echo time(); ?>"></script>
<script id="tradehighchart"></script>
<script>
    var chartData = <?php echo json_encode($chart_data); ?>;
    Highcharts.chart('container', {
        title: {
            text: 'Nifty Index'
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                hour: '%H:%M',
                day: '%e. %b',
                week: '%e. %b',
                month: '%b \'%y',
                year: '%Y'
            }
        },
        yAxis: {
            title: {
                text: 'Price'
            }
        },
        series: [{
            name: 'Open',
            data: chartData,
            type: 'line',
            tooltip: {
                valueDecimals: 2
            }
        }]
    });

    $("#startdate").change(function() {
        $("#tradehighchart").text("")
        startdate = $(this).val();
        enddate = $('#enddate').val();
        interval = $('.toolbar button.active').text();
        $.post("main/gethighcharttradedata.php", {
                startdate: startdate,
                enddate: enddate,
                interval: interval,
                scriptcode: 999920000,
                exch: 'N',
                type: 'C',
            },
            function(data) {
                $("#tradehighchart").text(data)
                eval(document.getElementById('tradehighchart').innerHTML);
                $('#linechartdeposit').highcharts().redraw();

            },
        );
    })
    $("#enddate").change(function() {
        $("#tradehighchart").text("")
        enddate = $(this).val();
        startdate = $('#startdate').val();
        interval = $('.toolbar button.active').text();
        $.post("main/gethighcharttradedata.php", {
                startdate: startdate,
                enddate: enddate,
                interval: interval,
                scriptcode: 999920000,
                exch: 'N',
                type: 'C',
            },
            function(data) {
                $("#tradehighchart").text(data)
                eval(document.getElementById('tradehighchart').innerHTML);
                $('#linechartdeposit').highcharts().redraw();

            },
        );
    })

    function getactive(id) {
        $("#tradehighchart").text("")
        enddate = $('#enddate').val();
        startdate = $('#startdate').val();
        interval = $('#' + id).text();
        $.post("main/gethighcharttradedata.php", {
                startdate: startdate,
                enddate: enddate,
                interval: interval,
                scriptcode: 999920000,
                exch: 'N',
                type: 'C',
            },
            function(data) {
                $("#tradehighchart").text(data)
                eval(document.getElementById('tradehighchart').innerHTML);
                $('#linechartdeposit').highcharts().redraw();

            },
        );
    }

    // check if current day is a weekday (Monday to Friday)
    <?php if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
        // check if current time is between 9 am to 4 pm
        if ($hour >= 9 && $hour < 24) { ?>
            setInterval(() => {
                console.log('counting market')
                $('.national-data').html()
                $.post("main/getlivemarketdatadashboard.php",
                    function(data) {
                        $('.national-data').html(data)
                        let sidedata = $('#sidebarcolumn').html()
                        $("#watchlist_2").html(sidedata)
                    },
                );
            }, <?= $apiinterval ?>)
    <?php }
    } ?>
</script>