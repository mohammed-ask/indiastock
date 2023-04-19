<?php
include "main/session.php";
/* @var $obj db */
ob_start();


?>
<div class="container px-6 mx-auto grid">
    <div class="flex my-4 items-center justify-between">
        <h4>Disapproved Investment</h4>


    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">

        <div class="w-full ">

            <table id="example2" class="table w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-3 py-2">S.No.</th>
                        <th class="px-3 py-2">Client Name</th>
                        <th class="px-3 py-2">Mobile No.</th>
                        <th class="px-3 py-2">Date</th>
                        <th class="px-3 py-2">Amount</th>
                        <!-- <th class="px-3 py-2">Remark</th> -->
                        <th class="px-3 py-2">Payment Method</th>
                        <th class="px-3 py-2">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <!-- <tr class="text-gray-700 dark:text-gray-400">
                        <td class=" px-4 py-3">1</td>
                        <td class=" px-4 py-3 font-semibold">Suresh Yadav</td>
                        <td class=" px-4 py-3">7845639860</td>
                        <td class=" px-4 py-3">20/06/2022 12:00 am</td>
                        <td class=" px-4 py-3 font-semibold">2000</td>
                        <td class=" px-4 py-3">Need Urgent</td>
                        <td class=" px-4 py-3">Google Pay</td>
                        <td class=" px-4 py-3">
                            <li style="background-color:rgb(115, 214, 115)  ; border-radius: 5px;" class="flex">
                                <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">

                                    <button style="color: black;">Approve</button>
                                </a>
                            </li>
                        </td>

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
$pagetitle = "Indiastock: Disapproved Investment";
$contentheader = "";
$pageheader = "";
include "templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "../main/admin/disapprovedinvestmentdata.php",
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