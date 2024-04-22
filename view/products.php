<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      rel="stylesheet"
      href="./view/asset/font/fontawesome-free-6.5.1-web/css/all.min.css"
    />
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="./view/asset/css/home.css" />
    <link rel="stylesheet" href="./view/asset/css/Product.css" />
  </head>
  <body>
    <!-- order -->

    <!-- product -->
    <div class="product">
      <h2>Danh sách sản phẩm</h2>
      <div class="product-header">
        <label class="product-item">Tìm Kiếm:</label>
        <input
          placeholder="Tìm Kiếm"
          type="text"
          name="text"
          class="input_search"
        />
        <label class="product-item">Hãng</label>
        <select name="brand" id="brand" class="brand">
          <option value="">Chọn</option>
          <option value="samsung">Samsung</option>
          <option value="iphone">iPhone</option>
          <option value="oppo">Oppo</option>
          <option value="vivo">Vivo</option>
        </select>
        <button class="product-button">Tìm Kiếm</button>
        <button class="product-btnadd">
          <i class="fa-solid fa-circle-plus" onclick=""></i> Thêm Sản Phẩm
        </button>
        <div class="form-addPro">
          <form id="addProductForm" class="add-product-form">
            <label for="title" class="title">Thêm Sản Phẩm</label><br />
            <div class="input1">
              <label for="Img">Thêm Hình ảnh: </label>
              <input type="file" id="imgUrl" placeholder="Image URL" /><br />
            </div>
            <div class="input1">
              <label for="Img">Thêm Tên Sản Phẩm: </label>
              <input
                type="text"
                id="productName"
                placeholder="Product Name"
              /><br />
            </div>
            <div class="input1">
              <label for="Img">Giá: </label>
              <input type="text" id="price" placeholder="Price" /><br />
            </div>
            <div class="input1">
              <label for="Img">Thương hiệu: </label>
              <input type="text" id="brandInput" placeholder="Brand" /><br />
            </div>
            <button type="submit">Add Product</button>
          </form>
        </div>
        <!--  -->
        <!--  -->
        <div class="form-editPro">
          <form id="editProductForm" class="edit-product-form">
            <label for="">Sửa Sản Phẩm</label><br />
            <input type="file" id="editImgUrl" placeholder="Image URL" />
            <img
              id="editPreviewImage"
              src="#"
              alt="Preview Image"
              style="max-width: 200px; max-height: 200px; display: none"
            />
            <input
              type="text"
              id="editProductName"
              placeholder="Product Name"
            />
            <input type="text" id="editPrice" placeholder="Price" />
            <input type="text" id="editBrand" placeholder="Brand" />
            <button type="submit">Sửa</button>
            <button type="Close">Hủy</button>
          </form>
        </div>

        <table class="product-list">
          <thead>
            <tr>
              <th>Thông tin Sản Phẩm</th>
              <th>Số lượng</th>
              <th>Loại</th>
              <th>Giá</th>
              <th>Ngày khởi tạo</th>
              <th>Mã</th>
              <th>Thêm</th>
            </tr>
          </thead>
          <tbody class="product-list-body">

          </tbody>
        </table>
      </div>
    </div>
    <!-- JavaScript -->
    <!-- <script src="./view/asset/js/Home.js"></script> -->
    <!-- <script src="./view/asset/js/Product.js"></script> -->
  </body>
</html>
