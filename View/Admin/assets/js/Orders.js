const validate = new Validate();
const checkforms = ({
    "#total_amount": {
      type: "number",
    }
})
validate.checkFormAndDisplay(checkforms)
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
        const request = new HTTPRequest("Orders");
        const res = await request.post(formdata, false);
        const alert = document.getElementById('alert');
        validate.resetForm("#formAdd")
        if (request.getStatus() == 200) {
            alert.classList.remove("d-none")
            alert.classList.add('alert-success');
            alert.textContent = "Thêm mới đơn hàng thành công~~";
        }else {
            alert.classList.add('alert-danger');
            alert.textContent = "Thêm mới đơn hàng không thành công~~";
        }
    }
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