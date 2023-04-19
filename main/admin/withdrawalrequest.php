<?php
include "main/session.php";
/* @var $obj db */
ob_start();
?>
<div class="container px-6 mx-auto grid">
    <div class="flex my-4 items-center justify-between">
        <h4>Withdrawal Requests</h4>


    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">

        <div class="w-full ">

            <table id="example2" class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-3 py-2">S.No.</th>
                        <th class="px-3 py-2">Client Name</th>
                        <th class="px-3 py-2">Mobile No.</th>
                        <th class="px-3 py-2">Date</th>
                        <th class="px-3 py-2">Amount</th>
                        <th class="px-3 py-2">Remark</th>
                        <th class="px-3 py-2">Status</th>
                        <th class="px-3 py-2">Bank Details</th>
                        <th class="px-3 py-2">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
//Assign all Page Specific variables
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Indiastock: Withdrawal Request";
$contentheader = "";
$pageheader = "";
include "main/admin/templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "../main/admin/withdrawalrequestdata.php",
            "processing": true,
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
            ]
        });
    });
    $(document).on("click", ".showbox", function() {
        status = $(this).parents('.tr').find('.showbtn').css("display");
        if (status === 'none') {
            $(this).parents('.tr').find('.showbtn').css({
                display: 'block',
                position: 'absolute',
                backgroundColor: 'white',
                zIndex: 30,
                boxShadow: '5px 10px 10px #888888',
                padding: '10px',
            });
            $(this).attr("data-status", "show");
        } else if (status === 'block') {
            $(this).parents('.tr').find('.showbtn').css({
                "display": "none",
            });
        }

    })
</script>