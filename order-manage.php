<?php
  include('header.php');
  $orders = getAllOrders();
  
  $AllCategories = getAllCategoris();

  $categoryOrders = NULL;
  $success = NULL;
  $categoryId = '';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['category_id'])) {
        $categoryId = $_POST['category_id'];
        $categoryOrders = getAllOrdersByCategory($categoryId);
    }
  }


?>
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

    <div class="container">
    <div class="row mb-5">
    <!-- Search Start -->
    <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
        <div class="d-flex float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
            <input id="shopSearch" class="form-control" type="text" placeholder="Search by Shop name">
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
    
            <!-- Dropdown Start -->
            <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-3">
                <form id="cat_id-form" action="order-manage.php" method="POST">
                    <select id="select-categoryid" style="border-color: black;" required="" class="form-control"
                        name="category_id">
                        <option value=""> -- Select Category --</option>
                        <?php foreach ($AllCategories as $key => $val): ?>
                            <option value="<?= $val['id'] ?>" <?php if ($categoryId == $val['id']) echo 'selected'; ?> >
                                <?= $val['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>
            <!-- Dropdown End -->
    </div>
    <div id="order-statusChange" class=" d-none col-8 mx-auto text-center alert alert-success rounded-pill">
      <span class="text-bold">Order Status changed Successfully </span>
  </div>



      <?php
      if (isset($_SESSION['user']) && isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] != 'admin') {
          ?>
          <div class="d-flex justify-content-end">
            <a href="orders.php" class="btn btn-info  mb-3 ">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="acorn-icons acorn-icons-plus undefined">
                <path d="M10 17 10 3M3 10 17 10"></path>
              </svg>
              New Order
            </a>
          </div>

    <?php
        }
      }
      $index = 0;
      if ($categoryOrders) {
        foreach ($categoryOrders as $key => $val):
          ?>
          <div  id="order-card_<?= $val['order_id'] ?? '' ?>" class="card mb-5 order-card">
            <div class="row g-0 sh-lg-10 h-auto p-card pt-lg-0 pb-lg-0">

              <div class="col-lg-2 d-flex align-items-center">
                <p class="mb-0 pe-0 pr-lg-4 "><b>Shop Name</b><br>
                 <span class="text-camelcase shop-name"> <?= $val['shop_name'] ?? '' ?> </span>
                </p>
              </div>

              <div class="col-lg-2 d-flex align-items-center">
                <p class="mb-0 text-alternate"><b>Shop Manger</b><br>
                <span class="text-camelcase shop-manger"><?= $val['user_name'] ?? '' ?> </span>
                </p>
              </div>
              
              <div class="col-lg-2 d-flex align-items-center mb-1 mb-lg-0">
                <p class="mb-0 text-alternate"><b>Oder Date</b><br>
                <span class="order-date"> <?= date("d F Y H:i:s", strtotime($val['order_date'])); ?> </span>
                </p>
              </div>

              <div class="col-lg-2 d-flex align-items-center">
                <p class="mb-0 text-alternate"><b>Products Category</b><br>
                <span class="text-camelcase product-category"> <?= $val['category_name'] ?? '' ?> </span>
                </p>
              </div>


              <div class="col-lg-2 d-flex align-items-center mb-3 mb-lg-0">
                <span id="order-text_<?= $val['order_id'] ?? '' ?>" class="badge bg-tertiary text-uppercase order-status">
                  <?= ($val['status']) ? $val['status'] : ''; ?>
                </span>
              </div>
              <div class="col-lg-2 d-flex align-items-center justify-content-left justify-content-lg-end">
                <?php
                if (isset($_SESSION['user']) && isset($_SESSION['user_role'])) {
                  if ($_SESSION['user_role'] == 'admin') {
                    ?>
                    <div id="order-status_<?= $val['order_id'] ?? '' ?>" > 
                      <button id="order-completed_<?= $val['order_id'] ?? '' ?>"  data-order_id="<?= $val['order_id'] ?? '' ?>" data-order_status="Completed"  
                        class=" <?= (in_array($val['status'], ['Pending', 'New']))? '': 'd-none'; ?> btn-status_order btn btn-sm btn-icon btn-icon-only btn-outline-primary" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"
                          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                          class="acorn-icons acorn-icons-check undefined">
                          <path d="M16 5L7.7051 14.2166C7.32183 14.6424 6.65982 14.6598 6.2547 14.2547L3 11"></path>
                        </svg>
                      </button>

                      <button id="order-cancel_<?= $val['order_id'] ?? '' ?>" data-order_id="<?= $val['order_id'] ?? '' ?>" data-order_status="Canceled"
                        class=" <?= (in_array($val['status'], ['Pending', 'New'])) ? '': 'd-none'; ?> btn-status_order btn btn-sm btn-icon btn-icon-only btn-outline-secondary ms-1" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"
                          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                          class="acorn-icons acorn-icons-close undefined">
                          <path d="M5 5 15 15M15 5 5 15"></path>
                        </svg>
                      </button>
                    </div>

                    <button id="order-undu_<?= $val['order_id'] ?? '' ?>" data-order_id="<?= $val['order_id'] ?? '' ?>" data-order_status="Pending" 
                      class="btn-status_order <?= (in_array($val['status'], ['Pending', 'New'])) ? 'd-none': ''; ?>   btn btn-sm btn-icon btn-icon-only btn-outline-secondary ms-1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-arrow-left">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                   </button>

                  <?php }
                } ?>

                <button data-order_id="<?= $val['order_id'] ?? '' ?>"
                  class="btn bnt_product-table btn-sm btn-icon btn-icon-only btn-outline-secondary ms-1" type="button">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye"
                    viewBox="0 0 16 16">
                    <path
                      d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                  </svg>
                </button>

                <button  data-order_id="<?= $val['order_id'] ?? '' ?>
                "class="download-pdf btn  btn-sm btn-icon btn-icon-only btn-outline-secondary ms-1" type="button">
                  <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                </button>


              </div>
            </div>

            <table id="oder_products_<?= $val['order_id'] ?? '' ?>" class="table d-none">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Available</th>
                  <th scope="col">Order</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($val['product_details'] as $index => $detail):
                  ?>
                  <tr>
                    <td scope="row">
                      <?= ++$index ?>
                    </td>
                    <td>
                      <?= $detail['product_name'] ?? '' ?>
                    </td>
                    <td>
                      <?= $detail['quantity'] ?? '' ?>
                    </td>
                    <td>
                      <?= $detail['available_quantities'] ?? '' ?>
                    </td>
                  </tr>
                  <?php
                endforeach;
                ?>
              </tbody>
            </table>
          </div>
          <?php
          $index++;
        endforeach;
      } else { ?>
        <div class="card mb-2 " data-title="Product Card" data-intro="Here is a product card with buttons!" data-step="2">
          <div class="row g-0 sh-12">
            <div class="col">
              <div class="card-body pt-0 pb-0 h-100">
                <div class="row g-0 h-100 align-content-center">
                  <div  class="col-12 col-md-12 d-flex align-items-center justify-content-center">
                  <span id="oder-available" class="fw-bold fs-6">No Order Available Yet!</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
      }
      ?>

    </div>
  </div>
</main>
<script>

$(document).ready(function() {

      var cat_id = $('#select-categoryid').val();
        if (cat_id === '') {
            $('#oder-available').text('Please Select the Category From Dropdown List');
        } else {
            $('#oder-available').text('No Order Available Yet!');
        }

        $('#shopSearch').on('input', function() {

            var searchText = $(this).val().trim().toLowerCase();
            $('.order-card').each(function() {
                var shopName = $(this).find('.shop-name').text().toLowerCase();
                if (shopName.includes(searchText)) {
                    $(this).show(); 
                } else {
                    $(this).hide(); 
                }
            });
        });

        $('.bnt_product-table').on('click', function () {
          const orderID = $(this).attr('data-order_id');
          const tableID = `#oder_products_${orderID}`;
          $(tableID).toggleClass('d-none');
        });

        $('#select-categoryid').change(function() {
            $('#cat_id-form').submit(); 
        });

        $('.btn-status_order').on('click', function() {
          var $button = $(this);
          var order_id = $button.data('order_id');
          var order_status = $button.data('order_status').trim();
          var action = 'OrderStatus'; 
          
          var formData = {
              id: order_id,
              status: order_status,
              action: action 
          };

          $.ajax({
              url: 'functions.php', 
              method: 'POST',
              data: formData,
              success: function(response) {
                  response = response.trim();
                  console.log(response);
                  console.log(order_status);
                  if (response == 'yes') { 

                    if(order_status == 'Completed' || order_status == 'Canceled' ){
                      $('#order-statusChange').removeClass('d-none').text('Order '+ order_status +' Successfully ');
                      setTimeout(() => {
                          $('#order-statusChange').fadeIn().delay(1500).fadeOut();
                      }, 100);

                      $('#order-completed_' + order_id).addClass('d-none');
                      $('#order-cancel_' + order_id).addClass('d-none');
                      $('#order-undu_' + order_id).removeClass('d-none');
                      $('#order-text_' + order_id).text(order_status);

                    }

                    else if(order_status == 'Pending'){
                      $('#order-statusChange').removeClass('d-none').text('Order reverted Successfully ');
                      setTimeout(() => {
                          $('#order-statusChange').fadeIn().delay(1500).fadeOut();
                      }, 100);
                      $('#order-completed_' + order_id).removeClass('d-none');
                      $('#order-cancel_' + order_id).removeClass('d-none');
                      $('#order-undu_' + order_id).addClass('d-none');
                      $('#order-text_' + order_id).text(order_status);

                    }

                  }
              },
              error: function(xhr, status, error) {
                  console.error('AJAX error:', error);
              }
          });
      });
        
    });


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>


<script>

$('.download-pdf').click(function () {
  const ord_id = $(this).data('order_id');

  const docDefinition = {
    content: [
      { text: 'Order Invoice', style: 'mainHeader' },
      generateHeaderDetails(`#order-card_${ord_id}`),
      generateOrderInfo(`#order-card_${ord_id}`),
      { text: ' ', margin: [0, 10] }, 
      { table: generateTableData(`#oder_products_${ord_id}`) }
    ],
    styles: {
      header: {
        fontSize: 16,
        bold: true,
        margin: [0, 0, 0, 10]
      },mainHeader: {
        fontSize: 20,
        bold: true,
        alignment: 'center',
        margin: [0, 0, 0, 10],
        color: '#007BFF'
      },
      subHeader: {
        fontSize: 16,
        bold: true,
        alignment: 'center',
        margin: [0, 0, 0, 10]
      },
    }
  };

  const pdfDocGenerator = pdfMake.createPdf(docDefinition);
  pdfDocGenerator.download(`order_${ord_id}.pdf`);
});

function generateHeaderDetails(cardSelector) {
  const shopName = $(`${cardSelector} .shop-name`).text().trim();
  const shopManager = $(`${cardSelector} .shop-manger`).text().trim();

  return [
    { text: `Shop Name: ${shopName}`, style: 'header' },
    { text: `Shop Manager: ${shopManager}`, style: 'header' }
  ];
}

function generateOrderInfo(cardSelector) {
  const orderDate = $(`${cardSelector} .order-date`).text().trim();
  const productsCategory = $(`${cardSelector} .product-category`).text().trim();
  const orderStatus = $(`${cardSelector} .order-status`).text().trim();

  return [
    { text: `Order Date: ${orderDate}`, style: 'header' },
    { text: `Products Category: ${productsCategory}`, style: 'header' },
    { text: `Order Status: ${orderStatus}`, style: 'header' }
  ];
}

function generateTableData(tableSelector) {
  const headers = [];
  const rows = [];

  $(`${tableSelector} thead th`).each(function () {
    headers.push({ text: $(this).text(), style: 'tableHeader' });
  });

  $(`${tableSelector} tbody tr`).each(function () {
    const row = [];
    $(this).find('td').each(function () {
      row.push($(this).text());
    });
    rows.push(row);
  });

  const tableData = [headers];
  rows.forEach(row => {
    tableData.push(row);
  });

  return {
    widths: Array(headers.length).fill('*'),
    body: tableData,
    layout: 'lightHorizontalLines'
  };
}


</script>





<?php include('footer.php'); ?>