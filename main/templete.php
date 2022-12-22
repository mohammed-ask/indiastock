<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <?php include 'main/headincludes.php'; ?>
    <style>
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
    </style>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo $sitelogo; ?>" alt="<?php echo $sitelogoalt; ?>" >
        </div> -->
        <!-- Navbar -->
        <?php include 'main/sidebar.php'; ?>
        <!-- /.navbar -->
        <div class="flex flex-col flex-1 w-full">
            <?php include 'main/header.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <main class="h-full overflow-y-auto">
                <div class="stickyframe" style="z-index: 10;"><iframe scrolling="no" allowtransparency="true" frameborder="0" src="https://s.tradingview.com/embed-widget/ticker-tape/?locale=in#%7B%22symbols%22%3A%5B%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NASDAQ%3ATSLA%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3AHDFCLIFE%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3ATATAMOTORS%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3ARELIANCE%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NASDAQ%3ANFLX%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NASDAQ%3AAMZN%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3AICICIBANK%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22SGX%3AIN1!%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3ANIFTY%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3ABANKNIFTY%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22CRYPTOCAP%3AUSDT.D%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22CRYPTOCAP%3ABTC.D%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3AINDIAVIX%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3ASBIN%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3AKOTAKBANK%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3ATCS%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3ATATAMOTORS%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3AMARUTI%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NASDAQ%3AMSFT%22%7D%2C%7B%22description%22%3A%22%22%2C%22proName%22%3A%22NSE%3AAXISBANK%22%7D%5D%2C%22showSymbolLogo%22%3Atrue%2C%22colorTheme%22%3A%22dark%22%2C%22isTransparent%22%3Afalse%2C%22displayMode%22%3A%22adaptive%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A46%2C%22utm_source%22%3A%22www.indiastockcapitals.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22ticker-tape%22%2C%22page-uri%22%3A%22www.indiastockcapitals.com%2F%22%7D" style="box-sizing: border-box; height: 46px; width: 100%;"></iframe></div>
                <div class="container px-6 mx-auto grid">


                    <!-- Small boxes (Stat box) -->
                    <?php echo $pagemaincontent; ?>
                    <!-- /.row (main row) -->


                </div>
                <!-- Main modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalheading">Add Service Code</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="modaldata">
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-primary" id="modalfooterbtn" onclick="$('#modalsubmit').click();">Save changes</button>
                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button> -->
                                <button data-dismiss="modal" class="px-4 py-2 text-sm font-medium leading-5 text-black text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                                    Cancel
                                </button>
                                <button onclick="$('#modalsubmit').click();" id="modalfooterbtn" type="button" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"> Accept
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </main>


            <!-- /.content-wrapper -->
            <?php //include 'main/footer.php'; 
            ?>
            <!-- Control Sidebar -->
            <!-- /.control-sidebar -->
        </div>
    </div>
    <!-- ./wrapper -->
    <?php include 'main/footerincludes.php'; ?>
    <script>
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
    </script>
    <!-- jQuery -->
</body>

</html>