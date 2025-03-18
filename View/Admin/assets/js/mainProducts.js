const request = new HTTPRequest("Products");
const tbody = document.querySelector("#view tbody");
const data = async (location, count) => {
    tbody.innerHTML = "";
    const response = await request.getAllLimit(location, count);
    for(let [index, item] of response.data.entries()){
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${(location-1)*count + index + 1}</td>
            <td>${item.name ?? ""}</td>
            <td>${item.description ?? ""}</td>
            <td>${item.brand ?? ""}</td>
            <td>${item.stock_quantity ?? ""}</td>
            <td>${item.status===1?"Còn hàng":"Hết hàng"}</td>
            <td>
                <button type="button" class="btn btn-warning" onclick="editRow(${item.product_id}, ${location})">Sửa</button>
                <button type="button" class="btn btn-outline-danger mt-2 mt-xxl-0" onclick="deleteRow(${item.product_id}, ${location})">Xóa</button>
            </td>
        `;
        tbody.append(row);
    }
}
const framePage = document.getElementById("framePage");
const getDataByQuantity = async (currentPage = 1) => {
    framePage.innerHTML = "";
    const AllData = await request.getAll();
    const limit = Math.ceil(AllData.data.length / 10);
    for(let i = 1; i <= limit; i++){
        const btnPage = document.createElement("button");
        btnPage.setAttribute("type", "button");
        btnPage.className = i===currentPage?"btn btn-primary":"btn btn-outline-primary";
        btnPage.setAttribute("style", "--bs-btn-hover-bg: #5c26ff !important;");
        btnPage.textContent = i;
        btnPage.addEventListener("click", async e => {
            e.preventDefault();
            data(i, 10);
            btnPage.parentElement.querySelector(".btn-primary").className = "btn btn-outline-primary";
            btnPage.className = "btn btn-primary";
        }, false);
        framePage.append(btnPage);
    }
    data(currentPage, 10);
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
    modal.setAttribute("style", "display: block; top: 15%; filter: blur(0); opacity: 1;");
    modal.nextElementSibling.setAttribute("style", "filter: blur(5px); opacity: 0.5;");
    modal.querySelectorAll(".button-close").forEach(buttonClose => {
        buttonClose.addEventListener("click", e => {
            modal.style.display = "none";
            modal.nextElementSibling.setAttribute("style", "");
        }, false);
    });
    const dataOld = await request.getOne(id);
    modal.querySelector("#name").value = dataOld.data.name ?? "";
    modal.querySelector("#description").value = dataOld.data.description ?? "";
    modal.querySelector("#brand").value = dataOld.data.brand ?? "";
    modal.querySelector("#stock_quantity").value = dataOld.data.stock_quantity ?? "";
    modal.querySelector(`#status>option[value='${dataOld.data.status}']`).setAttribute("selected", "");
    const validate = new Validate();
    const objcheck = {
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
        }
    };
    validate.checkFormAndDisplay(objcheck);
    const handleSubmit = async e => {
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
            const res = await request.put(id, formdata, false);
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
    };
    document.getElementById("formEdit").addEventListener("submit", handleSubmit, false);
}