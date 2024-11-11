<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        echo json_encode([
            "status" => 200,
            "message" => "Get successfully",
        ]);
    }elseif($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_GET['id'];
        echo json_encode([
            "status" => 200,
            "message" => "Success",
            "id" => $_GET['id'],
            "data" => $_FILES,
            "data2" => $_POST
        ]);
    }elseif($_SERVER["REQUEST_METHOD"] == "PUT") {
        $id = $_GET['id'];
        echo json_encode([
            "status" => 200,
            "message" => "Success",
            "id" => $_GET['id'],
            "data" => $_FILES,
            "data2" => $_POST
        ]);
    }elseif($_SERVER["REQUEST_METHOD"] == "DELETE") {
        $id = $_GET['id'];
        echo json_encode([
            "status" => 200,
            "message" => "Delete successfully",
            "id" => $_GET['id'],

        ]);
    }else{
        http_response_code(400);
        echo json_encode([
            "status" => 400,
            "message" => "Not found",
        ]);
    }
