<?php
include_once("./model/get_info_customer.php");
include_once("./model/add_account.php");
include_once("./model/get_purchase_history.php");
session_start();
?>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="./view/asset/css/khachhang.css" />
    <!-- JavaScript -->
    <script>
      function addInputForm(form){
        
        // Input tên sản phẩm
        var nameLabel = document.createElement("label");
        nameLabel.textContent = "Tên sản phẩm:";
        var nameInput = document.createElement("input");
        nameInput.setAttribute("type", "text");
        nameInput.required = true;
        nameInput.setAttribute("name", "product-name[]");
        nameInput.setAttribute("style", "width:100%");


        var divInput = document.createElement("div");
        divInput.appendChild(nameLabel)
        divInput.appendChild(nameInput);
        divInput.setAttribute("style", "width:50%");


        form.appendChild(divInput);

    
        // Input số lượng
        var divInput = document.createElement("div");

        var quantityLabel = document.createElement("label");
        quantityLabel.textContent = "Số lượng:";
        var quantityInput = document.createElement("input");
        quantityInput.required = true;
        quantityInput.setAttribute("type", "number");
        quantityInput.setAttribute("name", "quantity[]");
        quantityInput.setAttribute("value", "0");
        quantityInput.setAttribute("min", "0");


        quantityInput.setAttribute("style", "width:100%");

        divInput.setAttribute("style", "width:50%");
        divInput.appendChild(quantityLabel);
        divInput.appendChild(quantityInput);
        form.appendChild(divInput);


        var addProductButton = document.createElement("button");
        addProductButton.textContent = "Thêm sản phẩm khác";
        addProductButton.setAttribute("type","button");
        addProductButton.setAttribute("class","add-button");
        addProductButton.setAttribute("style","background-color: #1e2e23;color: white;padding: 10px 20px;font-size: 16px;border: none;cursor: pointer;border-radius: 4px;margin-top: 10px; margin-right :10px;");

        var payProductButton = document.createElement("button");
        payProductButton.textContent = "Thanh toán";
        payProductButton.setAttribute("type","submit");
        payProductButton.setAttribute("class","pay-button");
        payProductButton.setAttribute("style","background-color: #1e2e23;color: white;padding: 10px 20px;font-size: 16px;border: none;cursor: pointer;border-radius: 4px;margin-top: 10px;");


        addProductButton.onclick = ()=>{
          addInputForm(form);
          form.removeChild(addProductButton);
          form.removeChild(payProductButton);
        };
        form.appendChild(addProductButton);
        // nút thanh toán
        form.appendChild(payProductButton);
    }
    function addProductForm() {
      var formContainer = document.getElementById("form-container");
      // Tạo form element
      
      var form = document.createElement("form");
      form.setAttribute("id", "product-form");
      
      // Thêm input
      addInputForm(form);
      var payInput =  document.createElement("input");
      payInput.setAttribute("type","hidden");
      payInput.setAttribute("name","pay");
      form.appendChild(payInput);
      formContainer.appendChild(form);
    }
    function addProductFormNewCus() {
      // Tạo form element
      var form = document.getElementById("product-form-new-cus");
      // Thêm input
      addInputForm(form);
      var payInput =  document.createElement("input");
      payInput.setAttribute("type","hidden");
      payInput.setAttribute("name","pay");
      form.appendChild(payInput);
      formContainer.appendChild(form);
    }
    </script>
  </head>
  <body>
    <!-- Home -->
      <!-- Nội dung trang chủ -->
      <div class="content">
    <div class="container">
        <!-- Thanh toán tại quầy thu ngân -->
        <div class="checkout">
          <div class="checkout">
            <h2>Thanh toán</h2>
            <form action="index.php?pg=customer" method = "post">
                <label for="customerPhoneCheckout">Nhập số điện thoại khách hàng:</label>
                <input type="text" id="customerPhoneCheckout" name="customerPhone" placeholder="Nhập số điện thoại...">
                <button type = "submit" >Tìm kiếm</button>
                <input type="hidden" name = "btn-check-customer" value = "submit">
                <p id="errorMessage" class="error-message"></p>
            <?php
                if(isset($_POST['btn-check-customer']) && $_POST['btn-check-customer']){
                    
                  // use $_SESSION['customerPhone'] to connect with order table by FK phone number 
                    $_SESSION['customerPhone'] = $_POST['customerPhone'];


                    // get customer by number phone 
                    $customer = getCustomer($_POST['customerPhone']);
                    $renderInfoCustomer = '';
                    $formCreateCustomer = '';
                    // render info customer 
                    if($customer){
                      $renderInfoCustomer = '<h3>Thông tin khách hàng</h3>
                      <p><strong>Họ và tên:</strong> <span id="customerFullNameDisplay">'.$customer['full_name'].'</span></p>
                      <p><strong>Địa chỉ:</strong> <span id="customerAddressInfoDisplay">'.$customer['address'].'</span></p>
                      <p><strong>Số điện thoại:</strong> <span id="customerPhoneInfoDisplay">'.$customer['phone'].'</span></p>
                      <button onclick="addProductForm()" style = "background-color: #1e2e23;color: white;padding: 10px 20px;font-size: 16px;border: none;cursor: pointer;border-radius: 4px;margin-top: 10px;">Tạo giao dịch</button>
                      <div id="form-container"></div>
                      ';
                    }else{
                      $formCreateCustomer = '<div style="background-color: #294031; color: white; padding: 20px;width: 50%;margin: auto;">
                      <h2 style="text-align: center;">Tạo tài khoản khách hàng mới</h2>
                      <div id = "">
                      <form action="index.php?pg=customer" id = "product-form-new-cus" method="post">
                      <div class="form-group">
                      <label for="full-name" style="margin-bottom: 5px;">Họ và tên:</label>
                      <input type="text" id="customerFullName" name="customerFullName" required style="width: 100%; padding: 8px; box-sizing: border-box; border-radius: 5px; border: none; margin-bottom: 10px;">
                      </div>
                      <div class="form-group">
                      <label for="address" style="margin-bottom: 5px;">Địa chỉ:</label>
                      <input type="text" id="customerAddressInfo" id="address" name="address" required style="width: 100%; padding: 8px; box-sizing: border-box; border-radius: 5px; border: none; margin-bottom: 10px;">
                      </div>
                      <input type="hidden" name="btn-create-customer" value="submit">
                      </form>
                      <script>
                      addProductFormNewCus();
                      </script>
                      </div>
                      </div>'
                      ;
                    }
                  }
                  if(isset($_POST['btn-create-customer']) && $_POST['btn-create-customer']){
                    if(addCustomer($_POST['customerFullName'] ,$_SESSION['customerPhone'], $_POST['address'])){
                      //xử lý giao dịch 




                      //thông báo 
                      echo 'tạo mới khách hàng thành công';
                    }else{
                      echo 'tạo mới khách hàng thất bại';
                    }
                  }
                  ?>
                  </form>
                  </div>
                  </div>
                  
                  <!-- Thông tin cá nhân và lịch sử mua hàng -->
                  
                  <!-- Thông tin cá nhân và lịch sử mua hàng sẽ được hiển thị ở đây -->
                  </div>
                  <div class="customer-management">
                  <div class="customer-info" id="customerInfo">
              <?php
              if(isset($_POST['btn-check-customer']) && $_POST['btn-check-customer']){
                if($renderInfoCustomer != ''){
                  // Hiển thị thông tin khách hàng và lịch sử mua hàng
                  echo $renderInfoCustomer;
                }else{
                  // form tạo khách hàng mới 
                  echo $formCreateCustomer;
                }
              }
              ?>
              
              <h3>Lịch sử mua hàng</h3>
              <table>
                  <thead>
                      <tr>
                          <th>Mã đơn hàng</th>
                          <th>Ngày mua</th>
                          <th>Tổng tiền</th>
                          <th>Tiền khách trả</th>
                          <th>Tiền thừa</th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody id="purchaseHistory">
                      <!-- Các đơn hàng sẽ được thêm vào đây -->
                    <?php
                      if(isset($_POST['btn-check-customer']) && $_POST['btn-check-customer']){
                        $order = getOrder($_SESSION['customerPhone']); 
                        if($order){
                          foreach($order as $item){
                            extract($item);
                            $order_date = date("m-d-Y",$order_date);
                            echo '<tr >
                                    <th style = "background-color:#fff; color : #333;">DH'.$id.'</th>
                                    <th style = "background-color:#fff; color : #333;">'.$order_date.'</th>
                                    <th style = "background-color:#fff; color : #333;">'.$total_amount.'</th>
                                    <th style = "background-color:#fff; color : #333;">'.$amount_paid.'</th>
  
                                    <th style = "background-color:#fff; color : #333;">'.$amount_paid - $total_amount.' 
                                    <th style = "background-color:#fff; color : #333;">
                                    <button onclick = showDetails('.$id.') style = "background-color: #1e2e23; /* Màu nền */
                                    border: none; /* Không có đường viền */
                                    color: white; /* Màu chữ */
                                    padding: 10px 20px; /* Kích thước nút */
                                    text-align: center; /* Căn giữa nội dung */
                                    text-decoration: none; /* Không có gạch chân */
                                    display: inline-block; /* Hiển thị dạng khối */
                                    font-size: 16px; /* Kích thước chữ */
                                    margin: 4px 2px; /* Khoảng cách giữa các nút */
                                    cursor: pointer; /* Con trỏ chuột khi rê chuột qua nút */
                                    border-radius: 5px;">
                                    Chi tiet
                                    </button>
                                    </th>
                                    </th>
                                </tr>';

                          }
                          $detailPurchase = getOrderDetail($_SESSION['customerPhone']);
                          if($detailPurchase){
                            $renderDetailPurchase ='';
                            foreach($detailPurchase as $item){
                              extract($item);

                              $renderDetailPurchase .='<tr style = "display:none;" class = "order-'.$order_id.'">
                                                          <th style = "background-color:#fff; color : #333;">'.$product_name.'</th>
                                                          <th style = "background-color:#fff; color : #333;">'.$quantity.'</th>
                                                          <th style = "background-color:#fff; color : #333;">'.$price.'</th>
                                                      </tr>';
                            }
                          }
                        }
                          
                      }
                    
                    ?>


                  </tbody>
              </table>
              
            <!-- Chi tiết đơn hàng -->
            <div id="orderDetails" style ="display:none;">
              <h3>Chi tiết đơn hàng</h3>
              <table>
                  <thead>
                      <tr>
                          <th>Tên sản phẩm</th>
                          <th>Số lượng</th>
                          <th>Giá</th>
                         
                      </tr>
                  </thead>
                  <script>
                    function showDetails(id){
                      document.querySelector("#orderDetails").style.display= "block";
                      resetData();
                      showAll(id);
                    }

                    function resetData(){
                      var data = document.querySelector("#orderDetailsBody").children;
                      for (var i = 0; i < data.length; i++) {
                        data[i].style.display = 'none';
                      }
                    }

                    function showAll(id){
                      var elements = document.getElementsByClassName(`order-${id}`);
                      for (var i = 0; i < elements.length; i++) {
                        elements[i].style.display= "table-row";
                      }
                    }
                  </script>
                  <tbody id="orderDetailsBody">
                      <!-- Chi tiết đơn hàng sẽ được thêm vào đây -->
                      <?=$renderDetailPurchase?>
                  </tbody>
              </table>
            </div>
          </div>
          
        </div>
      </div>
    <!-- order -->

  </body>
</html>
