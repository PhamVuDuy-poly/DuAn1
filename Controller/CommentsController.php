<?php
    require_once "../Model/Comments.php";

    class CommentsController{
        protected $execute;

        public function __construct(){
            $this->execute = new Comments("comments");
        }

        public function getAll(){
            return $this->execute->getAllData();
        }

        public function getOne($id){
            return $this->execute->getDataById($id);
        }
        public function getOneParents($id){
            return $this->execute->getDataByIdParents($id);
        }
        public function create($dataRequest){
            $dataRequest["user_id"] = isset($dataRequest["user_id"]) ? $dataRequest["user_id"] : null;
            $dataRequest["news_id"] = isset($dataRequest["news_id"]) ? $dataRequest["news_id"] : null;
            $dataRequest["content"] = isset($dataRequest["content"]) ? $dataRequest["content"] : null;
            $dataRequest["likes"] = isset($dataRequest["likes"]) && ($dataRequest["likes"]==0 || $dataRequest["likes"]==1) ? $dataRequest["likes"] : 0;
            $dataRequest["parent_comment"] = isset($dataRequest["parent_comment"]) ? $dataRequest["parent_comment"] : null;
            return $this->execute->addData($dataRequest);
        }

        public function update($id,$dataRequest){
            $dataOld = $this->execute->getDataById($id);
            if(!$dataOld): return false;
            endif;
            settype($dataOld, 'array');
            $dataRequest["user_id"] = isset($dataRequest["user_id"]) ? $dataRequest["user_id"] : $dataOld["user_id"];
            $dataRequest["news_id"] = isset($dataRequest["news_id"]) ? $dataRequest["news_id"] : $dataOld["news_id"];
            $dataRequest["content"] = isset($dataRequest["content"]) ? $dataRequest["content"] : $dataOld["content"];
            $dataRequest["likes"] = isset($dataRequest["likes"]) && ($dataRequest["likes"]==0 || $dataRequest["likes"]==1) ? $dataRequest["likes"] : $dataOld["likes"];
            $dataRequest["parent_comment"] = isset($dataRequest["parent_comment"]) ? $dataRequest["parent_comment"] : $dataOld["parent_comment"];
            $dataRequest["created_at"] = isset($dataRequest["created_at"]) ? $dataRequest["created_at"] : $dataOld["created_at"];
            return !$this->execute->updateData($id, $dataRequest)? false : $dataOld;
        }
        
        public function delete($id){
            $checkid = $this->execute->getDataById($id);
            if(!$checkid): return false;
            endif;
            settype($checkid, 'array');
            return !$this->execute->deleteDataById($id)? false : $checkid;
        }
    }