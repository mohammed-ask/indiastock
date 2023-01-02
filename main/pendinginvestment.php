<?php
include "session.php";
/* @var $obj db */
ob_start();


?>
<div class="container px-6 mx-auto grid">
    <div class="flex my-4 items-center justify-between">
        <h4>Pending Investment</h4>


    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">

        <div class="w-full overflow-x-auto">

            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">S.No.</th>
                        <th class="px-4 py-3">Client Name</th>
                        <th class="px-4 py-3">Mobile No.</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Amount</th>
                        <th class="px-4 py-3">Remark</th>
                        <th class="px-4 py-3">Payment Method</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class=" px-4 py-3">1</td>
                        <td class=" px-4 py-3 font-semibold">Suresh Yadav</td>
                        <td class=" px-4 py-3">7845639860</td>
                        <td class=" px-4 py-3">20/06/2022 12:00 am</td>
                        <td class=" px-4 py-3 font-semibold">2000</td>
                        <td class=" px-4 py-3">Need Urgent</td>
                        <td class=" px-4 py-3">Google Pay</td>

                        <td class="px-4 py-3">
                            <div>
                                <button class=" align-middles px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray focus:shadow-outline-purple focus:outline-none" @click="toggleDdownMenu" @keydown.escape="closeDdownMenu" aria-label="Account" aria-haspopup="true">
                                    <img class="object-cover w-5 h-5" src="assets/img/menu.png" alt="" aria-hidden="true" /></button>
                                <template x-if="isDdownMenuOpen">
                                    <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeDdownMenu" @keydown.escape="closeDdownMenu" class="absolute right-0 w-40 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700" style="right: 50px;" aria-label="submenu">
                                        <li style="background-color:rgb(115, 214, 115) ; border-radius: 5px;" class="flex">
                                            <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">

                                                <span class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><i style="color:black;" class="fa-solid fa-circle-check"></i></span>
                                                <button style="color: black;">Approve</button>
                                            </a>
                                        </li>

                                        <li style="background-color:#eb8a88 ; border-radius: 5px;" class="flex">
                                            <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                                                <span class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><i style="color:black;" class="fa-solid fa-circle-xmark"></i></span>
                                                <button style="color: black;">Disapprove</button>
                                            </a>
                                        </li>

                                    </ul>
                                </template>
                            </div>
                        </td>

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
$pagetitle = "Indiastock: Pending Investment";
$contentheader = "";
$pageheader = "";
include "main/templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "main/employeelistdata.php",
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