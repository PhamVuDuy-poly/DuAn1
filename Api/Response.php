<?php

class Response
{
    protected $code = 0, $message = null, $data = null;
    const infoReponse = [
        //Not Yet Set Up
        ['code' => 0, 'message' => 'Not yet set up', 'description' => 'Chưa thiết lập'],

        // 2xx Success
        ['code' => 200, 'message' => 'OK', 'description' => 'Thành công'],
        ['code' => 201, 'message' => 'Created', 'description' => 'Đã tạo thành công'],
        ['code' => 202, 'message' => 'Accepted', 'description' => 'Đã chấp nhận'],
        ['code' => 203, 'message' => 'Non-Authoritative Information', 'description' => 'Thông tin không được ủy quyền'],
        ['code' => 204, 'message' => 'No Content', 'description' => 'Không có nội dung'],
        ['code' => 205, 'message' => 'Reset Content', 'description' => 'Yêu cầu đặt lại nội dung'],
        ['code' => 206, 'message' => 'Partial Content', 'description' => 'Nội dung một phần'],
        ['code' => 207, 'message' => 'Multi-Status', 'description' => 'Nhiều trạng thái'],
        ['code' => 208, 'message' => 'Already Reported', 'description' => 'Đã báo cáo'],
        ['code' => 226, 'message' => 'IM Used', 'description' => 'Đã sử dụng IM'],

        // 4xx Client Errors
        ['code' => 400, 'message' => 'Bad Request', 'description' => 'Yêu cầu không hợp lệ'],
        ['code' => 401, 'message' => 'Unauthorized', 'description' => 'Không được ủy quyền'],
        ['code' => 402, 'message' => 'Payment Required', 'description' => 'Yêu cầu thanh toán'],
        ['code' => 403, 'message' => 'Forbidden', 'description' => 'Bị cấm'],
        ['code' => 404, 'message' => 'Not Found', 'description' => 'Không tìm thấy'],
        ['code' => 405, 'message' => 'Method Not Allowed', 'description' => 'Phương thức không được phép'],
        ['code' => 406, 'message' => 'Not Acceptable', 'description' => 'Không chấp nhận được'],
        ['code' => 407, 'message' => 'Proxy Authentication Required', 'description' => 'Yêu cầu xác thực proxy'],
        ['code' => 408, 'message' => 'Request Timeout', 'description' => 'Hết thời gian yêu cầu'],
        ['code' => 409, 'message' => 'Conflict', 'description' => 'Xung đột'],
        ['code' => 410, 'message' => 'Gone', 'description' => 'Không còn tồn tại'],
        ['code' => 411, 'message' => 'Length Required', 'description' => 'Yêu cầu độ dài'],
        ['code' => 412, 'message' => 'Precondition Failed', 'description' => 'Điều kiện tiên quyết thất bại'],
        ['code' => 413, 'message' => 'Content Too Large', 'description' => 'Nội dung quá lớn'],
        ['code' => 414, 'message' => 'URI Too Long', 'description' => 'URI quá dài'],
        ['code' => 415, 'message' => 'Unsupported Media Type', 'description' => 'Kiểu phương tiện không hỗ trợ'],
        ['code' => 416, 'message' => 'Range Not Satisfiable', 'description' => 'Phạm vi không thể đáp ứng'],
        ['code' => 417, 'message' => 'Expectation Failed', 'description' => 'Kỳ vọng thất bại'],
        ['code' => 418, 'message' => 'I\'m a teapot', 'description' => 'Tôi là ấm trà (Mã hài hước)'],
        ['code' => 421, 'message' => 'Misdirected Request', 'description' => 'Yêu cầu sai hướng'],
        ['code' => 422, 'message' => 'Unprocessable Content', 'description' => 'Nội dung không xử lý được'],
        ['code' => 423, 'message' => 'Locked', 'description' => 'Bị khóa'],
        ['code' => 424, 'message' => 'Failed Dependency', 'description' => 'Phụ thuộc thất bại'],
        ['code' => 425, 'message' => 'Too Early', 'description' => 'Quá sớm'],
        ['code' => 426, 'message' => 'Upgrade Required', 'description' => 'Yêu cầu nâng cấp'],
        ['code' => 428, 'message' => 'Precondition Required', 'description' => 'Yêu cầu điều kiện tiên quyết'],
        ['code' => 429, 'message' => 'Too Many Requests', 'description' => 'Quá nhiều yêu cầu'],
        ['code' => 431, 'message' => 'Request Header Fields Too Large', 'description' => 'Trường tiêu đề yêu cầu quá lớn'],
        ['code' => 451, 'message' => 'Unavailable For Legal Reasons', 'description' => 'Không khả dụng vì lý do pháp lý'],

        // 5xx Server Errors
        ['code' => 500, 'message' => 'Internal Server Error', 'description' => 'Lỗi máy chủ nội bộ'],
        ['code' => 501, 'message' => 'Not Implemented', 'description' => 'Chưa được triển khai'],
        ['code' => 502, 'message' => 'Bad Gateway', 'description' => 'Cổng xấu'],
        ['code' => 503, 'message' => 'Service Unavailable', 'description' => 'Dịch vụ không khả dụng'],
        ['code' => 504, 'message' => 'Gateway Timeout', 'description' => 'Hết thời gian cổng'],
        ['code' => 505, 'message' => 'HTTP Version Not Supported', 'description' => 'Phiên bản HTTP không được hỗ trợ'],
        ['code' => 506, 'message' => 'Variant Also Negotiates', 'description' => 'Biến thể cũng thương lượng'],
        ['code' => 507, 'message' => 'Insufficient Storage', 'description' => 'Không đủ bộ nhớ'],
        ['code' => 508, 'message' => 'Loop Detected', 'description' => 'Phát hiện vòng lặp'],
        ['code' => 510, 'message' => 'Not Extended', 'description' => 'Không mở rộng'],
        ['code' => 511, 'message' => 'Network Authentication Required', 'description' => 'Yêu cầu xác thực mạng']
    ];
    public function __construct($code = 0, $message = null, $data = null){
        $this->setResponse($code, $message, $data);
    }

    public function setResponse($code, $message = null, $data = null):void{
        try{
            foreach (self::infoReponse as $value){
                if($code === $value['code']) {
                    break;
                }elseif($value['code'] === self::infoReponse[count(self::infoReponse)-1]['code']) {
                    throw new Error("Invalid code");
                }else{
                    continue;
                }
            }
        }catch(Error $e){
            echo "<script>console.error(`PHP Error: {$e->getMessage()}`);</script>";
        }
        $this->code = $code;
        $this->message = $message;
        $this->data = $data;
    }

    public function getInfoCode($code){
        try{
            foreach (self::infoReponse as $value){
                if($code === $value['code']) {
                    return (object)$value;
                }elseif($value['code'] === self::infoReponse[count(self::infoReponse)-1]['code']) {
                    throw new Error();
                }else{
                    continue;
                }
            }
        }catch(Error){
            return false;
        }
    }

    public function getInfoResponse(){
        if(!$this->code){
            return false;
        }else{
            $message = null;
            if($this->message!==null){
                $message = $this->message;
            }else{
                foreach (self::infoReponse as $value){
                    if($this->code === $value['code']) {
                        $message = $value['message'];
                    }
                }
            }
            $reponse = [
                "status" => $this->code,
                "message" => $message,
            ];
            if($this->data): $reponse['data'] = $this->data;
            endif;
            return json_encode($reponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function sendResponse():void{
        if($this->code): http_response_code($this->code);
        else: http_response_code(500);
            endif;
        echo $this->getInfoResponse()===false?json_encode(["error" => "Not yet set up"]):$this->getInfoResponse();
    }
}