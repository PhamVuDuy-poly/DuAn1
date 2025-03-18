<?php
require_once "../Model/Carts.php";

class CartsController {
    protected $execute;

    public function __construct() {
        $this->execute = new Carts("carts");
    }

    public function getAll() {
        return $this->execute->getAllData();
    }

    public function getOne($id) {
        return $this->execute->getDataById($id);
    }

    public function create($dataRequest) {
        $dataRequest["user_id"] = isset($dataRequest["user_id"]) ? $dataRequest["user_id"] : null;
        return $this->execute->addData($dataRequest);
    }

    public function update($id, $dataRequest) {
        $dataOld = $this->execute->getDataById($id);
        if (!$dataOld): return false;
        endif;
        settype($dataOld, 'array');
        $dataRequest["user_id"] = isset($dataRequest["user_id"]) ? $dataRequest["user_id"] : $dataOld["user_id"];
        $dataRequest["created_at"] = isset($dataRequest["created_at"]) ? $dataRequest["created_at"] : $dataOld["created_at"];
        return !$this->execute->updateData($id, $dataRequest) ? false : $dataOld;
    }

    public function delete($id) {
        $checkid = $this->execute->getDataById($id);
        if (!$checkid): return false;
        endif;
        settype($checkid, 'array');
        return !$this->execute->deleteDataById($id) ? false : $checkid;
    }
}
