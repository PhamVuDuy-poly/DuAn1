document.addEventListener("DOMContentLoaded", () => {
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
        const res = await request.put(accessToken.getInfo().user_id, formdata, true);
        const alert = document.getElementById('alert');
        if (request.getStatus() == 200) {
            alert.classList.add('alert-success');
            alert.textContent = "Thêm mới tài khoản thành công~~";
        }else {
            alert.classList.add('alert-danger');
            alert.textContent = "Thêm mới tài khoản không thành công~~";
        }
    }
}, false);
const profiledata = async ()=>{
    const formAdd = document.getElementById('formAdd');
    const request = new HTTPRequest('Users');
    await accessToken.handleTokenLocal();
    const dataOld = await  request.getOne(accessToken.getInfo().user_id);
    formAdd.querySelector(`#avatar`).value = "";
    document.querySelector("#img").src = dataOld.data.avatar?dataOld.data.avatar.slice(1):'https://media.saco.asia/media/uploads/gbimg/other/sacoinc-404-page.png';
    formAdd.querySelector("#name").value = dataOld.data.name ?? "";
    formAdd.querySelector("#email").value = dataOld.data.email ?? "";
    formAdd.querySelector("#phone").value = dataOld.data.phone ?? "";
    formAdd.querySelector("#address").value = dataOld.data.address ?? "";
    formAdd.querySelector("#bio").value = dataOld.data.bio ?? "";
    formAdd.querySelector("#role_id").value = dataOld.data.role_id === 1 ? "Quản trị viên" : "Người dùng";
    formAdd.querySelector("#created_at").value = dataOld.data.created_at ?? "";
}
profiledata().then();
document.getElementById("avatar").addEventListener("change", e => {
    const viewImg = document.getElementById("img");
    const fileUpload = e.target.files;
    const image = fileUpload.item(0);
    viewImg.src = URL.createObjectURL(image);
    viewImg.onload = () => {
        URL.revokeObjectURL(image);
    };
}, false);

});