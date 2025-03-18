<?php

class Productcategories extends Management
{
    public function getDataByCategory($id, $mode = [])
    {
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `category_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], true, $mode);
    }

    public function getDataById($id, $mode = [])
    {
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `productcategory_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }

    public function addData($data, $mode = [])
    {
        $this->sql = "INSERT INTO {$this->tableName}(`product_id`, `category_id`) VALUES (?, ?)";
        $params = [$data['product_id'], $data['category_id']];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function updateData($id, $data, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `product_id`=?,`category_id`=? WHERE `productcategory_id`=?";
        $params = [$data['product_id'], $data['category_id'], $id];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function deleteDataById($id, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `product_id`= null WHERE `productcategory_id`=?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "UPDATE {$this->tableName} SET `category_id`= null WHERE `productcategory_id`=?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "DELETE FROM {$this->tableName} WHERE `productcategory_id`=?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
}