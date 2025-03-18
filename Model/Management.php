<?php
require_once "ConnectDatabase.php";
abstract class Management
{
    public readonly string $tableName;
    protected $connect = null, $sql = null;
    public function __construct($tableName){
        $this->tableName = $tableName;
        $this->connect = new ConnectDatabase();
    }
    public function getAllData($mode = []){
        $this->sql = "SELECT * FROM $this->tableName";
        $data = $this->connect->executeSQL($this->sql, [], true, $mode);
        return $data;
    }
    abstract public function getDataById($id, $mode);
    abstract public function addData($data, $mode);
    abstract public function updateData($id, $data, $mode);
    abstract public function deleteDataById($id, $mode);
}