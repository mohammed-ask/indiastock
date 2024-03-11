<?php
session_start();
// if (isset($_SESSION['userid'])) {
//   $employeeid = $_SESSION['userid'];
//   header("location:administrator");
// }
include './main/function.php';
include './main/conn.php';
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forgot - PMS Equity</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="main/dist/css/tailwind.output.css" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="main/dist/js/init-alpine.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="main/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="main/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="main/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="main/dist/css/bvalidator.css">
  <link rel="stylesheet" href="main/dist/css/select2.min.css">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
  <!-- Default theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

  <style>
    /* --------------------alertify---------------- */

    .alertify .ajs-header {
      display: none;

    }


    .alertify .ajs-footer {
      /* padding: 4px; */
      margin-left: 0px !important;
      margin-right: 0px !important;
      min-height: 35px !important;
      background-color: #4e4eff2e !important;
      padding: 0px !important;
    }

    .alertify .ajs-dialog {

      padding: 15px 0px 0 0px !important;
      max-width: 400px !important;
      border-radius: 5px !important;
      top: 25%;
    }

    .alertify .ajs-footer .ajs-buttons.ajs-primary .ajs-button {
      margin: 0px !important;
    }

    .alertify .ajs-commands {
      margin: -12px 10px 0 0 !important;
    }

    .alertify .ajs-footer .ajs-buttons .ajs-button.ajs-ok {
      color: #fff !important;
      border: 1px dotted #fff;
      border-radius: 5px;
      /* margin-right: 10px !important; */
      margin: 5px 6px 5px 10px !important;
      background-color: #4e4eff;
    }

    .alertify .ajs-dimmer {

      transition-timing-function: ease-in;
      transition-duration: 500ms !important;
    }

    .alertify .ajs-modal {

      transition-timing-function: ease-out;
      transition-duration: 500ms !important;
    }

    /*  ----------------------------------Browser alert start------------------------------------------ */

    .browser-d-none {
      display: none !important;
    }


    .browser-model-content {
      border-radius: 0rem 0rem 0.3rem 0.3rem;
      border: none;

      text-align: center;
    }

    .modal-dialog-broswer {
      max-width: 350px;
      margin: auto;
      margin-top: 30%;
    }

    .modal-footer-browser {
      border-top: none !important;
      padding: 0px 7px 6px 3px;
      justify-content: center;
    }

    .browser-btn-primary {
      color: #231515;
      background-color: #ffffff;
      border-color: #070809;

    }

    .browser-btn-secondary {
      color: #0b0707;
      background-color: #6c757d00;
      border-color: #6c757d;

    }

    .browser-btn {

      padding: 0.3rem 1.3rem;
      font-size: 14px;
      font-weight: 500;
      background-color: #048f83;
      color: white;
      border: none;

    }


    /*  ----------------------------------Browser alert End------------------------------------------ */
  </style>

</head>

<body>
  <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div class="flex-1 h-full max-w-xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
      <div>
       
        <div class="flex items-center justify-center p-6 sm:p-12">
          <form onsubmit="event.preventDefault();sendForm('', '', 'checkforgetmpin', 'resultid', 'loginform');return 0;" id="loginform">
            <div class="w-full">
              <h4 class="mb-3 font-semibold text-gray-700 dark:text-gray-200">
                Forgot MPIN ?
              </h4>
              <div class=" mb-3">A MPIN reset link will be sent to your registered email address.</div>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Enter Your Registered Email</span>
                <input name="email" data-bvalidator='required' class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="example@gmail.com" />
              </label>
              <div id="resultid"></div>
              <!-- You should use a button here, as the anchor is only used for the example  -->
              <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Submit
              </button>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="main/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="main/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="main/dist/js/adminlte.min.js"></script>
  <script src="main/dist/js/customfunction.js"></script>
  <script src="main/dist/js/jquery.bvalidator-yc.js"></script>
  <script src="main/dist/js/select2.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <div class="modal fade" id="customConfirmModal" tabindex="-1" role="dialog" aria-labelledby="customConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-broswer" role="document">
      <div class="modal-content browser-model-content">
        <div class="modal-body">
          Are you sure you want to proceed?
        </div>
        <div class="modal-footer modal-footer-browser">
          <button type="button" class="btn btn-secondary browser-btn browser-btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary browser-btn browser-btn-primary" onclick="handleCustomConfirm(true)">Proceed</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>