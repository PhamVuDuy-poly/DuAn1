function WebHistory(){
    this.data = {};
    this.hash = "";
    this.localSt = false;
    this.create = (obj, hash = "", localSt = false) => {
        if(typeof obj !== "object") throw new Error("Invalid parameter");
        if(typeof localSt !== "boolean") throw new Error("Invalid parameter LocalStorage!");
        this.data = obj;
        this.hash = hash;
        this.localSt = localSt;
        if(this.localSt) localStorage.setItem(this.hash, JSON.stringify(this.data));
        else history.pushState(this.data, "", this.hash);
    }
    this.change = (obj) => {
        if(typeof obj !== "object") throw new Error("Invalid parameter");
        this.data = obj;
        if(this.localSt) localStorage.setItem(this.hash, JSON.stringify(this.data));
        else history.replaceState(this.data, "", this.hash);
    }
    this.delete = () => {
        if(this.localSt) localStorage.removeItem(this.hash);
        else history.replaceState({}, "", " ");
    }
    this.get = () => {
        if (this.localSt) return JSON.parse(localStorage.getItem(this.hash));
        else return history.state;
    }
}

window.addEventListener("storage", e => {
    WebHistory.prototype.data = e.oldValue;
    WebHistory.prototype.hash = e.key;
    WebHistory.prototype.change = true;
});