const validate = new Validate();
const checkforms = ({})
validate.checkFormAndDisplay(checkforms)
document.getElementById("formAdd").addEventListener("submit", async e=> {
    e.preventDefault();
        // validate.resetForm(document.getElementById('frmcontacts'))
    if(validate.checkForm(checkforms, true)){
        const formdata = new FormData(e.target);
        const keysToDelete = [];
        formdata.forEach((value, key) => {
            if (value === "") {
                keysToDelete.push(key);
            }
        });
        keysToDelete.forEach(key => formdata.delete(key));
        const request = new HTTPRequest("Productcategories");
        const res = await request.post(formdata, false);
        const alert = document.getElementById('alert');
        console.log(res)
        validate.resetForm("#formAdd")
        if (request.getStatus() == 200) {
            alert.classList.remove("d-none")
            alert.classList.add('alert-success');
            alert.textContent = "Thêm mới bình luận thành công~~";
        }else {
            alert.classList.add('alert-danger');
            alert.textContent = "Thêm mới bình luận không thành công~~";
        }
    }
   }, false);
const products = new HTTPRequest("Products").getAll().then(value =>{
    const select = document.getElementById("product_id");
    value.data.forEach(item=>{
        const option = document.createElement("option");
        option.setAttribute("value", item.product_id);
        option.textContent = item.name;
        select.append(option);
    })
});
const categories = new HTTPRequest("Categories").getAll().then(value =>{
    const select = document.getElementById("category_id");
    value.data.forEach(item=>{
        const option = document.createElement("option");
        option.setAttribute("value", item.category_id);
        option.textContent = item.name;
        select.append(option);
    })
});
