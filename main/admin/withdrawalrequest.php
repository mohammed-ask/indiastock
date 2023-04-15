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

        <div class="w-full overflow-x-auto">

            <table class="w-full whitespace-no-wrap">
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
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class=" px-3 py-2">1</td>
                        <td class=" px-3 py-2">Suresh Yadav</td>
                        <td class=" px-3 py-2">7845639860</td>
                        <td class=" px-3 py-2">20/06/2022 12:00 am</td>
                        <td class=" px-3 py-2">2000</td>
                        <td class=" px-3 py-2">Need Urgent</td>
                        <td class=" px-3 py-2"><span class="px-4 py-2 leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100" aria-label="view">
                                <span class="w-5 h-5" fill="currentColor">Approved</span>

                            </span></td>
                        <td class="px-3 py-2">
                            <div>
                                <div>
                                    <button @click="openAdduser" aria-label="view" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" style="
                                                    border-radius: 15px;">
                                        View Details
                                    </button>

                                    <div x-show="isAdduserOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                                        <!-- Modal -->
                                        <div x-show="isAdduserOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeAdduser" @keydown.escape="closeAdduser" class="w-full px-2 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="adduser">

                                            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                                            <header class="flex justify-end">

                                                <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded " aria-label="close" @click="closeAdduser">
                                                    <svg class="w-4 h-4 mt-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                                                        <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </header>

                                            <!-- Modal body -->
                                            <div class=" adduserform mt-4">
                                                <div class="container px-3 mx-auto grid">

                                                    <h5 style="text-align: center;" class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                                                        Client's Bank Detail
                                                    </h5>
                                                    <div class="px-3 py-2 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                                                        <span>
                                                            <p class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">Bank Name: <br> A/c No.: <br>IFSC:</p>

                                                        </span>

                                                        <div>
                                                            <button aria-label="close" @click="closeAdduser" class="w-full px-3 py-1 mt-6 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                                Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-3 py-2">
                            <div>
                                <button class=" align-middles px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray focus:shadow-outline-purple focus:outline-none" @click="toggleDdownMenu" @keydown.escape="closeDdownMenu" aria-label="Account" aria-haspopup="true">
                                    <img class="object-cover w-5 h-5" src="../main/images/menu.png" alt="" aria-hidden="true" /></button>
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
            "ajax": "../main/admin/employeelistdata.php",
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