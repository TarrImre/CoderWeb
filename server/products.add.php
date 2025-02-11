<?php

function handlerequest_products_add($data, &$resp, &$error)
{
    global $conn;

    $manufacturer = $data['manufacturer'];
    $name = $data['name'];
    $product_url = $data['product_url'];
    $price = $data['price'];
    $net_price = $data['net_price'];
    $image_url =  $data['image_url'];
    $category = $data['category'];
    $description =  $data['description'];
    $delivery_time = $data['delivery_time'];
    $delivery_cost =  $data['delivery_cost'];
    $ean_code = $data['ean_code'];

    $sql = "INSERT INTO products (manufacturer, name, product_url, price, net_price, image_url, category, description, delivery_time, delivery_cost, ean_code)
            VALUES ('$manufacturer','$name', '$product_url', '$price', '$net_price', '$image_url', '$category', '$description', '$delivery_time', '$delivery_cost', '$ean_code')";

    if ($conn->query($sql) === TRUE) {
        $resp['status'] = 'success';
        $resp['message'] = 'Termék sikeresen hozzáadva!';
    } else {
        $resp['status'] = 'error';
        $resp['message'] = 'Hiba történt: ' . $conn->error;
        $error = $conn->error;
    }
}
