<?php
include "main/session.php";
?>
<form class="row gy-2 gx-3 align-items-end" id="addtax2">
    <div class="row -auto g-3 align-items-center">
        <div class="col-sm-9">
            <input class="form-control" data-bvalidator='required' id="symbol" type="text" placeholder="Enter Any Stock Symbol">
        </div>

        <div class="col-sm-3">
            <button type="submit" onclick="searchsymbol()" class="btn btn-primary">Search</button>
        </div>
        <div id="returndata">

        </div>
        <div id="addstatus">

        </div>
    </div>
</form>
<script>
    $(function() {
        $("#modalfooterbtn").css('display', 'none')
    });

    function searchsymbol() {
        $('#returndata').html("")
        event.preventDefault();
        let sym = $("#symbol").val();
        if (sym !== '') {
            sym = sym.toUpperCase()
            $.ajax({
                type: "POST",
                url: "main/getstocksymbol.php",
                data: {
                    symbol: sym
                },
                success: function(response) {
                    $("#returndata").html(response)
                }
            });
        } else {
            $("#symbol").css("border", "1px solid red")
        }
    }

    function addstock(exch, stockname) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "main/adduserstock.php",
            data: {
                exch: exch,
                stockname: stockname
            },
            success: function(response) {
                console.log(response)
                if (response == 'Present') {
                    $("#addstatus").html("<div class='alert alert-warning'>Stock Already Added</div>")
                } else if (response == 'Success') {
                    $("#addstatus").html("<div class='alert alert-success'>Stock Added Successfully</div>")
                } else if (response == 'Failed') {
                    $("#addstatus").html("<div class='alert alert-danger'>Something wnet wrong!</div>")
                } else if (response == 'Limit Reached') {
                    $("#addstatus").html("<div class='alert alert-danger'>You cannot add more than 5 stock</div>")
                }
            }
        });
    }
</script>