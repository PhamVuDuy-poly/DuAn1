const validate = new Validate();
const checkforms = ({
    "#content": {
      type: "paragraph",
      options: 2
    },
    "#likes": {
      type: "number",
    }
})
validate.checkFormAndDisplay(checkforms)
document.getElementById("frmcomments").addEventListener("submit", async e=> {
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
        const request = new HTTPRequest("Comments");
        const res = await request.post(formdata, false);
        const alert = document.getElementById('alert');
        console.log(res)
        validate.resetForm("#frmcomments")
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
const users = new HTTPRequest("Users").getAll().then(value => {
    const select = document.getElementById("user_id");
    value.data.forEach(item =>{
        const option = document.createElement('option');
        option.setAttribute("value",item.user_id);
        option.textContent = item.name;
        select.append(option);
    })
    
});
const news = new HTTPRequest("News").getAll().then(value => {
    const select = document.getElementById("news_id");
    value.data.forEach(item =>{
        const option = document.createElement('option');
        option.setAttribute("value",item.news_id);
        option.textContent = item.title;
        select.append(option);
    })
});
const comments = new HTTPRequest("Comments").getAll().then(value => {
    const select = document.getElementById("parent_comment");
    value.data.forEach(item =>{
        const option = document.createElement('option');
        option.setAttribute("value",item.comment_id);
        option.textContent = item.content;
        select.append(option);
    })
});