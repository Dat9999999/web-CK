<link rel="stylesheet" href="./view/asset/css/Nhanvien.css" />
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
        <form id="addstaffForm" class="add-staff-form">
          <label for="">Thêm Nhân Viên</label><br />
          <input type="text" id="Name" placeholder="Name" />
          <input type="text" id="Country" placeholder="Country" />
          <input type="text" id="Position" placeholder="Position" />
          <input type="text" id="Age" placeholder="Age" />
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
          <tbody class="staff-list-body"></tbody>
        </table>
      </div>
    </div>
    <!-- JavaScript -->
    <script src="./asset/js/Home.js"></script>
    <script src="./asset/js/Nhanvien.js"></script>