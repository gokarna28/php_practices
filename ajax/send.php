<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the values from the POST request
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];

    if (!empty($name) && !empty($address)) {
        // echo $name . " address is " . $address;

        $sql = "INSERT INTO students (std_name, std_age, std_address) 
        VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sis", $name, $age, $address);
            if ($stmt->execute()) {
                echo "successfully Inserted";
            } else {
                echo "failed to insert";
            }
        }
    } else {
        echo "Error: Both name and address are required.";
    }
}

//retrive data
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $sql = "SELECT * FROM students";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $students[] = $row;
            }
            echo json_encode($students);
        } else {
            echo json_encode([]);
        }
    }

}
