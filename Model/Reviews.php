<?php
class Reviews extends Management
{
    public function getDataById($id, $mode = [])
    {
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `review_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
    public function addData($data, $mode = [])
    {
        $this->sql = "INSERT INTO {$this->tableName}(`product_id`, `user_id`, `comment`, `created_at`) VALUES (?,?,?,?)";
        $params = [$data['product_id'], $data['user_id'], $data['comment'], date("Y-m-d", time())];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }
    public function updateData($id, $data, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `product_id`=?,`user_id`=?,`comment`=?,`created_at`=? WHERE `review_id`=?";
        $params = [$data['product_id'], $data['user_id'], $data['comment'], $data['created_at'], $id];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }
    public function deleteDataById($id, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `product_id`= null WHERE `review_id`=?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "UPDATE {$this->tableName} SET `user_id`= null WHERE `review_id`=?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "DELETE FROM {$this->tableName} WHERE `review_id`=?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
}
