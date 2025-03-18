<?php
class CartItems extends Management
{
    public function getDataById($id, $mode = [])
    {
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `item_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }

    public function addData($data, $mode = [])
    {
        $this->sql = "INSERT INTO {$this->tableName}(`cart_id`, `product_id`, `quantity`, `price`) 
                      VALUES (?, ?, ?, ?)";
        $params = [
            $data['cart_id'], 
            $data['product_id'], 
            $data['quantity'], 
            $data['price']
        ];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function updateData($id, $data, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} 
                      SET `cart_id` = ?, `product_id` = ?, `quantity` = ?, `price` = ? 
                      WHERE `item_id` = ?";
        $params = [
            $data['cart_id'], 
            $data['product_id'], 
            $data['quantity'], 
            $data['price'], 
            $id
        ];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function deleteDataById($id, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `cart_id` = NULL WHERE `item_id` =?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "UPDATE {$this->tableName} SET `product_id` = NULL WHERE `item_id` =?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "DELETE FROM {$this->tableName} WHERE `item_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
}