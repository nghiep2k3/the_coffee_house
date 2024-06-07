<?php

header("Content-Type: application/json");

$requestMethod = $_SERVER["REQUEST_METHOD"];
$input = json_decode(file_get_contents("php://input"), true);
$dataFile = 'data/data.json';

// Đọc dữ liệu từ tập tin JSON
function readData() {
    global $dataFile;
    $jsonData = file_get_contents($dataFile);
    return json_decode($jsonData, true);
}

// Ghi dữ liệu vào tập tin JSON
function writeData($data) {
    global $dataFile;
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($dataFile, $jsonData);
}

// Xử lý yêu cầu GET
if ($requestMethod === 'GET') {
    $data = readData();
    echo json_encode($data);
}

// Xử lý yêu cầu POST
if ($requestMethod === 'POST') {
    $data = readData();
    $newEntry = $input;
    $newEntry['id'] = uniqid();
    $data[] = $newEntry;
    writeData($data);
    echo json_encode($newEntry);
}

// Xử lý yêu cầu DELETE
if ($requestMethod === 'DELETE') {
    if (!isset($_GET['id'])) {
        echo json_encode(['error' => 'Không có ID được cung cấp']);
        exit;
    }
    $id = $_GET['id'];
    $data = readData();
    $newData = array_filter($data, function ($entry) use ($id) {
        return $entry['id'] !== $id;
    });
    writeData(array_values($newData)); // Re-index mảng
    echo json_encode(['success' => true]);
}

// Xử lý yêu cầu PUT
if ($requestMethod === 'PUT') {
    // Lấy ID từ tham số trên URL
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    // Kiểm tra xem ID đã được truyền vào hay chưa
    if ($id === null) {
        echo json_encode(['error' => 'Không có ID được cung cấp']);
        exit;
    }

    // Đọc dữ liệu hiện có
    $data = readData();

    // Tìm kiếm mục với ID tương ứng
    $index = null;
    foreach ($data as $key => $entry) {
        if ($entry['id'] === $id) {
            $index = $key;
            break;
        }
    }

    // Nếu không tìm thấy mục
    if ($index === null) {
        echo json_encode(['error' => 'Không tìm thấy mục với ID đã cung cấp']);
        exit;
    }

    // Cập nhật dữ liệu
    $data[$index] = array_merge($data[$index], $input);

    // Ghi dữ liệu vào tập tin JSON
    writeData($data);

    // Trả về dữ liệu đã cập nhật
    echo json_encode($data[$index]);
}


?>