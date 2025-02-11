<?php

function handlerequest_products_load($data, &$resp, &$error)
{
    global $conn;

    $sql = "SELECT * FROM products";
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
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        $resp = [
            'status' => 'success',
            'message' => 'Termékek sikeresen betöltve!',
            'data' => $products
        ];
    } else {
        $resp = [
            'status' => 'error',
            'message' => 'Nem találhatóak termékek!'
        ];
    }
}
