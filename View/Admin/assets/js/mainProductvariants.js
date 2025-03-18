const request = new HTTPRequest("Productvariants");
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
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${item.productVariant_id}">
                        ${product.data.name ?? ""}
                      </button>
                    </h2>
                    <div id="collapse${item.productVariant_id}" class="accordion-collapse collapse">
                      <div class="accordion-body">
                        <p>${product.data.description ?? ""}</p>
                        <p>${product.data.brand ?? ""}</p>
                        <p>${product.data.stock_quantity ?? ""}</p>
                        <p>${product.data.status?"Hiển thị":"Ẩn"}</p>
                      </div>
                    </div>
                  </div>
                </div>`:""}
            </td>
            <td>${item.material ?? ""}</td>
            <td>${item.color ?? ""}</td>
            <td>${item.price ?? ""}</td>
            <td>${item.price_reduced ?? ""}</td>
            <td>${item.stock_quantity ?? ""}</td>
            <td>${item.start_at ?? ""}</td>
            <td>${item.end_at ?? ""}</td>
            <td>${item.status===0?"Hiển thị":"Khóa"}</td>
            <td>
                <button type="button" class="btn btn-warning" onclick="editRow(${item.productVariant_id}, ${location})">Sửa</button>
                <button type="button" class="btn btn-outline-danger mt-2 mt-xxl-0" onclick="deleteRow(${item.productVariant_id}, ${location})">Xóa</button>
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
    modal.querySelector("#material").value = dataOld.data.material ?? "";
    modal.querySelector("#color").value = dataOld.data.color ?? "";
    modal.querySelector("#price").value = dataOld.data.price ?? "";
    modal.querySelector("#price_reduced").value = dataOld.data.price_reduced ?? "";
    modal.querySelector("#stock_quantity").value = dataOld.data.stock_quantity ?? "";
    modal.querySelector("#start_at").value = dataOld.data.start_at ?? "";
    modal.querySelector("#end_at").value = dataOld.data.end_at ?? "";
    modal.querySelector(`#status>option[value='${dataOld.data.status}']`).setAttribute("selected", "");
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