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
<div class="container px-6 mx-auto grid">
    <div class="sidebyside">
        <!-- <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Transaction detail Section
        </h2>

        <button onclick='dynamicmodal("none", "somepage", "Unlink", "Unlink Vehicle")' class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <i class="fa fa-plus" aria-hidden="true"></i> Add Stock
        </button> -->

    </div>

    <!-- TradingView Widget END -->
    <!-- TradingView Widget BEGIN -->

    <!-- TradingView Widget END -->
</div>
</div>
<!-- right col -->
</section>
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