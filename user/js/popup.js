window.onload = function () {
  // Lấy phần query parameters từ URL
  const urlParams = new URLSearchParams(window.location.search);

  // Kiểm tra nếu đường dẫn là trang chủ hoặc có query parameter act=home thì hiển thị popup
  if (
    window.location.href === "http://localhost/da1_h/" ||
    urlParams.get("act") === "home"
  ) {
    document.getElementById("discountPopup").style.display = "block";
  }
};

function closePopup() {
  document.getElementById("discountPopup").style.display = "none";
}
