<?php

function handlerequest_products_import($data, &$resp, &$error)
{
    global $conn;

    $xml_url = "https://www.coderweb.hu/arukereso_product_feed.xml";

    $xml = simplexml_load_file($xml_url);

    if ($xml === false) {
        $resp['status'] = 'error';
        $resp['message'] = 'Hiba az XML fájl beolvasásakor.';
        return;
    }

    $sql = "INSERT INTO products (id, manufacturer, name, product_url, price, net_price, image_url, category, description, delivery_time, delivery_cost, ean_code) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) 
            ON DUPLICATE KEY UPDATE manufacturer=VALUES(manufacturer), name=VALUES(name), product_url=VALUES(product_url), price=VALUES(price), 
            net_price=VALUES(net_price), image_url=VALUES(image_url), category=VALUES(category), 
            description=VALUES(description), delivery_time=VALUES(delivery_time), delivery_cost=VALUES(delivery_cost), ean_code=VALUES(ean_code)";

    if ($stmt = $conn->prepare($sql)) {
        foreach ($xml->Product as $product) {
            $id = (int)$product->Identifier;
            $manufacturer = (string)$product->Manufacturer;
            $name = (string)$product->Name;
            $product_url = (string)$product->ProductUrl;
            $price = (float)$product->Price;
            $net_price = (float)$product->NetPrice;
            $image_url = (string)$product->ImageUrl;
            $category = (string)$product->Category;
            $description = (string)$product->Description;
            $delivery_time = (string)$product->DeliveryTime;
            $delivery_cost = (float)str_replace(' Ft', '', (string)$product->DeliveryCost);
            $ean_code = (string)$product->EanCode;

            $stmt->bind_param("isssddssssds", $id, $manufacturer, $name, $product_url, $price, $net_price, $image_url, $category, $description, $delivery_time, $delivery_cost, $ean_code);
            if (!$stmt->execute()) {
                $error = $stmt->error;
            }
        }

        $stmt->close();
        $resp['status'] = 'success';
        $resp['message'] = 'Adatok sikeresen importálva!';
    } else {
        $resp['status'] = 'error';
        $resp['message'] = 'SQL előkészítési hiba: ' . $conn->error;
        $error = $conn->error;
    }
}
