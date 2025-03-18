<?php

class Mypromotions extends Management
{
    public function getDataByPromo($id, $mode = [])
    {
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `promo_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], true, $mode);
    }
    public function getDataByUser($id, $mode = [])
    {
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `user_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], true, $mode);
    }

    public function getDataById($id, $mode = [])
    {
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `mypromotions_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }

    public function addData($data, $mode = [])
    {
        $this->sql = "INSERT INTO {$this->tableName}(`promo_id`, `user_id`) VALUES (?, ?)";
        $params = [$data['promo_id'], $data['user_id']];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function updateData($id, $data, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `promo_id`=?,`user_id`=? WHERE `mypromotions_id`=?";
        $params = [$data['promo_id'], $data['user_id'], $id];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function deleteDataById($id, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `promo_id`= null WHERE `mypromotions_id`=?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "UPDATE {$this->tableName} SET `user_id`= null WHERE `mypromotions_id`=?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "DELETE FROM {$this->tableName} WHERE `mypromotions_id`=?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
}