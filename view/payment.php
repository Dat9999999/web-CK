<?php
session_start();
?>
<style>
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding-top: 160px;
        }
        .search-form {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .search-form input[type="text"] {
            flex-grow: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }
        
        .search-form input[type="number"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }
        
        .search-form button {
            background-color: #4caf50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }        
        table {
            border-collapse: collapse;
            width: 100%;
            color: #333;
            font-family: Arial, sans-serif;
            font-size: 14px;
            text-align: left;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin: auto;
            margin-top: 50px;
            margin-bottom: 50px;
        }
        table th {
            background-color: #294031;
            color: #fff;
            font-weight: bold;
            padding: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-top: 1px solid #fff;
            border-bottom: 1px solid #ccc;
        }
        table tr:nth-child(even) td {
            background-color: #f2f2f2;
        }
        table tr:hover td {
            background-color: #ffedcc;
        }
        table td {
            background-color: #fff;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            font-weight: bold;
        }
        .cart {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            min-width: 400px;
            /* margin: 0 auto; */
        }
        
        .cart h2 {
            margin-bottom: 20px;
        }
        
        .cart form {
            margin-bottom: 20px;
        }
        
        .cart label {
            display: block;
            margin-bottom: 5px;
        }
        
        .cart input[type="text"],
        .cart input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        .cart p {
            margin: 10px 0;
        }
        
        .cart button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .cart button:hover {
            background-color: #45a049;
        }
        #suggestions {
            list-style-type: none; /* Loại bỏ chấm đầu dòng */
            padding: 0; /* Loại bỏ padding mặc định */
            margin: 0; /* Loại bỏ margin mặc định */
            background-color: #f0f0f0; /* Đặt màu nền xám */
        }

        #suggestions li {
            padding: 10px; /* Thêm padding cho các mục */
            border-bottom: 1px solid #ccc; /* Thêm đường viền dưới */
        }

    </style>
<div class="container"  style = "display : flex; justify-content: space-between;">
        <div class = "search-product">
            <h2>Tìm kiếm sản phẩm</h2>
            <div class="search-form">
                <form action="index.php?pg=search-product" method = "post">
                    <input required name = "product-name-barcode" type="text" id="searchInput" placeholder="Nhập tên sản phẩm hoặc mã sản phẩm">
                    <input required name = "product-quantity" type = "number" min = "1" placeholder="Số lượng">
                    <input type = "hidden" name = "btn-search-product" value = "1">
                    <button type = "submit">
                        Thêm vào giỏ hàng
                </button>
                </form>
            </div>



            <div class="result" id="searchResult">
                <table>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng tiền sản phẩm</th>
                        <th></th>
                    </tr>

                <!-- get list product  -->
                <?php
                $_SESSION['total_cost'] = 0;
                if(isset($_SESSION['cart']) && $_SESSION['cart']){
                    // remove product out of cart by index 
                    if(isset($_GET['del-cart']) && $_GET['del-cart'] != ""){

                        // remove element 
                        unset($_SESSION['cart'][$_GET['del-cart']]);

                        // reindex after remove element 
                        $_SESSION['cart'] = array_values($_SESSION['cart']);
                    }
                    $list_product = $_SESSION['cart'];
                    $index = 0;
                    foreach( $list_product as $item){
                        echo '<tr>
                                         <td>'.$item['barcode'].'</td>
                                         <td>'.$item['product_name'].'</td>
                                         <td>'.$item['quantity'].' Cái</td>
                                         <td>'.$item['price'].'</td>
                                         <td>'.$item['total'].'</td>
                                         <td>
                                             <button>
                                             <a href = "index.php?pg=payment&del-cart='.$index.'">
                                                 <i class="fa-solid fa-x"></i>
                                            </a>
                                            </button>
                                         </td>
                                    </tr>';
                        $_SESSION['total_cost'] += $item['total'];
                        $index++;
                    }
                }
                unset($_POST['product-quantity']);
                ?>
                </table>
            </div>            
        </div>
        <div style = "position:relative;" class="cart">
            <h2>Hóa Đơn</h2>

            <!-- post data to database(order_, order_detail) -->
            <form action="index.php?pg=handle-payment" method = "post">
                <input type="hidden" id =  "type_of_customer" name = "type_of_customer" value = "new">
                <div class="">
                    <label for="">Số điện thoại:</label>
                    <input required oninput = searchNumber(this.value) type="text"  name="customer_phone" id="customer-number">
                    <a id = "info-customer" href = "">Thông tin khách hàng</a>
                    <ul id="suggestions" class="">
                    
                    </ul>
                    <div id="new-customer" >
                        <label for="">Địa chỉ</label>
                        <input  required type="text" name="address" id="address">
                        <label for="">Họ Tên</label>
                        <input required type="text" name="full_name" id="full_name">
                    </div>
                </div>
                <div>
                    <input required type="hidden" id = "total-amount" name = "total_amount" value = "<?php if(isset($_SESSION['total_cost']) && $_SESSION['total_cost'] >= 0) echo $_SESSION['total_cost']; else echo 0;?>">
                    <p>Tổng tiền : <?php if(isset($_SESSION['total_cost']) && $_SESSION['total_cost'] >= 0) echo $_SESSION['total_cost']?></p>
                </div>

                <div class="">
                    <label for="">
                        Số tiền khách đưa
                    </label>
                    <input required oninput = calculateAmount(this.value) type="number" name = "amount_paid" min = "0">
                </div>

                <div class="">
                    <!-- use js to minus paid and total amount -->
                   
                        <p class = "change"> Tiền trả khách: </p>
                </div>
                <button type = "submit">
                    Thu Tiền
                </button>
            </form>
        </div>
    </div>

    <script>
        function calculateAmount(amount_paid){
            document.querySelector(".change").innerHTML = "Tiền trả khách: ";
            const total_amount =document.querySelector("#total-amount").value;
            if(total_amount>0){
                var change =  amount_paid - total_amount;
                if(change >=0){
                    document.querySelector(".change").innerHTML += change;
                }
            }
        }

        function renderInfoCustomerByNum(input){
            if(input.length > 0){
                let data = {
                    'phone':input
                };
                // Make an AJAX request to the PHP endpoint
                let xhr = new XMLHttpRequest();
                xhr.open('POST', './view/handle_search_customer.php', true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Request was successful, handle response here
                            let res =JSON.parse(xhr.responseText);
                            document.querySelector("#address").value = res.address;
                            document.querySelector("#full_name").value = res.full_name;
                            
                        } else {
                            // Handle errors
                            console.error('Error:', xhr.status);
                        }
                    }
                };
                xhr.send(JSON.stringify(data)); // Send the JSON data
            }
        }
        function chooseNum(input){
            //hide add new customer
            // render number 
            document.querySelector("#customer-number").value = "0"+input;
            hideSuggest();

            
            renderInfoCustomerByNum("0"+input);
            document.querySelector("#type_of_customer").value = "old";
            document.querySelector("#info-customer").href = "index.php?pg=customer&phone=0"+input;
        }
        function hideSuggest(){
            document.querySelector('#suggestions').innerHTML = '';
        }

        function searchNumber(input){
            if(input.length > 0){
                let data = {
                    'number':input
                };
                // Make an AJAX request to the PHP endpoint
                let xhr = new XMLHttpRequest();
                xhr.open('POST', './view/handle_search_num.php', true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Request was successful, handle response here
                            let res =JSON.parse(xhr.responseText);
                            show_res = '';
                            for(var i = 0; i< res.length; i++){
                                show_res += `<li onclick = chooseNum(${res[i]}) style = "cursor:pointer;" class="list-group-item">${res[i]}</li>`;
                            }
                            document.querySelector('#suggestions').innerHTML = show_res;

                        } else {
                            // Handle errors
                            console.error('Error:', xhr.status);
                        }
                    }
                };
                xhr.send(JSON.stringify(data)); // Send the JSON data
            }
            else{
                hideSuggest();
            }
        }
    </script>
</body>
</html>