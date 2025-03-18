<?php
require_once "../Model/Orders.php";
class OrdersController{
    protected $execute;
    public function __construct(){
        $this->execute = new Orders ('orders');
    }
    public function getAll(){
        return $this->execute->getAllData();
    }
    public function getOne($id){
        return $this->execute->getDataById($id);
    }
    public function create($dataRequest){
        $dataRequest['user_id'] = isset($dataRequest['user_id']) ? $dataRequest['user_id']: null;
        $dataRequest['status'] = isset($dataRequest['status']) && ($dataRequest["status"]==0 || $dataRequest["status"]==1 || $dataRequest["status"]==2) ? $dataRequest['status']: 0;
        $dataRequest['total_amount'] = isset($dataRequest['total_amount']) ? $dataRequest['total_amount']: null;
        return $this->execute->addData($dataRequest);
    }
    public function update($id, $dataRequest){
        $dataOld = $this->execute->getDataById($id);
        if(!$dataOld):return false;
        endif;
        settype($dataOld, 'array');
        $dataRequest['user_id'] = isset($dataRequest['user_id']) ? $dataRequest['user_id']: $dataOld['user_id'];
        $dataRequest['status'] = isset($dataRequest['status']) && ($dataRequest["status"]==0 || $dataRequest["status"]==1 || $dataRequest["status"]==2) ? $dataRequest['status']: $dataOld['status'];
        $dataRequest['total_amount'] = isset($dataRequest['total_amount']) ? $dataRequest['total_amount']: $dataOld['total_amount'];
        $dataRequest['created_at'] = isset($dataRequest['created_at']) ? $dataRequest['created_at']: $dataOld['created_at'];
        $dataRequest['updated_at'] = isset($dataRequest['updated_at']) ? $dataRequest['updated_at']: $dataOld['updated_at'];
        return !$this->execute->updateData($id, $dataRequest)?false:$dataOld;
    }
    public function delete($id){
        $checkid = $this->execute->getDataById($id);
        if(!$checkid):return false;
        endif;
        settype($checkid, 'array');
        return !$this->execute->deleteDataById($id)?false:$checkid;
    }
}
