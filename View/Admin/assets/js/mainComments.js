const request = new HTTPRequest("Comments");
const tbody = document.querySelector("#view tbody");
const dataUsers = async (id) => {
  if (id) return await new HTTPRequest("Users").getOne(id);
  return null;
};
const dataNews = async (id) => {
  if (id) return await new HTTPRequest("News").getOne(id);
  return null;
};
const dataparent_comment = async (id) => {
  if (id) return await request.getOne(id);
  return null;
};
const data = async (location, count) => {
  tbody.innerHTML = "";
  const response = await request.getAllLimit(location, count);
  for (let [index, item] of response.data.entries()) {
    const user = await dataUsers(item.user_id);
    const news = await dataNews(item.news_id);
    const parent_comment = await dataparent_comment(item.parent_comment);
    const row = document.createElement("tr");
    row.innerHTML = `
            <td>${(location - 1) * count + (index + 1)}</td>
            <td>
            ${
              user
                ? `
                <div class="accordion" id="accordionProducts">
                  <div class="accordion-item collapsed">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${
                        item.comment_id
                      }">
                        ${user.data.name ?? ""}
                      </button>
                    </h2>
                    <div id="collapse${
                      item.comment_id
                    }" class="accordion-collapse collapse">
                      <div class="accordion-body">
                        <p>${user.data.email ?? ""} </p>
                        <p>${user.data.bio ?? ""} </p>
                        <p>${user.data.avatar ?? ""}</p>
                        <p>${user.data.created_at ?? ""}</p>
                      </div>
                    </div>
                  </div>
                </div>
                `
                : ""
            }
            </td>
            <td>
            ${
              news
                ? `
            <div class="accordion" id="accordionProducts">
                  <div class="accordion-item collapsed">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1${
                        item.comment_id
                      }">
                        ${news.data.content ?? ""}
                      </button>
                    </h2>
                    <div id="collapse1${
                      item.comment_id
                    }" class="accordion-collapse collapse">
                      <div class="accordion-body">
                        <p>${news.data.title ?? ""} </p>
                        <p>${news.data.image_url ?? ""} </p>
                        <p>${news.data.created_at ?? ""}</p>
                        <p>${news.data.status ?? ""}</p>
                      </div>
                    </div>
                  </div>
                </div>
              `
                : ""
            }
            </td>
            <td>${item.content ?? ""} </td>
            <td>${item.likes ?? ""} </td>
            <td>
            ${
              parent_comment
                ? `
                <div class="accordion" id="accordionProducts">
                  <div class="accordion-item collapsed">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2${
                        item.comment_id
                      }">
                        ${parent_comment.data.content ?? ""}
                      </button>
                    </h2>
                    <div id="collapse2${
                      item.comment_id
                    }" class="accordion-collapse collapse">
                      <div class="accordion-body">
                        <p>${parent_comment.data.content ?? ""} </p>
                        <p>${parent_comment.data.likes ?? ""} </p>
                      </div>
                    </div>
                  </div>
                </div>
              `
                : ""
            }
            
            </td>
            <td>${item.created_at ?? ""} </td>
            <td>
              <button type="button" class="btn btn-warning" onclick="editRow(${
                item.comment_id
              }, ${location})">Sửa</button>
                <button type="button" class="btn btn-outline-danger mt-2 mt-xxl-0" onclick="deleteRow(${
                  item.comment_id
                }, ${location})">Xóa</button>
            </td>
            `;
    tbody.append(row);
  }
};

const framePage = document.getElementById("framePage");
const getDataByQuantity = async (currentPage = 1) => {
  framePage.innerHTML = "";
  const AllData = await request.getAll();
  const limit = Math.ceil(AllData.data.length / 10);
  for (let i = 1; i <= limit; i++) {
    const btnPage = document.createElement("button");
    btnPage.setAttribute("type", "button");
    btnPage.className =
      i === currentPage ? "btn btn-primary" : "btn btn-outline-primary";
    btnPage.setAttribute("style", "--bs-btn-hover-bg: #5c26ff !important;");
    btnPage.textContent = i;
    btnPage.addEventListener(
      "click",
      async (e) => {
        e.preventDefault();
        data(i, 10);
        btnPage.parentElement.querySelector(".btn-primary").className =
          "btn btn-outline-primary";
        btnPage.className = "btn btn-primary";
      },
      false
    );
    framePage.append(btnPage);
  }
  data(currentPage, 10);
};
getDataByQuantity();

async function deleteRow(id, currentPage) {
  const liveToast = document.getElementById("liveToast");
  if (window.confirm("Bạn có chắc chắn muốn xóa không!")) {
    const response = await request.delete(id);
    liveToast.querySelector(".button-close").addEventListener(
      "click",
      (e) => {
        liveToast.style.display = "none";
      },
      false
    );
    if (request.getStatus() === 200) {
      liveToast.setAttribute(
        "style",
        "display: block; --bs-toast-bg: #b3ffabd9"
      );
      liveToast.querySelector("#message").textContent = "Xóa thành công!";
      getDataByQuantity(currentPage);
    } else {
      liveToast.setAttribute(
        "style",
        "display: block; --bs-toast-bg: #ffababd9"
      );
      liveToast.querySelector("#message").textContent = "Xóa thất bại!";
    }
    setTimeout(() => (liveToast.style.display = "none"), 3000);
  }
}

async function editRow(id, currentPage) {
  const modal = document.getElementById("modal");
  modal.setAttribute(
    "style",
    "display: block; top: 15%; filter: blur(0); opacity: 1;"
  );
  modal.nextElementSibling.setAttribute(
    "style",
    "filter: blur(5px); opacity: 0.5;"
  );
  modal.querySelectorAll(".button-close").forEach((buttonClose) => {
    buttonClose.addEventListener(
      "click",
      (e) => {
        modal.style.display = "none";
        modal.nextElementSibling.setAttribute("style", "");
      },
      false
    );
  });
  const dataOld = await request.getOne(id);
  const users = new HTTPRequest("Users").getAll().then((value) => {
    const select = document.getElementById("user_id");
    select.innerHTML = `<option value="">Mặc định</option>`;
    value.data.forEach((item) => {
      const option = document.createElement("option");
      option.setAttribute("value", item.user_id);
      option.textContent = item.name;
      select.append(option);
    });
    const usersID = modal.querySelector(
      `#user_id>option[value='${dataOld.data.user_id ?? ""}']`
    );
    if (usersID !== null) usersID.setAttribute("selected", "");
  });
  const news = new HTTPRequest("News").getAll().then((value) => {
    const select = document.getElementById("news_id");
    select.innerHTML = `<option value="">Mặc định</option>`;
    value.data.forEach((item) => {
      const option = document.createElement("option");
      option.setAttribute("value", item.news_id);
      option.textContent = item.content;
      select.append(option);
    });
    const newsID = modal.querySelector(
      `#news_id>option[value='${dataOld.data.news_id ?? ""}']`
    );
    if (newsID !== null) newsID.setAttribute("selected", "");
  });
  const parent_comment = request.getAll().then((value) => {
    const select = document.getElementById("parent_comment");
    select.innerHTML = `<option value="">Mặc định</option>`;
    value.data.forEach((item) => {
      const option = document.createElement("option");
      option.setAttribute("value", item.parent_comment);
      option.textContent = item.content;
      select.append(option);
    });
    const parent_comment = modal.querySelector(
      `#parent_comment>option[value='${dataOld.data.parent_comment ?? ""}']`
    );
    if (parent_comment !== null) parent_comment.setAttribute("selected", "");
  });
  modal.querySelector("#content").value = dataOld.data.content ?? "";
  modal.querySelector("#likes").value = dataOld.data.likes ?? "";
  modal.querySelector("#created_at").value = dataOld.data.created_at ?? "";
  const validate = new Validate();
  const checkforms = {
    "#content": {
      type: "paragraph",
      options: 2,
    },
    "#likes": {
      type: "number",
    },
  };
  validate.checkFormAndDisplay(checkforms);
  const handleSubmit = async (e) => {
    e.preventDefault();
    if (validate.checkForm(checkforms, true)) {
      const formdata = new FormData(e.target);
      const keysToDelete = [];
      formdata.forEach((value, key) => {
        if (value === "") {
          keysToDelete.push(key);
        }
      });
      keysToDelete.forEach((key) => formdata.delete(key));
      const res = await request.put(id, formdata, false);
      const liveToast = document.getElementById("liveToast");
      validate.resetForm("#formEdit");
      liveToast.querySelector(".button-close").addEventListener(
        "click",
        (e) => {
          liveToast.style.display = "none";
        },
        false
      );
      modal.nextElementSibling.setAttribute("style", "");
      if (request.getStatus() === 200) {
        liveToast.setAttribute(
          "style",
          "display: block; --bs-toast-bg: #b3ffabd9"
        );
        liveToast.querySelector("#message").textContent =
          "Cập nhật thành công!";
        getDataByQuantity(currentPage);
        modal.style.display = "none";
      } else {
        liveToast.setAttribute(
          "style",
          "display: block; --bs-toast-bg: #ffababd9"
        );
        liveToast.querySelector("#message").textContent = "Cập nhật thất bại!";
      }
      document
        .getElementById("formEdit")
        .removeEventListener("submit", handleSubmit);
      setTimeout(() => (liveToast.style.display = "none"), 3000);
    }
  };
  document
    .getElementById("formEdit")
    .addEventListener("submit", handleSubmit, false);
}
