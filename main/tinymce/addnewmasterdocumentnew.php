<?php
include 'session.php'; /* @var $obj db */
ob_start();
?>
<div class="maindata">
    <div class="pageHeading underline">Documents Master</div>
    <form action="insertemployee.php" method="post" enctype="multipart/form-data" id="masterdocumentform">
        <div class="form-group col-sm-6 col-md-3">
            <label class=" col-form-label">Orientation of the document: </label>
            <div class="">
                <select id="orientation" name="orientation" class="form-control" data-bvalidator="required" >
                    <option value="vertical">Vertical</option>
                    <option value="horizontal">Horizontal</option>
                </select>
            </div>
        </div>
        <div class="form-group col-sm-6 col-md-3">
            <label class=" col-form-label">Letter Head: </label>
            <div class="">
                <select id="letterhead" name="letterhead" class="form-control" data-bvalidator="required" >
                    <option value="<?php echo $companyshortname;?>"><?php echo $companyshortname;?></option>
                    
                </select>
            </div>
        </div>
        <div  class="row">
            <div class="form-group col-sm-6 col-md-3">
                <label class=" col-form-label">Name: </label>
                <div class="">
                    <input type="text" id="name" name="name" class="form-control" data-bvalidator="required" />
                </div>
            </div>


            <div class="form-group col-sm-6 col-md-3">
                <label class=" col-form-label">Code: </label>
                <div class="">
                    <input type="text" id="code" name="code" class="form-control" data-bvalidator="required" />
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-3">
                <label class=" col-form-label">Issue No: </label>
                <div class="">
                    <input type="text" id="issueno" name="issueno"  class="form-control" value="03" data-bvalidator="required,number" />
                </div>
            </div>


            <div class="form-group col-sm-6 col-md-3">
                <label class=" col-form-label">Issue Date: </label>
                <div class="">
                    <input type="text" id="issuedate" name="issuedate"  class="form-control" value="<?php echo date("d/m/Y");?>" onfocus="setcalendernolimit(this.id)" data-bvalidator="required" />
                </div>
            </div>
        </div>
        <div  class="row">
            <div class="form-group col-sm-6 col-md-3">
                <label class=" col-form-label">Rev No: </label>
                <div class="">
                    <input type="text" id="revno" name="revno"  class="form-control" value="00" data-bvalidator="required,number" />
                </div>
            </div>


            <div class="form-group col-sm-6 col-md-3">
                <label class=" col-form-label">Rev Date: </label>
                <div class="">
                    <input type="text" id="revdate" name="revdate"  class="form-control" onfocus="setcalendernolimit(this.id)" data-bvalidator="required" />
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-3">
                <label class=" col-form-label">Sec No: </label>
                <div class="">
                    <input type="text" id="secno" name="secno"  class="form-control" value="00" data-bvalidator="number" />
                </div>
            </div>


            <div class="form-group col-sm-6 col-md-3">
                <label class=" col-form-label">Effective Date: </label>
                <div class="">
                    <input type="text" id="effdate" name="effdate"  class="form-control" onfocus="setcalendernolimit(this.id)" data-bvalidator="required" />
                </div>
            </div>
        </div>
        <div  class="row">
            <div class="form-group col-sm-6 col-md-3">
                <label class=" col-form-label">Category: </label>
                <div class=""><select id="category" name="category" class="form-control"  data-bvalidator="required" >
                        <option value="Technical Document">Technical Document</option>
                        <option value="Quality Document">Quality Document</option>
                        <option value="Misc Document">Misc Document</option>
                    </select> 
                </div>
            </div>


            <div class="form-group col-sm-6 col-md-3">
                <label class=" col-form-label">Type: </label>
                <div class=""> <select id="type" name="type" class="form-control"  data-bvalidator="required" >
                        <option value="MSM Document">MSM Document</option>
                        <option value="MSPM Document">MSPM Document</option>
                        <option value="Format of Management System Procedure Manual">Format of Management System Procedure Manual</option>
                        <option value="Calibration Procedure Manual">Calibration Procedure Manual</option>
                        <option value="Format of Calibration Procedure Manual">Format of Calibration Procedure Manual</option>
                        <option value="Other Document">Other Document</option>
                    </select> 
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-3">
                <label class=" col-form-label">Header: </label>
                <div class="">
                    <select id="header" name="header" class="form-control"  data-bvalidator="required" >
                        <option value="header1">Header 1</option>
                        <option value="header2">Header 2</option>
                        <option value="header3">Header 3</option>
                        <option value="header4">Header 4</option>
                        <option value="header5">Header 5</option>
                    </select>
                </div>
            </div>


            <div class="form-group col-sm-6 col-md-3">
                <label class=" col-form-label">Footer: </label>
                <div class="">
                    <select id="footer" name="footer" class="form-control" onchange="changefooter(this.value)" data-bvalidator="required" >
                        <option value="footer3">Footer 3</option>
                        <option value="footer2">Footer 2</option>
                        <option value="footer1">Footer 1</option>
                    </select>
                </div>
            </div>
        </div>
        <div  class="row">
            <div class="form-group col-sm-6" id="reviewedbytr" >
                <label class=" col-form-label">Reviewed by</label>
                <div class="">
                    <select id="reviewedby" name="reviewedby" class="form-control" >
                        <option value="">Select</option>
                        <?php
                        $result = $obj->selectextrawhere("user", "status=2 or status=1");
                        while ($row = $obj->fetch_assoc($result)) {
                            ?>
                            <option value="<?php echo (!empty($row['mobileno'])) ? $row['mobileno'] : $row['official_mobileno']; ?>"><?php echo $row['name'] . "(" . $row['employeecode'] . ")"; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>



            <div class="form-group col-sm-6" id="approvedbytr">
                <label class=" col-form-label">Approved BY</label>
                <div class="">
                    <select id="approvedby" name="approvedby" class="form-control" >
                        <option value="">Select</option>
                        <?php
                        $result = $obj->selectextrawhere("user", "status=2 or status=1");
                        while ($row = $obj->fetch_assoc($result)) {
                            ?>
                            <option value="<?php echo (!empty($row['mobileno'])) ? $row['mobileno'] : $row['official_mobileno']; ?>"><?php echo $row['name'] . "(" . $row['employeecode'] . ")"; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">Content</label>
            <div class="col-sm-11">
                <textarea id="content" name="content" style="width: 100%;font-family:Century Gothic;font-size: 12px;" rows="20" data-bvalidator="required"></textarea>
            </div>
        </div>

        <input type="button" class="btn btn-info" value="Submit" onclick="sendForm('', '', 'insertnewmasterdocument.php', 'modal', 'masterdocumentform');"/> 


    </form>
</div>

<?php
//Assign all Page Specific variables
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagetitle = "Add New Document:.  $companyname :.";
$contentheader = "Add New Document";
$onpagejs = '
    $(document).ready(function(){
    $("select").select2();
    });
tinymce.init({
selector: "textarea",
theme: "modern",
setup: function (editor) {
editor.on("change", function () {
tinymce.triggerSave();
});
},
height: 300,
link_list: [
{title: "My page 1", value: "http://www.tinymce.com"},
{title: "My page 2", value: "http://www.tecrail.com"}
],
plugins: [
"advlist autolink link image lists charmap print preview hr anchor pagebreak",
"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
"table contextmenu directionality emoticons paste textcolor responsivefilemanager youtube codemirror "
],
relative_urls: false,
browser_spellcheck: true,
external_filemanager_path: "filemanager/filemanager/",
filemanager_title: "Filemanager",
external_plugins: {"filemanager": "plugins/responsivefilemanager/plugin.min.js"},
codemirror: {
indentOnInit: true, // Whether or not to indent code on init. 
path: "CodeMirror"
},
image_advtab: true,
fontsize_formats: "8px 9px 10px 11px 12px 13px 14px 15px 16px 18px 20px 22px 24px 28px 30px 34px 36px 40px 44px 48px 50px",
toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ",
toolbar2: "| responsivefilemanager | image | media   | forecolor backcolor fontsize fontsizeselect fontselect sizeselect | easyColorPicker styleselect",
font_formats: "Century Gothic=Century Gothic;"+
         "Andale Mono=andale mono,times;"+
        "Arial=arial,helvetica,sans-serif;"+
        "Arial Black=arial black,avant garde;"+
        "Baskerville=baskerville,palatino linotype,palatino,century schoolbook l,times new roman,serif;"+
        "Book Antiqua=book antiqua,palatino;"+
        "Cambria=cambria,hoefler text,liberation serif,times,times new roman,serif;"+
        
        "Comic Sans MS=comic sans ms,sans-serif;"+
        "Constantia=constantia,lucida bright,dejaVu serif,georgia,serif;"+
        "Consolas=consolas,andale mono,lucida console,lucida aans typewriter,monaco,courier new,monospace;"+
        "Courier New=courier new,courier;"+
        "Georgia=georgia,palatino;"+
        "Gotham=gotham,helvetica neue,helvetica,arial,sans-serif;"+
        "Gill Sans=gill sans,gill sans mt,myriad pro,dejaVu sans condensed,helvetica,arial,sans-serif;"+
        "Helvetica=helvetica;"+
        "Impact=impact,haettenschweiler,franklin gothic bold,arial black,sans-serif;"+
        "Lucida=lucida grande,lucida sans unicode,lucida sans,dejaVu sans,verdana,sans-serif;"+
        "Segoe=segoe,segoe ui,dejavu sans,trebuchet ms,verdana,sans-serif;"+
        "Symbol=symbol;"+
        "Tahoma=tahoma,arial,helvetica,sans-serif;"+
        "Terminal=terminal,monaco;"+
        "Times New Roman=times new roman,times;"+
        "Trebuchet MS=trebuchet ms,geneva;"+
        "Verdana=verdana,geneva;"+
        "Webdings=webdings;"+
        "Wingdings=wingdings,zapf dingbats",
});
function changefooter(val){
if(val=="footer3"){
$("#reviewedbytr").show(); 
}else{
$("#reviewedbytr").hide();
}
}';
$extrajs = '<script src="tinymce/js/tinymce/tinymce.min.js"></script>';
//Apply the template
include './template.php';
?>
