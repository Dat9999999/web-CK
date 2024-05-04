// const $ = document.querySelector.bind(document);
// const $$ = document.querySelectorAll.bind(document);
// document.addEventListener("DOMContentLoaded", function () {
//   const listProduct = [
//       {
//         img_path:
//           "https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-14_1.png",
//         product: "iPhone 14 128GB  | Chính hãng VN/A",
//         quantity: 10,
//         brands: "Iphone",
//         price: "17.390.000đ",
//         barcode_path: "asset/img/mavach/anhbarcode18.png",
//         Date_created: "21/1/2018",
//       },
//       {
//         img_path:
//           "https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/v/i/vivo-y17s_2_3.png",
//         product: "vivo Y17s 4GB 128GB",
//         quantity: 10,
//         brands: "Vivo",
//         price: "3.690.000đ",
//         barcode_path: "asset/img/mavach/anhbarcode19.png",
//         Date_created: "21/1/2018",
//       },
//     ];

//   const tbody = document.querySelector(".product-list-body");
//   const allProducts = listProduct;
//   shuffleArray(allProducts);
//   // Hiển thị tất cả sản phẩm khi trang được tải
//   displayProducts(allProducts);

//   // Lắng nghe sự kiện click vào nút "Tìm Kiếm"
//   document
//     .querySelector(".product-button")
//     .addEventListener("click", searchProducts);

//   // Lắng nghe sự kiện click vào nút "Thêm Sản Phẩm"
  document
    .querySelector(".product-btnadd")
    .addEventListener("click", function () {
      const addProductForm = document.querySelector(".add-product-form");
      const isVisible = addProductForm.style.display !== "none";

      addProductForm.style.display = isVisible ? "none" : "block";
    });

//   // Lắng nghe sự kiện submit form thêm sản phẩm
//   document
//     .getElementById("addProductForm")
//     .addEventListener("submit", function (event) {
//       event.preventDefault(); // Ngăn chặn hành vi mặc định của form

//       // Lấy giá trị từ các trường input
//       const imgUrl = document.getElementById("imgUrl").value.trim();
//       const productName = document.getElementById("productName").value.trim();
//       const price = document.getElementById("price").value.trim();
//       const brand = document.getElementById("brandInput").value.trim();
//       const currentDate = new Date().toLocaleDateString();

//       // Kiểm tra nếu có trường nào trống thì hiển thị cảnh báo
//       if (imgUrl === "" || productName === "" || price === "" || brand === "") {
//         alert("Vui lòng điền đầy đủ thông tin sản phẩm.");
//         return;
//       }

//       // Tạo đối tượng sản phẩm mới
//       const newProduct = {
//         img_path: imgUrl,
//         product: productName,
//         quantity: "10",
//         brands: brand,
//         price: price,
//         Date_created: currentDate,
//       };

//       // Thêm sản phẩm mới vào danh sách
//       listProduct.push(newProduct);

//       // Hiển thị lại danh sách sản phẩm sau khi thêm
//       displayProducts(listProduct);

//       // Reset form sau khi thêm thành công
//       document.getElementById("addProductForm").reset();

//       // Ẩn form sau khi thêm sản phẩm
//       document.querySelector(".add-product-form").style.display = "none";

//       // Hiển thị thông báo thành công
//       alert("Thêm sản phẩm thành công!");
//     });
//   // Hàm hiển thị danh sách sản phẩm trên bảng
//   function displayProducts(products) {
//     tbody.innerHTML = ""; // Xóa danh sách sản phẩm hiện tại

//     products.forEach((product) => {
//       const row = createProductRow(product);
//       tbody.appendChild(row);
//     });
//   }
//   function updateProduct(updatedProduct) {
//     const index = listProduct.findIndex(
//       (product) => product.id === updatedProduct.id
//     );
//     if (index !== -1) {
//       listProduct[index].img_path = updatedProduct.img_path;
//       listProduct[index].product = updatedProduct.product;
//       listProduct[index].price = updatedProduct.price;
//       listProduct[index].brands = updatedProduct.brands;
//     }
//   }
//   // Hàm tạo một hàng cho sản phẩm
//   function createProductRow(product) {
//     const row = document.createElement("tr");

//     // Ô chứa hình ảnh sản phẩm và thông tin
//     const productCell = document.createElement("td");
//     const productInfo = document.createElement("div");
//     productInfo.className = "product-info";

//     // Thêm hình ảnh sản phẩm
//     const productImg = document.createElement("img");
//     productImg.src = product.img_path;
//     productImg.alt = product.product;
//     productImg.className = "product__img";
//     productInfo.appendChild(productImg);

//     // Thêm tên sản phẩm
//     const productName = document.createElement("div");
//     productName.textContent = product.product;
//     productInfo.appendChild(productName);

//     // Thêm vào ô sản phẩm
//     productCell.appendChild(productInfo);
//     row.appendChild(productCell);

//     // Ô chứa số lượng sản phẩm
//     const quantityCell = document.createElement("td");
//     quantityCell.textContent = product.quantity;
//     row.appendChild(quantityCell);

//     // Ô chứa thương hiệu
//     const brandCell = document.createElement("td");
//     brandCell.textContent = product.brands;
//     row.appendChild(brandCell);

//     // Ô chứa giá
//     const priceCell = document.createElement("td");
//     priceCell.textContent = product.price;
//     row.appendChild(priceCell);

//     // Ô chứa ngày tạo
//     const dateCell = document.createElement("td");
//     dateCell.textContent = product.Date_created;
//     row.appendChild(dateCell);

//     // Ô chứa mã vạch
//     const qrCell = document.createElement("td");
//     qrCell.className = "barcode-cell";

//     // Thêm hình ảnh mã vạch vào ô mã vạch
//     const qrImg = document.createElement("img");
//     qrImg.src = product.barcode_path;
//     qrImg.alt = "Barcode";
//     qrImg.className = "barcode";
//     qrCell.appendChild(qrImg);

//     // Thêm ô mã vạch vào hàng
//     row.appendChild(qrCell);

//     const actionCell = document.createElement("td");
//     actionCell.className = "action-cell";

//     const editButton = document.createElement("button");
//     editButton.textContent = "Sửa";
//     editButton.classList.add("edit-button");
//     editButton.addEventListener("click", function () {
//       document.getElementById("editProductForm").style.display = "block";
//       document.getElementById("editProductName").value = product.product;
//       document.getElementById("editPrice").value = product.price;
//       document.getElementById("editBrand").value = product.brands;
//     });
//     actionCell.appendChild(editButton);

//     const deleteButton = document.createElement("button");
//     deleteButton.textContent = "Xóa";
//     deleteButton.classList.add("delete-button");
//     deleteButton.addEventListener("click", function () {
//       if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")) {
//         const index = listProduct.findIndex(
//           (item) => item.id === product.id
//         );
//         if (index !== -1) {
//           listProduct.splice(index, 1);
//           displayProducts(listProduct);
//           alert("Đã xóa sản phẩm thành công!");
//         }
//       }
//     });
//     actionCell.appendChild(deleteButton);

//     row.appendChild(actionCell);

//     return row;
//   }

//   // Lắng nghe sự kiện submit form sửa sản phẩm
//   document
//     .getElementById("editProductForm")
//     .addEventListener("submit", function (event) {
//       event.preventDefault();
//       const editedProduct = {
//         product: document.getElementById("editProductName").value.trim(),
//         price: document.getElementById("editPrice").value.trim(),
//         brands: document.getElementById("editBrand").value.trim(),
//       };

//       updateProduct(editedProduct);
//       displayProducts(listProduct);
//       document.getElementById("editProductForm").style.display = "none"; // Ẩn form sau khi sửa thành công
//     });
//   document
//     .getElementById("editProductForm")
//     .addEventListener("Close", function (event) {
//       event.preventDefault();
//       document.getElementById("editProductForm").style.display = "none";
//     });
//   function searchProducts() {
//     const searchText = document
//       .querySelector(".input_search")
//       .value.trim()
//       .toLowerCase(); // Lấy từ khoá tìm kiếm
//     const selectedBrand = document.getElementById("brand").value.toLowerCase(); // Lấy thương hiệu được chọn

//     let filteredProducts = [];

//     if (searchText === "" && selectedBrand === "") {
//       // Người dùng không nhập từ khoá tìm kiếm và không chọn thương hiệu, hiển thị một sản phẩm ngẫu nhiên
//       filteredProducts = [getRandomProduct(allProducts)];
//     } else {
//       // Ngược lại, thực hiện tìm kiếm theo từ khoá và thương hiệu
//       filteredProducts = allProducts.filter((product) => {
//         const productName = product.product.toLowerCase();

//         // Kiểm tra xem từ khoá tìm kiếm có tồn tại trong tên sản phẩm không
//         const matchesSearchText = productName.includes(searchText);

//         // Kiểm tra thương hiệu sản phẩm có khớp với thương hiệu được chọn không
//         const matchesBrand =
//           selectedBrand === "" ||
//           product.brands.toLowerCase() === selectedBrand;

//         return matchesSearchText && matchesBrand;
//       });
//     }
//     displayProducts(filteredProducts);

//     if (filteredProducts.length === 0) {
//       // Hiển thị thông báo khi không tìm thấy sản phẩm nào
//       tbody.innerHTML = "";
//       const noProductRow = document.createElement("tr");
//       const noProductCell = document.createElement("td");
//       noProductCell.colSpan = 5; // Sét cột dài nhất của hàng thông báo
//       noProductCell.textContent = "Không tìm thấy sản phẩm.";
//       noProductRow.appendChild(noProductCell);
//       tbody.appendChild(noProductRow);
//     }
//   }
//   function shuffleArray(array) {
//     for (let i = array.length - 1; i > 0; i--) {
//       const j = Math.floor(Math.random() * (i + 1));
//       [array[i], array[j]] = [array[j], array[i]];
//     }
//   }
// });
