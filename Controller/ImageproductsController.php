<?php
require_once "../Model/Imageproducts.php";
class ImageproductsController
{
    protected $execute;
    public function __construct(){
        $this->execute = new Imageproducts("imageproducts");
    }
    public function getAll(){
        return $this->execute->getAllData();
    }
    public function getOne($id){
        return $this->execute->getDataById($id);
    }
    public function create($dataRequest, $file){
        $dataRequest["album"] = null;
        $dataRequest["product_id"] = isset($dataRequest["product_id"]) ? $dataRequest["product_id"] : null;
        $dataRequest["location"] = isset($dataRequest["location"]) && ($dataRequest["location"]==0 || $dataRequest["location"]==1) ? $dataRequest["location"] : 1;
        $dataRequest["status"] = isset($dataRequest["status"]) && ($dataRequest["status"]==0 || $dataRequest["status"]==1) ? $dataRequest["status"] : 1;
        $dataImage = [];
        $result = true;
        try{
            if(isset($file['album']) && !is_array($file['album']['name']) && $file['album']['error'] === UPLOAD_ERR_OK) {
                $imagePath = BASE_IMAGE . "ImageProducts/" . time() . $file['album']['name'];
                move_uploaded_file($file['album']['tmp_name'], $imagePath);
                array_push($dataImage, $imagePath);
            }elseif(isset($file['album']) && is_array($file['album']['name']) && array_keys($file['album']['error'], UPLOAD_ERR_OK, true)) {
                array_walk($file['album']['name'], function ($fileName, $location, $fileError) use ($file, &$dataImage) {
                    if ($fileError[$location] === UPLOAD_ERR_OK) {
                        $imagePath = BASE_IMAGE . "ImageProducts/" . time() . $fileName;
                        move_uploaded_file($file['album']['tmp_name'][$location], $imagePath);
                        array_push($dataImage, $imagePath);
                    }
                }, $file['album']['error']);
            }
        }catch(Error){}
        if(count($dataImage) > 1){
            for($i = 0; $i < count($dataImage); $i++){
                $dataRequest["album"] = $dataImage[$i];
                $result = $this->execute->addData($dataRequest);
                if(!$result): break;
                endif;
            }
        }else{
            if($dataImage): $dataRequest["album"] = $dataImage[0];
            endif;
            $result = $this->execute->addData($dataRequest);
        }
        return $result;
    }

    public function update($id, $dataRequest, $file){
        $dataOld = $this->execute->getDataById($id);
        if(!$dataOld): return false;
        endif;
        settype($dataOld, "array");
        $dataRequest["album"] = $dataOld["album"];
        $dataRequest["product_id"] = isset($dataRequest["product_id"]) ? $dataRequest["product_id"] : $dataOld["product_id"];
        $dataRequest["location"] = isset($dataRequest["location"]) && ($dataRequest["location"]==0 || $dataRequest["location"]==1) ? $dataRequest["location"] : $dataOld["location"];
        $dataRequest["status"] = isset($dataRequest["status"]) && ($dataRequest["status"]==0 || $dataRequest["status"]==1) ? $dataRequest["status"] : $dataOld["status"];
        try {
            if($file["album"]['error']===UPLOAD_ERR_OK || (array_keys($file["album"]['error'], UPLOAD_ERR_OK, true) && is_array($file["album"]["error"]))){
                if(gettype($file["album"]["name"])==="array"){
                    $imagePath = BASE_IMAGE . "News/" . time() . $file["album"]["name"][array_keys($file["album"]["error"], UPLOAD_ERR_OK, true)[0]];
                }else{
                    $imagePath = BASE_IMAGE . "News/" . time() . $file["album"]["name"];
                }
                move_uploaded_file(gettype($file["album"]["tmp_name"])==="array"?$file["album"]["tmp_name"][array_keys($file["album"]["error"], UPLOAD_ERR_OK, true)[0]]:$file["album"]["tmp_name"], $imagePath);
                $dataRequest["album"] = $imagePath;
            }
        }catch (Error){}
        return !$this->execute->updateData($id, $dataRequest)?false:$dataOld;
    }
    public function delete($id){
        $checkid = $this->execute->getDataById($id);
        if(!$checkid): return false;
        endif;
        settype($checkid, "array");
        if(isset($checkid["album"])): unlink($checkid["album"]);
        endif;
        return !$this->execute->deleteDataById($id)?false:$checkid;
    }
}