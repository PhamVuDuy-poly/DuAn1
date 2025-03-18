<?php
require_once "../Model/Reviews.php";

class ReviewsController
{
    protected $execute;
    public function __construct()
    {
        $this->execute = new Reviews("reviews");
    }
    public function getAll()
    {
        return $this->execute->getAllData();
    }
    public function getOne($id)
    {
        return $this->execute->getDataById($id);
    }
    public function create($dataRequest)
    {
        $dataRequest["product_id"] = isset($dataRequest["product_id"]) ? $dataRequest["product_id"] : null;
        $dataRequest["user_id"] = isset($dataRequest["user_id"]) ? $dataRequest["user_id"] : null;
        $dataRequest["comment"] = isset($dataRequest["comment"]) ? $dataRequest["comment"] : null;

        return $this->execute->addData($dataRequest);
    }

    public function update($id, $dataRequest)
    {
        $dataOld = $this->execute->getDataById($id);
        if (!$dataOld): return false;
        endif;
        settype($dataOld, "array");
        $dataRequest["product_id"] = isset($dataRequest["product_id"]) ? $dataRequest["product_id"] : $dataOld['product_id'];
        $dataRequest["user_id"] = isset($dataRequest["user_id"]) ? $dataRequest["user_id"] : $dataOld['user_id'];
        $dataRequest["comment"] = isset($dataRequest["comment"]) ? $dataRequest["comment"] : $dataOld['comment'];
        $dataRequest["created_at"] = isset($dataRequest["created_at"]) ? $dataRequest["created_at"] : $dataOld['created_at'];
        return !$this->execute->updateData($id, $dataRequest)?false:$dataOld;
    }
    public function delete($id){
        $checkid = $this->execute->getDataById($id);
            if(!$checkid): return false;
            endif;
            settype($checkid, "array");
            return !$this->execute->deleteDataById($id)?false:$checkid;
    }
}

