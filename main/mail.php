<?php
include "session.php";
ob_start();
$sid = "";
if (isset($_POST['hakuna'])) {
    $sid = $_POST['hakuna'];
}
$email = $obj->selectfieldwhere("users", 'email', "id=$employeeid");

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">PMS Equity Email</h4>
                    </div><!--end col-->
                    <div class="col-auto">
                        <ul class="nav nav-tabs tab-nagative-m" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#Inbox" role="tab" aria-selected="true">Inbox</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Sent-Mail" role="tab" aria-selected="false">Sent Mail</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Compose-Mail" role="tab" aria-selected="false">Compose Mail</a>
                            </li>
                        </ul>
                    </div><!--end col-->
                </div> <!--end row-->
            </div><!--end card-header-->
            <div class="card-body">
                <div class="tab-content" id="Amount_history">
                    <div class="tab-pane fade show active" id="Inbox" role="tabpanel" aria-labelledby="Stocks-tab">
                        <div class="table-responsive dash-social">
                            <table id="example1" class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>

                                        <th>Serial No</th>
                                        <th>Date Time</th>
                                        <!-- <th>Time</th> -->
                                        <th>Sender</th>
                                        <th>Subject</th>
                                        <th>View Msg</th>
                                        <th>Viewed</th>
                                    </tr><!--end tr-->
                                </thead>

                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Sent-Mail" role="tabpanel" aria-labelledby="Mutual-funds-tab">
                        <div class="table-responsive dash-social">
                            <table id="example2" class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Date</th>
                                        <!-- <th>Time</th> -->
                                        <th>To</th>
                                        <th>Subject</th>
                                        <th>View Msg</th>

                                    </tr><!--end tr-->
                                </thead>

                                <tbody>
                                    <!-- <tr>
                                        <td>12Jan, 2023</td>
                                        <td>10:12 PM</td>
                                        <td>ashutoshsisodhiya@gmail.com</td>
                                        <td>Want to withdrawl my amount</td>
                                        <td>
                                            <a class="btn btn-sm btn-success" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#ViewMsg" style="background-color: #0b51b7;">View</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>12Jan, 2023</td>
                                        <td>10:12 PM</td>
                                        <td>ashutoshsisodhiya@gmail.com</td>
                                        <td>Want to withdrawl</td>
                                        <td>
                                            <a class="btn btn-sm btn-success" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#ViewMsg" style="background-color: #0b51b7;">View</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>12Jan, 2023</td>
                                        <td>10:12 PM</td>
                                        <td>ashutoshsisodhiya@gmail.com</td>
                                        <td>withdrawl my amount</td>
                                        <td>
                                            <a class="btn btn-sm btn-success" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#ViewMsg" style="background-color: #0b51b7;">View</a>
                                        </td>
                                    </tr> -->




                                </tbody>
                            </table>
                        </div>
                    </div><!--end tab-pane-->


                    <!-- Compose mail box -->
                    <div class="tab-pane fade" id="Compose-Mail" role="tabpanel" aria-labelledby="Close-tab">


                        <div class="modal-body">
                            <form class="row gy-2 gx-3 align-items-end" id="addtax" enctype="multipart/form-data">
                                <div style="margin-bottom: 25px;">
                                    <h4 class="card-title">Mail to: PMS Equity</h4>
                                    <input name="userid" data-bvalidator="required" class="d-none" value='1' placeholder="Subject" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="Quantity">Subject:</label>
                                    <input type="text" data-bvalidator="required" name="subject" class="form-control form-control-sm" id="">
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="Price">Message</label>
                                    <textarea class="form-control form-control-sm" data-bvalidator="" name="message" id="" name="w3review" rows="8" cols="50"></textarea>
                                </div>
                                <div class="col-sm-3">
                                    <label class="form-label" for="Price">Attach File</label>
                                    <input class="form-control form-control-sm" type="file" multiple name="files[]" data-bvalidator="extension[jpg:jpeg:png:pdf:word]" data-bvalidator-msg-extension="This File Format Not Allowed" id="myFile" name="filename">
                                </div>

                            </form>
                            <button style="background-color: #057c7c;" class="btn btn-success w-10 my-3" onclick="sendForm('', '', 'insertmail', 'resultid', 'addtax')">Send Message</button>
                            <div class="col-md-12" id="resultid"></div>

                        </div><!--end modal-body-->


                    </div><!--end Compose mail box-->



                </div><!--end tab-content-->

            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
<?php
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "E-Mail Support- PMS Equity";
$contentheader = "";
$pageheader = "";
include "main/templete.php"; ?>
<script>
    $(function() {
        $('#example1').DataTable({
            "ajax": "main/inboxdata.php",
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "order": [
                [0, "desc"]
            ],
            columnDefs: [{
                render: function(data, type, full, meta) {
                    return "<div class='text-wrap width-200 bg-red'>" + data + "</div>";
                },
                targets: 5,
                visible: false,
            }],
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                // console.log(aData)
                if (aData[5] == 1) {

                } else {
                    $('td', nRow).attr('style', 'background-color: rgb(199, 255, 255) !important');
                }
            },
        });

        $('#example2').DataTable({
            "ajax": "main/sentmaildata.php",
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "order": [
                [0, "desc"]
            ],
        })

        function recalculateDataTableResponsiveSize() {
            $($.fn.dataTable.tables(true)).DataTable().responsive.recalc();
        }

        $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
            recalculateDataTableResponsiveSize();
            // var id = $(e.target).attr("href").substr(1);
            // window.location.hash = id;
        });

    });
</script>