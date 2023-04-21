<?php
include "main/session.php";
/* @var $obj db */
ob_start();


?>
<div class="container px-6 mx-auto grid mobile-bottom-margin">
    <div class="flex my-4 items-center justify-between">
        <h4>All Transaction</h4>


    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">

        <div class="w-full ">

            <table id="example2" class="table w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">S.No.</th>
                        <th class="px-4 py-3">User Name</th>
                        <th class="px-4 py-3">Stock Name</th>
                        <th class="px-4 py-3">Buy Price</th>
                        <th class="px-4 py-3">Sell Price</th>
                        <th class="px-4 py-3">No. Of Share</th>
                        <th class="px-4 py-3">Date & Time</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <!-- <tr class="text-gray-700 dark:text-gray-400">
                        <td class=" px-4 py-3">1</td>
                        <td class=" px-4 py-3">Yes Bank</td>
                        <td class=" px-4 py-3">54700</td>
                        <td class=" px-4 py-3">450</td>
                        <td class=" px-4 py-3">Buy</td>
                        <td class=" px-4 py-3">19/12/2022 01:31:00 pm</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
    <br>
</div>
<?php
//Assign all Page Specific variables
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Indiastock: All Transaction";
$contentheader = "";
$pageheader = "";
include "main/admin/templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "../main/admin/alltransactiondata.php",
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
</script>