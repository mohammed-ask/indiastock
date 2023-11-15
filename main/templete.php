<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "headincludes.php"; ?>
</head>
<style>
  #overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.8) url(main/images/loader.gif) no-repeat center center;
    z-index: 10000;
  }

  .help-block {
    color: red;
  }

  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }


  .switch {
    position: relative;
    display: inline-block;
    width: 42px;
    height: 20px;
  }

  .switch input {
    display: none;
  }

  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #eb8a88;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 15px;
    width: 15px;
    left: 0px;
    bottom: 3px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked+.slider {
    background-color: #945afa;
  }

  input:focus+.slider {
    box-shadow: 0 0 1px #945afa;
  }

  input:checked+.slider:before {
    -webkit-transform: translateX(40px);
    -ms-transform: translateX(40px);
    transform: translateX(25px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }

  <?php
  if ($_SERVER['REQUEST_URI'] === '/portfolio' || $_SERVER['REQUEST_URI'] === '/mail' || $_SERVER['REQUEST_URI'] === '/fund' || $_SERVER['REQUEST_URI'] === '/profile' || parse_url($_SERVER['REQUEST_URI'])['path'] === '/viewchart') { ?>.nopad {
    padding-top: 85px !important;
  }

  <?php } ?><?php
            if (isset($_POST['postData'])) { ?>@media (max-width: 767px) {
    [data-layout=horizontal] .page-wrapper {
      padding-top: 20px;
    }

    .national-data {
      top: 0;
    }

    .nopad {
      padding-top: 30px !important;
    }
  }

  <?php } ?>
  /* ----------------------------------mobile-menu------------------------------ */

  /* .wrapper {
  max-width: 320px;
  margin: 2em auto;
} */
  .phone {
    border: 1px solid #eee;
    border-radius: 1.5em 1.5em 0em 0em;
    position: fixed;
    bottom: 0px;
    overflow: hidden;
    width: 100%;
    height: 65px;
    box-shadow: 0px -2px 10px -4px rgba(0, 0, 0, 0.1);
    background-color: white;
    z-index: 9999;

  }

  .nav--icons {
    position: absolute;
    bottom: 1em;
    left: 1em;
    right: 1em;
    display: inline-grid;
  }

  .nav--icons ul {
    list-style-type: none;
    display: flex;
    flex-wrap: nowrap;
    justify-content: space-between;
    padding: 0;
    margin: 0;
  }

  .nav--icons ul li a {
    font-family: sans-serif;
    font-size: 11px;
    font-weight: 500;
    letter-spacing: 1px;
    text-decoration: none;
    color: #109090;
    line-height: 1;
    vertical-align: middle;
    display: flex;
    align-items: center;
    border-radius: 3em;
    padding: 0.75em 1em;
    transition: 0.6s ease-in-out;
  }

  .nav--icons ul li a span {
    display: inline-block;
    overflow: hidden;
    max-width: 0;
    opacity: 0;
    padding-left: 0.5em;
    transform: translate3d(-0.5em, 0, 0);
    transition: opacity 0.6s, max-width 0.6s, transform 0.6s;
    transition-timing-function: ease-in-out;
  }

  .nav--icons ul li a:hover,
  .nav--icons ul li a.is-active {
    color: #fff;
    background-color: #109090;
  }

  .nav--icons ul li a:hover span,
  .nav--icons ul li a.is-active span {
    opacity: 1;
    max-width: 40px;
    transform: translate3d(0, 0, 0);
  }

  /* --------------------------mobile-nav end--------------------------------- */
</style>

<body id="body" data-layout="horizontal" class="" data-new-gr-c-s-check-loaded="14.1091.0" data-gr-ext-installed="">

  <!-- Top Bar Start -->

  <?php
  if (!isset($_POST['postData'])) {
    include "header.php";
  } ?>
  <!-- Top Bar End -->
  <div class="page-wrapper nopad">

    <!-- Page Content-->
    <div class="page-content-tab">

      <div class="container-fluid">
        <!-- end page title end breadcrumb -->
        <div class="row">
          <div class="col-lg-9">
            <!--end row-->
            <?php echo $pagemaincontent ?>
          </div><!--end col-->


          <?php include "sidecolumn.php" ?>
          <!--end col-->
        </div><!--end row-->
        <div class="row">
          <div class="col-12">
          </div><!--end col-->
        </div><!--end row-->


      </div><!-- container -->




      <!-- Footer Start -->
      <?php
      if (!isset($_POST['postData'])) {
        include "footer.php";
      } ?>
      <!-- end Footer -->

    </div>
    <!-- end page content -->
  </div>
  <div class="modal fade" id="myModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title m-0 mb-n1" id="modalheading">Add Service Code</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modaldata">
        </div>
        <div class="p-3">
          <button type="button" class="btn btn-success w-10 my-3" id="modalfooterbtn" onclick="$('#modalsubmit').click();">Submit</button>
          <!-- <button type="button" class="btn btn-primary" id="modalfooterbtn" onclick="$('#modalsubmit').click();">Save changes</button> -->
          <!-- <button type="button" class="btn btn-info" data-dismiss="modal">Close</button> -->
        </div>
      </div>
    </div>
  </div>



  <!-- ---------------------------------------Mobile navigator-------------------- -->
  <div class="phone d-web-none">

    <nav class="nav nav--icons">
      <ul>
        <li>
          <a class="<?= $_SERVER['REQUEST_URI'] === '/dashboard' ? 'is-active' : '' ?>" href="dashboard">
            <svg class="icon icon-home" viewBox="0 0 576 512" width="24" height="24">
              <path fill="currentColor" d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c.2 35.5-28.5 64.3-64 64.3H128.1c-35.3 0-64-28.7-64-64V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24zM352 224a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zm-96 96c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H256z"></path>
            </svg>
            <span>Home</span>
          </a>
        </li>
        <li>
          <a class="<?= $_SERVER['REQUEST_URI'] === '/portfolio' ? 'is-active' : '' ?>" href="portfolio">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 576 512">
              <path fill="currentColor" d="M384 480h48c11.4 0 21.9-6 27.6-15.9l112-192c5.8-9.9 5.8-22.1 .1-32.1S555.5 224 544 224H144c-11.4 0-21.9 6-27.6 15.9L48 357.1V96c0-8.8 7.2-16 16-16H181.5c4.2 0 8.3 1.7 11.3 4.7l26.5 26.5c21 21 49.5 32.8 79.2 32.8H416c8.8 0 16 7.2 16 16v32h48V160c0-35.3-28.7-64-64-64H298.5c-17 0-33.3-6.7-45.3-18.7L226.7 50.7c-12-12-28.3-18.7-45.3-18.7H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H87.7 384z" />
            </svg>
            <span>Portfolio</span>
          </a>
        </li>
        <li>
          <a class="<?= $_SERVER['REQUEST_URI'] === '/market' ? 'is-active' : '' ?>" href="market">
            <svg class="icon icon-profile" viewBox="0 0 512 512" width="24" height="24">

              <path fill="currentColor" d="M32 32c17.7 0 32 14.3 32 32V400c0 8.8 7.2 16 16 16H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H80c-44.2 0-80-35.8-80-80V64C0 46.3 14.3 32 32 32zM160 224c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32s-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm128-64V320c0 17.7-14.3 32-32 32s-32-14.3-32-32V160c0-17.7 14.3-32 32-32s32 14.3 32 32zm64 32c17.7 0 32 14.3 32 32v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V224c0-17.7 14.3-32 32-32zM480 96V320c0 17.7-14.3 32-32 32s-32-14.3-32-32V96c0-17.7 14.3-32 32-32s32 14.3 32 32z"></path>


            </svg>
            <span>Market</span>
          </a>
        </li>
        <li>
          <a class="<?= $_SERVER['REQUEST_URI'] === '/fund' ? 'is-active' : '' ?>" href="fund">
            <svg class="icon icon-profile" viewBox="0 0 512 512" width="24" height="24">
              <path fill="currentColor" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H80c-8.8 0-16-7.2-16-16s7.2-16 16-16H448c17.7 0 32-14.3 32-32s-14.3-32-32-32H64zM416 272a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"></path>
            </svg>
            <span>Wallet</span>
          </a>
        </li>
        <li>
          <a class="<?= $_SERVER['REQUEST_URI'] === '/profile' ? 'is-active' : '' ?>" href="profile">
            <svg class="icon icon-search" viewBox="0 0 512 512" width="24" height="24">
              <path fill="currentColor" d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"></path>
            </svg>
            <span>Setting</span>
          </a>
        </li>
      </ul>
    </nav>

  </div>




  <!-- Javascript  -->

  <?php
  include "footerincludes.php";
  ?>




</body><!--end body-->

<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>