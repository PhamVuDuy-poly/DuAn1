const validate = new Validate();
const checkforms = {
    "#name": {
        type: "paragraph",
        message: ["Mời bạn nhập đủ họ và tên ạ!!", "Họ và tên đầy đã đủ!!"],
        options: 2,
    },
    "#email": {
        type: "email",
    },
    "#password": {
        type: "textLimit",
        message: ["Phải đủ từ 6 kí tự liền không cách!!", "Mật khẩu mạnh trên 6 kí tự!!!"],
        options: 6,
    },
    "#phone": {
        type: "phone",
        message: ["Mời bạn nhập sdt", "Số điện thoại đã đạt đủ tiêu chuẩn!!!"],
    },
    "#address": {
        type: "paragraph",
        message: ["Vd: Hà Nội, Hải Phòng ...?", "Địa chỉ tồn tại!!!"],
        options: 2,
    },
    "#bio": {
        type: "paragraph",
        message: ["Vd: Sở thích, Tính cách ...?", "Thêm thành công thông tin này!!"],
        options: 2,
    },
    "#avatar": {
        type: "image",
    },
}
validate.checkFormAndDisplay(checkforms);

document.getElementById("formAdd").addEventListener("submit", async e=> {
    e.preventDefault();
    if(validate.checkForm(checkforms, true)){
        const formdata = new FormData(e.target);
        const keysToDelete = [];
        formdata.forEach((value, key) => {
            if (value === "") {
                keysToDelete.push(key);
            }
        });
        keysToDelete.forEach(key => formdata.delete(key));
        const request = new HTTPRequest("Users");
        const res = await request.post(formdata, true);
        const alert = document.getElementById('alert');
        validate.resetForm("#formAdd")
        if (request.getStatus() == 200) {
            alert.classList.remove("d-none")
            alert.classList.add('alert-success');
            alert.textContent = "Thêm mới tài khoản thành công~~";
        }else {
            alert.classList.add('alert-danger');
            alert.textContent = "Thêm mới tài khoản không thành công~~";
        }
    }
}, false);

document.getElementById("avatar").addEventListener("change", e => {
    const viewImg = document.getElementById("img");
    const fileUpload = e.target.files;
    const image = fileUpload.item(0);
    viewImg.src = URL.createObjectURL(image);
    viewImg.onload = () => {
        URL.revokeObjectURL(image);
    };
}, false);

