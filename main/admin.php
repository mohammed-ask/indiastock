<?php
include "session.php";
/* @var $obj db */
ob_start();


?>
<style>
  #datacards a {
    color: white;
  }
</style>
<div class="content-header">
  <h2>Dashboard</h2>

  <button type='button' class='btn btn-danger' onclick='dynamicmodal("none", "somepage", "Unlink", "Unlink Vehicle")' id='assign-lead'>Unlink</button>
</div>
<!-- right col -->
</section>
<?php
//Assign all Page Specific variables
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Indiastock: Dashboard";
$contentheader = "";
$pageheader = "";
include "main/templete.php";
?>