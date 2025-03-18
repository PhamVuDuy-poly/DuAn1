<?php
require_once '../Model/Contacts.php';
class ContactsController{
    protected  $execute;
    public function __construct(){
        $this->execute = new Contacts( "contacts" );
    }
    public function getAll(){
        return $this->execute->getAllData();
    }
    public function getOne($id){
        return $this->execute->getDataById($id);
    }
    public function create($dataRequest){
        $dataRequest['user_id'] = isset($dataRequest['user_id']) ? $dataRequest['user_id']: null;
        $dataRequest['name'] = isset($dataRequest['name']) ? $dataRequest['name']: null;
        $dataRequest['email'] = isset($dataRequest['email']) ? $dataRequest['email']: null;
        $dataRequest['phone'] = isset($dataRequest['phone']) ? $dataRequest['phone']: null;
        $dataRequest['message'] = isset($dataRequest['message']) ? $dataRequest['message']: null;
        return $this->execute->addData($dataRequest);
    }
    public function update($id, $dataRequest){
        $dataOld = $this->execute->getDataById($id);
        if(!$dataOld):return false;
        endif;
        settype($dataOld, 'array');
        $dataRequest['user_id'] = isset($dataRequest['user_id']) ? $dataRequest['user_id']: $dataOld['user_id'];
        $dataRequest['name'] = isset($dataRequest['name']) ? $dataRequest['name']: $dataOld['name'];
        $dataRequest['email'] = isset($dataRequest['email']) ? $dataRequest['email']: $dataOld['email'];
        $dataRequest['phone'] = isset($dataRequest['phone']) ? $dataRequest['phone']: $dataOld['phone'];
        $dataRequest['message'] = isset($dataRequest['message']) ? $dataRequest['message']: $dataOld['message'];
        $dataRequest['created_at'] = isset($dataRequest['created_at']) ? $dataRequest['created_at']: $dataOld['created_at'];
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
