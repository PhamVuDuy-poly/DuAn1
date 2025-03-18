class HTTPRequest{
    #API_BASE;
    #tableName;
    #dataAPI = null;
    #typeResponse = {
        /*basic: "Normal, same-origin response with all headers exposed, except 'Set-Cookie'.",
        cors: "Response from a valid cross-origin request, allowing access to certain headers and the body.",
        error: "Response due to a network error. Contains no useful error information. Status is 0, headers are empty and immutable.",
        opaque: "Response for a 'no-cors' request to a cross-origin resource. Severely restricted access to headers and body.",
        opaqueredirect: "Response when the fetch request is made with redirect: 'manual'. Status is 0, headers are empty, body is null, and trailer is empty."*/
        basic: "Phản hồi thông thường từ cùng nguồn(same-origin), với tất cả các header được hiển thị trừ 'Set-Cookie'.",
        cors: "Phản hồi từ yêu cầu cross-origin hợp lệ, cho phép truy cập một số header và nội dung (body).",
        error: "Phản hồi do lỗi mạng. Không chứa thông tin lỗi hữu ích. Trạng thái là 0, header rỗng và không thể thay đổi.",
        opaque: "Phản hồi cho yêu cầu 'no-cors' đến tài nguyên cross-origin. Truy cập vào header và nội dung bị hạn chế nghiêm ngặt.",
        opaqueredirect: "Phản hồi khi yêu cầu fetch được đặt với redirect: 'manual'. Trạng thái là 0, header rỗng, nội dung null và trailer rỗng."
    };
    #count = 20;
    #page = 0;
    #status;
    constructor(tableName) {
        this.#tableName = tableName ?? false;
        this.#API_BASE = APIServer.BASE_URL;
    }
    async #request(id = null, method = "GET", data = null, image = false){
        const api = `${this.#API_BASE}/${this.#tableName}${id!==null?`/${id}`:''}${image?`/PUT`:''}`;
        const initApi = {};
        initApi.method = method;
        if(data) initApi.body = data;
        const response = await fetch(api, initApi);
        this.#status = response.status;
        if(!response.ok){
            console.error(`Fetch API Error: ${this.#typeResponse[response.type]}`);
            throw new Error("Fetch API failed");
        }
        return await response.json();
    }
    async getAll(group = null /*Nhóm theo khóa của dữ liệu*/){
        if(!this.#tableName) throw new Error("Table not specified!");
        group = group || null;
        const dataResponse = await this.#request();
        if(group){
            dataResponse.data = Object.groupBy(dataResponse.data, item => item[group]);
        }
        return dataResponse;
    }
    async getAllLimit(page = 0, count = 20, group = null){
        if(!this.#tableName) throw new Error("Table not specified!");
        if(typeof page !== "number" || typeof count !== "number") throw new Error("Parameter image Invalid!");
        this.#page = page<=0?this.#page+=1:page;
        this.#count = count<=0?this.#count:count;
        group = group || null;
        const dataResponse = await this.#request();
if(group){
            dataResponse.data = Object.groupBy(dataResponse.data, item => item[group]);
        }
        dataResponse.data = dataResponse.data.slice((this.#page-1) * this.#count, this.#page * this.#count);
        return dataResponse;
    }
    async getOne(id){
        if(!this.#tableName) throw new Error("Table not specified!");
        if(!id) throw new Error("No Id found!");
        return await this.#request(id, "GET");
    }

    async post(data, image = false){
        if(!this.#tableName) throw new Error("Table not specified!");
        if(typeof image !== "boolean") console.error("Parameter image Invalid!");
        data = data || this.#dataAPI;
        if(!(data instanceof FormData)) throw new Error("Data must be an object FormData!");
        return await this.#request(null, "POST", data, false);
    }

    async put(id, data, image = false){
        if(!this.#tableName) throw new Error("Table not specified!");
        if(!id) throw new Error("No Id found!");
        if(typeof image !== "boolean") console.error("Parameter image Invalid!");
        data = data || this.#dataAPI;
        if(!(data instanceof FormData)) throw new Error("Data must be an object FormData!");
        return await this.#request(id, image?"POST":"PUT", data, image);
    }

    async delete(id){
        if(!this.#tableName) throw new Error("Table not specified!");
        if(!id) throw new Error("No Id found!");
        return await this.#request(id, "DELETE");
    }

    changeToData(objIterable){
        if(Array.isArray(objIterable)){
            this.#dataAPI = new FormData();
            objIterable.forEach(value => {
                this.#dataAPI.append(value[0], value[1]);
            });
        }else if(objIterable instanceof Map){
            this.#dataAPI = new FormData();
            objIterable.forEach((value, key) => {
                this.#dataAPI.append(key, value);
            });
        }else if(objIterable instanceof Set){
            this.#dataAPI = new FormData();
            objIterable.forEach(value => {
                this.#dataAPI.append(value[0], value[1]);
            });
        }else if(typeof objIterable === "object"){
            this.#dataAPI = new FormData();
            Object.entries(objIterable).forEach(value => {
                this.#dataAPI.append(value[0], value[1]);
            });
        }else{
            throw new Error("Parameter cannot be converted");
        }
    }
    getStatus(){
        return this.#status;
    }
    set tableName(value){
        this.#tableName = value;
    }

    get tableName(){
        return this.#tableName;
    }
}