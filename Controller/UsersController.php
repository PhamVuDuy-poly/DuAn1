<?php
require_once "../Model/Users.php";
class UsersController{
    protected $execute;
    public function __construct(){
        $this->execute = new Users ('users');
    }
    public function getAll(){
        return $this->execute->getAllData();
    }
    public function getOne($id){
        return $this->execute->getDataById($id);
    }
    public function create($dataRequest, $file){
        $dataRequest['avatar'] = null;
        $dataRequest['name'] = isset($dataRequest["name"]) ? $dataRequest["name"] : null;
        $dataRequest['email'] = isset($dataRequest["email"]) ? $dataRequest["email"] : null;
        $dataRequest['password'] = isset($dataRequest["password"]) ? $dataRequest["password"] : null;
        $dataRequest['phone'] = isset($dataRequest["phone"]) ? $dataRequest["phone"] : null;
        $dataRequest['address'] = isset($dataRequest["address"]) ? $dataRequest["address"] : null;
        $dataRequest['bio'] = isset($dataRequest["bio"]) ? $dataRequest["bio"] : null;
        $dataRequest['role_id'] = isset($dataRequest["role_id"]) ? $dataRequest["role_id"] : null;
        $dataRequest["status"] = isset($dataRequest["status"]) && ($dataRequest["status"]==0 || $dataRequest["status"]==1) ? $dataRequest["status"] : 1;
        try {
            if($file["avatar"]['error']===UPLOAD_ERR_OK || (array_keys($file["avatar"]['error'], UPLOAD_ERR_OK, true) && is_array($file["avatar"]["error"]))){
                if(gettype($file["avatar"]["name"])==="array"){
                    $imagePath = BASE_IMAGE . "Users/" . time() . $file["avatar"]["name"][array_keys($file["avatar"]["error"], UPLOAD_ERR_OK, true)[0]];
                }else{
                    $imagePath = BASE_IMAGE . "Users/" . time() . $file["avatar"]["name"];
                }
                move_uploaded_file(gettype($file["avatar"]["tmp_name"])==="array"?$file["avatar"]["tmp_name"][array_keys($file["avatar"]["error"], UPLOAD_ERR_OK, true)[0]]:$file["avatar"]["tmp_name"], $imagePath);
                $dataRequest["avatar"] = $imagePath;
            }
        }catch (Error){}
        return $this->execute->addData($dataRequest);
    }
    public function update($id, $dataRequest, $file){
        $dataOld = $this->execute->getDataById($id);
        if(!$dataOld):return false;
        endif;
        setType($dataOld, "array");
        $dataRequest['avatar'] = $dataOld['avatar'];
        $dataRequest['name'] = isset($dataRequest["name"]) ? $dataRequest["name"] : $dataOld['name'];
        $dataRequest['email'] = isset($dataRequest["email"]) ? $dataRequest["email"] : $dataOld['email'];
        $dataRequest['password'] = isset($dataRequest["password"]) ? $dataRequest["password"] : $dataOld['password'];
        $dataRequest['phone'] = isset($dataRequest["phone"]) ? $dataRequest["phone"] : $dataOld['phone'];
        $dataRequest['address'] = isset($dataRequest["address"]) ? $dataRequest["address"] : $dataOld['address'];
        $dataRequest['bio'] = isset($dataRequest["bio"]) ? $dataRequest["bio"] : $dataOld['bio'];
        $dataRequest['created_at'] = isset($dataRequest["created_at"]) ? $dataRequest["created_at"] : $dataOld['created_at'];
        $dataRequest['role_id '] = isset($dataRequest["role_id "]) ? $dataRequest["role_id "] : $dataOld['role_id'];
        $dataRequest["status"] = isset($dataRequest["status"]) && ($dataRequest["status"]==0 || $dataRequest["status"]==1) ? $dataRequest["status"] : $dataOld["status"];
        try {
            if($file["avatar"]['error']===UPLOAD_ERR_OK || (array_keys($file["avatar"]['error'], UPLOAD_ERR_OK, true) && is_array($file["avatar"]["error"]))){
                if(gettype($file["avatar"]["name"])==="array"){
                    $imagePath = BASE_IMAGE . "Users/" . time() . $file["avatar"]["name"][array_keys($file["avatar"]["error"], UPLOAD_ERR_OK, true)[0]];
                }else{
                    $imagePath = BASE_IMAGE . "Users/" . time() . $file["avatar"]["name"];
                }
                move_uploaded_file(gettype($file["avatar"]["tmp_name"])==="array"?$file["avatar"]["tmp_name"][array_keys($file["avatar"]["error"], UPLOAD_ERR_OK, true)[0]]:$file["avatar"]["tmp_name"], $imagePath);
                $dataRequest["avatar"] = $imagePath;
            }
        }catch (Error){}
        return !$this->execute->updateData($id, $dataRequest)?false:$dataOld;
    }
    public function delete($id){
        $checkid = $this->execute->getDataById($id);
        if(!$checkid): return false;
        endif;
        settype($checkid, "array");
        if(isset($checkid["avatar"])): unlink($checkid["avatar"]);
        endif;
        return !$this->execute->deleteDataById($id)?false:$checkid;
    }
    public function checkLogin($dataRequest)
    {
        $dataRequest['email'] = $dataRequest["email"] ?? false;
        $dataRequest['password'] = $dataRequest["password"] ?? false;
        if(!isset($dataRequest["email"]) || !isset($dataRequest["password"])): return false;
        endif;
        return $this->execute->getDataByEmailAndPassword($dataRequest["email"], $dataRequest["password"]);
    }
}