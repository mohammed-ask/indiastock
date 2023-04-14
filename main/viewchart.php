<?php
include "session.php";
$symbol = $_GET['symbol'];
$exchange = $_GET['exchange'];
$id = $obj->selectfieldwhere("userstocks", "id", "Exch='" . $exchange . "' and Symbol = '" . $symbol . "' and status = 1");
$rowfetch = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol", "Exch='" . $exchange . "' and Symbol = '" . $symbol . "' and status = 1")->fetch_assoc();
$rowfetch = array($rowfetch);

$chartsymbol = [];
foreach ($rowfetch as $item) {
    $item["Exchange"] = $item["Exch"];
    unset($item["Exch"]);

    $item["ExchangeType"] = $item["ExchType"];
    unset($item["ExchType"]);
    $chartsymbol = $item;
}

// print_r($chartsymbol);
// die;

$stockdata = $obj->getfullmarketdepth(array($chartsymbol));
$stockdata = $stockdata[0];
// print_r($stockdata);
$chartdata = $obj->getcandledata($stockdata['ScripCode'], $stockdata['Exchange'],  $stockdata['ExchangeType'], '5m', date('Y-m-d'), date('Y-m-d'));
$data = $chartdata['candles'];

$chart_data = array();

foreach ($data as $row) {
    $timestamp = strtotime($row[0]) * 1000; // convert to milliseconds
    $chart_data[] = array($timestamp, $row[1], $row[2], $row[3], $row[4], $row[5]);
}

?>
<div class="row" id="userstock">
    <div class="row">
        <div class="col-sm-3">
            <label>Start Date</label>
            <input type="date" id="startdate" name="startdate" value="<?php echo date('Y-m-d'); ?>" class="form-control" placeholder="startdate" />
        </div>
        <div class="col-sm-3">
            <label>End Date</label>
            <input type="date" id="enddate" name="enddate" value="<?php echo date('Y-m-d'); ?>" class="form-control" placeholder="enddate" />
        </div>
        <div class="col-sm-3">
            <label for="">Interval</label>
            <select data-bvalidator="required" class="form-control select2" name="interval" id="interval">
                <option value="1m">1 Min</option>
                <option value="5m" selected>5 Min</option>
                <option value="10m">10 Min</option>
                <option value="15m">15 Min</option>
                <option value="30m">30 Min</option>
                <option value="60m">60 Min</option>
                <option value="1d">1 Day</option>
            </select>
        </div>
    </div>
    <div id="container"></div>
</div>
<?php
$pagemaincontent = ob_get_contents();
ob_end_clean();
$extrajs = '<script src="https://code.highcharts.com/highcharts.js"></script>';
$pagemeta = "";
$pagetitle = "Indiastock: Market";
$contentheader = "";
$pageheader = "";
include "main/templete.php"; ?>
<script id="tradehighchart"></script>
<script>
    var chartData = <?php echo json_encode($chart_data); ?>;
    Highcharts.chart('container', {
        title: {
            text: 'Stock Prices'
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
        interval = $('#interval').val();
        $.post("main/gethighcharttradedata.php", {
                startdate: startdate,
                enddate: enddate,
                interval: interval,
                scriptcode: <?= $stockdata['ScripCode'] ?>,
                exch: '<?= $stockdata['Exchange'] ?>',
                type: '<?= $stockdata['ExchangeType'] ?>',
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
        interval = $('#interval').val();
        $.post("main/gethighcharttradedata.php", {
                startdate: startdate,
                enddate: enddate,
                interval: interval,
                scriptcode: <?= $stockdata['ScripCode'] ?>,
                exch: '<?= $stockdata['Exchange'] ?>',
                type: '<?= $stockdata['ExchangeType'] ?>',
            },
            function(data) {
                $("#tradehighchart").text(data)
                eval(document.getElementById('tradehighchart').innerHTML);
                $('#linechartdeposit').highcharts().redraw();

            },
        );
    })
    $("#interval").change(function() {
        $("#tradehighchart").text("")
        interval = $(this).val();
        enddate = $('#enddate').val();
        startdate = $('#startdate').val();
        $.post("main/gethighcharttradedata.php", {
                startdate: startdate,
                enddate: enddate,
                interval: interval,
                scriptcode: <?= $stockdata['ScripCode'] ?>,
                exch: '<?= $stockdata['Exchange'] ?>',
                type: '<?= $stockdata['ExchangeType'] ?>',
            },
            function(data) {
                $("#tradehighchart").text(data)
                eval(document.getElementById('tradehighchart').innerHTML);
                $('#linechartdeposit').highcharts().redraw();

            },
        );
    })
</script>