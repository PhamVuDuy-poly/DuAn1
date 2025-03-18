<?php
class Productvariants extends Management{
    public function getDataById($id, $mode = []){
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `productVariant_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
    public function addData($data, $mode = []){
        $this->sql = "INSERT INTO {$this->tableName}(`product_id`,`material`, `color`, `price`, `price_reduced`, `stock_quantity`, `start_at`, `end_at`, `status`) VALUES (?,?,?,?,?,?,?,?,?)";
        $params = [$data['product_id'],$data['material'],$data['color'],$data['price'],$data['price_reduced'],$data['stock_quantity'],$data['start_at'],$data['end_at'],$data['status']];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }
    public function updateData($id, $data, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `product_id`=?,`material`=?,`color`=?,`price`=?,`price_reduced`=?,`stock_quantity`=?,`start_at`=?,`end_at`=?,`status`=? WHERE `productVariant_id`=?";
        $params = [$data['product_id'],$data['material'],$data['color'],$data['price'],$data['price_reduced'],$data['stock_quantity'],$data['start_at'],$data['end_at'],$data['status'], $id];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }
    public function deleteDataById($id, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `product_id`= null WHERE `productVariant_id`=?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "DELETE FROM {$this->tableName} WHERE `productVariant_id`=?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
}

