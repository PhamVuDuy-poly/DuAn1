<?php
require_once "../Model/Categories.php";

class CategoriesController {
    protected $execute;
    public function __construct() {
        $this->execute = new Categories("categories");
    }
    public function getAll() {
        return $this->execute->getAllData();
    }
    public function getOne($id) {
        return $this->execute->getDataById($id);
    }
    public function create($dataRequest) {
        $dataRequest["name"] = isset($dataRequest["name"]) ? $dataRequest["name"] : null;
        $dataRequest["description"] = isset($dataRequest["description"]) ? $dataRequest["description"] : null;
        return $this->execute->addData($dataRequest);
    }
    public function update($id, $dataRequest) {
        $dataOld = $this->execute->getDataById($id);
        if (!$dataOld): return false;
        endif;
        settype($dataOld, 'array');
        $dataRequest["name"] = isset($dataRequest["name"]) ? $dataRequest["name"] : $dataOld["name"];
        $dataRequest["description"] = isset($dataRequest["description"]) ? $dataRequest["description"] : $dataOld["description"];
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