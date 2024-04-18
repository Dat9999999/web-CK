const $ = document.querySelector.bind(document);

document.addEventListener("DOMContentLoaded", function () {
  const liststaff = {
    liststaff1: [
      {
        Name: "Lê Tấn Phước",
        Country: "Lâm Đồng",
        Position: "Chủ tịch",
        Age: 20,
        Date_worked: "21/2/1999",
      },
      {
        Name: "Huỳnh Tấn Đạt",
        Country: "Quãng Ngãi",
        Position: "Lao Công",
        Age: 90,
        Date_worked: "21/2/1992",
      },
      {
        Name: "Nguyễn Văn Phú",
        Country: "Bình Thuận",
        Position: "Quản Lý",
        Age: 20,
        Date_worked: "21/2/2012",
      },
      {
        Name: "Quan Văn Tú",
        Country: "Đồng Nai",
        Position: "Quản Lý",
        Age: 20,
        Date_worked: "21/2/2017",
      },
      {
        Name: "Hoàng Văn Huân",
        Country: "Vũng Tàu",
        Position: "Nhân Viên",
        Age: 20,
        Date_worked: "21/2/2016",
      },
    ],
  };

  const tbody = $(".staff-list-body");
  const allstaffs = liststaff.liststaff1;
  shuffleArray(allstaffs);

  renderStaffList(); // Hiển thị danh sách nhân viên ban đầu

  document
    .querySelector(".staff-button")
    .addEventListener("click", searchStaff);

  document
    .querySelector(".staff-btnadd")
    .addEventListener("click", function () {
      const addstaffForm = document.querySelector(".add-staff-form");
      const isVisible = addstaffForm.style.display !== "none";
      addstaffForm.style.display = isVisible ? "none" : "block";
    });

  document
    .getElementById("addstaffForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();

      const Name1 = $("#Name").value.trim();
      const Country1 = $("#Country").value.trim();
      const Position1 = $("#Position").value.trim();
      const Age1 = $("#Age").value.trim();
      const currentDate1 = new Date().toLocaleDateString();

      if (!Name1 || !Country1 || !Position1 || !Age1) {
        alert("Vui lòng điền đầy đủ thông tin nhân viên.");
        return;
      }

      const newStaff = {
        Name: Name1,
        Country: Country1,
        Position: Position1,
        Age: Age1,
        Date_worked: currentDate1,
      };

      liststaff.liststaff1.push(newStaff); // Thêm nhân viên mới vào danh sách

      renderStaffList(); // Hiển thị lại danh sách nhân viên sau khi thêm

      $("#addstaffForm").reset(); // Đặt lại form sau khi thêm thành công

      $(".add-staff-form").style.display = "none"; // Ẩn form thêm nhân viên

      alert("Thêm nhân viên thành công!");
    });

  function renderStaffList() {
    tbody.innerHTML = "";

    allstaffs.forEach((staff) => {
      const row = document.createElement("tr");
      row.innerHTML = `
        <td>${staff.Name}</td>
        <td>${staff.Country}</td>
        <td>${staff.Position}</td>
        <td>${staff.Age}</td>
        <td>${staff.Date_worked}</td>
      `;
      tbody.appendChild(row);
    });
  }

  function searchStaff() {
    const searchText = $(".input_search").value.trim().toLowerCase();

    const filterstaff = allstaffs.filter((staff) => {
      const staffName = staff.Name.toLowerCase();
      return staffName.includes(searchText);
    });

    renderStaffList(filterstaff);

    if (filterstaff.length === 0) {
      tbody.innerHTML = "";
      const nostaffRow = document.createElement("tr");
      const nostaffCell = document.createElement("td");
      nostaffCell.colSpan = 5; // Sét cột dài nhất của hàng thông báo
      nostaffCell.textContent = "Không tìm thấy nhân viên nào.";
      nostaffRow.appendChild(nostaffCell);
      tbody.appendChild(nostaffRow);
    }
  }

  function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [array[i], array[j]] = [array[j], array[i]];
    }
  }
});
