// function createCustomerAccount() {
//     var customerName = document.getElementById('customerFullName').value;
//     var customerAddress = document.getElementById('customerAddressInfo').value;
//     var customerPhone = document.getElementById('customerPhoneCheckout').value;

//     document.getElementById('customerFullNameDisplay').innerText = customerName;
//     document.getElementById('customerAddressInfoDisplay').innerText = customerAddress;
//     document.getElementById('customerPhoneInfoDisplay').innerText = customerPhone;
//     document.getElementById('customerInfo').style.display = 'block';
//     document.getElementById('customerForm').style.display = 'none';
// }

// function checkout() {
//     var customerPhone = document.getElementById('customerPhoneCheckout').value;
//     var errorMessage = document.getElementById('errorMessage');

//     if (customerPhone.trim() === '') {
//         errorMessage.innerText = 'Vui lòng nhập số điện thoại';
//         document.getElementById('customerPhoneCheckout').focus();
//         return;
//     }

//     errorMessage.innerText = '';

//     var customerInfo = getCustomerInfo(customerPhone);
//     if (customerInfo) {
//         document.getElementById('customerFullNameDisplay').innerText = customerInfo.fullName;
//         document.getElementById('customerAddressInfoDisplay').innerText = customerInfo.address;
//         document.getElementById('customerPhoneInfoDisplay').innerText = customerPhone;
//         document.getElementById('customerInfo').style.display = 'block';
//         document.getElementById('customerForm').style.display = 'none';

//         var purchaseHistoryTable = document.getElementById('purchaseHistory');
//         var purchaseHistoryHtml = '';
//         customerInfo.purchaseHistory.forEach(function(order) {
//             purchaseHistoryHtml += '<tr>';
//             purchaseHistoryHtml += '<td>' + order.orderId + '</td>';
//             purchaseHistoryHtml += '<td>' + order.date + '</td>';
//             purchaseHistoryHtml += '<td>' + order.totalAmount + '</td>';
//             purchaseHistoryHtml += '<td>' + createOrderButton(order.orderId) + '</td>';
//             purchaseHistoryHtml += '</tr>';
//         });
//         purchaseHistoryTable.innerHTML = purchaseHistoryHtml;

//         document.getElementById('customerInfo').style.display = 'block';
//         document.getElementById('customerForm').style.display = 'none';

//     } else {
//         document.getElementById('customerFullNameDisplay').innerText = '';
//         document.getElementById('customerAddressInfoDisplay').innerText = '';
//         document.getElementById('customerPhoneInfoDisplay').innerText = customerPhone;
//         document.getElementById('customerInfo').style.display = 'none';
//         document.getElementById('customerForm').style.display = 'block';
//     }
    
// }

// function getCustomerInfo(customerPhone) {
//     var customers = {
//         '0123456789': {
//             fullName: 'Nguyễn Văn A',
//             address: '123 Đường ABC, Quận XYZ',
//             purchaseHistory: [
//                 {
//                     orderId: 'DH001',
//                     date: '2024-04-20',
//                     totalAmount: 20000000,
//                     paidAmount: 20000000,
//                     changeAmount: 0,
//                     productList: [
//                         { productName: 'iPhone 13 Pro Max', quantity: 1, price: 20000000 }
//                     ]
//                 },
//                 {
//                     orderId: 'DH002',
//                     date: '2024-04-18',
//                     totalAmount: 18000000,
//                     paidAmount: 20000000,
//                     changeAmount: 2000000,
//                     productList: [
//                         { productName: 'Samsung Galaxy S22 Ultra', quantity: 1, price: 18000000 }
//                     ]
//                 },
//                 {
//                     orderId: 'DH003',
//                     date: '2024-04-15',
//                     totalAmount: 25000000,
//                     paidAmount: 25000000,
//                     changeAmount: 0,
//                     productList: [
//                         { productName: 'Google Pixel 7 Pro', quantity: 1, price: 25000000 }
//                     ]
//                 }
//             ]
//         }
//     };

//     return customers[customerPhone];
// }

// function showOrderDetails(orderId) {
//     var customerInfo = getCustomerInfo('0123456789'); // Đây là số điện thoại của khách hàng
//     var order = customerInfo.purchaseHistory.find(function(order) {
//         return order.orderId === orderId;
//     });

//     if (order) {
//         document.getElementById('orderId').innerText = order.orderId;
//         var orderDetailsTable = document.getElementById('orderDetailsBody');
//         var orderDetailsHtml = '';
//         order.productList.forEach(function(product) {
//             orderDetailsHtml += '<tr>';
//             orderDetailsHtml += '<td>' + product.productName + '</td>';
//             orderDetailsHtml += '<td>' + product.quantity + '</td>';
//             orderDetailsHtml += '<td>' + order.date + '</td>';
//             orderDetailsHtml += '<td>' + order.totalAmount + '</td>';
//             orderDetailsHtml += '<td>' + order.paidAmount + '</td>';
//             orderDetailsHtml += '<td>' + order.changeAmount + '</td>';
//             orderDetailsHtml += '</tr>';
//         });
//         orderDetailsTable.innerHTML = orderDetailsHtml;

//         document.getElementById('orderDetails').style.display = 'block';
//     }
// }

// function createOrderButton(orderId) {
//     return '<button class="order-details-button" onclick="showOrderDetails(\'' + orderId + '\')">Xem chi tiết</button>';
// }


