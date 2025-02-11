<?php
function handlerequest_products_edit($data, &$resp, &$error)
{
    global $conn;


    $product = $data['product'];

    if (empty($product)) {
        $error = 'Hiányzó termék kulcs a kérésben!';
        return false;
    }

    $id = (int)$product['id'];
    $manufacturer = mysqli_real_escape_string($conn, $product['manufacturer']);
    $name = mysqli_real_escape_string($conn, $product['name']);
    $product_url = mysqli_real_escape_string($conn, $product['product_url']);
    $price = (float)$product['price'];
    $net_price = (float)$product['net_price'];
    $image_url = mysqli_real_escape_string($conn, $product['image_url']);
    $category = mysqli_real_escape_string($conn, $product['category']);
    $description = mysqli_real_escape_string($conn, $product['description']);
    $delivery_time = mysqli_real_escape_string($conn, $product['delivery_time']);
    $delivery_cost = (float)$product['delivery_cost'];
    $ean_code = mysqli_real_escape_string($conn, $product['ean_code']);

    $query = "UPDATE products SET
                manufacturer = '$manufacturer',
                name = '$name',
                product_url = '$product_url',
                price = '$price',
                net_price = '$net_price',
                image_url = '$image_url',
                category = '$category',
                description = '$description',
                delivery_time = '$delivery_time',
                delivery_cost = '$delivery_cost',
                ean_code = '$ean_code'
              WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        $resp = ['status' => 'success', 'message' => 'Sikeres termék frissítés!'];
        return true;
    } else {
        $error = 'Hiba történt a termék frissítése során: ' . mysqli_error($conn);
        return false;
    }
}
