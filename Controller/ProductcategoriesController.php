<?php

require_once "../Model/Productcategories.php";

class ProductcategoriesController
{
    protected $execute;

    public function __construct()
    {
        $this->execute = new Productcategories("productcategories");
    }

    public function getAll()
    {
        return $this->execute->getAllData();
    }

    public function getByCategory($id)
    {
        return $this->execute->getDataByCategory($id);
    }

    public function getOne($id)
    {
        return $this->execute->getDataById($id);
    }

    public function create($dataRequest)
    {
        $dataRequest["product_id"] = isset($dataRequest["product_id"]) ? $dataRequest["product_id"] : null;
        $dataRequest["category_id"] = isset($dataRequest["category_id"]) ? $dataRequest["category_id"] : null;
        return $this->execute->addData($dataRequest);
    }

    public function update($id, $dataRequest)
    {
        $dataOld = $this->execute->getDataById($id);
        if (!$dataOld): return false;
        endif;
        settype($dataOld, 'array');
        $dataRequest["product_id"] = isset($dataRequest["product_id"]) ? $dataRequest["product_id"] : $dataOld["product_id"];
        $dataRequest["category_id"] = isset($dataRequest["category_id"]) ? $dataRequest["category_id"] : $dataOld["category_id"];
        return !$this->execute->updateData($id, $dataRequest) ? false : $dataOld;
    }

    public function delete($id)
    {
        $checkid = $this->execute->getDataById($id);
        if (!$checkid): return false;
        endif;
        settype($checkid, 'array');
        return !$this->execute->deleteDataById($id) ? false : $checkid;
    }
}