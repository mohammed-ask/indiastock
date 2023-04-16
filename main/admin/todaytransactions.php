<?php
include "main/session.php";
/* @var $obj db */
ob_start();


?>
<div class="container px-6 mx-auto grid">
    <div class="flex my-4 items-center justify-between">
        <h4>Today Transaction</h4>

        <button @click="openModal" onclick='dynamicmodal("", "addstock", "", "Add Stock")' class="my-6 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            + Add Stock
        </button>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">

        <div class="w-full overflow-x-auto">

            <table id="example2" class="w-full whitespace-no-wrap">
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
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class=" px-4 py-3">1</td>
                        <td class=" px-4 py-3">Abhishek Sharma</td>
                        <td class=" px-4 py-3">YesBank</td>
                        <td class=" px-4 py-3">415</td>
                        <td class=" px-4 py-3">450</td>
                        <td class=" px-4 py-3">150</td>
                        <td class=" px-4 py-3">19/12/2022 01:31:00 pm</td>
                        <td class=" px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">

                                <button class="px-3 py-2 leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    Open
                                </button>

                            </div>
                        </td>
                        <td class=" px-4 py-3"> <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                    </path>
                                </svg>
                            </button></td>

                    </tr>
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
$pagetitle = "Indiastock: Today Transaction";
$contentheader = "";
$pageheader = "";
include "main/admin/templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "../main/admin/todaytrandata.php",
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