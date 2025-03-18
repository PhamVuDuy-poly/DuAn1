const validate = new Validate();
const checkca = {
    "#name": {
        type: "paragraph",
        message: ["Tên thể loại không được để trống", "Thêm tên thể loại thành công!"],
        options: 1
    },
    "#description": {
        type: "paragraph",
        message: ["Miêu tả không được để trống", "Thêm miêu tả thành công!"],
        options: 1
    }
};
validate.checkFormAndDisplay(checkca);
document.getElementById("formAdd").addEventListener("submit", async e => {
    e.preventDefault();
    if(validate.checkForm(checkca, true)){
        const formdata = new FormData(e.target);
        const keysToDelete = [];
        formdata.forEach((value, key) => {
            if (value === "") {
                keysToDelete.push(key);
            }
        });
        keysToDelete.forEach(key => formdata.delete(key));
        const request = new HTTPRequest("Categories");
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