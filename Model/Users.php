<?php
class Users extends Management{
    public function getDataById($id, $mode = [])
    {
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `user_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode); 
    }
    public function addData($data, $mode = [])
    {
        $this->sql = "INSERT INTO {$this->tableName}(`name`, `email`, `password`, `phone`, `address`, `bio`, `avatar`, `role_id`, `created_at`, `updated_at`, `status`, `sessionId`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $params = [$data['name'],$data['email'],$data['password'],$data['phone'],$data['address'],$data['bio'],$data['avatar'],$data['role_id'],date("Y-m-d", time()), null,$data['status'], session_create_id() . session_create_id() . session_create_id() . session_create_id() . session_create_id() . session_create_id() . session_create_id() . session_create_id()];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }
    public function updateData($id, $data, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `name`=?,`email`=?,`password`=?,`phone`=?,`address`=?,`bio`=?,`avatar`=?,`role_id`=?,`created_at`=?,`updated_at`=?,`status`=? WHERE `user_id`=?";
        $params = [$data['name'],$data['email'],$data['password'],$data['phone'],$data['address'],$data['bio'],$data['avatar'],$data['role_id'],$data['created_at'],date("Y-m-d", time()),$data['status'], $id];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }
    public function deleteDataById($id, $mode = [])
    {
         $this->sql = "UPDATE {$this->tableName} SET `email`= null WHERE `user_id`=?";
         $this->connect->executeSQL($this->sql, [$id], false, $mode);
         $this->sql = "UPDATE {$this->tableName} SET `role_id`= null WHERE `user_id`=?";
         $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "DELETE FROM {$this->tableName} WHERE `user_id`=?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
    public function getDataByEmailAndPassword($email, $password, $mode = []){
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `email`=? AND `password`=?";
        return $this->connect->executeSQL($this->sql, [$email, $password], false, $mode);
    }
}