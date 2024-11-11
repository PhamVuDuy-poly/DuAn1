<?php
require_once "ConnectDatabase.php";
abstract class Management
{
    public readonly string $tableName;
    protected $connect = null;
    public function __construct($tableName){
        $this->tableName = $tableName;
        $this->connect = new ConnectDatabase();
    }
    public function getAllData(){
        
    }
    abstract public function getDataById($id);
    abstract public function addData($data);
    abstract public function updateData($id, $data);
    abstract public function deleteDataById($id);
}

