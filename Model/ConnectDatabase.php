<?php
require_once "env.php";
class ConnectDatabase
{
    protected $connect, $sql, $prepare;
    public function __construct(){
        try{
            $this->connect = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME.";charset=".CHARSET, DBUSER, DBPASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true]);
            //echo "Connected successfully";
        }catch(PDOException $e){
            echo "<script>console.error(`PHP Connect Error: {$e->getMessage()}`);</script>";
        }
    }
    public function executeSQL($sql, $options = [], $getManyData = true, $mode = [/* 0 => Xem truy vấn trên CSDL, 1 => Lấy 1 cột, 2 => Lấy dữ liệu duy nhất, 3 => Nhóm theo cột đầu tiên*/]){
        $this->sql = $sql;
        try{
            $this->prepare = $this->connect->prepare($this->sql);
            if (!empty($options)) {
                for ($i = 0; $i < sizeof($options); $i++) {
                    $this->prepare->bindParam($i+1, $options[$i]);
                }
            }
            $this->prepare->execute();
            if(!empty($mode) && $mode[0]===0){
                echo "<strong>Truy vấn sử dụng:</strong> <span style='color: #00028b; font-weight: 700;'>" . $this->prepare->queryString . "</span>";
                echo "<br><details style='white-space: pre-wrap'><summary style='font-weight: 700'>Chi tiết truy vấn:</summary> <span style='color: #05008b; font-weight: 700;'>";
                $this->prepare->debugDumpParams();
                echo "</span></details>";
                if(!empty($mode[1])): echo "<strong>Cảnh báo:</strong> <span style='color: darkred; font-weight: 700;'>Tham số không hợp lệ!!!</span><br>";
                endif;
            }
        } catch (Throwable $err) {
            echo "<strong>Lỗi khi thực thi truy vấn:</strong> <span style='color: darkred; font-weight: 700;'>" . $err->getMessage() . "</span>";
            echo "<br><details style='white-space: pre-wrap'><summary style='font-weight: 700'>Thông tin lỗi:</summary> <span style='color: darkred; font-weight: 700;'>" . print_r($err->__toString(), true) . "</span></details>";
            return false;
        }
        if(stripos($this->sql, "select")!==false) {
            try {
                if ($getManyData) {
                    $option = PDO::FETCH_OBJ;
                    $args = null;
                    if (!empty($mode[0])) {
                        if ($mode[0] === 1) {
                            $option |= PDO::FETCH_COLUMN;
                            $args = (empty($mode[1])) ? 0 : $mode[1];
                        } elseif ($mode[0] === 2) {
                            $option |= PDO::FETCH_UNIQUE;
                            if (!empty($mode[1])): echo "<strong>Cảnh báo:</strong> <span style='color: darkred; font-weight: 700;'>Chỉ định tham số không hợp lệ!!!</span><br>";
                            endif;
                        } elseif ($mode[0] === 3) {
                            $option |= PDO::FETCH_GROUP;
                            if (!empty($mode[1])): echo "<strong>Cảnh báo:</strong> <span style='color: darkred; font-weight: 700;'>Chỉ định tham số không hợp lệ!!!</span><br>";
                            endif;
                        } elseif ($mode[0] === 0) {} else {
                            echo "<strong>Lỗi:</strong> <span style='color: darkred; font-weight: 700;'>Chỉ định tham số sai!!!</span><br>";
                            return false;
                        }
                        if ($args !== null) {
                            return $this->prepare->fetchAll($option, $args);
                        }
                    }
                    return $this->prepare->fetchAll($option);
                } else {
                    if (!empty($mode[0])) {
                        if ($mode[0] === 1) {
                            return $this->prepare->fetchColumn((empty($mode[1])) ? 0 : $mode[1]);
                        } elseif ($mode[0] === 2 || $mode[0] === 3) {
                            echo "<strong>Cảnh báo:</strong> <span style='color: darkred; font-weight: 700;'>Chỉ định tham số không hợp lệ!!!</span><br>";
                        } elseif ($mode[0] === 0) {} else {
                            echo "<strong>Lỗi:</strong> <span style='color: darkred; font-weight: 700;'>Chỉ định tham số sai!!!</span><br>";
                            return false;
                        }
                    }
                    return $this->prepare->fetch(PDO::FETCH_OBJ);
                }
            } catch (Throwable $err) {
                echo "<strong>Lỗi truy vấn:</strong> <span style='color: darkred; font-weight: 700;'>" . $err->getMessage() . "</span>";
                echo "<br><details style='white-space: pre-wrap'><summary style='font-weight: 700'>Thông tin lỗi:</summary> <span style='color: darkred; font-weight: 700;'>" . print_r($err->__toString(), true) . "</span></details>";
                return false;
            }
        }else{
            return "<strong style='color: #008b27; font-weight: 700;'>Cập nhật CSDL thành công!!!</strong>";
        }
    }
}