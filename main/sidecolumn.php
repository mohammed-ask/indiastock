<div class="col-lg-3">
    <div class="position-sticky" style="top: 120px">
        <div class="card">
            <div class="card-body">
                <div class="stock-search">
                    <form action="user-index.html" method="get">
                        <input type="search" name="search" class="form-control top-search mb-0" placeholder="Search Stock">
                        <div class="search-icon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </form>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">My Watchlist <span class="stocks-list-badge bg-soft-primary ms-1">15</span></h4>
                    </div><!--end col-->
                    <!--end col-->
                </div> <!--end row-->
            </div><!--end card-header-->
            <div class="card-body p-0">
                <div class="watchlist-body" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden;">
                                    <div class="simplebar-content" style="padding: 0px;">


                                        <div class="accordion" id="watchlist_2">
                                            <div class="accordion-item border-top-0">
                                                <div class="accordion-header" id="headingOne">
                                                    <a class="accordion-button d-block py-2 px-3 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="align-self-center">
                                                                <h6 class="m-0 text-uppercase font-11">
                                                                    Apple Inc</h6>
                                                                <p class="text-uppercase font-10 mb-0">
                                                                    nasdaq</p>
                                                            </div>
                                                            <div>
                                                                <h6 class="m-0 text-uppercase font-11">
                                                                    ₹147.95 <i class="fa-solid fa-arrow-trend-down text-danger"></i>
                                                                </h6>
                                                                <div class="d-inline-block font-10">
                                                                    <span class="text-danger">-110.60</span>
                                                                    <span class="text-danger">(30.52%)</span>
                                                                </div>
                                                            </div>
                                                        </div><!-- end /div -->
                                                    </a>
                                                </div>
                                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#watchlist_2">
                                                    <div class="accordion-body">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="action-icons">
                                                                <ul class="list-inline">
                                                                    <li class="list-inline-item align-self-center mx-0 bg-success">
                                                                        <a href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#BuyStocks"><i class="fa-solid fa-b text-white email-action-icons-item"></i></a>
                                                                    </li><!--end /li-->
                                                                    <li class="list-inline-item align-self-center mx-0 bg-danger">
                                                                        <a href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#SellStocks"><i class="fa-solid fa-s text-white email-action-icons-item"></i></a>
                                                                    </li><!--end /li-->
                                                                    <li class="list-inline-item align-self-center mx-0">
                                                                        <a href="details.html"><i class="fa-solid fa-sliders email-action-icons-item"></i></a>
                                                                    </li><!--end /li-->
                                                                    <li class="list-inline-item align-self-center mx-0">
                                                                        <a href="javascript: void(0);"><i class="fa-regular fa-trash-can email-action-icons-item"></i></a>
                                                                    </li><!--end /li-->
                                                                </ul><!--end /ul-->
                                                            </div> <!--end action-icons-->
                                                            <div>
                                                                <p class="mb-0 text-muted">Avg.
                                                                    Traded Price : <span class="fw-semibold text-dark">₹148.00</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="row align-items-center">
                                                                    <div class="col">
                                                                        <h6 class="text-success">Bid
                                                                            Price</h6>
                                                                    </div><!--end col-->
                                                                    <div class="col-auto">
                                                                        <p class="mb-0">Quantity</p>
                                                                    </div><!--end col-->
                                                                </div> <!--end row-->
                                                                <ul class="list-unstyled mb-0">
                                                                    <li class="d-flex justify-content-between align-items-start">
                                                                        <div class="me-auto">
                                                                            <p class="mb-0 ">140.50
                                                                            </p>
                                                                        </div>
                                                                        <span class="bg-soft-success px-1 rounded">1523</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-start">
                                                                        <div class="me-auto">
                                                                            <p class="mb-0 ">139.50
                                                                            </p>
                                                                        </div>
                                                                        <span class="bg-soft-success px-1 rounded">1823</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-start">
                                                                        <div class="me-auto">
                                                                            <p class="mb-0 ">136.00
                                                                            </p>
                                                                        </div>
                                                                        <span class="bg-soft-success px-1 rounded">1101</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-start">
                                                                        <div class="me-auto">
                                                                            <p class="mb-0 ">133.50
                                                                            </p>
                                                                        </div>
                                                                        <span class="bg-soft-success px-1 rounded">182</span>
                                                                    </li>
                                                                </ul>
                                                            </div><!--end col-->
                                                            <div class="col">
                                                                <div class="row align-items-center">
                                                                    <div class="col">
                                                                        <h6 class="text-danger">Ask
                                                                            Price</h6>
                                                                    </div><!--end col-->
                                                                    <div class="col-auto">
                                                                        <p class="mb-0">Quantity</p>
                                                                    </div><!--end col-->
                                                                </div> <!--end row-->
                                                                <ul class="list-unstyled mb-0">
                                                                    <li class="d-flex justify-content-between align-items-start">
                                                                        <div class="me-auto">
                                                                            <p class="mb-0 ">146.50
                                                                            </p>
                                                                        </div>
                                                                        <span class="bg-soft-danger px-1 rounded">1523</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-start">
                                                                        <div class="me-auto">
                                                                            <p class="mb-0 ">148.00
                                                                            </p>
                                                                        </div>
                                                                        <span class="bg-soft-danger px-1 rounded">1823</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-start">
                                                                        <div class="me-auto">
                                                                            <p class="mb-0 ">150.00
                                                                            </p>
                                                                        </div>
                                                                        <span class="bg-soft-danger px-1 rounded">1101</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-start">
                                                                        <div class="me-auto">
                                                                            <p class="mb-0 ">153.00
                                                                            </p>
                                                                        </div>
                                                                        <span class="bg-soft-danger px-1 rounded">182</span>
                                                                    </li>
                                                                </ul>
                                                            </div><!--end col-->
                                                        </div><!--end row-->
                                                    </div><!--end accordion-body-->
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <div class="accordion-header" id="headingTwo">
                                                    <a class="accordion-button  d-block py-2 px-3 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="align-self-center">
                                                                <h6 class="m-0 text-uppercase font-11">
                                                                    Tesla Inc</h6>
                                                                <p class="text-uppercase font-10 mb-0">
                                                                    nasdaq</p>
                                                            </div>
                                                            <div>
                                                                <h6 class="m-0 text-uppercase font-11">
                                                                    ₹680.35 <i class="fa-solid fa-arrow-trend-up text-success"></i>
                                                                </h6>
                                                                <div class="d-inline-block font-10">
                                                                    <span class="text-success">50.10</span>
                                                                    <span class="text-success">(5.52%)</span>
                                                                </div>
                                                            </div>
                                                        </div><!-- end /div -->
                                                    </a>
                                                </div>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#watchlist_2">
                                                    <div class="accordion-body">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="action-icons">
                                                                <ul class="list-inline">
                                                                    <li class="list-inline-item align-self-center mx-0 bg-success">
                                                                        <a href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#BuyStocks"><i class="fa-solid fa-b text-white email-action-icons-item"></i></a>
                                                                    </li><!--end /li-->
                                                                    <li class="list-inline-item align-self-center mx-0 bg-danger">
                                                                        <a href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#SellStocks"><i class="fa-solid fa-s text-white email-action-icons-item"></i></a>
                                                                    </li><!--end /li-->
                                                                    <li class="list-inline-item align-self-center mx-0">
                                                                        <a href="details.html"><i class="fa-solid fa-sliders email-action-icons-item"></i></a>
                                                                    </li><!--end /li-->
                                                                    <li class="list-inline-item align-self-center mx-0">
                                                                        <a href="javascript: void(0);"><i class="fa-regular fa-trash-can email-action-icons-item"></i></a>
                                                                    </li><!--end /li-->
                                                                </ul><!--end /ul-->
                                                            </div> <!--end action-icons--> <!--end action-icons-->
                                                            <div>
                                                                <p class="mb-0 text-muted">Avg.
                                                                    Traded Price : <span class="fw-semibold text-dark">₹682.00</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="row align-items-center">
                                                                    <div class="col">
                                                                        <h6 class="text-success">Bid
                                                                            Price</h6>
                                                                    </div><!--end col-->
                                                                    <div class="col-auto">
                                                                        <p class="mb-0">Quantity</p>
                                                                    </div><!--end col-->
                                                                </div> <!--end row-->
                                                                <ul class="list-unstyled mb-0">
                                                                    <li class="d-flex justify-content-between align-items-start">
                                                                        <div class="me-auto">
                                                                            <p class="mb-0 ">680.50
                                                                            </p>
                                                                        </div>
                                                                        <span class="bg-soft-success px-1 rounded">1523</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-start">
                                                                        <div class="me-auto">
                                                                            <p class="mb-0 ">679.50
                                                                            </p>
                                                                        </div>
                                                                        <span class="bg-soft-success px-1 rounded">1823</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-start">
                                                                        <div class="me-auto">
                                                                            <p class="mb-0 ">676.00
                                                                            </p>
                                                                        </div>
                                                                        <span class="bg-soft-success px-1 rounded">1101</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-start">
                                                                        <div class="me-auto">
                                                                            <p class="mb-0 ">673.50
                                                                            </p>
                                                                        </div>
                                                                        <span class="bg-soft-success px-1 rounded">182</span>
                                                                    </li>
                                                                </ul>
                                                            </div><!--end col-->
                                                            <div class="col">
                                                                <div class="row align-items-center">
                                                                    <div class="col">
                                                                        <h6 class="text-danger">Ask
                                                                            Price</h6>
                                                                    </div><!--end col-->
                                                                    <div class="col-auto">
                                                                        <p class="mb-0">Quantity</p>
                                                                    </div><!--end col-->
                                                                </div> <!--end row-->
                                                                <ul class="list-unstyled mb-0">
                                                                    <li class="d-flex justify-content-between align-items-start">
                                                                        <div class="me-auto">
                                                                            <p class="mb-0 ">686.50
                                                                            </p>
                                                                        </div>
                                                                        <span class="bg-soft-danger px-1 rounded">1523</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-start">
                                                                        <div class="me-auto">
                                                                            <p class="mb-0 ">688.00
                                                                            </p>
                                                                        </div>
                                                                        <span class="bg-soft-danger px-1 rounded">1823</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-start">
                                                                        <div class="me-auto">
                                                                            <p class="mb-0 ">690.00
                                                                            </p>
                                                                        </div>
                                                                        <span class="bg-soft-danger px-1 rounded">1101</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-start">
                                                                        <div class="me-auto">
                                                                            <p class="mb-0 ">693.00
                                                                            </p>
                                                                        </div>
                                                                        <span class="bg-soft-danger px-1 rounded">182</span>
                                                                    </li>
                                                                </ul>
                                                            </div><!--end col-->
                                                        </div><!--end row-->
                                                    </div><!--end accordion-body-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: auto; height: 99px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                    </div>
                </div><!--end watchlist-body-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end sticky-->
</div>