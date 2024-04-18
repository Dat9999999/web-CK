// Định nghĩa danh sách sản phẩm
const productList = [
  { brand: "Iphone", remaining: 10 },
  { brand: "Samsung", remaining: 15 },
  { brand: "Oppo", remaining: 8 },
  { brand: "Other", remaining: 5 },
];

// Hàm để cập nhật nội dung HTML của các phần tử trong danh sách sản phẩm
function updateProductCounts() {
  const productContainer = document.querySelector(".product-portfolio-detail");

  // Xóa nội dung hiện tại của productContainer
  productContainer.innerHTML = "";

  // Duyệt qua danh sách sản phẩm và tạo HTML sử dụng template string
  productList.forEach((product) => {
    const html = `
        <div class="item">
          <div class="item-product" style="background-image: url(${getImageUrl(
            product.brand
          )})"></div>
          <div class="infor">
            <h3>${product.brand}</h3>
            <p>Số Sản Phẩm Còn Lại: <span>${product.remaining}</span></p>
          </div>
        </div>
      `;

    // Thêm HTML vào productContainer
    productContainer.innerHTML += html;
  });
}
function getImageUrl(brand) {
  // Thay đổi URL hình ảnh dựa trên tên thương hiệu
  switch (brand) {
    case "Iphone":
      return "https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/_/t_m_18_1_3_2.png";
    case "Samsung":
      return "https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/m/sm-a556_galaxy_a55_awesome_lilac_ui.png";
    case "Oppo":
      return "https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/f/i/find_n3_-_combo_product_-_gold.png";
    default:
      return "https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/e/0/e061bd2ab13b5e2263236cb206248daa_1_2.png";
  }
}
// Gọi hàm CountProduct để tính toán và cập nhật số lượng ban đầu khi tải trang
// Gọi hàm updateProductCounts để cập nhật nội dung ban đầu
updateProductCounts();
