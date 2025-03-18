<?php

class Categories extends Management
{
    public function getDataById($id, $mode = [])
    {
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `category_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }

    public function addData($data, $mode = [])
    {
        $this->sql = "INSERT INTO {$this->tableName}(`name`, `description`) VALUES (?, ?)";
        $params = [
            $data['name'], 
            isset($data['description']) ? $data['description'] : null
        ];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function updateData($id, $data, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} 
                      SET `name` = ?, `description` = ? 
                      WHERE `category_id` = ?";
        $params = [
            $data['name'], 
            isset($data['description']) ? $data['description'] : null, 
            $id
        ];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function deleteDataById($id, $mode = [])
    {
        $this->sql = "DELETE FROM {$this->tableName} WHERE `category_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
}