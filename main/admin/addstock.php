<?php
include "main/session.php";

?>
<style>
    .ui-autocomplete {
        position: absolute;
        z-index: 9999;
        width: auto;
        padding: 0.2em 0;
        margin: 0;
        list-style: none;
        background-color: #fff;
        border: 1px solid #ccc;
        max-height: 200px;
        overflow-y: auto;
    }

    .ui-menu-item {
        padding: 0.2em 0.4em;
        cursor: pointer;
    }

    .ui-menu-item:hover {
        background-color: #f0f0f0;
    }

    .ui-state-focus {
        background-color: #ddd;
        color: #333;
    }
</style>
<form id="adduser" onsubmit="event.preventDefault();sendForm('', '', 'insertaddstock', 'resultid', 'adduser');return 0;">
    <div class="mb-2"> <label for="Choose Client" class="block text-sm" style="margin-bottom: 5px;">
            <span class="text-gray-700 dark:text-gray-400">Client's Name</span>

        </label>
        <select data-bvalidator="required" onchange="search(this.id,'getmargin','../main/admin/fetchmargin.php')" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="userid" id="Client Name">
            <option value="">Select Client</option>
            <?php
            $role = $obj->selectextrawhereupdate("users", "id,name", "status = 1 and type=2");
            $emprole = mysqli_fetch_all($role);
            foreach ($emprole as list($id, $name)) {  ?>
                <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
            <?php
            } ?>
        </select>
    </div>
    <div class="mb-2">
        <label for="buy" class="block text-sm" data-toggle="dropdown" style="margin-bottom: 5px;">
            <span class="text-gray-700 dark:text-gray-400">Exchange</span>

        </label>
        <select name="exchange" class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" data-bvalidator='required' id="exch">
            <option value="">Select Exchange</option>
            <option value="N">NSE</option>
            <option value="B">BSE</option>
        </select>
    </div>
    <div class="mb-2">
        <label for="type" class="block text-sm" data-toggle="dropdown" style="margin-bottom: 5px;">
            <span class="text-gray-700 dark:text-gray-400">Type</span>

        </label>
        <select name="type" class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" data-bvalidator='required' id="type">
            <option value="">Select Type</option>
            <option value="Intraday">Intraday</option>
            <option value="Holding">Holding</option>
        </select>
    </div>
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400"> Stock
            Name</span>
        <input type="text" name="symbol" id="symbol" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter Stock Name" data-bvalidator="required" />
    </label>
    <div id="getmargin">
        <label class="block text-sm" style="margin-bottom: 5px;">
            <span class="text-gray-700 dark:text-gray-400"> Margin</span>
            <input name="margin" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" data-bvalidator='required' />
        </label>
    </div>
    <div class="mb-2">
        <label for="buy" class="block text-sm" data-toggle="dropdown" style="margin-bottom: 5px;">
            <span class="text-gray-700 dark:text-gray-400">Buy/Sell</span>

        </label>
        <select name="trademethod" class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" data-bvalidator='required' id="sell">
            <option value="">Select Buy/Sell</option>
            <option value="Buy">Buy</option>
            <option value="Sell">Sell</option>
        </select>
    </div>
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Buying/Selling
            Price</span>
        <input name="price" id="shareprice" onkeyup="gettotalamt()" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Buying/Selling Price" data-bvalidator='required' />
    </label>
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">No. of
            Shares</span>
        <input type="number" id="qty" name="qty" onkeyup="gettotalamt()" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" data-bvalidator='required' placeholder="No. of Share" />
    </label>
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Total Amount</span>
        <input readonly name="totalamount" id="totalamt" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
    </label>
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Date &
            Time</span>
        <input id="date" name="datetime" onfocus="datetimepicker(this.id)" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Select Date & Time" data-bvalidator='required' />
    </label>

    <div>
        <button type="submit" id="modalsubmit" class="w-full px-3 py-1 mt-6 text-sm font-medium hidden">
            Submit
        </button>
    </div>
    <div id="resultid"></div>
</form>
<script>
    $('select').select2()
    $("#symbol").autocomplete({
        minLength: 3,
        source: function(request, response) {
            $.ajax({
                type: "post",
                url: "../main/admin/fetchsymbolsearch.php",
                data: {
                    search: request.term
                },
                dataType: "json",
                success: function(data) {
                    response(data)
                }
            });
        },
        select: function(event, ui) {
            event.preventDefault();
            $("#symbol").val(ui.item.value);
        },
    })

    function gettotalamt() {
        qty = $('#qty').val()
        shareprice = $("#shareprice").val()
        margin = $("#margin").val()
        totalamt = parseFloat(qty) * parseFloat(shareprice) / margin
        $("#totalamt").val(totalamt)
    }
</script>