<?php
require_once "../Model/CartItems.php";

class CartItemsController {
    protected $execute;

    public function __construct() {
        $this->execute = new CartItems("cartitems");
    }

    public function getAll() {
        return $this->execute->getAllData();
    }

    public function getOne($id) {
        return $this->execute->getDataById($id);
    }

    public function create($dataRequest) {
        $dataRequest["cart_id"] = isset($dataRequest["cart_id"]) ? $dataRequest["cart_id"] : null;
        $dataRequest["product_id"] = isset($dataRequest["product_id"]) ? $dataRequest["product_id"] : null;
        $dataRequest["quantity"] = isset($dataRequest["quantity"]) ? $dataRequest["quantity"] : 1; // Mặc định là 1
        $dataRequest["price"] = isset($dataRequest["price"]) ? $dataRequest["price"] : null;
        return $this->execute->addData($dataRequest);
    }

    public function update($id, $dataRequest) {
        $dataOld = $this->execute->getDataById($id);
        if (!$dataOld): return false;
        endif;
        settype($dataOld, 'array');
        $dataRequest["cart_id"] = isset($dataRequest["cart_id"]) ? $dataRequest["cart_id"] : $dataOld["cart_id"];
        $dataRequest["product_id"] = isset($dataRequest["product_id"]) ? $dataRequest["product_id"] : $dataOld["product_id"];
        $dataRequest["quantity"] = isset($dataRequest["quantity"]) ? $dataRequest["quantity"] : $dataOld["quantity"];
        $dataRequest["price"] = isset($dataRequest["price"]) ? $dataRequest["price"] : $dataOld["price"];
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
