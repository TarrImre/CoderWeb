<?php
header('Content-Type: application/json');
include('db_connection.php');
global $conn;

include_once("./products.load.php");
include_once("./products.add.php");
include_once("./products.import.php");
include_once("./products.delete.php");
include_once("./products.loadbyid.php");
include_once("./products.edit.php");

$data = json_decode(file_get_contents('php://input'), true);
$action = $data['action'];

switch ($action) {
    case "load_products":
        handlerequest_products_load($data, $resp, $error);
        break;
    case "add_product":
        handlerequest_products_add($data, $resp, $error);
        break;
    case "import_products":
        handlerequest_products_import($data, $resp, $error);
        break;
    case "delete_product":
        handlerequest_products_delete($data, $resp, $error);
        break;
    case "load_product_by_id":
        handlerequest_products_load_by_id($data, $resp, $error);
        break;
    case "edit_product":
        handlerequest_products_edit($data, $resp, $error);
        break;
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        break;
}

if (isset($error) && !empty($error)) {
    $resp["status"] = "error";
    $resp["message"] = $error;
}

echo json_encode($resp);

if (isset($conn)) {
    $conn->close();
}
