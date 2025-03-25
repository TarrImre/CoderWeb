<?php
function handlerequest_products_load_by_id($data, &$resp, &$error)
{
    global $conn;

    $id = $data['id'];

    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);

    if ($conn->error) {
        $error = $conn->error;
        $resp = [
            'status' => 'error',
            'message' => 'Database query failed',
            'error' => $error
        ];
        return;
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $resp = [
            'status' => 'success',
            'message' => 'Termék sikeresen betöltve!',
            'data' => $row 
        ];
    } else {
        $resp = [
            'status' => 'error',
            'message' => 'Nem található termék!'
        ];
    }
}

