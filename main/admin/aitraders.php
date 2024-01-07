<?php
include "main/session.php";
/* @var $obj db */
ob_start();


?>

<div class="container px-6 mx-auto grid mobile-bottom-margin">

    <!-- New Table -->


    <div class="flex items-center justify-between">
        <!-- Card -->

        <h3 class="my-6 text-1xl font-semibold text-gray-700 dark:text-gray-200">
            Today's AI Traders Details
        </h3>

        <button @click="openModal" onclick='dynamicmodal("ai", "addstock", "", "Add Stock")' class="my-6 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            + Add Position
        </button>
    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">

        <div class="w-full ">

            <table id="example2" class="table w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Trade Status</th>
                        <th class="px-4 py-3">Mobile</th>
                        <th class="px-4 py-3">Email Id</th>
                        <th class="px-4 py-3">AI Fund</th>
                        <th class="px-4 py-3">Risk Percent</th>
                        <th class="px-4 py-3">Date & Time</th>
                        <th class="px-4 py-3">Action</th>

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
$pagetitle = "PMS Equity: AI Traders Detail";
$contentheader = "";
$pageheader = "";
include "main/admin/templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "../main/admin/aitradersdata.php",
            "processing": true,
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
            ]
        });
    });
</script>