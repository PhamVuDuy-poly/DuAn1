<?php
class Orders extends Management{
    public function getDataById($id, $mode = []){
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `order_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
    public function addData($data, $mode = []){
        $this->sql = "INSERT INTO {$this->tableName}(`user_id`,`status`, `total_amount`, `created_at`, `updated_at`) VALUES (?,?,?,?,?)";
        $params = [$data['user_id'],$data['status'],$data['total_amount'],date("Y-m-d", time()), null];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }
    public function updateData($id, $data, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `user_id`=?,`status`=?,`total_amount`=?,`created_at`=?,`updated_at`=? WHERE `order_id`=?";
        $params = [$data['user_id'],$data['status'],$data['total_amount'],$data['created_at'],$data['updated_at'], $id];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }
    public function deleteDataById($id, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `user_id`= null WHERE `order_id`=?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "DELETE FROM {$this->tableName} WHERE `order_id`=?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
}
