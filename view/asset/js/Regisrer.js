document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("register-form");

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const usernameInput = document.getElementById("username");
    const passwordInput = document.getElementById("password");
    const repasswordInput = document.getElementById("repassword");

    const usernameValue = usernameInput.value.trim();
    const passwordValue = passwordInput.value.trim();
    const repasswordValue = repasswordInput.value.trim();

    let isValid = true;

    // Kiểm tra và hiển thị thông báo cho username
    if (usernameValue.length < 5) {
      isValid = false;
      toast({
        title: "Thông báo!",
        message: "Tài khoản phải có ít nhất 5 ký tự.",
        type: "info",
        duration: 3000,
      });
    }

    // Kiểm tra và hiển thị thông báo cho password
    if (passwordValue === "") {
      isValid = false;
      toast({
        title: "Cảnh báo!",
        message: "Bạn chưa nhập mật khẩu.",
        type: "warning",
        duration: 3000,
      });
    } else if (passwordValue.length < 6) {
      isValid = false;
      toast({
        title: "Cảnh báo!",
        message: "Mật khẩu phải có ít nhất 6 ký tự.",
        type: "warning",
        duration: 3000,
      });
    }

    // Kiểm tra và hiển thị thông báo cho xác nhận lại mật khẩu
    if (repasswordValue === "") {
      isValid = false;
      toast({
        title: "Cảnh báo!",
        message: "Bạn chưa nhập lại mật khẩu.",
        type: "warning",
        duration: 3000,
      });
    } else if (repasswordValue !== passwordValue) {
      isValid = false;
      toast({
        title: "Cảnh báo!",
        message: "Mật khẩu xác nhận không khớp.",
        type: "warning",
        duration: 3000,
      });
    }

    if (isValid) {
      // Hiển thị thông báo thành công
      toast({
        title: "Thành công!",
        message: "Bạn đã đăng ký thành công!",
        type: "success",
        duration: 3000,
      });
    }
  });

  function toast({ title = "", message = "", type = "info", duration = 3000 }) {
    const main = document.createElement("div");
    main.classList.add("toast", `toast-${type}`);
    main.innerHTML = `
            <div class="toast-stick">${getToastIcon(type)}</div>
            <div class="toast-content">
                <strong>${title}</strong><br>${message}
            </div>
            <div class="toast-close">X</div>
        `;
    document.body.appendChild(main);
    const closeButton = main.querySelector(".toast-close");
    closeButton.addEventListener("click", () => {
      main.remove();
    });
    setTimeout(() => {
      main.remove();
    }, duration);
  }

  function getToastIcon(type) {
    const icons = {
      success: "✅",
      info: "ⓘ",
      warning: "⚠️",
      error: "❌",
    };
    return icons[type] || icons.info;
  }
});
