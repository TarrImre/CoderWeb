<?php

function handlerequest_products_delete($data, &$resp, &$error)
{
    global $conn;

    $id = $data['id'];

    if (empty($id)) {
        $resp['status'] = 'error';
        $resp['message'] = 'Nem található termék azonosító!';
        return;
    }

    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        $resp['status'] = 'success';
        $resp['message'] = 'Termék sikeresen törölve!';
    } else {
        $resp['status'] = 'error';
        $resp['message'] = 'Hiba történt a termék törlése során.';
        $error = $conn->error;
    }
}
