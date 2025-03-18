const validate = new Validate();
const checkpr = {
    "#code": {
        type: "textLimit",
        message: ["Mã khuyến mãi không được để trống", "Thêm mã khuyến mãi thành công!"],
        options: 10
    },
    "#discount": {
        type: "number",
        message: ["Mời bạn nhập % giảm giá", "Thêm % giảm giá thành công!"],
    },
    "#start_date": {
        type: "date",
        message: ["Mời bạn nhập ngày bắt đầu giảm giá", "Thêm ngày bắt đầu giảm giá thành công!"],
    },
    "#end_date": {
        type: "date",
        message: ["Mời bạn nhập ngày kết thúc giảm giá", "Thêm ngày kết thúc giảm giá thành công!"],
    },
    "#usage_limit": {
        type: "number",
        message: ["Mời bạn nhập giới hạn mã giảm giá", "Thêm giới hạn mã giảm giá thành công!"],
    }
};
validate.checkFormAndDisplay(checkpr);
document.getElementById("formAdd").addEventListener("submit", async e => {
    e.preventDefault();
    if(validate.checkForm(checkpr, true)){
        const formdata = new FormData(e.target);
        const keysToDelete = [];
        formdata.forEach((value, key) => {
            if (value === "") {
                keysToDelete.push(key);
            }
        });
        keysToDelete.forEach(key => formdata.delete(key));
        const request = new HTTPRequest("Promotions");
        const res = await request.post(formdata, false);
        const alert = document.getElementById("alert");
        alert.classList.value = "col-12 alert";
        validate.resetForm("#formAdd");
        if(request.getStatus() == 200){
            alert.classList.add("alert-success");
            alert.textContent = "Thêm thành công!";
        } else {
            alert.classList.add("alert-danger");
            alert.textContent = "Thêm thất bại!";
        }
    }
}, false);