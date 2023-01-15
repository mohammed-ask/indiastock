<?php
include "./session.php";
$symbol = $_POST['symbol'];
$data = $obj->searchstockapi($symbol);
$pricedata = $data["body"]["Data"];
// echo "<pre>";
// print_r($data);
$pricedata = array_filter($pricedata, function ($data) {
    if (!empty($data['Symbol'])) {
        return $data;
    }
});
if (!empty($pricedata)) {
    foreach ($pricedata as $data) {
?>
        <div class="row -auto g-3 align-items-center">
            <div class="col-sm-9">
                <div>
                    <?php
                    $exc = $data['Exch'] == 'B' ? ' BSE' : ' NSE';
                    echo $data['Symbol'] . $exc ?>
                </div>
                <div>
                    <?= "₹" . $data['PClose'] ?>

                </div>
            </div>
            <div class="col-sm-3">
                <button onclick="addstock('<?= $data['Exch'] ?>','<?= $data['Symbol'] ?>')" class="btn btn-success">Add Stock</button>
            </div>
        </div>
        <br>
    <?php }
} else { ?>
    <div class="alert alert-warning">
        Can't Find Stock Please Check if Symbol is Correct
    </div>
<?php }; ?>