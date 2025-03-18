<?php

class Carts extends Management
{
    
    public function getDataById($id, $mode = []){
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `cart_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }

    public function addData($data, $mode = []){
        $this->sql = "INSERT INTO {$this->tableName}(`user_id`, `created_at`) VALUES (?, ?)";
        $params = [$data['user_id'], date("Y-m-d", time())];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function updateData($id, $data, $mode = []){
        $this->sql = "UPDATE {$this->tableName} SET `user_id` = ?, `created_at` = ? WHERE `cart_id` = ?";
        $params = [$data['user_id'], $data['created_at'], $id];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function deleteDataById($id, $mode = []){
        $this->sql = "UPDATE {$this->tableName} SET `user_id` = NULL WHERE `cart_id` = ?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);

        $this->sql = "DELETE FROM {$this->tableName} WHERE `cart_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
}

?>