<link rel="stylesheet" href="./view/asset/css/Nhanvien.css" />
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
<div class="staff">
      <h2>Danh sách nhân viên</h2>
      <div class="staff-header">
        <label class="staff-item">Tìm Kiếm:</label>
        <input
          placeholder="Tìm Kiếm"
          type="text"
          name="text"
          class="input_search"
        />
        <button class="staff-button">Tìm Kiếm</button>
        <button class="staff-btnadd">Thêm Nhân Viên</button>
        <form action ="employee.php" method="post"  id="addstaffForm" class="add-staff-form">
          <label for="">Thêm Nhân Viên</label><br />
          <input type="text" id="Name" placeholder="Name" />
          <input type="email" id="email" placeholder="email" />
          <button type="submit" onclick="addStaff()">Add staff</button>
        </form>

        <table class="staff-list">
          <thead>
            <tr>
              <th>Thông tin Nhân Viên</th>
              <th>Quê Quán</th>
              <th>Chức Vụ</th>
              <th>Tuổi</th>
              <th>Ngày bắt đầu làm</th>
            </tr>
          </thead>
          <tbody class="staff-list-body">
             
          </tbody>
        </table>
      </div>
    </div>
    <!-- JavaScript -->
    <script src="./asset/js/Home.js"></script>
    <script src="./asset/js/Nhanvien.js"></script>