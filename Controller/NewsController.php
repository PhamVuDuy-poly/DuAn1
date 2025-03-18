<?php
    require_once "../Model/News.php";
    class NewsController
    {
        protected $execute;
        public function __construct(){
            $this->execute = new News("news");
        }
        public function getAll(){
            return $this->execute->getAllData();
        }
        public function getOne($id){
            return $this->execute->getDataById($id);
        }
        public function create($dataRequest, $file){
            $dataRequest["image_url"] = null;
            $dataRequest["title"] = isset($dataRequest["title"]) ? $dataRequest["title"] : null;
            $dataRequest["content"] = isset($dataRequest["content"]) ? $dataRequest["content"] : null;
            $dataRequest["user_id"] = isset($dataRequest["user_id"]) ? $dataRequest["user_id"] : null;
            $dataRequest["status"] = isset($dataRequest["status"]) && ($dataRequest["status"]==0 || $dataRequest["status"]==1) ? $dataRequest["status"] : 1;
            try {
                if($file["image_url"]['error']===UPLOAD_ERR_OK || (array_keys($file["image_url"]['error'], UPLOAD_ERR_OK, true) && is_array($file["image_url"]["error"]))){
                    if(gettype($file["image_url"]["name"])==="array"){
                        $imagePath = BASE_IMAGE . "News/" . time() . $file["image_url"]["name"][array_keys($file["image_url"]["error"], UPLOAD_ERR_OK, true)[0]];
                    }else{
                        $imagePath = BASE_IMAGE . "News/" . time() . $file["image_url"]["name"];
                    }
                    move_uploaded_file(gettype($file["image_url"]["tmp_name"])==="array"?$file["image_url"]["tmp_name"][array_keys($file["image_url"]["error"], UPLOAD_ERR_OK, true)[0]]:$file["image_url"]["tmp_name"], $imagePath);
                    $dataRequest["image_url"] = $imagePath;
                }
            }catch (Error){}
            return $this->execute->addData($dataRequest);
        }

        public function update($id, $dataRequest, $file){
            $dataOld = $this->execute->getDataById($id);
            if(!$dataOld): return false;
                endif;
            settype($dataOld, "array");
            $dataRequest["image_url"] = $dataOld["image_url"];
            $dataRequest["title"] = isset($dataRequest["title"]) ? $dataRequest["title"] : $dataOld["title"];
            $dataRequest["content"] = isset($dataRequest["content"]) ? $dataRequest["content"] : $dataOld["content"];
            $dataRequest["user_id"] = isset($dataRequest["user_id"]) ? $dataRequest["user_id"] : $dataOld["user_id"];
            $dataRequest["created_at"] = isset($dataRequest["created_at"]) ? $dataRequest["created_at"] : $dataOld["created_at"];
            $dataRequest["status"] = isset($dataRequest["status"]) && ($dataRequest["status"]==0 || $dataRequest["status"]==1) ? $dataRequest["status"] : $dataOld["status"];
            try {
                if($file["image_url"]['error']===UPLOAD_ERR_OK || (array_keys($file["image_url"]['error'], UPLOAD_ERR_OK, true) && is_array($file["image_url"]["error"]))){
                    if(gettype($file["image_url"]["name"])==="array"){
                        $imagePath = BASE_IMAGE . "News/" . time() . $file["image_url"]["name"][array_keys($file["image_url"]["error"], UPLOAD_ERR_OK, true)[0]];
                    }else{
                        $imagePath = BASE_IMAGE . "News/" . time() . $file["image_url"]["name"];
                    }
                    move_uploaded_file(gettype($file["image_url"]["tmp_name"])==="array"?$file["image_url"]["tmp_name"][array_keys($file["image_url"]["error"], UPLOAD_ERR_OK, true)[0]]:$file["image_url"]["tmp_name"], $imagePath);
                    $dataRequest["image_url"] = $imagePath;
                }
            }catch (Error){}
            return !$this->execute->updateData($id, $dataRequest)?false:$dataOld;
        }
        public function delete($id){
            $checkid = $this->execute->getDataById($id);
            if(!$checkid): return false;
            endif;
            settype($checkid, "array");
            if(isset($checkid["image_url"])): unlink($checkid["image_url"]);
            endif;
            return !$this->execute->deleteDataById($id)?false:$checkid;
        }
    }

