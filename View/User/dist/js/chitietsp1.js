// Hàm kiểm tra trường nhập liệu
function validateForm() {
    var message = document.getElementById("messageContacts").value;

    // Kiểm tra nếu textarea bị trống
    if (message.trim() == "") {
        alert("Vui lòng nhập đánh giá!");
        return false; // Ngừng gửi form
    }

    return true; // Gửi form nếu không có lỗi
}

