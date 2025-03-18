document.addEventListener("DOMContentLoaded", () => {
    const validate = new Validate();  // Giả sử bạn đã có lớp Validate để kiểm tra form
    // Định nghĩa các trường cần kiểm tra trong form
    const checkforms = {
        "#email": {
            type: "email",
            message: ["Email không hợp lệ!", "Vui lòng nhập đúng định dạng email!"],
        },
        "#password": {
            type: "textLimit",
            message: ["Mật khẩu phải đủ từ 6 kí tự!", "Mật khẩu không hợp lệ!"],
            options: 6,
        },
    };

    // Kiểm tra các trường hợp của form
    validate.checkFormAndDisplay(checkforms);
    // Lắng nghe sự kiện submit của form
    document.getElementById("formAdd").addEventListener("submit", async (e) => {
        e.preventDefault();  // Ngừng hành động submit mặc định của form

        // Kiểm tra tính hợp lệ của form trước khi tiếp tục
        if (validate.checkForm(checkforms, true)) {
            const formdata = new FormData(e.target); // Lấy dữ liệu từ form trước khi gửi
            const request = new HTTPRequest("Login");
            try {
                // Gửi yêu cầu POST để đăng nhập
                const res = await request.post(formdata); // Gọi hàm post và truyền FormData
                const alert = document.getElementById("alert");
                // Kiểm tra phản hồi từ API
                if ( request.getStatus() === 200 && res.message === true) {
                    await accessToken.handleTokenLocal(res.data);
                    accessToken.saveToken();
                    // console.log(test.getInfo());
                    // Hiển thị thông báo thành công và chuyển hướng
                    alert.classList.add("alert-secondary");
                    alert.textContent = "Đăng nhập thành công ~~";
                } else {
                    // Đăng nhập thất bại
                    alert.classList.add("alert-danger");
                    alert.textContent = res.message;
                }
            } catch (error) {
                console.error("Lỗi đăng nhập:", error);
                const alert = document.getElementById("alert");
                alert.classList.add("alert-danger");
                alert.textContent = "Lỗi khi kết nối với server! Vui lòng thử lại sau.";
            }
        }
    });
});
