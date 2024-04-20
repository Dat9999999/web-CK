document.addEventListener("DOMContentLoaded", function () {
  const menuItems = document.querySelectorAll(".menu-item");
  const data = [
    { month: "Tháng trước", quantity: 200 },
    { month: "Tháng này", quantity: 300 },
  ];

  // Định nghĩa kích thước và margin của biểu đồ
  const width = 925;
  const height = 345;
  const margin = { top: 50, right: 50, bottom: 50, left: 50 };

  // Tạo đối tượng biểu đồ sử dụng d3.js
  const svg = d3
    .select("#overview-order-chart")
    .append("svg")
    .attr("width", width)
    .attr("height", height);

  // Định nghĩa hàm vẽ biểu đồ đường
  function drawLineChart(data) {
    const xScale = d3
      .scaleBand()
      .domain(data.map((d) => d.month))
      .range([margin.left, width - margin.right])
      .padding(0.5);

    const yScale = d3
      .scaleLinear()
      .domain([0, d3.max(data, (d) => d.quantity)])
      .range([height - margin.bottom, margin.top]);

    const line = d3
      .line()
      .x((d) => xScale(d.month) + xScale.bandwidth() / 2)
      .y((d) => yScale(d.quantity));

    svg
      .append("path")
      .datum(data)
      .attr("fill", "none")
      .attr("stroke", "#294031")
      .attr("stroke-width", 2)
      .attr("d", line);

    svg
      .selectAll("circle")
      .data(data)
      .enter()
      .append("circle")
      .attr("cx", (d) => xScale(d.month) + xScale.bandwidth() / 2)
      .attr("cy", (d) => yScale(d.quantity))
      .attr("r", 5)
      .attr("fill", "#294031");

    // Add x-axis
    svg
      .append("g")
      .attr("transform", `translate(0, ${height - margin.bottom})`)
      .call(d3.axisBottom(xScale));

    // Add y-axis
    svg
      .append("g")
      .attr("transform", `translate(${margin.left}, 0)`)
      .call(d3.axisLeft(yScale));
  }

  // Gọi hàm vẽ biểu đồ đường với dữ liệu đã cho
  drawLineChart(data);
  menuItems.forEach(function (menuItem) {
    menuItem.addEventListener("click", function () {
      const submenuId = menuItem.id + "-submenu";
      const submenu = document.getElementById(submenuId);

      if (submenu.style.height === "0px") {
        closeAllSubmenus();
        submenu.style.height = submenu.scrollHeight + "px";
        submenu.style.opacity = "1";
      } else {
        submenu.style.height = "0";
        submenu.style.opacity = "0";
      }
    });
  });

  function closeAllSubmenus() {
    const submenus = document.querySelectorAll(".sub-menu-container");
    submenus.forEach(function (submenu) {
      submenu.style.height = "0";
      submenu.style.opacity = "0";
    });
  }
});
