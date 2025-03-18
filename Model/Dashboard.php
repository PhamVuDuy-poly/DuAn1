<?php
require_once "./ConnectDatabase.php";
class Dashboard{
    protected $connect = null, $sql = null;
    public function __construct(){
        $this->connect = new ConnectDatabase();
    }
    public function getAllOrdersPending(){
        $this->sql = "Select * from `orders` where `status` = 0";
        return $this->connect->executeSQL($this->sql);
    }
    public function getAllOrdersAccepted(){
        $this->sql = "Select * from `orders` where `status` = 1";
        return $this->connect->executeSQL($this->sql);
    }
    public function getAmountMoneyFromOrdersAccepted(){
        $orders = $this->getAllOrdersAccepted();
        $this->sql = "Select `order_id`, SUM(price) as `total_money` from `orderitems`";
        $id = [];
        foreach($orders as $order){
            array_push($id, $order->order_id);
        }
        $this->sql .= " where `order_id` in(".implode(",", $id).")";
        $this->sql .= " GROUP BY `order_id`";
        return $this->connect->executeSQL($this->sql);
    }
}
$dashboard = new Dashboard();
echo "<pre>";
print_r($dashboard->getAmountMoneyFromOrdersAccepted());