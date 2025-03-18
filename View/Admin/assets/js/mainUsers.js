const request = new HTTPRequest("Users")
const tbody = document.querySelector("#view tbody")
const data = async (location, count)=>{
    tbody.innerHTML = "";
    const res = await request.getAllLimit(location, count);
    for (let [index, item] of res.data.entries()){
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${(location-1)*count+(index+1)}</td>
            <td>${item.name ?? ""}</td>
            <td>${item.email ?? ""}</td>
            <td>${item.password ?? ""}</td>
            <td>${item.phone ?? ""}</td>
            <td>${item.address ?? ""}</td>
            <td>
                <div  class="text-truncate" style="width: 200px;">
                    ${item.bio ?? ""}
                </div>
            </td>
            <td><img style="max-width: 150px; max-height: 100px" src="${item.avatar?item.avatar.slice(1):'https://media.saco.asia/media/uploads/gbimg/other/sacoinc-404-page.png'}" alt="anhloi"></td>
            <td>${item.role_id == 1 ? "Quản trị viên" : (item.role_id == 2 ? "Người dùng" : "Người dùng") ?? ""}</td>
            <td>${item.created_at ?? ""}</td>
            <td>${item.updated_at ?? ""}</td>
            <td>${item.status === 0 ? "Khóa" : "Hoạt động"}</td>
            <td>
            <div class="btn-group border border-none gap-2" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-warning rounded" onclick="editRow(${item.user_id}, ${location})">Sửa</button>
                <button type="button" class="btn btn-outline-danger rounded" onclick="deleteRow(${item.user_id}, ${location})">Xóa</button>
            </div>
            </td>
        `
    tbody.append(row);
    }
}
// okokokok
const framePage = document.getElementById("framePage");
const getDataByQuantity = async (currentPage = 1) => {
    framePage.innerHTML = "";
    const AllData = await request.getAll();
    const limit = Math.ceil(AllData.data.length / 5);
    for(let i = 1; i <= limit; i++){
        const btnPage = document.createElement("button");
        btnPage.setAttribute("type", "button");
        btnPage.className = i===currentPage?"btn btn-primary":"btn btn-outline-primary";
        btnPage.setAttribute("style", "--bs-btn-hover-bg: #5c26ff !important;");
        btnPage.textContent = i;
        btnPage.addEventListener("click", async e => {
            e.preventDefault();
            data(i, 5);
            btnPage.parentElement.querySelector(".btn-primary").className = "btn btn-outline-primary";
            btnPage.className = "btn btn-primary";
        }, false);
        framePage.append(btnPage);
    }
    data(currentPage, 5);
}
getDataByQuantity();


async function deleteRow(id, currentPage){
    const liveToast = document.getElementById("liveToast");
    if(window.confirm("Bạn có chắc chắn muốn xóa không!")){
        const response = await request.delete(id);
        liveToast.querySelector('.button-close').addEventListener("click", e => {
            liveToast.style.display = "none";
        }, false);
        if(request.getStatus()===200){
            liveToast.setAttribute("style", "display: block; --bs-toast-bg: #b3ffabd9");
            liveToast.querySelector("#message").textContent = "Xóa thành công!";
            getDataByQuantity(currentPage);
        }else{
            liveToast.setAttribute("style", "display: block; --bs-toast-bg: #ffababd9");
            liveToast.querySelector("#message").textContent = "Xóa thất bại!";
        }
        setTimeout(() => liveToast.style.display = "none", 3000);
    }
}

async function editRow(id, currentPage){
    const modal = document.getElementById("modal");
    modal.setAttribute("style", "display: block; top: 5%; filter: blur(0); opacity: 1;");
    modal.nextElementSibling.setAttribute("style", "filter: blur(5px); opacity: 0.5;");
    modal.querySelectorAll(".button-close").forEach(buttonClose => {
        buttonClose.addEventListener("click", e => {
            modal.style.display = "none";
            modal.nextElementSibling.setAttribute("style", "");
        }, false);
    });
    document.getElementById("avatar").addEventListener("change", e => {
        const viewImg = document.getElementById("img");
        const fileUpload = e.target.files;
        const image = fileUpload.item(0);
        viewImg.src = URL.createObjectURL(image);
        viewImg.onload = () => {
            URL.revokeObjectURL(image);
        };
    }, false);

    const dataOld = await request.getOne(id);
    modal.querySelector(`#avatar`).value = "";
    modal.querySelector("#img").src = dataOld.data.avatar?dataOld.data.avatar.slice(1):'https://media.saco.asia/media/uploads/gbimg/other/sacoinc-404-page.png';
    modal.querySelector("#name").value = dataOld.data.name ?? "";
    modal.querySelector("#email").value = dataOld.data.email ?? "";
    modal.querySelector("#password").value = dataOld.data.password ?? "";
    modal.querySelector("#phone").value = dataOld.data.phone ?? "";
    modal.querySelector("#address").value = dataOld.data.address ?? "";
    modal.querySelector("#bio").value = dataOld.data.bio ?? "";
    modal.querySelector("#role_id").src = dataOld.data.role_id ?? "";
    modal.querySelector("#created_at").value = dataOld.data.created_at ?? "";
    modal.querySelector("#updated_at").value = dataOld.data.updated_at ?? "";
    modal.querySelector("#status").value = dataOld.data.status ?? "";
    const validate = new Validate();
    const checkforms = ({
        "#name": {
            type: "paragraph",
            message: ["Mời bạn nhập đủ họ và tên ạ!!", "Họ và tên đầy đã đủ!!"],
            options: 2,
        },
        "#email": {
            type: "email",
        },
        "#password": {
            type: "textLimit",
            message: ["Phải đủ từ 6 kí tự liền không cách!!", "Mật khẩu mạnh trên 6 kí tự!!!"],
            options: 6,
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
            type: "textLimit",
            message: [" ", " "],
            options: 0
        }
    })
    document.getElementById("avatar").addEventListener("change", e => {
        const imgUpload = e.target?.files?.item(0) ?? false;
        const viewImg = document.getElementById("img");
        viewImg.src = imgUpload?URL.createObjectURL(imgUpload):'https://media.saco.asia/media/uploads/gbimg/other/sacoinc-404-page.png';
        viewImg.onload = () => {URL.revokeObjectURL(imgUpload)};
        checkforms["#avatar"] = checkforms["#avatar"].type==="image"?checkforms["#avatar"]:{
            type: "image",
            message: ["Ảnh không được để trống và tệp tải lên phải là ảnh!", "Ảnh hợp lệ!"]
        }
    }, false)
    validate.checkFormAndDisplay(checkforms)
    const handleSubmit = async e=> {
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
            const res = await request.put(id, formdata, true);
            const liveToast = document.getElementById("liveToast");
            validate.resetForm("#formEdit");
            liveToast.querySelector('.button-close').addEventListener("click", e => {
                liveToast.style.display = "none";
            }, false);
            modal.nextElementSibling.setAttribute("style", "");
            if(request.getStatus()===200){
                liveToast.setAttribute("style", "display: block; --bs-toast-bg: #b3ffabd9");
                liveToast.querySelector("#message").textContent = "Cập nhật thành công!";
                getDataByQuantity(currentPage);
                modal.style.display = "none";
            }else{
                liveToast.setAttribute("style", "display: block; --bs-toast-bg: #ffababd9");
                liveToast.querySelector("#message").textContent = "Cập nhật thất bại!";
            }
            document.getElementById("formEdit").removeEventListener("submit", handleSubmit);
            setTimeout(() => liveToast.style.display = "none", 3000);
        }
    }
    document.getElementById("formEdit").addEventListener("submit", handleSubmit, false);
}