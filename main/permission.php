<?php
include "session.php";
ob_flush();
ob_start();
?>
<div class="card">
    <div class="card-header with-border">
        <h3 class="card-title with-border">Permission List</h3>
        <div class="card-tools pull-right">
            <?php if (in_array(82, $permissions)) { ?>
                <a href="addpermission" class="px-4 py-2 text-sm bg-purple rounded-lg">+ Add New Permission
                </a>
            <?php } ?>
            <a href="administrator" class="px-4 py-2 ml-2 text-sm font-medium leading-5 text-black text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                << Back </a>
                    <button type="button" class="btn btn-tool" data-card-widget="">
                        <i class="fas fa-times"></i>
                    </button>
        </div>
    </div>
    <div class="card-body" id="catid">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Module</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Module</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->

</div>
</div>
<?php
//Assign all Page Specific variables
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagetitle = "Manage Permissions";
$pageheader = "";
$pagemeta = "Some Meta Goes Here";
$pagekeywords = "Some keywords Goes here";
$contentheader = "Manage Permissions";
include "main/templete.php";
?>
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<!--<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>-->
<script>
    $(document).ready(function() {
        $('#example1 tfoot th').each(function() {
            var title = $(this).text();
            if (title != "S No") {
                if (title == "Date of receipt of complaint") {
                    $(this).html('<input type="text" style="width:100px;" id="searchdate" onfocus="setcalender(\'searchdate\')" placeholder="Search ' + title + '" />');
                } else if (title == "Rca Done on") {
                    $(this).html('<input type="text" style="width:100px;" id="searchdate1" onfocus="setcalender(\'searchdate1\')" placeholder="Search ' + title + '" />');
                } else {
                    $(this).html('<input type="text" style="width:100px;" placeholder="Search ' + title + '" />');
                }
            }
        });
        table = $("#example1").DataTable({
            "responsive": true,
            "ajax": "main/permissionsdata.php",
            "processing": true,
            "serverSide": true,
            "pageLength": 25,
            "bJQueryUI": true,
            "order": [
                [0, "desc"]
            ],
            "sPaginationType": "full_numbers",
            "sDom": '<""f>t<"F"lp>'
        });
        // Apply the search
        table.columns().every(function() {
            var that = this;
            console.log(this.value);
            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
        $('table.data-table tfoot').each(function() {
            $(this).insertAfter($(this).siblings('thead'));
        });
    });
</script>