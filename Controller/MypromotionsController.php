<?php

require_once "../Model/Mypromotions.php";

class MypromotionsController
{
    protected $execute;

    public function __construct()
    {
        $this->execute = new Mypromotions("mypromotions");
    }

    public function getAll()
    {
        return $this->execute->getAllData();
    }

    public function getByPromo($id)
    {
        return $this->execute->getDataByPromo($id);
    }

    public function getOne($id)
    {
        return $this->execute->getDataById($id);
    }

    public function create($dataRequest)
    {
        $dataRequest["promo_id"] = isset($dataRequest["promo_id"]) ? $dataRequest["promo_id"] : null;
        $dataRequest["user_id"] = isset($dataRequest["user_id"]) ? $dataRequest["user_id"] : null;
        return $this->execute->addData($dataRequest);
    }

    public function update($id, $dataRequest)
    {
        $dataOld = $this->execute->getDataById($id);
        if (!$dataOld): return false;
        endif;
        settype($dataOld, 'array');
        $dataRequest["promo_id"] = isset($dataRequest["promo_id"]) ? $dataRequest["promo_id"] : $dataOld["promo_id"];
        $dataRequest["user_id"] = isset($dataRequest["user_id"]) ? $dataRequest["user_id"] : $dataOld["user_id"];
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