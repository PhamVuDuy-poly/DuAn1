document.addEventListener("DOMContentLoaded", () => {
    const request = new HTTPRequest("Users");
    const validate = new Validate();
    const checkforms = {
        "#name": {
            type: "paragraph",
            message: ["Mời bạn nhập đủ tên ạ!!", "Tên đã đủ!!"],
            options: 1,
        },
        "#email": {
            type: "email",
        },
        "#password": {
            type: "textLimit",
            message: ["Phải đủ từ 6 kí tự liền không cách!!", "Mật khẩu mạnh trên 6 kí tự!!!"],
            options: 6,
        },
    };

    validate.checkFormAndDisplay(checkforms);

    document.getElementById("formAdd").addEventListener("submit", async e => {
        console.log(document.querySelector('#name'), document.querySelector('#email'), document.querySelector('#password'))
        e.preventDefault();
        if (validate.checkForm(checkforms, true)) {
            const formdata = new FormData(e.target);
            const keysToDelete = [];
            formdata.forEach((value, key) => {
                if (value === "") {
                    keysToDelete.push(key);
                }
            });
            keysToDelete.forEach(key => formdata.delete(key));
            const request = new HTTPRequest("Users");
            const res = await request.post(formdata, false);
            const alert = document.getElementById('alert');
            validate.resetForm("#formAdd")
            if (request.getStatus() == 200) {
                alert.classList.add('alert-secondary');
                alert.textContent = "Đăng ký thành công ~~";
                setTimeout(() => {
                    window.location.href = "?page=Login";
                }, 4000);
            } else {
                alert.classList.add('alert-danger');
                alert.textContent = "Đăng ký không thành công~~";
            }
        }
    }, false);
});