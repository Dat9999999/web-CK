<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      rel="stylesheet"
      href="./asset/font/fontawesome-free-6.5.1-web/css/all.min.css"
    />
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="./view/asset/css/home.css" />
    <link rel="stylesheet" href="./view/asset/css/Nhanvien.css" />
  </head>
  <body>
    <!-- ------------->
    <div class="staff">
      <h2>Danh sách nhân viên</h2>

      <div class="staff-header">
        <!-- <label class="staff-item">Tìm Kiếm:</label>
        <input
          placeholder="Tìm Kiếm"
          type="text"
          name="text"
          class="input_search"
        />
        <button class="staff-button">Tìm Kiếm</button> -->

        <button class="staff-btnadd" onclick= addStaff()>Thêm Nhân Viên</button>

        <form action = "index.php?pg=add-staff" method = "post" id="addstaffForm" class="add-staff-form">
          <label for="">Thêm Nhân Viên</label><br />
          <!-- <input type="file" id="imgUrl" /> -->
          <input required name = "staff-name" type="text" id="Name" placeholder="Name" />
          <input required name = "staff-email" type="email" id="Email" placeholder="Email"/>
          
          <input type="hidden" name = "btn-add-staff" value ="1">
          <button type="submit">Thêm Nhân Viên</button>
        </form>

        <!-- <form id="editStaffForm" class="edit-staff-form">
          <label for="">Sửa nhân viên</label><br />
          <input type="file" id="imgUrl" />

          <input type="text" id="EditName" placeholder="Tên" />
          <input type="text" id="EditCountry" placeholder="Quê quán" />
          <input type="text" id="EditPosition" placeholder="Chức vụ" />
          <input type="text" id="EditAge" placeholder="Tuổi" />
          <button type="submit">Lưu</button>
        </form> -->

        <table class="staff-list">
          <thead>
            <tr>
              <th>Họ tên</th>
              <th>Email</th>
              <th>avtar</th>
            </tr>
          </thead>
          <tbody class="staff-list-body" id="staffListBody">
            <tr>
              <th>Huynh Dat</th>
              <th>123@gmail.com</th>
              <th><img src="./asset/img/avatar/unkown.jpg" width ="100%"></th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- JavaScript -->
    <script src="./view/asset/js/Home.js"></script>
    <script src="./view/asset/js/Nhanvien.js"></script>
  </body>
</html>
