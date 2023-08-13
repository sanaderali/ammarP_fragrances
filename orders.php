<?php include('header.php') ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title-container">
                    <h1 class="mb-0 pb-0 display-4" id="title">Visual Orders</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                        <ul class="breadcrumb pt-0">
                            <li class="breadcrumb-item"><a href="Dashboards.Default.html">Orders</a></li>
                            <li class="breadcrumb-item"><a href="Dashboards.html">Management</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>


        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row g-0">
                <!-- Title Start -->
                <!-- <div class="col-auto mb-3 mb-md-0 me-auto">
                <div class="w-auto sw-md-30">
                  <a href="#" class="muted-link pb-1 d-inline-block breadcrumb-back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-chevron-left undefined"><path d="M13 16L7.35355 10.3536C7.15829 10.1583 7.15829 9.84171 7.35355 9.64645L13 4"></path></svg>
                    <span class="text-small align-middle">Home</span>
                  </a>
                  <h1 class="mb-0 pb-0 display-4" id="title">Product List</h1>
                </div>
              </div> -->
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="w-100 d-md-none"></div>
                <!-- <div class="col-12 col-sm-6 col-md-auto d-flex align-items-end justify-content-end mb-2 mb-sm-0 order-sm-3">
                <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start ms-0 ms-sm-1 w-100 w-md-auto">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-plus undefined"><path d="M10 17 10 3M3 10 17 10"></path></svg>
                  <span>Add Product</span>
                </button>
                <div class="dropdown d-inline-block d-lg-none">
                  <button type="button" class="btn btn-outline-primary btn-icon btn-icon-only ms-1" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-sort undefined"><path d="M6 18 6 3M14 2 14 17"></path><path d="M3 5 6 2 9 5M11 15 14 18 17 15"></path></svg>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end custom-sort">
                    <a class="dropdown-item sort" data-sort="name" href="#">Title</a>
                    <a class="dropdown-item sort" data-sort="email" href="#">Quantity</a>
                    <a class="dropdown-item sort" data-sort="phone" href="#">Price</a>
                    <a class="dropdown-item sort" data-sort="group" href="#">Status</a>
                  </div>
                </div>
                <div class="btn-group ms-1 check-all-container-checkbox-click">
                  <div class="btn btn-outline-primary btn-custom-control p-0 ps-3 pe-2" data-target="#checkboxTable">
                    <span class="form-check float-end">
                      <input type="checkbox" class="form-check-input" id="checkAll">
                    </span>
                  </div>
                  <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-offset="0,3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                  <div class="dropdown-menu dropdown-menu-end">
                    <button class="dropdown-item" id="deleteChecked" type="button">Delete</button>
                  </div>
                </div>
              </div> -->
                <!-- Top Buttons End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <!-- Controls Start -->
        <div class="row mb-2">
            <!-- Search Start -->
            <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                    <input class="form-control" placeholder="Search">
                    <span class="search-magnifier-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-search undefined">
                            <circle cx="9" cy="9" r="7"></circle>
                            <path d="M14 14L17.5 17.5"></path>
                        </svg>
                    </span>
                    <span class="search-delete-icon d-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-close undefined">
                            <path d="M5 5 15 15M15 5 5 15"></path>
                        </svg>
                    </span>
                </div>
            </div>
            <!-- Search End -->

            <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
                <div class="d-inline-block">
                    <!-- Print Button Start -->
                    <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-delay="0" title="" type="button" data-bs-original-title="Print">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-print undefined">
                            <path d="M6.44444 15 5.52949 15C4.13332 15 3.43524 15 2.9322 14.6657 2.71437 14.5209 2.52706 14.3348 2.38087 14.1179 2.04325 13.6171 2.03869 12.919 2.02956 11.5229L2.02302 10.5229C2.01379 9.1101 2.00917 8.40371 2.34565 7.89566 2.49128 7.67577 2.67897 7.48685 2.8979 7.33979 3.40374 7 4.11015 7 5.52295 7L14.477 7C15.8899 7 16.5963 7 17.1021 7.33979 17.321 7.48685 17.5087 7.67577 17.6543 7.89566 17.9908 8.40371 17.9862 9.1101 17.977 10.5229L17.9704 11.5229C17.9613 12.919 17.9568 13.6171 17.6191 14.1179 17.4729 14.3348 17.2856 14.5209 17.0678 14.6657 16.5648 15 15.8667 15 14.4705 15L13.5556 15M15 7 15 3.75C15 3.04777 15 2.69665 14.8315 2.44443 14.7585 2.33524 14.6648 2.24149 14.5556 2.16853 14.3033 2 13.9522 2 13.25 2L6.75 2C6.04777 2 5.69665 2 5.44443 2.16853 5.33524 2.24149 5.24149 2.33524 5.16853 2.44443 5 2.69665 5 3.04777 5 3.75L5 7"></path>
                            <path d="M12.25 13C12.9522 13 13.3033 13 13.5556 13.1685C13.6648 13.2415 13.7585 13.3352 13.8315 13.4444C14 13.6967 14 14.0478 14 14.75L14 16.25C14 16.9522 14 17.3033 13.8315 17.5556C13.7585 17.6648 13.6648 17.7585 13.5556 17.8315C13.3033 18 12.9522 18 12.25 18L7.75 18C7.04777 18 6.69665 18 6.44443 17.8315C6.33524 17.7585 6.24149 17.6648 6.16853 17.5556C6 17.3033 6 16.9522 6 16.25L6 14.75C6 14.0478 6 13.6967 6.16853 13.4444C6.24149 13.3352 6.33524 13.2415 6.44443 13.1685C6.69665 13 7.04777 13 7.75 13L12.25 13Z"></path>
                            <path d="M7 10H6H5"></path>
                        </svg>
                    </button>
                    <!-- Print Button End -->

                    <!-- Export Dropdown Start -->
                    <div class="d-inline-block">
                        <button class="btn p-0" data-bs-toggle="dropdown" type="button" data-bs-offset="0,3">
                            <span class="btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown" data-bs-delay="0" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="Export">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-download undefined">
                                    <path d="M2 14V14.5C2 15.9045 2 16.6067 2.33706 17.1111C2.48298 17.3295 2.67048 17.517 2.88886 17.6629C3.39331 18 4.09554 18 5.5 18H14.5C15.9045 18 16.6067 18 17.1111 17.6629C17.3295 17.517 17.517 17.3295 17.6629 17.1111C18 16.6067 18 15.9045 18 14.5V14"></path>
                                    <path d="M14 10 10.7071 13.2929C10.3166 13.6834 9.68342 13.6834 9.29289 13.2929L6 10M10 2 10 13"></path>
                                </svg>
                            </span>
                        </button>
                        <div class="dropdown-menu shadow dropdown-menu-end">
                            <button class="dropdown-item export-copy" type="button">Copy</button>
                            <button class="dropdown-item export-excel" type="button">Excel</button>
                            <button class="dropdown-item export-cvs" type="button">Cvs</button>
                        </div>
                    </div>
                    <!-- Export Dropdown End -->

                    <!-- Length Start -->
                    <div class="dropdown-as-select d-inline-block" data-childselector="span">
                        <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,3">
                            <span class="btn btn-foreground-alternate dropdown-toggle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-delay="0" title="" data-bs-original-title="Item Count">10 Items</span>
                        </button>
                        <div class="dropdown-menu shadow dropdown-menu-end">
                            <a class="dropdown-item" href="#">5 Items</a>
                            <a class="dropdown-item active" href="#">10 Items</a>
                            <a class="dropdown-item" href="#">20 Items</a>
                        </div>
                    </div>
                    <!-- Length End -->
                </div>
            </div>
        </div>
        <!-- Controls End -->

        <div class="row g-0">
            <div class="col-12 mb-5">
                <!-- List Items Start -->
                <div id="checkboxTable">
                    <div class="mb-4 mb-lg-3 bg-transparent no-shadow d-none d-lg-block">
                        <div class="row g-0">
                            <div class="col-auto sw-11 d-none d-lg-flex"></div>
                            <div class="col">
                                <div class="ps-5 pe-4 h-100">
                                    <div class="row g-0 h-100 align-content-center custom-sort">
                                        <div class="col-lg-4 d-flex flex-column mb-lg-0 pe-3 d-flex">
                                            <div class="text-muted text-small cursor-pointer sort" data-sort="name">TITLE</div>
                                        </div>
                                        <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-small cursor-pointer sort" data-sort="email">Quantity</div>
                                        </div>
                                        <div class="col-lg-3 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-small cursor-pointer sort" data-sort="phone">PRICE</div>
                                        </div>
                                        <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-small cursor-pointer sort" data-sort="group">STATUS</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Items Container Start -->


                   
                    
                    <div class="card mb-2">
                        <div class="row g-0 h-100 sh-lg-9 position-relative">
                            <a href="Products.Detail.html" class="col-auto position-relative">
                                <img src="img/product/small/600X430.png" alt="product" class="card-img card-img-horizontal sw-11 h-100">
                            </a>
                            <div class="col py-4 py-lg-0">
                                <div class="ps-5 pe-4 h-100">
                                    <div class="row g-0 h-100 align-content-center">
                                        <a href="Products.Detail.html" class="col-11 col-lg-4 d-flex flex-column mb-lg-0 mb-3 pe-3 d-flex order-1 h-lg-100 justify-content-center">
                                            Wood Handle Hunter Knife
                                            <div class="text-small text-muted text-truncate position">917</div>
                                        </a>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                            <div class="lh-1 text-alternate"><input type="number" value="1" min="1" class="w-20"></div>
                                        </div>
                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                            <div class="lh-1 text-alternate">$ 21.75</div>
                                        </div>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                            <span class="badge bg-outline-quaternary group">LOW STOCK</span>
                                        </div>
                                        <div class="col-1 d-flex flex-column mb-2 mb-lg-0 align-items-end order-2 order-lg-last justify-content-lg-center">
                                            <label class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input pe-none">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="row g-0 h-100 sh-lg-9 position-relative">
                            <a href="Products.Detail.html" class="col-auto position-relative">
                                <img src="img/product/small/product-6.webp" alt="product" class="card-img card-img-horizontal sw-11 h-100">
                            </a>
                            <div class="col py-4 py-lg-0">
                                <div class="ps-5 pe-4 h-100">
                                    <div class="row g-0 h-100 align-content-center">
                                        <a href="Products.Detail.html" class="col-11 col-lg-4 d-flex flex-column mb-lg-0 mb-3 pe-3 d-flex order-1 h-lg-100 justify-content-center">
                                            Wireless On-Ear Headphones
                                            <div class="text-small text-muted text-truncate position">#5622</div>
                                        </a>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                            <div class="lh-1 text-alternate">592</div>
                                        </div>
                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                            <div class="lh-1 text-alternate">$ 52.50</div>
                                        </div>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5"></div>
                                        <div class="col-1 d-flex flex-column mb-2 mb-lg-0 align-items-end order-2 order-lg-last justify-content-lg-center">
                                            <label class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input pe-none">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="row g-0 h-100 sh-lg-9 position-relative">
                            <a href="Products.Detail.html" class="col-auto position-relative">
                                <img src="img/product/small/product-7.webp" alt="product" class="card-img card-img-horizontal sw-11 h-100">
                            </a>
                            <div class="col py-4 py-lg-0">
                                <div class="ps-5 pe-4 h-100">
                                    <div class="row g-0 h-100 align-content-center">
                                        <a href="Products.Detail.html" class="col-11 col-lg-4 d-flex flex-column mb-lg-0 mb-3 pe-3 d-flex order-1 h-lg-100 justify-content-center">
                                            White Coffee Mug
                                            <div class="text-small text-muted text-truncate position">#3457</div>
                                        </a>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                            <div class="lh-1 text-alternate">2.849</div>
                                        </div>
                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                            <div class="lh-1 text-alternate">$ 14.10</div>
                                        </div>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5"></div>
                                        <div class="col-1 d-flex flex-column mb-2 mb-lg-0 align-items-end order-2 order-lg-last justify-content-lg-center">
                                            <label class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input pe-none">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="row g-0 h-100 sh-lg-9 position-relative">
                            <a href="Products.Detail.html" class="col-auto position-relative">
                                <img src="img/product/small/product-8.webp" alt="product" class="card-img card-img-horizontal sw-11 h-100">
                            </a>
                            <div class="col py-4 py-lg-0">
                                <div class="ps-5 pe-4 h-100">
                                    <div class="row g-0 h-100 align-content-center">
                                        <a href="Products.Detail.html" class="col-11 col-lg-4 d-flex flex-column mb-lg-0 mb-3 pe-3 d-flex order-1 h-lg-100 justify-content-center">
                                            Geometric Chandelier
                                            <div class="text-small text-muted text-truncate position">#4832</div>
                                        </a>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                            <div class="lh-1 text-alternate">902</div>
                                        </div>
                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                            <div class="lh-1 text-alternate">$ 32.60</div>
                                        </div>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                            <span class="badge bg-outline-secondary group">NEW</span>
                                        </div>
                                        <div class="col-1 d-flex flex-column mb-2 mb-lg-0 align-items-end order-2 order-lg-last justify-content-lg-center">
                                            <label class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input pe-none">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="row g-0 h-100 sh-lg-9 position-relative">
                            <a href="Products.Detail.html" class="col-auto position-relative">
                                <img src="img/product/small/product-9.webp" alt="product" class="card-img card-img-horizontal sw-11 h-100">
                            </a>
                            <div class="col py-4 py-lg-0">
                                <div class="ps-5 pe-4 h-100">
                                    <div class="row g-0 h-100 align-content-center">
                                        <a href="Products.Detail.html" class="col-11 col-lg-4 d-flex flex-column mb-lg-0 mb-3 pe-3 d-flex order-1 h-lg-100 justify-content-center">
                                            XBox Controller
                                            <div class="text-small text-muted text-truncate position">#2611</div>
                                        </a>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                            <div class="lh-1 text-alternate">614</div>
                                        </div>
                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                            <div class="lh-1 text-alternate">$ 19.15</div>
                                        </div>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                            <span class="badge bg-outline-secondary group">NEW</span>
                                        </div>
                                        <div class="col-1 d-flex flex-column mb-2 mb-lg-0 align-items-end order-2 order-lg-last justify-content-lg-center">
                                            <label class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input pe-none">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="row g-0 h-100 sh-lg-9 position-relative">
                            <a href="Products.Detail.html" class="col-auto position-relative">
                                <img src="img/product/small/product-10.webp" alt="product" class="card-img card-img-horizontal sw-11 h-100">
                            </a>
                            <div class="col py-4 py-lg-0">
                                <div class="ps-5 pe-4 h-100">
                                    <div class="row g-0 h-100 align-content-center">
                                        <a href="Products.Detail.html" class="col-11 col-lg-4 d-flex flex-column mb-lg-0 mb-3 pe-3 d-flex order-1 h-lg-100 justify-content-center">
                                            Health and Fitness Smartwatch
                                            <div class="text-small text-muted text-truncate position">#3470</div>
                                        </a>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                            <div class="lh-1 text-alternate">1.852</div>
                                        </div>
                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                            <div class="lh-1 text-alternate">$ 68.00</div>
                                        </div>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5"></div>
                                        <div class="col-1 d-flex flex-column mb-2 mb-lg-0 align-items-end order-2 order-lg-last justify-content-lg-center">
                                            <label class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input pe-none">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Items Container Start -->

                    <!-- List Items End -->
                </div>
            </div>
            <!-- Items Pagination Start -->
            <div class="w-100 d-flex justify-content-center">
            <input class="btn btn-primary mb-1" type="submit" value="Order Now">
            </div>
            <!-- Items Pagination End -->
        </div>

    </div>

</main>

<!-- bootstrap5 dataTables js cdn -->
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
<?php include('footer.php') ?>