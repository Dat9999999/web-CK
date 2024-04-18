document.addEventListener("DOMContentLoaded", function () {
  const menuItems = document.querySelectorAll(".menu-item");

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
