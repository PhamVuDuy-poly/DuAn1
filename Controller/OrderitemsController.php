<?php
require_once '../Model/Orderitems.php';
class OrderitemsController{
    protected $execute;
    public function __construct(){
        $this->execute = new Orderitems("orderitems");
    }
    public function getAll(){
        return $this->execute->getAllData();
    }
    public function getOne($id){
        return $this->execute->getDataById($id);
    }
    public function create($dataRequest){
        $dataRequest['order_id'] = isset($dataRequest['order_id']) ? $dataRequest['order_id']: null;
        $dataRequest['product_id'] = isset($dataRequest['product_id']) ? $dataRequest['product_id']: null;
        $dataRequest['quantity'] = isset($dataRequest['quantity']) ? $dataRequest['quantity']: null;
        $dataRequest['price'] = isset($dataRequest['price']) ? $dataRequest['price']: null;
        return $this->execute->addData($dataRequest);
    }
    public function update($id, $dataRequest){
        $dataOld = $this->execute->getDataById($id);
        if(!$dataOld):return false;
        endif;
        settype($dataOld, 'array');
        $dataRequest['order_id'] = isset($dataRequest['order_id']) ? $dataRequest['order_id']: $dataOld['order_id'];
        $dataRequest['product_id'] = isset($dataRequest['product_id']) ? $dataRequest['product_id']: $dataOld['product_id'];
        $dataRequest['quantity'] = isset($dataRequest['quantity']) ? $dataRequest['quantity']: $dataOld['quantity'];
        $dataRequest['price'] = isset($dataRequest['price']) ? $dataRequest['price']: $dataOld['price'];
        return !$this->execute->updateData($id, $dataRequest)?false:$dataOld;
    }
    public function delete($id){
        $checkid = $this->execute->getDataById($id);
        if(!$checkid):return false;
        endif;
        settype($checkid, 'array');
        return !$this->execute->deleteDataById($id)?false:$checkid;
    }
}