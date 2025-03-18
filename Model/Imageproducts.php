<?php
class Imageproducts extends Management
{
    public function getDataById($id, $mode = [])
    {
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `imageProduct_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
    public function addData($data, $mode = [])
    {
        $this->sql = "INSERT INTO {$this->tableName}(`product_id`, `album`, `location`, `status`) VALUES (?, ?, ?, ?)";
        $params = [$data['product_id'], $data['album'], $data['location'],$data['status']];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }
    public function updateData($id, $data, $mode = []){
        $this->sql = "UPDATE {$this->tableName} SET `product_id`=?,`album`=?,`location`=?,`status`=? WHERE `imageProduct_id`= ?";
        $params = [$data['product_id'], $data['album'], $data['location'],$data['status'], $id];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }
    public function deleteDataById($id, $mode = []){
        $this->sql = "UPDATE {$this->tableName} SET `product_id`= null WHERE `imageProduct_id`= ?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "DELETE FROM {$this->tableName} WHERE `imageProduct_id`=?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
}
