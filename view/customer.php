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
                <input required type="text" id="customerPhoneCheckout" value = "<?php if(isset($_GET['phone']) && $_GET['phone']!= "") echo $_GET['phone'];?>" name="customerPhone" placeholder="Nhập số điện thoại...">
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
                      <button style = "background-color: #1e2e23;color: white;padding: 10px 20px;font-size: 16px;border: none;cursor: pointer;border-radius: 4px;margin-top: 10px;">
                      <a href = "index.php?pg=payment&phone='.$customer['phone'].'">
                        Tạo giao dịch
                      </a>
                      </button>
                      ';
                    }else{
                      $formCreateCustomer = '
                      <p>Chưa có dữ liệu khách hàng này vui lòng tạo giao dịch</p>
                      <button type ="button" style = "background-color: #1e2e23;color: white;padding: 10px 20px;font-size: 16px;border: none;cursor: pointer;border-radius: 4px;margin-top: 10px;">
                        <a href = "index.php?pg=payment&create-cusomer='.$_POST['customerPhone'].'">
                          Tạo giao dịch
                        </a>
                      </button>'
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
