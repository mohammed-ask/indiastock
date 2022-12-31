<?php
include "session.php";
/* @var $obj db */
ob_start();
$email = $obj->selectfieldwhere("users", 'email', "id=$employeeid");

?>
<div class="container px-6 mx-auto grid">
    <div class="grid gap-6 mt-8 md:grid-cols-2 xl:grid-cols-2">
        <!-- Card -->

        <h3 class="my-6 text-1xl font-bold text-gray-700 dark:text-gray-200">
            Compose Mail
        </h3>
        <div>


        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Email From :- <?= $email ?></h3>
                    <div class="card-tools">
                        <a href="viewrole" class="px-4 py-2  text-sm  bg-white  rounded-lg border border-gray" data-card-widget="">
                            << Back </a>
                                <button type="button" class="btn btn-tool" data-card-widget="">
                                    <i class="fas fa-times"></i>
                                </button>
                    </div>
                </div>
                <form id="addtax" enctype="multipart/form-data">
                    <div class="card-body">
                        <label class="block text-sm" style="margin-bottom: 5px;">
                            <span class="text-gray-700 dark:text-gray-400">Send To</span>
                            <select class="form-control select2" name="module" id="grades" placeholder="Module">
                                <?php
                                $tbname = "modules";
                                $result = $obj->selecttable($tbname);
                                while ($brow = $obj->fetch_assoc($result)) { ?>
                                    <option value="<?php echo $brow['id']; ?>"> <?php echo $brow['name']; ?></option>
                                <?php } ?>
                            </select>
                        </label><br>
                        <label class="block text-sm" style="margin-bottom: 5px;">
                            <span class="text-gray-700 dark:text-gray-400">Subject</span>
                            <input name="subject" data-bvalidator="required" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Subject" />
                        </label><br>
                        <label class="block text-md" style="margin-bottom: 5px;">
                            <span class="text-gray-700 dark:text-gray-400">Remark</span>
                            <textarea data-bvalidator="" name="message" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Message"></textarea>
                        </label><br>
                        <label class="block text-md" style="margin-bottom: 5px;">
                            <span class="text-gray-700 dark:text-gray-400">Attach File</span>
                            <input name="subject" data-bvalidator="required" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Subject" />
                        </label><br>
                    </div>
                </form>
                <div class="card-footer">
                    <button class="px-4 py-2  text-sm  bg-green  rounded-lg border border-gray" onclick="sendForm('', '', 'insertpermission', 'resultid', 'addtax')">Add Permission</button>
                    <div class="col-md-12" id="resultid"></div>

                </div>
            </div>
        </div>
        <!-- /.col -->
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
            "ajax": "main/pendingapprovaldata.php",
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