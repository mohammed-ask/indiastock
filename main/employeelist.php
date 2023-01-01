<?php
include "session.php";
/* @var $obj db */
ob_start();


?>
<div class="container px-6 mx-auto grid">
    <div>
        <div class="flex justify-end"> <button @click="openViewSlients" class="my-6 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                + Add Employee
            </button>
            <div x-show="isViewSlientsOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                <!-- Modal -->
                <div x-show="isViewSlientsOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeViewSlients" @keydown.escape="closeViewSlients" class="w-full px-2 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="ViewSlients">

                    <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                    <header class="flex justify-end">

                        <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeViewSlients">
                            <svg class="w-4 h-4 mt-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                                <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </header>

                    <!-- Modal body -->
                    <div class=" adduserform mt-4">
                        <div class="container px-3 mx-auto grid">

                            <!-- General elements -->
                            <p style="text-align: center;" class="mb-4 text-md font-semibold text-gray-600 dark:text-gray-300">
                                Add New Employee
                            </p>
                            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <label class="block text-sm" style="margin-bottom: 5px;">
                                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                                    <input class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Employee's Name" />
                                </label>
                                <label class="block text-sm" style="margin-bottom: 5px;">
                                    <span class="text-gray-700 dark:text-gray-400">Employee ID</span>
                                    <input class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter Employee ID" />
                                </label>
                                <label class="block text-sm" style="margin-bottom: 5px;">
                                    <span class="text-gray-700 dark:text-gray-400">Mob No.</span>
                                    <input class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Employee Mobile No." />
                                </label>
                                <div>
                                    <button class="w-full px-3 py-1 mt-6 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">

        <div class="w-full overflow-x-auto">

            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">S.No.</th>
                        <th class="px-4 py-3">User Name</th>
                        <th class="px-4 py-3">Emp ID</th>
                        <th class="px-4 py-3">Mob No.</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Action</th>
                        <th class="px-4 py-3">Clients</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class=" px-4 py-3">1</td>
                        <td class=" px-4 py-3 text-sm font-semibold">
                            Abhishek Sharma
                        </td>
                        <td class="px-4 py-3 text-sm">
                            PMSE215
                        </td>
                        <td class="px-4 py-3 text-sm">
                            9610202078
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </button>
                                <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>

                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div>
                                <div> <button @click="openAdduser" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" style="
border-radius: 15px;
font-size: 12px;
">
                                        View Clients
                                    </button>
                                    <div x-show="isAdduserOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                                        <!-- Modal -->
                                        <div x-show="isAdduserOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeAdduser" @keydown.escape="closeAdduser" class="w-full px-2 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="adduser">

                                            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                                            <header class="flex justify-end">

                                                <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeAdduser">
                                                    <svg class="w-4 h-4 mt-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                                                        <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </header>

                                            <!-- Modal body -->
                                            <div class=" adduserform mt-4 mb-6">
                                                <div class="container px-3 mx-auto grid">

                                                    <!-- General elements -->
                                                    <p class="mb-4 text-md font-medium text-gray-500 dark:text-gray-300">
                                                        Clients by User
                                                    </p>

                                                    <div class="w-full overflow-hidden rounded-lg shadow-xs">

                                                        <div class="w-full overflow-x-auto">

                                                            <table class="w-full whitespace-no-wrap">
                                                                <thead>
                                                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                        <th class="px-3 py-2">S.No.</th>
                                                                        <th class="px-3 py-2">Clients Name</th>
                                                                        <th class="px-3 py-2">Mobile No.</th>
                                                                        <th class="px-3 py-2">EMail</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                                        <td class=" px-3 py-2 text-sm">01</td>
                                                                        <td class=" px-3 py-2 text-sm">
                                                                            Abhishek Sharma
                                                                        </td>
                                                                        <td class=" px-3 py-2 text-sm">
                                                                            8764983696
                                                                        </td>
                                                                        <td class=" px-3 py-2 text-sm">
                                                                            singhabhishek23@gmail.com </td>

                                                                    </tr>
                                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                                        <td class=" px-3 py-2 text-sm">01</td>
                                                                        <td class=" px-3 py-2 text-sm">
                                                                            Abhishek Sharma
                                                                        </td>
                                                                        <td class=" px-3 py-2 text-sm">
                                                                            8764983696
                                                                        </td>
                                                                        <td class=" px-3 py-2 text-sm">
                                                                            singhabhishek23@gmail.com </td>

                                                                    </tr>
                                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                                        <td class=" px-3 py-2 text-sm">01</td>
                                                                        <td class=" px-3 py-2 text-sm">
                                                                            Abhishek Sharma
                                                                        </td>
                                                                        <td class=" px-3 py-2 text-sm">
                                                                            8764983696
                                                                        </td>
                                                                        <td class=" px-3 py-2 text-sm">
                                                                            singhabhishek23@gmail.com </td>

                                                                    </tr>
                                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                                        <td class=" px-3 py-2 text-sm">01</td>
                                                                        <td class=" px-3 py-2 text-sm">
                                                                            Abhishek Sharma
                                                                        </td>
                                                                        <td class=" px-3 py-2 text-sm">
                                                                            8764983696
                                                                        </td>
                                                                        <td class=" px-3 py-2 text-sm">
                                                                            singhabhishek23@gmail.com </td>

                                                                    </tr>
                                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                                        <td class=" px-3 py-2 text-sm">01</td>
                                                                        <td class=" px-3 py-2 text-sm">
                                                                            Abhishek Sharma
                                                                        </td>
                                                                        <td class=" px-3 py-2 text-sm">
                                                                            8764983696
                                                                        </td>
                                                                        <td class=" px-3 py-2 text-sm">
                                                                            singhabhishek23@gmail.com </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

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
$pagetitle = "Indiastock: Pending Approval";
$contentheader = "";
$pageheader = "";
include "main/templete.php";
?>
<script>
    $(function() {
        // $('#example2').DataTable({
        //     "ajax": "main/pendingapprovaldata.php",
        //     "processing": true,
        //     "serverSide": true,
        //     "pageLength": 25,
        //     "paging": true,
        //     "lengthChange": false,
        //     "searching": false,
        //     "ordering": true,
        //     "info": true,
        //     "autoWidth": false,
        //     "responsive": true,
        //     "order": [
        //         [0, "desc"]
        //     ]
        // });
    });
</script>