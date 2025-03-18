const validate = new Validate();
const objcheck = {
    "#album": {
        type: "image",
        message: ["Ảnh không được để trống và tệp tải lên phải là ảnh!", "Ảnh hợp lệ!"]
    },
    "#status": {
        type: "textLimit",
        message: [" ", " "],
        options: 0
    },
    "#location": {
        type: "textLimit",
        message: [" ", " "],
        options: 0
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
        const request = new HTTPRequest("Imageproducts");
        const res = await request.post(formdata, true);
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

document.getElementById("album").addEventListener("change", e => {
    document.getElementById("frameImageView").classList.remove("d-none");
    const imageUpload = Array.from(e.target.files);
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
}, false)