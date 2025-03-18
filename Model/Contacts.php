<?php
class Contacts extends Management
{   
    public function getDataById($id, $mode = [])
    {
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `contact_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
    public function addData($data, $mode = [])
    {
        $this->sql = "INSERT INTO {$this->tableName}(`user_id`, `name`, `email`, `phone`, `message`, `created_at`) VALUES (?,?,?,?,?,?)";
        $params = [$data['user_id'],$data['name'],$data['email'],$data['phone'],$data['message'], date("Y-m-d", time())];
        return $this->connect->executeSQL($this->sql, $params, false, $mode); 
    }
    public function updateData($id, $data, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `user_id`=?,`name`=?,`email`=?,`phone`=?,`message`=?,`created_at`=? WHERE `contact_id`=?";
        $params = [$data['user_id'],$data['name'],$data['email'],$data['phone'],$data['message'],$data['created_at'], $id];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }
    public function deleteDataById($id, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `user_id`= null WHERE `contact_id`=?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "DELETE FROM {$this->tableName} WHERE `contact_id`=?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
};
