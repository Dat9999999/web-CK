document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".form");

  form.addEventListener("submit", function (event) {
    event.preventDefault(); // Ngăn chặn hành động mặc định của form

    const usernameInput = document.getElementById("text");
    const passwordInput = document.getElementById("password");

    // Kiểm tra xem username và password có hợp lệ hay không
    const usernameValue = usernameInput.value.trim();
    const passwordValue = passwordInput.value.trim();

    let isValid = true;

    // Kiểm tra và hiển thị thông báo cho username
    if (usernameValue.length < 5) {
      isValid = false;
      toast({
        title: "Thông báo!",
        message:
          "Tài khoản nhập sai!! Bạn đã đăng kí thiếu! Phải có ít nhất 5 kí tự.",
        type: "info",
        duration: 3000,
      });
    }

    // Kiểm tra và hiển thị thông báo cho password
    if (passwordValue === "") {
      isValid = false;
      toast({
        title: "Cảnh báo!",
        message: "Bạn chưa nhập mật khẩu",
        type: "warning",
        duration: 3000,
      });
    } else if (passwordValue.length < 5) {
      isValid = false;
      toast({
        title: "Cảnh báo!",
        message: "Mật khẩu phải có ít nhất 6 kí tự",
        type: "warning",
        duration: 3000,
      });
    }

    // Nếu tất cả hợp lệ, submit form
    if (isValid) {
      form.submit();
      // toast({
      //   title: "Thành công!",
      //   message: "Bạn đã đăng nhập thành công!",
      //   type: "success",
      //   duration: 3000,
      // });
    }
  });
  function toast({ title = "", message = "", type = "info", duration = 3000 }) {
    const main = document.getElementById("toast-container");
    if (main) {
      const toast = document.createElement("div");

      // Auto remove toast
      const autoRemoveId = setTimeout(function () {
        main.removeChild(toast);
      }, duration + 1000);

      // Remove toast when clicked
      toast.onclick = function (e) {
        if (e.target.closest(".toast-close")) {
          main.removeChild(toast);
          clearTimeout(autoRemoveId);
        }
      };

      const icons = {
        success: "✅",
        info: "ⓘ",
        warning: "⚠️",
        error: "❌",
      };

      const icon = icons[type];

      toast.classList.add("toast", `toast-${type}`);
      toast.style.animation = ` ${duration / 1000}s`;

      toast.innerHTML = `
        <div class="toast-stick">${icon}</div>
        <div class="toast-content">
          <strong>${title}</strong><br>${message}
        </div>
        <div class="toast-close">X</div>
      `;
      main.appendChild(toast);
    }
  }
});
