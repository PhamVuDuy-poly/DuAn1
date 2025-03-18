<?php
class Promotions extends Management
{
    public function getDataById($id, $mode = []) {
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `promo_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }

    public function addData($data, $mode = []) {
        $this->sql = "INSERT INTO {$this->tableName}(`code`, `discount`, `start_date`, `end_date`, `usage_limit`) VALUES (?, ?, ?, ?, ?)";
        $params = [
            $data['code'],
            $data['discount'],
            $data['start_date'],
            $data['end_date'],
            $data['usage_limit']
        ];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function updateData($id, $data, $mode = []) {
        $this->sql = "UPDATE {$this->tableName}
                      SET `code` = ?, `discount` = ?, `start_date` = ?, `end_date` = ?, `usage_limit` = ? 
                      WHERE `promo_id` = ?";
        $params = [
            $data['code'],
            $data['discount'],
            $data['start_date'],
            $data['end_date'],
            $data['usage_limit'],
            $id
        ];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function deleteDataById($id, $mode = []) {
        $this->sql = "DELETE FROM {$this->tableName} WHERE `promo_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
}
?>