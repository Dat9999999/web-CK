<?php
session_start();
$products = '';
include_once("./model/get_list_products.php");
$products = getListProducts();
$renderListPro = '';

if($products){
  foreach($products as $item){
    extract($item);
    $creationalDate = date('d-m-Y',$creationalDate);
    if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
      $renderListPro .= '<tr id = "barcode-'.$barcode.'">
              <th >'.$productName.'</th>
              <th>'.$catalog.'</th>
              <th>'.$originalPrice.'</th>
              <th>'.$price.'</th>
              <th>'.$creationalDate.'</th>
              <th>'.$barcode.'</th>
              <th style = "background-color:">
                <button type = "button" onclick = editProduct('.$barcode.')>
                <i class="fa-solid fa-pen"></i>
                <button>

                <button style = "background-color:red; cursor:pointer;" type = "button">
                <a style = "color:#fff" href = "index.php?pg=del-product&id-product='.$id.'">
                <i class="fa-solid fa-trash"></i>
                </a>
                <button>
              </th>
              <div class = "editForm">
                <div style = "display:none;"id = "edit_'.$barcode.'" class = "">
                <p style = "text-align: center; font-size:1.7rem;">Bạn đang thực hiện thay đổi trên sản phẩm: '.$productName.'</p>
                <form action="index.php?pg=edit-product" method="post" style="display: flex; flex-direction: column;">
                <div style="display: flex; align-items: center;">
                <label style ="width:20%; font-size:18px;" for="productName">Tên sản phẩm</label>
                <input required style = "flex:1; height : 32px; margin:12px;" type="text" name="productName" placeholder="Tên sản phẩm"><br>
                </div>
                <div style="display: flex; align-items: center;">
                <label style ="width:20%; font-size:18px;" for="productName">Danh mục</label>
                  <input required style = "flex:1; height : 32px; margin:12px;" type="text" name="catalog" placeholder="Danh mục"><br>
                </div> 
                <div style="display: flex; align-items: center;">
                <label style ="width:20%; font-size:18px;" for="productName">Giá nhập</label> 
                <input required style = "flex:1; height : 32px; margin:12px;" type="number" min = "0" name="originalPrice" placeholder="Giá nhập"><br>
                </div> 
                <div style="display: flex; align-items: center;">
                <label style ="width:20%; font-size:18px;" for="productName">Giá bán</label>
                  <input required style = "flex:1; height : 32px; margin:12px;" type="number" min = "0" name="price" placeholder="Giá bán"><br>
                </div>
                  <div style="display: flex; align-items: center;">
                <label style ="width:20%; font-size:18px;" for="productName">Ngày khởi tạo</label>
                  <input required style = "flex:1; height : 32px; margin:12px;" type="date" name="creationalDate" placeholder="Ngày tạo"><br>
                </div>
                  <div style="display: flex; align-items: center;">
                  <label style ="width:20%; font-size:18px;" for="productName">Mã</label>
                  <input required style = "flex:1; height : 32px; margin:12px;" type="text" name="barcode" placeholder="mã"><br>
                  </div>

                  <div style ="display: flex; justify-content:center;">
                    <button style = "background-color:#294031;    
                    color: #fff;
                    border-radius: 5px;
                    width: 86px;
                    height: 32px;
                    margin-right:16px;" type="submit">Thay đổi</button>
                    <input type = "hidden" name = "btnUpdateProduct" value ="'.$id.'">

                    <button style = "background-color:#f8482e;    
                    color: #fff;
                    border-radius: 5px;
                    width: 86px;
                    height: 32px;" 
                    type="button" onclick = hideEdit('.$barcode.')>hủy</button>
                  </div>
                  </form>
                </div>
              </div>
            </tr>
            ';
    }
    else{
      $renderListPro .= '<tr>
              <th>'.$productName.'</th>
              <th>'.$catalog.'</th>
              <th>'.$price.'</th>
              <th>'.$creationalDate.'</th>
              <th>'.$barcode.'</th>
            </tr>';
    }
  }
}
?>

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
    <!-- <link rel="stylesheet" href="./view/asset/css/home.css" /> -->
    <link rel="stylesheet" href="./view/asset/css/Product.css" />
  </head>
    <script>
      function hideEdit(barcode){
        document.querySelector(`#edit_${barcode}`).style.display = "none"; 
      }

      function hideAdd(){
        document.querySelector(`.form-addPro`).style.display = "none"; 
      }

      function editProduct(barcode){
        const form = document.querySelector(".show");
        if(form){
          form.style.display = "none";
          form.classList.remove("show");
        }

        hideAdd();
        
        document.querySelector(`#edit_${barcode}`).style.display = "block";  
        document.querySelector(`#edit_${barcode}`).classList.add("show");
      }


      function addProduct(){
        document
    .querySelector(".product-btnadd")
    .addEventListener("click", function () {
      if(document.querySelector(".show")){
          document.querySelector(".show").style.display = "none";
          document.querySelector(".show").classList.remove("show");
        }
      const addProductForm = document.querySelector(".form-addPro");
      addProductForm.style.display ="block";
    });
      }
    </script>
  <body>
    <!-- order -->

    <!-- product -->
    <div class="product">
      <?php
        if(isset($_GET['error']) && $_GET['error'] = 'del'){
          echo '<script>alert("Không thể xóa sản phẩm này");</script>';
        }
      ?>
      <h2>Danh sách sản phẩm</h2>
      <div class="product-header">
        <?php
        if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
          echo '
          <button class="product-btnadd" onclick= addProduct()>
            <i class="fa-solid fa-circle-plus" ></i> Thêm Sản Phẩm
          </button>
          ';
        }
        
        ?>
        <div class="form-addPro" id = "form-addPro" style = "display:none;">
          <div id = "" class = "">
                <p style = "text-align: center; font-size:1.7rem;">Thêm sản phẩm mới</p>
                <form action="index.php?pg=add-product" method="post" style="display: flex; flex-direction: column;">
                <div style="display: flex; align-items: center;">
                <label style ="width:20%; font-size:18px;" for="productName">Tên sản phẩm</label>
                <input required style = "flex:1; height : 32px; margin:12px;" type="text" name="productName" placeholder="Tên sản phẩm"><br>
                </div>
                <div style="display: flex; align-items: center;">
                <label style ="width:20%; font-size:18px;" for="productName">Danh mục</label>
                  <input required style = "flex:1; height : 32px; margin:12px;" type="text" name="catalog" placeholder="Danh mục"><br>
                </div> 
                <div style="display: flex; align-items: center;">
                <label style ="width:20%; font-size:18px;" for="productName">Giá nhập</label> 
                <input required style = "flex:1; height : 32px; margin:12px;" type="number" min = "0" name="originalPrice" placeholder="Giá nhập"><br>
                </div> 
                <div style="display: flex; align-items: center;">
                <label style ="width:20%; font-size:18px;" for="productName">Giá bán</label>
                  <input required style = "flex:1; height : 32px; margin:12px;" type="number" min = "0" name="price" placeholder="Giá bán"><br>
                </div>
                  <div style="display: flex; align-items: center;">
                <label style ="width:20%; font-size:18px;" for="productName">Ngày khởi tạo</label>
                  <input required style = "flex:1; height : 32px; margin:12px;" type="date" name="creationalDate" placeholder="Ngày tạo"><br>
                </div>
                  <div style="display: flex; align-items: center;">
                  <label style ="width:20%; font-size:18px;" for="productName">Mã</label>
                  <input required style = "flex:1; height : 32px; margin:12px;" type="text" name="barcode" placeholder="mã"><br>
                  </div>

                  <div style ="display: flex; justify-content:center;">
                    <button style = "background-color:#294031;    
                    color: #fff;
                    border-radius: 5px;
                    width: 86px;
                    height: 32px;
                    margin-right:16px;" type="submit">Thay đổi</button>
                    <input type = "hidden" name = "btnAddProduct" value ="add">

                    <button style = "background-color:#f8482e;    
                    color: #fff;
                    border-radius: 5px;
                    width: 86px;
                    height: 32px;" 
                    type="button" onclick = hideAdd()>hủy</button>
                  </div>
                  </form>
                </div> 
        </div>
        <table class="product-list">
          <thead>
              <?php
                if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
                  echo '<tr>
                          <th>Tên Sản Phẩm</th>
                          <th>Danh mục</th>
                          <th>Giá nhập</th>
                          <th>Giá Bán</th>
                          <th>Ngày khởi tạo</th>
                          <th>Mã</th>
                        </tr>';
                }
                else{
                  echo '<tr>
                          <th>Tên Sản Phẩm</th>
                          <th>Danh mục</th>
                          <th>Giá Bán</th>
                          <th>Ngày khởi tạo</th>
                          <th>Mã</th>
                        </tr>';
                }
              ?>
            
          </thead>
          <tbody class="product-list-body">
                <?=$renderListPro?>
        </tbody>
        </table>
      </div>
    </div>
    <!-- JavaScript -->
    <!-- <script src="./view/asset/js/Home.js"></script> -->
  </body>
</html>
