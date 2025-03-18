const validate = new Validate();
let countImage = null;
let checkImg = {
    type: "textLimit",
    message: [" ", " "],
    options: 0
}
let objcheck = {
    "#name": {
        type: "paragraph",
        message: ["Tên không được để trống!", "Tên hợp lệ!"],
        options: 1
    },
    "#brand": {
        type: "paragraph",
        message: ["Nhãn hàng không được để trống!", "Nhãn hàng hợp lệ!"],
        options: 1
    },
    "#stock_quantity": {
        type: "number",
        message: ["Tổng số lượng không được để trống và phải là số!", "Tổng số lượng hợp lệ!"],
    },
    "#description": {
        type: "textLimit",
        message: [" ", " "],
        options: 0
    },
    "#status": {
        type: "textLimit",
        message: [" ", " "],
        options: 0
    },
    "#statusImage": {
        type: "textLimit",
        message: [" ", " "],
        options: 0
    },
    "#countVariants": {
        type: "number"
    },
    "#album": checkImg
};
document.getElementById("countVariants").addEventListener("input", e => {
    if(validate.check("#countVariants", "number")){
        const countVariants = e.target.valueAsNumber > 0? e.target.valueAsNumber : false;
        const frameVariants = document.getElementById("frameVariants");
        frameVariants.innerHTML = "";
        objcheck = {
            "#name": {
                type: "paragraph",
                message: ["Tên không được để trống!", "Tên hợp lệ!"],
                options: 1
            },
            "#brand": {
                type: "paragraph",
                message: ["Nhãn hàng không được để trống!", "Nhãn hàng hợp lệ!"],
                options: 1
            },
            "#stock_quantity": {
                type: "number",
                message: ["Tổng số lượng không được để trống và phải là số!", "Tổng số lượng hợp lệ!"],
            },
            "#description": {
                type: "textLimit",
                message: [" ", " "],
                options: 0
            },
            "#status": {
                type: "textLimit",
                message: [" ", " "],
                options: 0
            },
            "#statusImage": {
                type: "textLimit",
                message: [" ", " "],
                options: 0
            },
            "#countVariants": {
                type: "number"
            },
            "#album": checkImg
        };
        if(countVariants){
            for(let i = 1; i <= countVariants; i++){
                frameVariants.innerHTML += `<div class="col-md-6">
                <label for="material${i}" class="form-label">Chất liệu</label>
                <input type="text" class="form-control" id="material${i}" name="material${i}" required>
                </div>
                <div class="col-md-6">
                    <label for="color${i}" class="form-label">Màu sắc</label>
                    <input type="text" class="form-control" id="color${i}" name="color${i}" required>
                </div>
                <div class="col-md-6">
                    <label for="price${i}" class="form-label">Giá</label>
                    <input type="text" class="form-control" id="price${i}" name="price${i}" required>
                </div>
                <div class="col-md-6">
                    <label for="price_reduced${i}" class="form-label">Giá đã giảm</label>
                    <input type="number" class="form-control" id="price_reduced${i}" name="price_reduced${i}" required>
                </div>
                <div class="col-md-6">
                    <label for="stock_quantity${i}" class="form-label">Số lượng hàng</label>
                    <input type="number" class="form-control" id="stock_quantity${i}" name="stock_quantity${i}" required>
                </div>
                <div class="col-md-6">
                    <label for="start_at${i}" class="form-label">Thời gian bắt đầu giảm giá</label>
                    <input type="date" class="form-control" id="start_at${i}" name="start_at${i}">
                </div>
                <div class="col-md-6">
                    <label for="end_at${i}" class="form-label">Thời gian hết giảm giá</label>
                    <input type="date" class="form-control" id="end_at${i}" name="end_at${i}">
                </div>
                <div class="col-md-6">
                    <label for="status${i}" class="form-label">Trạng thái</label>
                    <select name="status${i}" class="form-select" id="status${i}">
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>${i===countVariants?"":`<hr class="mt-4 border border-primary border-3 opacity-75">`}`;
                objcheck[`#material${i}`] = {
                    type: "paragraph",
                    message: ["Chất liệu không được để trống!", "Chất liệu hợp lệ!"],
                    options: 1
                };
                objcheck[`#color${i}`] = {
                    type: "paragraph",
                    message: ["Màu sắc không được để trống!", "Màu sắc hợp lệ!"],
                    options: 1
                }
                objcheck[`#price${i}`] = {
                    type: "number",
                    message: ["Giá không được để trống và phải hợp lệ!", "Giá hợp lệ!"],
                }
                objcheck[`#price_reduced${i}`] ={
                    type: "textLimit",
                    message: [" ", " "],
                    options: 0
                }
                objcheck[`#start_at${i}`] = {
                    type: "textLimit",
                    message: [" ", " "],
                    options: 0
                }
                objcheck[`#end_at${i}`] = {
                    type: "textLimit",
                    message: [" ", " "],
                    options: 0
                }
                objcheck[`#status${i}`] = {
                    type: "textLimit",
                    message: [" ", " "],
                    options: 0
                }
                objcheck[`#stock_quantity${i}`] = {
                    type: "number",
                    message: ["Số lượng hàng không được để trống và phải hợp lệ!", "Số lượng hàng hợp lệ!"],
                }
            }
            validate.checkFormAndDisplay(objcheck);
        }
    }
}, false);
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
        const productVariants = [];
        const imageProducts = [];
        const countVariants = document.getElementById("countVariants")?.valueAsNumber;
        if(countVariants > 0){
            for(let i = 1; i <= countVariants; i++){
                productVariants.push({
                    material: formdata.get(`material${i}`),
                    color: formdata.get(`color${i}`),
                    price: formdata.get(`price${i}`),
                    price_reduced: formdata.get(`price_reduced${i}`),
                    stock_quantity: formdata.get(`stock_quantity${i}`),
                    start_at: formdata.get(`start_at${i}`),
                    end_at: formdata.get(`end_at${i}`),
                    status: formdata.get(`status${i}`),
                });
                formdata.delete(`material${i}`);
                formdata.delete(`color${i}`);
                formdata.delete(`price${i}`);
                formdata.delete(`price_reduced${i}`);
                formdata.delete(`stock_quantity${i}`);
                formdata.delete(`start_at${i}`);
                formdata.delete(`end_at${i}`);
                formdata.delete(`status${i}`);
            }
        }
        if(countVariants){
            for(let i = 0; i < countImage; i++){
                imageProducts.push({status: formdata.get("statusImage")});
            }
        }
        formdata.append('productVariants', JSON.stringify(productVariants));
        formdata.append('imageProducts', JSON.stringify(imageProducts));
        formdata.delete("countVariants");
        formdata.delete("statusImage");
        const request = new HTTPRequest("Products");
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

document.getElementById("album").addEventListener("change", e => {
    document.getElementById("frameImageView").classList.remove("d-none");
    checkImg = {
        type: "image",
        message: ["Tệp tải lên phải là ảnh!", "Ảnh hợp lệ!"]
    };
    objcheck['#album'] = checkImg;
    const imageUpload = Array.from(e.target.files);
    countImage = imageUpload.length;
    const frameButtonSlide = document.getElementById("frameButtonSlide");
    const frameImageSlide = document.getElementById("frameImageSlide");
    frameButtonSlide.innerHTML = "";
    frameImageSlide.innerHTML = "";
    imageUpload.forEach((file, index) => {
        const buttonSlide = document.createElement("button");
        buttonSlide.setAttribute("type", "button");
        buttonSlide.dataset.bsTarget = "#ImageUpload";
        buttonSlide.dataset.bsSlideTo = index;
        buttonSlide.setAttribute("class", index===0?"active":"");
        frameButtonSlide.append(buttonSlide);
        const carousel = document.createElement("div");
        carousel.className = "carousel-item" + (index===0?" active":"");
        const img = document.createElement("img");
        img.classList.add("d-block", "w-100");
        img.src = URL.createObjectURL(file);
        img.alt = "Ảnh sản phẩm vừa tải lên";
        img.onload = () => {URL.revokeObjectURL(file)}
        carousel.append(img);
        frameImageSlide.append(carousel);
    });
    validate.checkFormAndDisplay(objcheck);
}, false)