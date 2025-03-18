const validate = new Validate();
const objcheck = {
    /*"#product_id": {
        type: "textLimit",
        message: [" ", " "],
        options: 0
    },*/
    "#material": {
        type: "paragraph",
        message: ["Chất liệu không được để trống!", "Chất liệu hợp lệ!"],
        options: 1
    },
    "#color": {
        type: "paragraph",
        message: ["Màu sắc không được để trống!", "Màu sắc hợp lệ!"],
        options: 1
    },
    "#price": {
        type: "number",
        message: ["Giá không được để trống và phải hợp lệ!", "Giá hợp lệ!"],
    },
    /*"#price_reduced": {
        type: "textLimit",
        message: [" ", " "],
        options: 0
    },
    "#start_at": {
        type: "textLimit",
        message: [" ", " "],
        options: 0
    },
    "#end_at": {
        type: "textLimit",
        message: [" ", " "],
        options: 0
    },
    "#status": {
        type: "textLimit",
        message: [" ", " "],
        options: 0
    },*/
    "#stock_quantity": {
        type: "number",
        message: ["Số lượng hàng không được để trống và phải hợp lệ!", "Số lượng hàng hợp lệ!"],
    }
};
validate.checkFormAndDisplay(objcheck);
document.getElementById("formAdd").addEventListener("submit", async e => {
    e.preventDefault();
    if(validate.checkForm(objcheck, true)){
        const formdata = new FormData(e.target);
        const keysToDelete = [];
        formdata.forEach((value, key) => {
            if (value === "") {
                keysToDelete.push(key);
            }
        });
        keysToDelete.forEach(key => formdata.delete(key));
        const request = new HTTPRequest("Productvariants");
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
const products = new HTTPRequest("Products").getAll().then(value => {
     const select = document.getElementById("product_id");
     value.data.forEach(item => {
         const option = document.createElement("option");
         option.setAttribute("value", item.product_id);
         option.textContent = item.name;
         select.append(option);
     });
});