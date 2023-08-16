<?php include('header.php'); ?>
<main>
<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title-container">
                    <h1 class="mb-0 pb-0 display-4" id="title">Order Listing</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                        <ul class="breadcrumb pt-0">
                            <li class="breadcrumb-item"><a href="Dashboards.Default.html">Orders</a></li>
                            <li class="breadcrumb-item"><a href="Dashboards.html">Management</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
     

     

        <div class="container">
        <div class="d-flex justify-content-end">
                    <!-- <h2 class="small-title">Products</h2> -->
                    <button class="btn btn-info  mb-3 " type="button" data-bs-toggle="modal" data-bs-target="#closeButtonOutExample" fdprocessedid="nz0kj">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-plus undefined">
                            <path d="M10 17 10 3M3 10 17 10"></path>
                        </svg>
                        New Order
                    </button>

                </div>
        <div class="card mb-5">
                    <div class="row g-0 sh-lg-10 h-auto p-card pt-lg-0 pb-lg-0">
                      <div class="col-lg-4 d-flex align-items-center">
                        <p class="mb-0 pe-0 pr-lg-4"><b>Shop</b><br>Shop Name</p>
                      </div>
                      <div class="col-lg-3 d-flex align-items-center">
                        <p class="mb-0 text-alternate"><b>Shop Manger</b><br>Manager</p>
                      </div>
                      <div class="col-lg-2 d-flex align-items-center mb-1 mb-lg-0">
                        <p class="mb-0 text-alternate"><b>Oder Date</b><br>16 August 2023</p>
                      </div>
                      <div class="col-lg-2 d-flex align-items-center mb-3 mb-lg-0">
                        <span class="badge bg-tertiary text-uppercase">New</span>
                      </div>
                      <div class="col-lg-1 d-flex align-items-center justify-content-left justify-content-lg-end">
                        <button class="btn btn-sm btn-icon btn-icon-only btn-outline-primary" type="button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-check undefined"><path d="M16 5L7.7051 14.2166C7.32183 14.6424 6.65982 14.6598 6.2547 14.2547L3 11"></path></svg>
                        </button>
                        <button class="btn btn-sm btn-icon btn-icon-only btn-outline-secondary ms-1" type="button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-close undefined"><path d="M5 5 15 15M15 5 5 15"></path></svg>
                        </button>
                        <button class="btn btn-sm btn-icon btn-icon-only btn-outline-secondary ms-1" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg>
                        </button>
                      </div>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Available</th>
                            <th scope="col">Quantity</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>testing</td>
                            <td>4</td>
                            <td>10</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
        </div>
</div>
</main>






<?php include('footer.php'); ?>