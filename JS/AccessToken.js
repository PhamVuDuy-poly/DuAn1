class AccessToken{
    #token;
    #request;
    #role;
    #info;
    async handleTokenLocal(id = null){
        this.#request = new HTTPRequest("Users");
        if(id){
            const response = await this.#request.getOne(id);
            if(this.#request.getStatus()===200){
                this.#token = response.data.sessionId;
                this.#role = response.data.role_id===1?"Admin":"User";
                this.#info = response.data;
            }else{
                console.error("A very serious error has occurred! Request Error!");
            }
        }else{
            if(this.#getTokenLocal()){
                const response = await this.#request.getAll();
                if(this.#request.getStatus()===200){
                    const data = response.data;
                    const check = data.find(value => {
                        if(value.sessionId===this.#getTokenLocal()){
                            this.#token = value.sessionId;
                            this.#role = value.role_id===1?"Admin":"User";
                            this.#info = value;
                            return true;
                        }
                        return false;
                    });
                    if(!check) localStorage.removeItem("sessionId");
                }else{
                    console.error("A very serious error has occurred! Request Error!");
                }
            }else{
                console.warn("Parameter Invalid!");
            }
        }
    }
    saveToken(){
        if(this.#token) localStorage.setItem("sessionId", this.#token);
    }
    removeToken(clearLocal = true){
        if(this.#getTokenLocal()){
            if(this.#getTokenLocal()!==this.#token) console.warn("Different Tokens");
            localStorage.removeItem("sessionId");
            if(clearLocal){
                this.#token = null;
                this.#role = null;
                this.#info = null;
                this.#request = null;
            }
            return true;
        }else{
            return false;
        }
    }
    #getTokenLocal(){
        return localStorage.getItem("sessionId");
    }
    getToken(){
        return this.#token ?? false;
    }
    getRole(){
        return this.#role ?? false;
    }
    getInfo(){
        return this.#info ?? false;
    }
}

window.addEventListener("storage", e =>{
    if(e.key==="sessionId") localStorage.setItem("sessionId", e.oldValue);
}, false);