<?php
session_start();
?>
<style>
.container {
    max-width: 1000px;
    margin: 0 auto;
    margin-left: 12%;
    padding-top: 100px;
    display: flex;
    justify-content: flex-start;
}

.report {
    flex-grow: 1;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    height: 100%;
    overflow: auto;
}

.report-timelines,
.report-specific,
.report-results {
    margin-bottom: 20px;
}

.timeline-select {
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.report-timelines {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.report-timelines select,
.report-timelines input[type="date"],
.report-timelines button {
    margin-right: 10px;
}

.report-timelines select {
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.report-timelines input[type="date"] {
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.report-timelines button {
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}

.report-timelines button:hover {
    background-color: #0056b3;
}

.report-results div {
    margin-bottom: 10px;
}

.report-results h3 {
    margin-top: 0;
}

.report-frame {
    border: 2px solid #ccc;
    padding: 20px;
    border-radius: 10px;
}

.report-frame>* {
    margin-bottom: 15px;
}

.report-results h3 {
    margin-top: 0;
    margin-bottom: 20px;
}

#order-list table {
    width: 100%;
    border-collapse: collapse;
}

#order-list th,
#order-list td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

#order-list th {
    background-color: #f2f2f2;
}

#order-list tr:nth-child(even) {
    background-color: #f9f9f9;
}

#order-list tr:hover {
    background-color: #f2f2f2;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

th {
    background-color: #f2f2f2;
}

.content {
    display: none;
    margin-left: 166px;
    margin-top: 62px;
}

.back-btn {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 5px;
    cursor: pointer;
}

.back-btn:hover {
    background-color: #45a049;
}
</style>
</head>

<body>
    <!-- Code danh mục báo cáo ở đây-->
    <div class="container" style="display : flex; justify-content: space-between;">


        <div class="report">
            <div class="report-timelines" style="display : flex;">

                <select name="timeline-select" id="timeline-select" class="timeline-select">
                    <option value="today">Hôm nay</option>
                    <option value="yesterday">Hôm qua</option>
                    <option value="last-7-days">7 ngày trước</option>
                    <option value="this-month">Trong tháng</option>
                </select>
                Hoặc
                chọn thời gian cụ thể:
                Từ ngày :<input type="date" id="from-date">
                Đến Ngày :
                <input type="date" id="to-date">
                <button onclick="viewReport()">Xem</button>
            </div>
            <div class="report-results">
                <div class="report-frame">
                    <h3>Kết quả báo cáo:</h3>
                    <div id="total-amount">Doanh thu: <p id="total-amount-res"></p>
                    </div>
                    <?php
                   if($_SESSION['role'] == "admin") echo '<div id="total-unit-price">Lợi nhuận: <p id="total-amount-res"></p>
                    </div>';
                    
                    ?>
                    <div id="total-orders">Tổng số đơn hàng: <p id="total-orders-res"></p>
                    </div>
                    <div id="total-products">Số lượng sản phẩm: <p id="total-products-res"> </p>
                    </div>
                    <div id="order-list">
                        <h4>Danh sách đơn hàng:</h4>
                        <table>
                            <thead>
                                <tr>
                                    <th>Ngày</th>
                                    <th>Đơn hàng</th>
                                </tr>
                            </thead>
                            <tbody id="order-list-body">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php 
            // include_once("./model/get_purchase_history.php");
            // $_SESSION['order-detail'] = getOrderDetailByOrderId($_SESSION['order-id']);
            // $renderDetailOrder = "";
            // foreach($_SESSION['order-detail'] as $item){
            //     extract($item);
            //     $renderDetailOrder .= '<tr>
            //                                 <td>'.$product_name.'</td>
            //                                 <td>'.$quantity.'</td>
            //                                 <td>'.$price.'</td>
            //                             </tr>';
            // } 
            ?>
            <div class="detail-content">
                <h2>Chi tiết đơn hàng</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá bán 1 sản phẩm</th>
                        </tr>
                    </thead>
                    <tbody id="detail-body">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
    function renderDetail(arr) {
        let html = "";
        for (let i = 0; i < arr.length; i++) {
            html += `<tr>
            <th>${arr[i].product_name}</th>
            <th>${arr[i].quantity} </th>
            <th>${arr[i].price}</th>
            </tr>
            `;
        }
        document.querySelector("#detail-body").innerHTML = html;
        document.querySelector(".detail-content").style.display = "block";
    }

    function showDetail(order_id) {
        let data = {
            'id': order_id,
        };
        // Make an AJAX request to the PHP endpoint
        let xhr = new XMLHttpRequest();
        xhr.open('POST', './view/handle_get_detail.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful, handle response here
                    let res = JSON.parse(xhr.responseText);
                    renderDetail(res);
                } else {
                    // Handle errors
                    console.error('Error:', xhr.status);
                }
            }
        }
        xhr.send(JSON.stringify(data)); // Send the JSON data
    }

    function renderListOrder(list) {
        let html = "";
        for (let i = 0; i < list.length; i++) {
            let date = new Date(list[i].order_date * 1000);
            const dateString = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear()
            html += `<tr>
                        <th>${dateString}</th>
                        <th>MH${list[i].id} <button type="button" onclick = showDetail(${list[i].id}) style = "width: 12%; border-radius: 5px;cursor: pointer;">
                        Chi tiết  
                        <i class="fa-solid fa-info"></i>
                        </button></th>
                    </tr>
                    `;
        }
        document.querySelector("#order-list-body").innerHTML = html;
    }

    function viewReport() {
        if (document.querySelector("#from-date").value && document.querySelector("#from-date").value) {
            const startTime = document.querySelector("#from-date").value;
            const endTime = document.querySelector("#to-date").value;


            let data = {
                'startTime': startTime,
                'endTime': endTime
            };
            // // Make an AJAX request to the PHP endpoint
            let xhr = new XMLHttpRequest();
            xhr.open('POST', './view/handle_specific_date.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Request was successful, handle response here
                        let res = JSON.parse(xhr.responseText);
                        console.log(res);
                        // total amount for all orders 
                        const profit = res.reportOrder.reduce((accum,
                                currVal) =>
                            accum + currVal.total_amount, 0);

                        const unitPrices = res.reportOrder.reduce((accum,
                                currVal) =>
                            accum + Number(currVal.unit_prices.unit_price), 0);

                        document.querySelector("#total-amount-res").innerHTML = profit;

                        // number of orders 
                        document.querySelector("#total-orders-res").innerHTML = res.reportOrder.length;


                        //total products 
                        document.querySelector("#total-products-res").innerHTML = res.numberOfproducts;

                        //render list order 

                        renderListOrder(res.reportOrder);

                        document.querySelector("#total-unit-price").innerHTML = 'Lợi nhuận: ' + (profit -
                            unitPrices);
                    } else {
                        // Handle errors
                        console.error('Error:', xhr.status);
                    }
                }
            };
            xhr.send(JSON.stringify(data)); // Send the JSON data
        } else {
            const date = document.querySelector("#timeline-select").value;
            // console.log(date);
            let data = {
                'date': date
            };
            // // Make an AJAX request to the PHP endpoint
            let xhr = new XMLHttpRequest();
            xhr.open('POST', './view/handle_select_date.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Request was successful, handle response here
                        let res = JSON.parse(xhr.responseText);
                        console.log(res);
                        // total amount for all orders 
                        const profit = res.reportOrder.reduce((accum,
                                currVal) =>
                            accum + currVal.total_amount, 0);

                        const unitPrices = res.reportOrder.reduce((accum,
                                currVal) =>
                            accum + Number(currVal.unit_prices.unit_price), 0);

                        document.querySelector("#total-amount-res").innerHTML = profit;

                        // number of orders 
                        document.querySelector("#total-orders-res").innerHTML = res.reportOrder.length;


                        //total products 
                        document.querySelector("#total-products-res").innerHTML = res.numberOfproducts;

                        //render list order 

                        renderListOrder(res.reportOrder);

                        document.querySelector("#total-unit-price").innerHTML = 'Lợi nhuận: ' + (profit -
                            unitPrices);
                    } else {
                        // Handle errors
                        console.error('Error:', xhr.status);
                    }
                }
            };
            xhr.send(JSON.stringify(data)); // Send the JSON data
        }
    }
    </script>
</body>

</html>