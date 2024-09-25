<?php
include("../ajax/connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $data = json_decode(file_get_contents('php://input'), true);

    //print_r($data);

    $sql = "UPDATE students SET std_name=?, std_age=?, std_address=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sisi", $data['upd_name'], $data['upd_age'], $data['upd_address'], $data['upd_id']);

        if ($stmt->execute()) {
            echo "successfully updated";
        } else {
            echo "failed to update";
        }
    }

}
