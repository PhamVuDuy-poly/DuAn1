<?php
require_once "../Model/Promotions.php";

class PromotionsController {
    protected $execute;

    public function __construct() {
        $this->execute = new Promotions("promotions");
    }

    public function getAll() {
        return $this->execute->getAllData();
    }

    public function getOne($id) {
        return $this->execute->getDataById($id);
    }

    public function create($dataRequest) {
        $dataRequest["code"] = isset($dataRequest["code"]) ? $dataRequest["code"] : null;
        $dataRequest["discount"] = isset($dataRequest["discount"]) ? $dataRequest["discount"] : null;
        $dataRequest["start_date"] = isset($dataRequest["start_date"]) ? $dataRequest["start_date"] : null;
        $dataRequest["end_date"] = isset($dataRequest["end_date"]) ? $dataRequest["end_date"] : null;
        $dataRequest["usage_limit"] = isset($dataRequest["usage_limit"]) ? $dataRequest["usage_limit"] : null;
        return $this->execute->addData($dataRequest);
    }

    public function update($id, $dataRequest) {
        $dataOld = $this->execute->getDataById($id);
        if (!$dataOld): return false;
        endif;
        settype($dataOld, 'array');
        $dataRequest["code"] = isset($dataRequest["code"]) ? $dataRequest["code"] : $dataOld["code"];
        $dataRequest["discount"] = isset($dataRequest["discount"]) ? $dataRequest["discount"] : $dataOld["discount"];
        $dataRequest["start_date"] = isset($dataRequest["start_date"]) ? $dataRequest["start_date"] : $dataOld["start_date"];
        $dataRequest["end_date"] = isset($dataRequest["end_date"]) ? $dataRequest["end_date"] : $dataOld["end_date"];
        $dataRequest["usage_limit"] = isset($dataRequest["usage_limit"]) ? $dataRequest["usage_limit"] : $dataOld["usage_limit"];
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
?>
