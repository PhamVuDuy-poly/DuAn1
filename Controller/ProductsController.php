<?php
require_once "../Model/Products.php";
class ProductsController
{
    protected $execute;
    public function __construct(){
        $this->execute = new Products("products");
    }
    public function getAll(){
        return $this->execute->getAllData();
    }
    public function getOne($id){
        return $this->execute->getDataById($id);
    }
    
    public function create($dataRequest, $file){
        $dataRequest['name'] = isset($dataRequest['name'])?$dataRequest['name']:null;
        $dataRequest['description'] = isset($dataRequest['description'])?$dataRequest['description']:null;
        $dataRequest['brand'] = isset($dataRequest['brand'])?$dataRequest['brand']:null;
        $dataRequest['stock_quantity'] = isset($dataRequest['stock_quantity'])?$dataRequest['stock_quantity']:null;
        $dataRequest['status'] = isset($dataRequest['status']) && ($dataRequest["status"]==0 || $dataRequest["status"]==1)?$dataRequest['status']:1;
        $dataRequest['imageProducts'] = isset($dataRequest['imageProducts']) ? json_decode($dataRequest['imageProducts'], true):[];
        $dataRequest['productVariants'] = isset($dataRequest['productVariants'])?json_decode($dataRequest['productVariants'], true):[];
        $dataImageRequest = [];
        try{
            if(isset($file['album']) && !is_array($file['album']['name']) && $file['album']['error'] === UPLOAD_ERR_OK) {
                $imagePath = BASE_IMAGE . "ImageProducts/" . time() . $file['album']['name'];
                move_uploaded_file($file['album']['tmp_name'], $imagePath);
                array_push($dataImageRequest, $imagePath);
            }elseif(isset($file['album']) && is_array($file['album']['name']) && array_keys($file['album']['error'], UPLOAD_ERR_OK, true)) {
                array_walk($file['album']['name'], function ($fileName, $location, $fileError) use ($file, &$dataImageRequest) {
                    if ($fileError[$location] === UPLOAD_ERR_OK) {
                        $imagePath = BASE_IMAGE . "ImageProducts/" . time() . $fileName;
                        move_uploaded_file($file['album']['tmp_name'][$location], $imagePath);
                        array_push($dataImageRequest, $imagePath);
                    }
                }, $file['album']['error']);
            }
        }catch(Error){}
        if($dataRequest['imageProducts'] && gettype($dataRequest['imageProducts'][0]) !== "array"){
            $dataRequest['imageProducts']['location'] = isset($dataRequest['imageProducts']['location']) && ($dataRequest['imageProducts']['location']==0 || $dataRequest['imageProducts']['location']==1)?$dataRequest['imageProducts']['location']:1;
            $dataRequest['imageProducts']['status'] = isset($dataRequest['imageProducts']['status']) && ($dataRequest['imageProducts']['status']==0 || $dataRequest['imageProducts']['status']==1)?$dataRequest['imageProducts']['status']:1;
            $dataRequest['imageProducts']['album'] = null;
            if($dataImageRequest): $dataRequest['imageProducts']['album'] = $dataImageRequest[0];
            endif;
        }elseif($dataRequest['imageProducts'] && gettype($dataRequest['imageProducts'][0]) === "array"){
            foreach($dataRequest['imageProducts'] as $index => $image){
                $dataRequest['imageProducts'][$index]['location'] = isset($image['location']) && ($image['location']==0 || $image['location']==1)?$image['location']:1;
                $dataRequest['imageProducts'][$index]['status'] = isset($image['status']) && ($image['status']==0 || $image['status']==1)?$image['status']:1;
                $dataRequest['imageProducts'][$index]['album'] = null;
                if($dataImageRequest && !empty($dataImageRequest[$index])): $dataRequest['imageProducts'][$index]['album'] = $dataImageRequest[$index];
                endif;
            }
        }
        if($dataRequest['productVariants'] && gettype($dataRequest['productVariants'][0]) !== "array"){
            $dataRequest['productVariants']['material'] = isset($dataRequest['productVariants']['material']) ? $dataRequest['productVariants']['material'] : null;
            $dataRequest['productVariants']['color'] = isset($dataRequest['productVariants']['color']) ? $dataRequest['productVariants']['color'] : null;
            $dataRequest['productVariants']['price'] = isset($dataRequest['productVariants']['price']) ? $dataRequest['productVariants']['price'] : null;
            $dataRequest['productVariants']['price_reduced'] = isset($dataRequest['productVariants']['price_reduced']) ? $dataRequest['productVariants']['price_reduced'] : null;
            $dataRequest['productVariants']['stock_quantity'] = isset($dataRequest['productVariants']['stock_quantity']) ? $dataRequest['productVariants']['stock_quantity'] : null;
            $dataRequest['productVariants']['start_at'] = isset($dataRequest['productVariants']['start_at']) ? $dataRequest['productVariants']['start_at'] : null;
            $dataRequest['productVariants']['end_at'] = isset($dataRequest['productVariants']['end_at']) ? $dataRequest['productVariants']['end_at'] : null;
            $dataRequest['productVariants']['status'] = isset($dataRequest['productVariants']['status']) && ($dataRequest['productVariants']['status']==0 || $dataRequest['productVariants']['status']==1) ? $dataRequest['productVariants']['status'] : 1;
        }elseif($dataRequest['productVariants'] && gettype($dataRequest['productVariants'][0]) === "array"){
            foreach($dataRequest['productVariants'] as $index => $variant){
                $dataRequest['productVariants'][$index]['material'] = isset($variant['material']) ? $variant['material'] : null;
                $dataRequest['productVariants'][$index]['color'] = isset($variant['color']) ? $variant['color'] : null;
                $dataRequest['productVariants'][$index]['price'] = isset($variant['price']) ? $variant['price'] : null;
                $dataRequest['productVariants'][$index]['price_reduced'] = isset($variant['price_reduced']) ? $variant['price_reduced'] : null;
                $dataRequest['productVariants'][$index]['stock_quantity'] = isset($variant['stock_quantity']) ? $variant['stock_quantity'] : null;
                $dataRequest['productVariants'][$index]['start_at'] = isset($variant['start_at']) ? $variant['start_at'] : null;
                $dataRequest['productVariants'][$index]['end_at'] = isset($variant['end_at']) ? $variant['end_at'] : null;
                $dataRequest['productVariants'][$index]['status'] = isset($variant['status']) && ($variant['status']==0 || $variant['status']==1) ? $variant['status'] : 1;
            }
        }
        return $this->execute->addData($dataRequest);
    }
    public function update($id, $dataRequest, $file){
        $dataOld = $this->execute->getDataById($id);
        if(!$dataOld): return false;
        endif;
        settype($dataOld, "array");
        $dataRequest['name'] = isset($dataRequest['name'])?$dataRequest['name']:$dataOld['name'];
        $dataRequest['description'] = isset($dataRequest['description'])?$dataRequest['description']:$dataOld['description'];
        $dataRequest['brand'] = isset($dataRequest['brand'])?$dataRequest['brand']:$dataOld['brand'];
        $dataRequest['stock_quantity'] = isset($dataRequest['stock_quantity'])?$dataRequest['stock_quantity']:$dataOld['stock_quantity'];
        $dataRequest['status'] = isset($dataRequest['status']) && ($dataRequest["status"]==0 || $dataRequest["status"]==1)?$dataRequest['status']:$dataOld['status'];
        $dataRequest['imageProducts'] = isset($dataRequest['imageProducts']) ? json_decode($dataRequest['imageProducts'], true):$dataOld['imageProducts'];
        $dataRequest['productVariants'] = isset($dataRequest['productVariants'])?json_decode($dataRequest['productVariants'], true):$dataOld['productVariants'];
        $dataImageRequest = [];
        try{
            if (isset($file['album']) && !is_array($file['album']['name']) && $file['album']['error'] === UPLOAD_ERR_OK) {
                $imagePath = BASE_IMAGE . "ImageProducts/" . time() . $file['album']['name'];
                move_uploaded_file($file['album']['tmp_name'], $imagePath);
                array_push($dataImageRequest, $imagePath);
            } elseif (isset($file['album']) && is_array($file['album']['name']) && array_keys($file['album']['error'], UPLOAD_ERR_OK, true)) {
                array_walk($file['album']['name'], function ($fileName, $location, $fileError) use ($file, &$dataImageRequest) {
                    if ($fileError[$location] === UPLOAD_ERR_OK) {
                        $imagePath = BASE_IMAGE . "ImageProducts/" . time() . $fileName;
                        move_uploaded_file($file['album']['tmp_name'][$location], $imagePath);
                        array_push($dataImageRequest, $imagePath);
                    }
                }, $file['album']['error']);
            }
        }catch(Error){}
        if($dataRequest['imageProducts'] && gettype($dataRequest['imageProducts'][0]) !== "array" && isset($dataRequest['imageProducts']['id']) && !empty($dataOld['imageProducts'])){
            $idImageProducts = $dataRequest['imageProducts']['id'];
            foreach($dataOld['imageProducts'] as $imageProduct){
                if($imageProduct->imageProduct_id===$idImageProducts){
                    $dataRequest['imageProducts']['location'] = isset($dataRequest['imageProducts']['location']) && ($dataRequest['imageProducts']['location']==0 || $dataRequest['imageProducts']['location']==1)?$dataRequest['imageProducts']['location']:$imageProduct->location;
                    $dataRequest['imageProducts']['status'] = isset($dataRequest['imageProducts']['status']) && ($dataRequest['imageProducts']['status']==0 || $dataRequest['imageProducts']['status']==1)?$dataRequest['imageProducts']['status']:$imageProduct->status;
                    $dataRequest['imageProducts']['album'] = $imageProduct->album;
                    if($dataImageRequest): $dataRequest['imageProducts']['album'] = $dataImageRequest[0];
                    endif;
                }
            };
        }elseif($dataRequest['imageProducts'] && gettype($dataRequest['imageProducts'][0]) === "array" && !empty(array_column($dataRequest['imageProducts'], 'id')) && !empty($dataOld['imageProducts'])){
            $idImageProducts = [];
            foreach($dataOld['imageProducts'] as $imageProduct){array_push($idImageProducts, $imageProduct->imageProduct_id);};
            foreach($dataRequest['imageProducts'] as $index => $image){
                if($image['id'] && in_array($image['id'], $idImageProducts)) {
                    $dataRequest['imageProducts'][$index]['location'] = isset($image['location']) && ($image['location'] == 0 || $image['location'] == 1) ? $image['location'] : $dataOld['imageProducts'][array_search($image['id'], $idImageProducts)]->location;
                    $dataRequest['imageProducts'][$index]['status'] = isset($image['status']) && ($image['status'] == 0 || $image['status'] == 1) ? $image['status'] : $dataOld['imageProducts'][array_search($image['id'], $idImageProducts)]->status;
                    $dataRequest['imageProducts'][$index]['album'] = $dataOld['imageProducts'][array_search($image['id'], $idImageProducts)]->album;
                    if($dataImageRequest && !empty($dataImageRequest[$index])): $dataRequest['imageProducts'][$index]['album'] = $dataImageRequest[$index];
                    endif;
                }
            }
        }
        if($dataRequest['productVariants'] && gettype($dataRequest['productVariants'][0]) !== "array" && isset($dataRequest['productVariants']['id']) && !empty($dataOld['productVariants'])){
            $idProductVariants = $dataRequest['productVariants']['id'];
            foreach($dataOld['productVariants'] as $productVariant){
                if($productVariant->productVariant_id===$idProductVariants){
                    $dataRequest['productVariants']['material'] = isset($dataRequest['productVariants']['material']) ? $dataRequest['productVariants']['material'] : $productVariant->material;
                    $dataRequest['productVariants']['color'] = isset($dataRequest['productVariants']['color']) ? $dataRequest['productVariants']['color'] : $productVariant->color;
                    $dataRequest['productVariants']['price'] = isset($dataRequest['productVariants']['price']) ? $dataRequest['productVariants']['price'] : $productVariant->price;
                    $dataRequest['productVariants']['price_reduced'] = isset($dataRequest['productVariants']['price_reduced']) ? $dataRequest['productVariants']['price_reduced'] : $productVariant->price_reduced;
                    $dataRequest['productVariants']['stock_quantity'] = isset($dataRequest['productVariants']['stock_quantity']) ? $dataRequest['productVariants']['stock_quantity'] : $productVariant->stock_quantity;
                    $dataRequest['productVariants']['start_at'] = isset($dataRequest['productVariants']['start_at']) ? $dataRequest['productVariants']['start_at'] : $productVariant->start_at;
                    $dataRequest['productVariants']['end_at'] = isset($dataRequest['productVariants']['end_at']) ? $dataRequest['productVariants']['end_at'] : $productVariant->end_at;
                    $dataRequest['productVariants']['status'] = isset($dataRequest['productVariants']['status']) && ($dataRequest['productVariants']['status']==0 || $dataRequest['productVariants']['status']==1) ? $dataRequest['productVariants']['status'] : $productVariant->status;
                }
            }
        }elseif($dataRequest['productVariants'] && gettype($dataRequest['productVariants'][0]) === "array" && !empty(array_column($dataRequest['productVariants'], 'id')) && !empty($dataOld['productVariants'])){
            $idProductVariants = [];
            foreach($dataOld['productVariants'] as $productVariant){array_push($idProductVariants, $productVariant->productVariant_id);};
            foreach($dataRequest['productVariants'] as $index => $variant){
                if($variant['id'] && in_array($variant['id'], $idProductVariants)) {
                    $dataRequest['productVariants'][$index]['material'] = isset($variant['material']) ? $variant['material'] : $dataOld['productVariants'][array_search($variant['id'], $idProductVariants)]->material;
                    $dataRequest['productVariants'][$index]['color'] = isset($variant['color']) ? $variant['color'] : $dataOld['productVariants'][array_search($variant['id'], $idProductVariants)]->color;
                    $dataRequest['productVariants'][$index]['price'] = isset($variant['price']) ? $variant['price'] : $dataOld['productVariants'][array_search($variant['id'], $idProductVariants)]->price;
                    $dataRequest['productVariants'][$index]['price_reduced'] = isset($variant['price_reduced']) ? $variant['price_reduced'] : $dataOld['productVariants'][array_search($variant['id'], $idProductVariants)]->price_reduced;
                    $dataRequest['productVariants'][$index]['stock_quantity'] = isset($variant['stock_quantity']) ? $variant['stock_quantity'] : $dataOld['productVariants'][array_search($variant['id'], $idProductVariants)]->stock_quantity;
                    $dataRequest['productVariants'][$index]['start_at'] = isset($variant['start_at']) ? $variant['start_at'] : $dataOld['productVariants'][array_search($variant['id'], $idProductVariants)]->start_at;
                    $dataRequest['productVariants'][$index]['end_at'] = isset($variant['end_at']) ? $variant['end_at'] : $dataOld['productVariants'][array_search($variant['id'], $idProductVariants)]->end_at;
                    $dataRequest['productVariants'][$index]['status'] = isset($variant['status']) && ($variant['status']==0 || $variant['status']==1) ? $variant['status'] : $dataOld['productVariants'][array_search($variant['id'], $idProductVariants)]->status;
                }
            }
        }
        return !$this->execute->updateData($id, $dataRequest)?false:$dataOld;
    }

    public function delete($id, $secondaryId = null)
    {
        $checkId = $this->execute->getDataById($id);
        if (!$checkId): return false;
        endif;
        $allId = $id;
        if(isset($secondaryId)) {
            $allId = ['id' => $id];
            $allId['imageProducts'] = isset($secondaryId['imageProducts'])?$secondaryId['imageProducts']:null;
            $allId['productVariants'] = isset($secondaryId['productVariants'])?$secondaryId['productVariants']:null;
        }
        return !$this->execute->deleteDataById($allId)?false:$checkId;
    }
}