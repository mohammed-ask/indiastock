<div class="topbar">
    <!-- LOGO -->
    <div class="brand">
        <a href="user-index.html" class="logo">
            <span>
                <img src="main/dist/userimages/logo-sm.png" alt="logo-small" class="logo-sm">
            </span>
            <span>
                <img src="main/dist/userimages/logo.png" alt="logo-large" class="logo-lg logo-light">
                <img src="main/dist/userimages/logo-dark.png" alt="logo-large" class="logo-lg logo-dark">
            </span>
        </a>
    </div>
    <!--end logo-->



    <!-- Right Navbar Start -->

    <!-- Navbar -->
    <nav class="navbar-custom">
        <ul class="list-unstyled topbar-nav float-end mb-0">


            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="user-index.html" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fa-regular fa-bell"></i>
                    <span class="alert-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-sm pt-0">

                    <a href="user-index.html">
                        <h6 class="dropdown-item-text font-13 m-0 py-2 border-bottom d-flex justify-content-between align-items-center">
                            Received Mail <span class="badge bg-soft-primary badge-pill">2</span>
                        </h6>
                    </a>
            </li>

            <li class="dropdown">
                <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown" href="user-index.html" role="button" aria-haspopup="false" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <img src="<?= $avatarpath ?>" class="rounded-circle me-0 me-md-2 thumb-xs">
                        <div class="user-name">
                            <small class="d-none d-lg-block font-11">Usename</small>
                            <span class="d-none d-lg-block fw-semibold font-12"><?= $username ?><i class="mdi mdi-chevron-down"></i></span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="profile">
                        <i class="fa-regular fa-user font-14 me-1 align-text-bottom"></i> Profile</a>

                    <div class="dropdown-divider mb-0"></div>
                    <a class="dropdown-item" href="logout"><i class="fa-solid fa-arrow-right-from-bracket font-14 me-1 align-text-bottom"></i>
                        Logout</a>
                </div>
            </li><!--end topbar-profile-->
            <li class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle nav-link" id="mobileToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a><!-- End mobile menu toggle-->
            </li> <!--end menu item-->
        </ul><!--end topbar-nav-->

        <!-- Right navebar end -->

        <!-- Left Side NavBar Start -->

        <div class="navbar-custom-menu">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="nav-item parent-menu-item active">
                        <a class="nav-link" href="dashboard" id="navbarDashboards">
                            <span><i class="fa-regular fa-envelope-open menu-icon"></i>Dashboards</span>
                        </a>
                    </li><!--end nav-item-->

                    <li class="nav-item  parent-menu-item">
                        <a class="nav-link" href="market" id="navbarMarket">
                            <span><i class="fa-solid fa-chart-column menu-icon"></i>Market</span>
                        </a>
                    </li><!--end nav-item-->

                    <li class="nav-item  parent-menu-item">
                        <a class="nav-link" href="portfolio" id="navbarMarket">
                            <span><i class="fa-solid fa-briefcase menu-icon"></i>Portfolio</span>
                        </a>
                    </li><!--end nav-item-->


                    <li class="nav-item  parent-menu-item">
                        <a class="nav-link" href="mail" id="navbarMarket">
                            <span class="position-relative"><i class="fa-solid fa-envelope-open-text menu-icon"></i>Email
                                <small class="order-badge pending"></small></span>
                        </a>
                    </li><!--end nav-item-->

                    <li class="nav-item  parent-menu-item">
                        <a class="nav-link" href="fund" id="navbarMarket">
                            <span><i class="fa-solid fa-money-bill menu-icon"></i>Funds</span>
                        </a><i class=""></i>
                    </li>
                    <li class="nav-item  parent-menu-item">
                        <a class="nav-link" href="search" id="navbarMarket" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("", "searchstock","", "Search Stock by Symbol")'>
                            <span><i class="fa fa-search"></i> Search</span>
                        </a><i class=""></i>
                    </li>
                    <!--end nav-item-->
                </ul><!-- End navigation menu -->
            </div> <!-- end navigation -->
        </div>
        <!-- Navbar -->
    </nav>
    <!-- end navbar-->
</div>
<div class="national-data">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12 mt-2 mb-2">
                <div class="page-title-box d-inline-block d-md-flex justify-content-start justify-content-md-between align-items-center">
                    <div class="my-3 my-md-0 ps-2">
                        <div class="nifty-50 d-inline-block me-3">
                            <div class="font-11 fw-semibold">Nifty 50</div>
                            <div class="d-inline-block font-11">16,538.45 <span class="text-danger">-78.00</span>
                                <span class="text-danger">(0.49%)</span>
                            </div>
                        </div>
                        <div class="bse-sensex d-inline-block">
                            <div class="font-11 fw-semibold">BSE Sensex</div>
                            <div class="d-inline-block font-11">57,578.76 <span class="text-danger">-273.51</span>
                                <span class="text-danger">(0.52%)</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>