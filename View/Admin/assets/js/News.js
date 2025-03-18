const validate = new Validate();
const checkforms = {
    "#title": {
        type: "paragraph",
        options: 2,
    },
    "#content": {
        type: "paragraph",
        options: 2,
    },
    "#image_url": {
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
        const request = new HTTPRequest("News");
        const res = await request.post(formdata, true);
        const alert = document.getElementById('alert');
        validate.resetForm("#formAdd")
        if (request.getStatus() == 200) {
            alert.classList.remove("d-none")
            alert.classList.add('alert-success');
            alert.textContent = "Thêm mới liên hệ thành công~~";
        }else {
            alert.classList.add('alert-danger');
            alert.textContent = "Thêm mới liên hệ không thành công~~";
        }
    }
}, false);

document.getElementById("image_url").addEventListener("change", e => {
    const viewImg = document.getElementById("img");
    const fileUpload = e.target.files;
    const image = fileUpload.item(0);
    viewImg.src = URL.createObjectURL(image);
    viewImg.onload = () => {
        URL.revokeObjectURL(image);
    };
}, false);

const users = new HTTPRequest("Users").getAll().then(value =>{
    const select = document.getElementById("user_id");
    value.data.forEach(item=>{
        const option = document.createElement("option");
        option.setAttribute("value", item.user_id);
        option.textContent = item.name;
        select.append(option);
    })
});


