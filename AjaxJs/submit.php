<?php
include("../ajax/connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $data = json_decode(file_get_contents('php://input'), true);

    $sql = "INSERT INTO students (std_name, std_age, std_address) VALUES(?,?,?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sis", $data['std_name'], $data['std_age'], $data['std_address']);

        if ($stmt->execute()) {

            $last_id = $conn->insert_id;// get the inserted id\

            $output = [
                "id" => $last_id,
                "name" => $data['std_name'],
                "age" => $data['std_age'],
                "address" => $data['std_address'],
                "success" => "Successfully Inserted",
            ];

            echo json_encode($output);
        } else {
            echo "Failed to insert";
        }

    }

}


//retrive data
if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $sql = "SELECT * FROM students ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            header('Content-Type: application/json');

            echo json_encode($rows);
        }
    }
}