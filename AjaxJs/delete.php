<?php
include('../ajax/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);

    $sql = "DELETE FROM students WHERE id=?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $data['Id']);

        $output = [
            "ID" => $data['Id'],
            "success" => "Successfully Deleted"
        ];
        //print_r($output);

        if ($stmt->execute()) {
            echo json_encode($output);

            //echo "deleted successfully";
        } else {
            echo "failed to delete";
        }

    }


}
