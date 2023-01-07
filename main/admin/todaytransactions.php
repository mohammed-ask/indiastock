<?php
include "main/session.php";
/* @var $obj db */
ob_start();


?>
<div class="container px-6 mx-auto grid">
    <div class="flex my-4 items-center justify-between">
        <h4>Today Transaction</h4>

        <button @click="openAdduser" class="my-6 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            + Add Stock
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
                        <h5 style="text-align: center;" class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                            Add Stock
                        </h5>
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                            <label class="block text-sm" style="margin-bottom: 5px;">
                                <span class="text-gray-700 dark:text-gray-400"> Stock
                                    Name</span>
                                <input class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter Stock Name" />
                            </label>
                            <form> <label for="buy" class="block text-sm" data-toggle="dropdown" style="margin-bottom: 5px;">
                                    <span class="text-gray-700 dark:text-gray-400">Buy/Sell</span>

                                </label>
                                <select class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="buy" id="sell">
                                    <option value="buy">Select Buy/Sell</option>
                                    <option value="buy">Buy</option>
                                    <option value="sell">Sell</option>
                                </select>
                            </form>
                            <label class="block text-sm" style="margin-bottom: 5px;">
                                <span class="text-gray-700 dark:text-gray-400">Buying/Selling
                                    Price</span>
                                <input class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Buying/Selling Price" />
                            </label>
                            <label class="block text-sm" style="margin-bottom: 5px;">
                                <span class="text-gray-700 dark:text-gray-400">No. of
                                    Shares</span>
                                <input class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="No. of Share" />
                            </label>
                            <label class="block text-sm" style="margin-bottom: 5px;">
                                <span class="text-gray-700 dark:text-gray-400">Date &
                                    Time</span>
                                <input class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Select Date & Time" />
                            </label>
                            <div> <label for="Choose Client" class="block text-sm" style="margin-bottom: 5px;">
                                    <span class="text-gray-700 dark:text-gray-400">Client's Name</span>

                                </label>
                                <select class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="Client Name" id="Client Name">
                                    <option value="Client Name">Select Client</option>
                                    <option value="Client Name">Abhishek Singh</option>
                                    <option value="Client Name">Suraj Mehta</option>
                                </select>
                            </div>
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

    <div class="w-full overflow-hidden rounded-lg shadow-xs">

        <div class="w-full overflow-x-auto">

            <table class="w-full whitespace-no-wrap">
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

                                <button class="px-3 py-2  leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                    Close
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