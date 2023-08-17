<?php include('header.php');
$AllProducts = getAllProduct();

 ?>
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
            <div class="d-flex justify-content-end">
            <a href="order-manage.php" class="btn btn-info  mb-3 " >
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-plus undefined">
                    <path d="M10 17 10 3M3 10 17 10"></path>
                </svg>
                Order Listing
            </a>
        </div>
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
                <input id="productSearch" class="form-control" type="text" placeholder="Search by product title">
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
                                            <div class="text-muted text-small cursor-pointer sort" data-sort="email">Order</div>
                                        </div>
                                        <div class="col-lg-3 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-small cursor-pointer sort" data-sort="phone">Available</div>
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


                   
                    <?php
                        if($AllProducts){
                        foreach($AllProducts as $key => $val): 
                        ?>
                    <div class="card mb-2 product-card">
                        <div class="row g-0 h-100 sh-lg-9 position-relative">
                            <a  class="col-auto ">
                                <img src="<?= ($val['productImage']) ? $val['productImage'] :'uploads/defualt_products.png' ?>" alt="product" class="card-img card-img-horizontal sw-11" style="height:72px;">
                            </a>
                            <div class="col py-4 py-lg-0">
                                <div class="ps-5 pe-4 h-100">
                                    <div class="row g-0 h-100 align-content-center">
                                        <a  class="col-11 col-lg-4 d-flex flex-column mb-lg-0 mb-3 pe-3 d-flex order-1 h-lg-100 justify-content-center">
                                        <span class="product-title"><?= $val['name'] ?? '' ?></span>
                                        </a>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                            <div class="lh-1 text-alternate"><input id="quantatiy_<?php echo $val['id'] ?? '' ?>" type="number" value="1" min="1" class="w-20"></div>
                                        </div>
                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                            <div class="lh-1 text-alternate"><input id="available_<?php echo $val['id'] ?? '' ?>" type="number" value="1" min="1" class="w-20"></div>
                                        </div>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                            <span class="badge bg-outline-quaternary group">Pendding</span>
                                        </div>
                                        <div class="col-1 d-flex flex-column mb-2 mb-lg-0 align-items-end order-2 order-lg-last justify-content-lg-center">
                                            <label class="form-check mt-2">
                                                <input type="checkbox" class=" product-checkboxes form-check-input pe-none" data-product='<?= json_encode($val); ?>' >
                                                <input type="hidden" value="<?php echo $val['id'] ?? '' ?>">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                            endforeach;
                        }
                        else {
                        ?>
                         <div  class="card mb-2 " data-title="Product Card" data-intro="Here is a product card with buttons!" data-step="2">
                            <div class="row g-0 sh-12">
                                <div class="col">
                                    <div class="card-body pt-0 pb-0 h-100">
                                        <div class="row g-0 h-100 align-content-center">
                                            <div class="col-12 col-md-12 d-flex align-items-center justify-content-center">
                                                No Procut Available Yet !
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    <!-- Items Container Start -->

                    <!-- List Items End -->
                </div>
            </div>
            <?php if($AllProducts): ?>
            <!-- Items Pagination Start -->
            <div class="w-100 d-flex justify-content-center">
            <input id="orderButton" class="btn btn-primary mb-1" type="submit" onclick="submitOrder()" value="Order Now">
            </div>
            <!-- Items Pagination End -->
            <?php endif; ?>
        </div>

    </div>

</main>
<script>
 const searchInput = document.getElementById('productSearch');
    const productCards = document.querySelectorAll('.product-card');

    searchInput.addEventListener('input', function () {
        const searchText = searchInput.value.trim().toLowerCase();

        productCards.forEach(card => {
            const title = card.querySelector('.product-title').textContent.toLowerCase();

            if (title.includes(searchText)) {
                card.style.display = 'block'; // Show matching cards
            } else {
                card.style.display = 'none'; // Hide non-matching cards
            }
        });
    });



  function submitOrder() {

    const selectedProducts = [];
    let user_id = "<?= $_SESSION['user']['id'] ?? '' ?>";
    const checkboxes = document.querySelectorAll('.product-checkboxes');
    
    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            let productData = JSON.parse(checkbox.getAttribute("data-product"));

            const pro_id = productData.id; 
            const productName = productData.name; 
            const quantity_req = $('#quantatiy_' + pro_id).val(); 
            const avialable_Stock = $('#available_' + pro_id).val(); 
            
            selectedProducts.push({
                pro_id: pro_id,
                name: productName,
                quantity: quantity_req,
                avialable: avialable_Stock
            });
        }
    });

    if (selectedProducts.length === 0) {
        alert("Please select at least one product.");
        return; 
    }else{
        $('#orderButton').text('saving');
        $('#orderButton').attr('disabled',true);
        $.ajax({
            url: "functions.php", 
            method: 'POST',
            data: {
                user_id: user_id,
                products: selectedProducts,
                action: "saveorder",
            },
            success: function(response) {
                $('#orderButton').text('Order Now');
                $('#orderButton').attr('disabled',false);
                alert(response);
            },
            error: function(xhr, status, error) {
                alert('please contact to the developer');
                $('#orderButton').text('Order Now');
                $('#orderButton').attr('disabled',false);
            }
        });
    }

}

</script>

<?php include('footer.php') ?>