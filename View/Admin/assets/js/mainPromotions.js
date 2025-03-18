const request = new HTTPRequest("Promotions");
const tbody = document.querySelector("#view tbody");
const data = async (location, count) => {
    tbody.innerHTML = "";
    const response = await request.getAllLimit(location, count);
    for (let [index, item] of response.data.entries()) {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${index + 1}</td>
            <td>${item.code ?? ""}</td>
            <td>${item.discount ?? ""}</td>
            <td>${item.start_date ?? ""}</td>
            <td>${item.end_date ?? ""}</td>
            <td>${item.usage_limit ?? ""}</td>
            <td>
              <button type="button" class="btn btn-warning" onclick="editRow(${item.promo_id}, ${location})">Sửa</button>
              <button type="button" class="btn btn-outline-danger mt-xxl-0" onclick="deleteRow(${item.promo_id}, ${location})">Xóa</button>
            </td>
        `;
        tbody.append(row)
    };
}

const framePage = document.getElementById("framePage");
const getDataByQuantity = async (currentPage = 1) => {
    framePage.innerHTML = "";
    const AllData = await request.getAll();
    const limit = Math.ceil(AllData.data.length / 10);
    for (let i = 1; i <= limit; i++) {
        const btnPage = document.createElement("button");
        btnPage.setAttribute("type", "button");
        btnPage.className = i === currentPage ? "btn btn-primary" : "btn btn-outline-primary";
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

async function deleteRow(id, currentPage) {
    const liveToast = document.getElementById("liveToast");
    if (window.confirm("Bạn có chắc chắn muốn xóa không!")) {
        const response = await request.delete(id);
        liveToast.querySelector('.button-close').addEventListener("click", e => {
            liveToast.style.display = "none";
        }, false);
        if (request.getStatus() === 200) {
            liveToast.setAttribute("style", "display: block; --bs-toast-bg: #b3ffabd9");
            liveToast.querySelector("#message").textContent = "Xóa thành công!";
            getDataByQuantity(currentPage);
        } else {
            liveToast.setAttribute("style", "display: block; --bs-toast-bg: #ffababd9");
            liveToast.querySelector("#message").textContent = "Xóa thất bại!";
        }
        setTimeout(() => liveToast.style.display = "none", 3000);
    }
}

async function editRow(id, currentPage) {
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
    modal.querySelector("#code").value = dataOld.data.code ?? "";
    modal.querySelector("#discount").value = dataOld.data.discount ?? "";
    modal.querySelector("#start_date").value = dataOld.data.start_date ?? "";
    modal.querySelector("#end_date").value = dataOld.data.end_date ?? "";
    modal.querySelector("#usage_limit").value = dataOld.data.usage_limit ?? "";
    const validate = new Validate();
    const checkpr = {
        "#code": {
            type: "textLimit",
            message: ["Mã khuyến mãi không được để trống", "Thêm mã khuyến mãi thành công!"],
            options: 10
        },
        "#discount": {
            type: "number",
            message: ["Mời bạn nhập % giảm giá", "Thêm % giảm giá thành công!"],
        },
        "#start_date": {
            type: "date",
            message: ["Mời bạn nhập ngày bắt đầu giảm giá", "Thêm ngày bắt đầu giảm giá thành công!"],
        },
        "#end_date": {
            type: "date",
            message: ["Mời bạn nhập ngày kết thúc giảm giá", "Thêm ngày kết thúc giảm giá thành công!"],
        },
        "#usage_limit": {
            type: "number",
            message: ["Mời bạn nhập giới hạn mã giảm giá", "Thêm giới hạn mã giảm giá thành công!"],
        }
    };
    validate.checkFormAndDisplay(checkpr);
    const handleSubmit = async e => {
        e.preventDefault();
        if (validate.checkForm(checkpr, true)) {
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
            if (request.getStatus() === 200) {
                liveToast.setAttribute("style", "display: block; --bs-toast-bg: #b3ffabd9");
                liveToast.querySelector("#message").textContent = "Cập nhật thành công!";
                getDataByQuantity(currentPage);
                modal.style.display = "none";
            } else {
                liveToast.setAttribute("style", "display: block; --bs-toast-bg: #ffababd9");
                liveToast.querySelector("#message").textContent = "Cập nhật thất bại!";
            }
            document.getElementById("formEdit").removeEventListener("submit", handleSubmit);
            setTimeout(() => liveToast.style.display = "none", 3000);
        }
    };
    document.getElementById("formEdit").addEventListener("submit", handleSubmit, false);
}
