<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

if (!isset($_GET['url'])) {
    echo json_encode(["error" => "Parameter 'url' diperlukan."]);
    exit;
}

$imageUrl = $_GET['url'];

$size = @getimagesize($imageUrl);
if (!$size) {
    echo json_encode(["error" => "Gambar tidak valid atau tidak dapat diakses."]);
    exit;
}

$response = [
    "width" => $size[0],
    "height" => $size[1],
    "mime" => $size['mime'],
];

echo json_encode($response);
