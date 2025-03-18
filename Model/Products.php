<?php
class Products extends Management
{
    public function getAllData($mode = [])
    {
        $AllData = null;
        if($mode[0]===3){
            $this->sql = "SELECT * FROM {$this->tableName} LEFT JOIN imageProducts ON {$this->tableName}.product_id = imageProducts.product_id LEFT JOIN `productvariants` ON {$this->tableName}.product_id = productvariants.product_id";
            $AllData = $this->connect->executeSql($this->sql, [], true, $mode);
        }else{
            $AllData = parent::GetAllData($mode);
            if($AllData){
                $this->sql = "SELECT product_id, imageProduct_id, album, location, status FROM imageproducts";
                $AllDataImageProducts = $this->connect->executeSql($this->sql, [], true, [3]);
                $this->sql = "SELECT product_id, productVariant_id, material, color, price, price_reduced, stock_quantity, start_at, end_at, status FROM productvariants";
                $AllDataProductVariants = $this->connect->executeSql($this->sql, [], true, [3]);
                array_walk($AllData, function($data) use ($AllDataImageProducts, $AllDataProductVariants){
                    $indexTemp1 = array_search($data->product_id, array_keys($AllDataImageProducts));
                    $indexTemp2 = array_search($data->product_id, array_keys($AllDataProductVariants));
                    if($indexTemp1 !== false): $data->imageProducts = $AllDataImageProducts[array_keys($AllDataImageProducts)[$indexTemp1]];
                    else: $data->imageProducts = [];
                    endif;
                    if($indexTemp2 !== false): $data->productVariants = $AllDataProductVariants[array_keys($AllDataProductVariants)[$indexTemp2]];
                    else: $data->productVariants = [];
                    endif;
                });
            }
        }
        return $AllData;
    }
    public function getDataById($id, $mode = [])
    {
        $OneData = null;
        if($mode[0]===3) {
            $this->sql = "SELECT * FROM {$this->tableName} LEFT JOIN imageProducts ON products.product_id = imageProducts.product_id LEFT JOIN `productvariants` ON products.product_id = productvariants.product_id WHERE products.product_id = ?";
            $OneData = $this->connect->executeSQL($this->sql, [$id], true, $mode);
        }else{
            $this->sql = "SELECT * FROM {$this->tableName} where product_id = ?";
            $OneData = $this->connect->executeSql($this->sql, [$id], false, $mode);
            if($OneData){
                $this->sql = "SELECT * FROM imageproducts where product_id = ?";
                $OneData->imageProducts = !$this->connect->executeSql($this->sql, [$id], true, [])?[]:$this->connect->executeSql($this->sql, [$id], true, []);
                $this->sql = "SELECT * FROM productvariants where product_id = ?";
                $OneData->productVariants = !$this->connect->executeSql($this->sql, [$id], true, [])?[]:$this->connect->executeSql($this->sql, [$id], true, []);
            }
        }
        return $OneData;
    }
    
    public function addData($data, $mode = [])
    {
        $this->sql = "INSERT INTO {$this->tableName}(`name`, `description`, `brand`, `stock_quantity`, `status`) VALUES (?,?,?,?,?)";
        $params = [$data['name'],$data['description'],$data['brand'], $data['stock_quantity'], $data['status']];
        $result = $this->connect->executeSQL($this->sql, $params, false, $mode);
        if($result):
            $this->sql = "SELECT product_id FROM {$this->tableName} ORDER BY product_id DESC LIMIT 1";
            $id = !$this->connect->executeSql($this->sql, [], false, [])?false:$this->connect->executeSql($this->sql, [], false, [])->product_id;
            if($id):
                $dataImageProducts = $data['imageProducts'];
                if($dataImageProducts && gettype($dataImageProducts[0])!=="array"){
                    $this->sql = "INSERT INTO `imageproducts`(`product_id`, `album`, `location`, `status`) VALUES (?, ?, ?, ?)";
                    $paramsImageProducts = [$id, $dataImageProducts['album'], $dataImageProducts['location'], $dataImageProducts['status']];
                    $this->connect->executeSql($this->sql, $paramsImageProducts, false, []);
                }elseif($dataImageProducts && gettype($dataImageProducts[0])==="array"){
                    foreach($dataImageProducts as $dataImageProduct){
                        $this->sql = "INSERT INTO `imageproducts`(`product_id`, `album`, `location`, `status`) VALUES (?, ?, ?, ?)";
                        $paramsImageProduct = [$id, $dataImageProduct['album'], $dataImageProduct['location'], $dataImageProduct['status']];
                        $this->connect->executeSql($this->sql, $paramsImageProduct, false, []);
                    }
                }
                $dataProductVariants = $data['productVariants'];
                if($dataProductVariants && gettype($dataProductVariants[0])!=="array"){
                    $this->sql = "INSERT INTO `productvariants`(`product_id`, `material`, `color`, `price`, `price_reduced`, `stock_quantity`, `start_at`, `end_at`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $paramsProductVariants = [$id, $dataProductVariants['material'], $dataProductVariants['color'], $dataProductVariants['price'], $dataProductVariants['price_reduced'], $dataProductVariants['stock_quantity'], $dataProductVariants['start_at'], $dataProductVariants['end_at'], $dataProductVariants['status']];
                    $this->connect->executeSql($this->sql, $paramsProductVariants, false, []);
                }elseif($dataProductVariants && gettype($dataProductVariants[0])==="array"){
                    foreach($dataProductVariants as $dataProductVariant){
                        $this->sql = "INSERT INTO `productvariants`(`product_id`, `material`, `color`, `price`, `price_reduced`, `stock_quantity`, `start_at`, `end_at`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $paramsProductVariant = [$id, $dataProductVariant['material'], $dataProductVariant['color'], $dataProductVariant['price'], $dataProductVariant['price_reduced'], $dataProductVariant['stock_quantity'], $dataProductVariant['start_at'], $dataProductVariant['end_at'], $dataProductVariant['status']];
                        $this->connect->executeSql($this->sql, $paramsProductVariant, false, []);
                    }
                }
                $this->sql = "SELECT `product_id`, SUM(`stock_quantity`) AS total_quantity FROM `productvariants` WHERE `product_id` = ? GROUP BY product_id";
                $totalQuantity = $this->connect->executeSql($this->sql, [$id], false, []);
                if($totalQuantity):
                    $this->sql = "UPDATE {$this->tableName} SET `stock_quantity` = ? WHERE `product_id` = ?";
                    $this->connect->executeSql($this->sql, [$totalQuantity->total_quantity, $id], false, []);
                endif;
            endif;
        endif;
        return $result;
    }
    public function updateData($id, $data, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `name`=?,`description`=?,`brand`=?,`stock_quantity`=?,`status`=? WHERE `product_id`=?";
        $params = [$data['name'],$data['description'],$data['brand'], $data['stock_quantity'], $data['status'], $id];
        $result = $this->connect->executeSQL($this->sql, $params, false, $mode);
        if($result):
            $dataImageProducts = $data['imageProducts'];
            if($dataImageProducts && gettype($dataImageProducts[0])!=="array" && isset($dataImageProducts['id'])){
                $this->sql = "SELECT * FROM imageproducts where `product_id` = ? AND `imageProduct_id`=?";
                if($this->connect->executeSql($this->sql, [$id, $dataImageProducts['id']], false)):
                    $this->sql = "UPDATE `imageproducts` SET `album`=?,`location`=?,`status`=? WHERE `imageProduct_id`=?";
                    $paramsImageProducts = [$dataImageProducts['album'], $dataImageProducts['location'], $dataImageProducts['status'], $dataImageProducts['id']];
                    $this->connect->executeSql($this->sql, $paramsImageProducts, false, []);
                endif;
            }elseif($dataImageProducts && gettype($dataImageProducts[0])==="array" && !empty(array_column($dataImageProducts, 'id'))){
                foreach($dataImageProducts as $dataImageProduct){
                    $this->sql = "SELECT * FROM imageproducts where `product_id` = ? AND `imageProduct_id`=?";
                    if($this->connect->executeSql($this->sql, [$id, $dataImageProduct['id']], false)):
                        $this->sql = "UPDATE `imageproducts` SET `album`=?,`location`=?,`status`=? WHERE `imageProduct_id`=?";
                        $paramsImageProduct = [$dataImageProduct['album'], $dataImageProduct['location'], $dataImageProduct['status'], $dataImageProduct['id']];
                        $this->connect->executeSql($this->sql, $paramsImageProduct, false, []);
                    endif;
                }
            }
            $dataProductVariants = $data['productVariants'];
            if($dataProductVariants && gettype($dataProductVariants[0])!=="array" && isset($dataProductVariants['id'])){
                $this->sql = "SELECT * FROM productvariants where `product_id` = ? AND `productVariant_id`=?";
                if($this->connect->executeSql($this->sql, [$id, $dataProductVariants['id']], false)):
                    $this->sql = "UPDATE `productvariants` SET `material`=?,`color`=?,`price`=?,`price_reduced`=?,`stock_quantity`=?,`start_at`=?,`end_at`=?,`status`=? WHERE `productVariant_id`=?";
                    $paramsProductVariants = [$dataProductVariants['material'], $dataProductVariants['color'], $dataProductVariants['price'], $dataProductVariants['price_reduced'], $dataProductVariants['stock_quantity'], $dataProductVariants['start_at'], $dataProductVariants['end_at'], $dataProductVariants['status'], $dataProductVariants['id']];
                    $this->connect->executeSql($this->sql, $paramsProductVariants, false, []);
                endif;
            }elseif($dataProductVariants && gettype($dataProductVariants[0])==="array" && !empty(array_column($dataProductVariants, 'id'))){
                foreach($dataProductVariants as $dataProductVariant){
                    $this->sql = "SELECT * FROM productvariants where `product_id` = ? AND `productVariant_id`=?";
                    if($this->connect->executeSql($this->sql, [$id, $dataProductVariant['id']], false)):
                        $this->sql = "UPDATE `productvariants` SET `material`=?,`color`=?,`price`=?,`price_reduced`=?,`stock_quantity`=?,`start_at`=?,`end_at`=?,`status`=? WHERE `productVariant_id`=?";
                        $paramsProductVariant = [$dataProductVariant['material'], $dataProductVariant['color'], $dataProductVariant['price'], $dataProductVariant['price_reduced'], $dataProductVariant['stock_quantity'], $dataProductVariant['start_at'], $dataProductVariant['end_at'], $dataProductVariant['status'], $dataProductVariant['id']];
                        $this->connect->executeSql($this->sql, $paramsProductVariant, false, []);
                    endif;
                }
            }
            $this->sql = "SELECT `product_id`, SUM(`stock_quantity`) AS total_quantity FROM `productvariants` WHERE `product_id` = ? GROUP BY product_id";
            $totalQuantity = $this->connect->executeSql($this->sql, [$id], false, []);
            if($totalQuantity):
                $this->sql = "UPDATE {$this->tableName} SET `stock_quantity` = ? WHERE `product_id` = ?";
                $this->connect->executeSql($this->sql, [$totalQuantity->total_quantity, $id], false, []);
            endif;
        endif;
        return $result;
    }
    public function deleteDataById($id, $mode = []){
        if(gettype($id)==="array"){
            $idImageProducts = isset($id['imageProducts'])?$id['imageProducts']:false;
            $idProductVariants = isset($id['productVariants'])?$id['productVariants']:false;
            $id = isset($id['id'])?$id['id']:false;
            if(!$id): return false;
            endif;
            if($idImageProducts && gettype($idImageProducts)==="array"){
                for($i = 0; $i < count($idImageProducts); $i++){
                    $this->sql = "SELECT * FROM imageproducts where `product_id` = ? AND `imageProduct_id`=?";
                    if($this->connect->executeSql($this->sql, [$id, $idImageProducts[$i]], false)):
                        $this->sql = "DELETE FROM `imageproducts` WHERE `imageProduct_id`=?";
                        $this->connect->executeSql($this->sql, [$idImageProducts[$i]], false, []);
                    endif;
                }
            }elseif($idImageProducts && gettype($idImageProducts)!=="array"){
                $this->sql = "SELECT * FROM imageproducts where `product_id` = ? AND `imageProduct_id`=?";
                if($this->connect->executeSql($this->sql, [$id, $idImageProducts], false)):
                    $this->sql = "DELETE FROM `imageproducts` WHERE `imageProduct_id`=?";
                    $this->connect->executeSql($this->sql, [$idImageProducts], false, []);
                endif;
            }
            if($idProductVariants && gettype($idProductVariants)==="array"){
                for($i = 0; $i < count($idProductVariants); $i++){
                    $this->sql = "SELECT * FROM productvariants where `product_id` = ? AND `productVariant_id`=?";
                    if($this->connect->executeSql($this->sql, [$id, $idProductVariants[$i]], false)):
                        $this->sql = "DELETE FROM `productvariants` WHERE `productVariant_id`=?";
                        $this->connect->executeSql($this->sql, [$idProductVariants[$i]], false, []);
                    endif;
                }
            }elseif($idProductVariants && gettype($idProductVariants)!=="array"){
                $this->sql = "SELECT * FROM productvariants where `product_id` = ? AND `productVariant_id`=?";
                if($this->connect->executeSql($this->sql, [$id, $idProductVariants], false)):
                    $this->sql = "DELETE FROM `productvariants` WHERE `productVariant_id`=?";
                    $this->connect->executeSql($this->sql, [$idProductVariants], false, []);
                endif;
            }
        }
        $this->sql = "UPDATE `imageproducts` SET `product_id` = null WHERE `product_id`=?";
        $this->connect->executeSql($this->sql, [$id], false, []);
        $this->sql = "UPDATE `productvariants` SET `product_id`= null WHERE `product_id`= ?";
        $this->connect->executeSql($this->sql, [$id], false, []);
        $this->sql = "UPDATE `orderitems` SET `product_id`= null WHERE `product_id`= ?";
        $this->connect->executeSql($this->sql, [$id], false, []);
        $this->sql = "DELETE FROM {$this->tableName} WHERE `product_id` = ?";
        return $this->connect->executeSql($this->sql, [$id], false, $mode);
    }
}