<?php
include "session.php";
/* @var $obj db */
ob_start();


?>

<div class="container px-6 mx-auto grid">

    <!-- New Table -->


    <div class="grid gap-6 mt-8 md:grid-cols-2 xl:grid-cols-2">
        <!-- Card -->

        <h3 class="my-6 text-1xl font-semibold text-gray-700 dark:text-gray-200">
            Users Last Login Details
        </h3>


    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">

        <div class="w-full overflow-x-auto">

            <table id="example2" class="table w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">S.No.</th>
                        <th class="px-4 py-3">User Name</th>
                        <th class="px-4 py-3">IP Address</th>
                        <th class="px-4 py-3">Login Date & Time</th>

                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class=" px-4 py-3">1</td>
                        <td class=" px-4 py-3 text-sm font-semibold">
                            Abhishek Sharma
                        </td>
                        <td class="px-4 py-3 text-sm">
                            152.58.35.137
                        </td>
                        <td class="px-4 py-3 text-sm">
                            15-12-2022 17:38:57 pm </td>

                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class=" px-4 py-3">1</td>
                        <td class=" px-4 py-3 text-sm font-semibold">
                            Abhishek Sharma
                        </td>
                        <td class="px-4 py-3 text-sm">
                            152.58.35.137
                        </td>
                        <td class="px-4 py-3 text-sm">
                            15-12-2022 17:38:57 pm </td>

                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class=" px-4 py-3">1</td>
                        <td class=" px-4 py-3 text-sm font-semibold">
                            Abhishek Sharma
                        </td>
                        <td class="px-4 py-3 text-sm">
                            152.58.35.137
                        </td>
                        <td class="px-4 py-3 text-sm">
                            15-12-2022 17:38:57 pm </td>

                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class=" px-4 py-3">1</td>
                        <td class=" px-4 py-3 text-sm font-semibold">
                            Abhishek Sharma
                        </td>
                        <td class="px-4 py-3 text-sm">
                            152.58.35.137
                        </td>
                        <td class="px-4 py-3 text-sm">
                            15-12-2022 17:38:57 pm </td>

                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class=" px-4 py-3">1</td>
                        <td class=" px-4 py-3 text-sm font-semibold">
                            Abhishek Sharma
                        </td>
                        <td class="px-4 py-3 text-sm">
                            152.58.35.137
                        </td>
                        <td class="px-4 py-3 text-sm">
                            15-12-2022 17:38:57 pm </td>

                    </tr>
                </tbody>
            </table>
            <div style="text-align: center;"> <button class="my-5 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" style="margin: 13px 13px;">
                    View More
                </button>
            </div>
        </div>
    </div>
</div>
<?php
//Assign all Page Specific variables
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Indiastock: Transaction";
$contentheader = "";
$pageheader = "";
include "main/templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "main/logindata.php",
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