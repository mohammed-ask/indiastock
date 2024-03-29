<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en" style="overflow: hidden;">

<head>
    <?php include 'headincludes.php'; ?>
    <style>
        ::-webkit-scrollbar {
            width: 4px;
            height: 2px;
        }

        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: lightblue;
            border-radius: 10px;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .item-class td {
            padding: 5px;
        }

        .select2 {
            width: 100% !important;
        }

        .sidebyside {
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .select2-container--default .select2-selection--single {
            padding: 5px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 22px;
        }

        /* body {
            font-family: 'cursive';
        } */
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
            margin-top: 20%;
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
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo $sitelogo; ?>" alt="<?php echo $sitelogoalt; ?>" >
        </div> -->
        <!-- Navbar -->
        <?php include 'sidebar.php'; ?>
        <!-- /.navbar -->
        <div class="flex flex-col flex-1 w-full">
            <?php include 'header.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <main class="h-full overflow-y-auto">
                <div class="stickyframe" style="z-index: 9;"><iframe scrolling="no" allowtransparency="true" frameborder="0" src="https://s.tradingview.com/embed-widget/ticker-tape/?locale=in#%7B%22symbols%22%3A%5B%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NASDAQ%3ATSLA%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3AHDFCLIFE%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3ATATAMOTORS%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3ARELIANCE%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NASDAQ%3ANFLX%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NASDAQ%3AAMZN%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3AICICIBANK%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22SGX%3AIN1!%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3ANIFTY%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3ABANKNIFTY%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22CRYPTOCAP%3AUSDT.D%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22CRYPTOCAP%3ABTC.D%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3AINDIAVIX%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3ASBIN%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3AKOTAKBANK%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3ATCS%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3ATATAMOTORS%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3AMARUTI%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NASDAQ%3AMSFT%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3AAXISBANK%22%7D%5D%2C%22showSymbolLogo%22%3Atrue%2C%22colorTheme%22%3A%22dark%22%2C%22isTransparent%22%3Afalse%2C%22displayMode%22%3A%22adaptive%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A46%2C%22utm_source%22%3A%22www.indiastockcapitals.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22ticker-tape%22%2C%22page-uri%22%3A%22www.indiastockcapitals.com%2F%22%7D" style="box-sizing: border-box; height: 46px; width: 100%;"></iframe></div>
                <div class="container px-6 mx-auto grid">


                    <!-- Small boxes (Stat box) -->
                    <?php echo $pagemaincontent; ?>
                    <!-- /.row (main row) -->


                </div>
            </main>
        </div>
    </div>
    <?php //include 'footer.php';
    ?>
    <br>


    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <!-- /.control-sidebar -->
    </div>
    </div>
    <!-- ./wrapper -->
    <?php include 'footerincludes.php'; ?>
    <script>
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
        $(document).ready(function() {
            setTimeout(function() {
                $('main').append('<div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"><div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="" @keydown.escape="closeModal" class="w-full px-2 mx-1 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="Modal"><header class="flex justify-end"><button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal"><svg class="w-4 h-4 mt-3" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true"><path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg></button></header><div class=" adduserform mb-1 mt-1"><div class="container px-0 mx-auto grid"><h6 style="text-align: center;" id="modalheading" class="mb-4 mx-4 text-md font-semibold text-gray-600 dark:text-gray-300"></h6><div class="px-3 py-2 bg-white rounded-lg dark:bg-gray-800" id="modaldata"></div><div class="modal-footer"><button onclick="$(\'#modalsubmit\').click();" id="modalfooterbtn" type="button" class="w-full px-3 py-1 mt-6 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Submit</button></div></div></div></div></div>');
            }, 1000);
        });
    </script>
    <!-- jQuery -->
</body>

</html>