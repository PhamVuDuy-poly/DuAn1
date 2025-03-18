<?php
class News extends Management
{
    public function getDataById($id, $mode = [])
    {
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `news_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }

    public function addData($data, $mode = [])
    {
        $this->sql = "INSERT INTO {$this->tableName}(`title`, `content`, `image_url`, `user_id`, `created_at`, `status`) VALUES (?,?,?,?,?,?)";
        $params = [$data['title'], $data['content'], $data['image_url'], $data['user_id'], date("Y-m-d", time()), $data['status']];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function updateData($id, $data, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `title`=?,`content`=?,`image_url`=?,`user_id`=?,`created_at`=?,`status`=? WHERE `news_id`=?";
        $params = [$data['title'], $data['content'], $data['image_url'], $data['user_id'], $data['created_at'], $data['status'], $id];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function deleteDataById($id, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `user_id`= null WHERE `news_id`=?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "DELETE FROM {$this->tableName} WHERE `news_id`=?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
}
