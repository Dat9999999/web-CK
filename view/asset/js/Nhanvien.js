document.addEventListener("DOMContentLoaded", function () {
  const $ = document.querySelector.bind(document);

  const liststaff = {
    liststaff1: [
      {
        Name: "Lê Tấn Phước",
        CountrySide: "Vũng Tàu",
        Address: "663 Trần Xuân Soạn",
        Country: "Lâm Đồng",
        Position: "Chủ tịch",
        Age: 20,
        Date_worked: "21/2/1999",
      },
      {
        Name: "Huỳnh Tấn Đạt",
        CountrySide: "Quãng Ngãi",
        Address: "Số 123 Nguyễn Trãi",
        Country: "Quãng Ngãi",
        Position: "Lao Công",
        Age: 90,
        Date_worked: "21/2/1992",
      },
      {
        Name: "Nguyễn Đạt Quân",
        CountrySide: "Vĩnh Long",
        Address: "Số 12 Lạc Long Quân",
        Country: "Vĩnh Long",
        Position: "Nhân Viên",
        Age: 27,
        Date_worked: "21/2/2015",
      },
      {
        Name: "Nguyễn Văn Phú",
        CountrySide: "Hà Nội",
        Address: "Số 9 Hồ Hoàn Kiếm",
        Country: "Bình Thuận",
        Position: "Quản Lý",
        Age: 20,
        Date_worked: "21/2/2012",
      },
      {
        Name: "Quan Văn Tú",
        CountrySide: "Thái Bình",
        Address: "Số 23 Hồ Chí Minh",
        Country: "Đồng Nai",
        Position: "Quản Lý",
        Age: 20,
        Date_worked: "21/2/2017",
      },
      {
        Name: "Hoàng Văn Huân",
        CountrySide: "Thành Phố Hồ Chí Minh",
        Address: "Số 67 Huỳnh Tấn Phát",
        Country: "Vũng Tàu",
        Position: "Nhân Viên",
        Age: 20,
        Date_worked: "21/2/2016",
      },
    ],
  };

  const tbody = $(".staff-list-body");
  let allstaffs = liststaff.liststaff1;

  function renderStaffList(staffs) {
    tbody.innerHTML = ""; // Clear existing rows

    (staffs || allstaffs).forEach((staff) => {
      const row = document.createElement("tr");

      // Add staff details to table cells
      // Display basic staff information
      ["Name", "Country", "Position", "Age", "Date_worked"].forEach((key) => {
        const cell = document.createElement("td");
        cell.textContent = staff[key];
        row.appendChild(cell);
      });

      const actionCell = document.createElement("td");
      actionCell.className = "action-cell";
      const editButton = createButton("Sửa", "edit-button", () => {
        showEditForm(staff);
      });
      const deleteButton = createButton("Xóa", "delete-button", () => {
        deleteStaff(staff.Name);
      });
      const detailButton = createButton("Chi tiết", "detail-button", () => {
        showDetails(staff);
      });

      actionCell.append(editButton, deleteButton, detailButton);
      row.appendChild(actionCell);

      tbody.appendChild(row);
    });
  }

  // Utility function to create a button element
  function createButton(text, className, onClick) {
    const button = document.createElement("button");
    button.textContent = text;
    button.classList.add(className);
    button.addEventListener("click", onClick);
    return button;
  }

  // Function to show the edit form with pre-filled data
  function showEditForm(staff) {
    $("#EditName").value = staff.Name;
    $("#EditCountry").value = staff.Country;
    $("#EditPosition").value = staff.Position;
    $("#EditAge").value = staff.Age;

    const editStaffForm = $(".edit-staff-form");
    editStaffForm.style.display = "block";

    // Handle form submission for editing
    editStaffForm.addEventListener("submit", function (event) {
      event.preventDefault();

      const editedStaff = {
        Name: $("#EditName").value.trim(),
        Country: $("#EditCountry").value.trim(),
        Position: $("#EditPosition").value.trim(),
        Age: $("#EditAge").value.trim(),
        Date_worked: staff.Date_worked, // Preserve original date worked
      };

      const index = liststaff.liststaff1.findIndex(
        (s) => s.Name === staff.Name
      );
      if (index !== -1 && confirm("Bạn có chắc là muốn không?")) {
        liststaff.liststaff1[index] = editedStaff;
        renderStaffList(); // Update staff list after editing
        editStaffForm.style.display = "none"; // Hide edit form
      }
    });
  }

  // Function to delete a staff member
  function deleteStaff(name) {
    const index = liststaff.liststaff1.findIndex(
      (staff) => staff.Name === name
    );
    if (index !== -1) {
      liststaff.liststaff1.splice(index, 1);
      renderStaffList(); // Update staff list after deletion
      alert("Đã xóa nhân viên thành công!");
    }
  }

  // Initial rendering of staff list
  renderStaffList();

  // Event listener for search button
  $(".staff-button").addEventListener("click", function () {
    const searchText = $(".input_search").value.trim().toLowerCase();
    const filteredStaff = allstaffs.filter((staff) =>
      staff.Name.toLowerCase().includes(searchText)
    );
    renderStaffList(filteredStaff);
    if (filteredStaff.length === 0) {
      alert("Không tìm thấy nhân viên nào.");
    }
  });

  // Event listener for add button to toggle add staff form visibility
  $(".staff-btnadd").addEventListener("click", function () {
    const addstaffForm = $(".add-staff-form");
    addstaffForm.style.display =
      addstaffForm.style.display === "none" ? "block" : "none";
  });

  // Event listener for submit button in add staff form
  $("#addstaffForm").addEventListener("submit", function (event) {
    event.preventDefault();

    // Retrieve input values
    const Name1 = $("#Name").value.trim();
    const Country1 = $("#Country").value.trim();
    const Position1 = $("#Position").value.trim();
    const Age1 = $("#Age").value.trim();

    // Validate input
    if (!Name1 || !Country1 || !Position1 || !Age1) {
      alert("Vui lòng điền đầy đủ thông tin nhân viên.");
      return;
    }

    // Create a new staff object
    const newStaff = {
      Name: Name1,
      Country: Country1,
      Position: Position1,
      Age: Age1,
      Date_worked: new Date().toLocaleDateString(),
    };

    // Add the new staff to the list
    liststaff.liststaff1.push(newStaff);

    // Update the staff list view
    renderStaffList();

    // Reset the add staff form
    $("#addstaffForm").reset();

    // Hide the add staff form
    $(".add-staff-form").style.display = "none";

    // Show success message
    alert("Thêm nhân viên thành công!");
  });

  // Function to show details of a staff member
  function showDetails(staff) {
    const modalContent = `Thông tin chi tiết:\n
        Tên: ${staff.Name}\n
        Quê Quán:${staff.CountrySide}\n
        Thường Trú: ${staff.Country}\n
        Địa Chỉ Thường Trú: ${staff.Address}\n
        Chức vụ: ${staff.Position}\n
        Tuổi: ${staff.Age}\n
        Ngày bắt đầu làm việc: ${staff.Date_worked}`;
    alert(modalContent);
  }
});
