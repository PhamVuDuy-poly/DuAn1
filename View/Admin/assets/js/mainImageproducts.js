const request = new HTTPRequest("Imageproducts");
const tbody = document.querySelector("#view tbody");
const getDataProduct = async (id) => {
    if(id) return await (new HTTPRequest("Products").getOne(id));
    return null;
}
const data = async (location, count) => {
    tbody.innerHTML = "";
    const response = await request.getAllLimit(location, count);
    for(let [index, item] of response.data.entries()){
        const row = document.createElement("tr");
        const product = await getDataProduct(item.product_id ?? false);
        row.innerHTML = `
            <td>${(location-1)*count + index + 1}</td>
            <td>
                ${product?`<div class="accordion" id="accordionProducts">
                  <div class="accordion-item collapsed">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${item.imageProduct_id}">
                        ${product.data.name ?? ""}
                      </button>
                    </h2>
                    <div id="collapse${item.imageProduct_id}" class="accordion-collapse collapse">
                      <div class="accordion-body">
                        <p>${product.data.description ?? ""}</p>
                        <p>${product.data.brand ?? ""}</p>
                        <p>${product.data.stock_quantity ?? ""}</p>
                        <p>${product.data.status?"Còn hàng":"Không còn hàng"}</p>
                      </div>
                    </div>
                  </div>
                </div>`:""}
            </td>
            <td><img src="${item.album?item.album.slice(1):'https://media.saco.asia/media/uploads/gbimg/other/sacoinc-404-page.png'}" style="max-width: 200px; max-height: 100px;" alt="Ảnh sản phẩm"></td>
            <td>${item.location===0?"Trang chủ":"Trang sản phẩm"}</td>
            <td>${item.status===1?"Hiển thị":"Ẩn"}</td>
            <td>
                <button type="button" class="btn btn-warning" onclick="editRow(${item.imageProduct_id}, ${location})">Sửa</button>
                <button type="button" class="btn btn-outline-danger mt-2 mt-xxl-0" onclick="deleteRow(${item.imageProduct_id}, ${location})">Xóa</button>
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
    const products = new HTTPRequest("Products").getAll().then(value => {
        const select = document.getElementById("product_id");
        select.innerHTML = `<option value="">Mặc định</option>`;
        value.data.forEach(item => {
            const option = document.createElement("option");
            option.setAttribute("value", item.product_id);
            option.textContent = item.name;
            select.append(option);
        });
        const productId = modal.querySelector(`#product_id>option[value='${dataOld.data.product_id ?? ''}']`);
        if(productId!==null) productId.setAttribute("selected", "");
    });
    modal.querySelector(`#album`).value = "";
    modal.querySelector(`#location>option[value='${dataOld.data.location}']`).setAttribute("selected", "");
    modal.querySelector(`#status>option[value='${dataOld.data.status}']`).setAttribute("selected", "");
    modal.querySelector("#viewImg").src = dataOld.data.album?dataOld.data.album.slice(1):'https://media.saco.asia/media/uploads/gbimg/other/sacoinc-404-page.png';
    const validate = new Validate();
    const objcheck = {
        "#status": {
            type: "textLimit",
            message: [" ", " "],
            options: 0
        },
        "#location": {
            type: "textLimit",
            message: [" ", " "],
            options: 0
        },
        "#album": {
            type: "textLimit",
            message: [" ", " "],
            options: 0
        }
    };
    document.getElementById("album").addEventListener("change", e => {
        const imgUpload = e.target?.files?.item(0) ?? false;
        const viewImg = document.getElementById("viewImg");
        viewImg.src = imgUpload?URL.createObjectURL(imgUpload):'https://media.saco.asia/media/uploads/gbimg/other/sacoinc-404-page.png';
        viewImg.onload = () => {URL.revokeObjectURL(imgUpload)};
        objcheck["#album"] = objcheck["#album"].type==="image"?objcheck["#album"]:{
            type: "image",
            message: ["Ảnh không được để trống và tệp tải lên phải là ảnh!", "Ảnh hợp lệ!"]
        }
    }, false)
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
    };
    document.getElementById("formEdit").addEventListener("submit", handleSubmit, false);
}