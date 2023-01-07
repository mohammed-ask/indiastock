<?php
include "main/session.php";
/* @var $obj db */
ob_start();


?>
<div class="container px-6 mx-auto grid">
    <div class="grid gap-6 mt-8 md:grid-cols-2 xl:grid-cols-2">
        <!-- Card -->

        <h3 class="my-6 text-1xl font-bold text-gray-700 dark:text-gray-200">
            Pending Approvals
        </h3>
        <div>


        </div>

    </div>


    <div class="w-full overflow-hidden rounded-lg shadow-xs">

        <div class="w-full overflow-x-auto">

            <table id="example2" class="table w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-sm font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">S.No.</th>
                        <th class="px-4 py-3">User Name</th>
                        <th class="px-4 py-3">Email ID</th>
                        <th class="px-4 py-3">Mobile No.</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">More Details</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y text-s dark:divide-gray-700 dark:bg-gray-800">
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
$pagetitle = "Indiastock: Pending Approval";
$contentheader = "";
$pageheader = "";
include "templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "../main/admin/pendingapprovaldata.php",
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