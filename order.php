<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cake_shop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

   $email = urldecode($_SESSION["email"]);
    
    if ($email) {
        $userDetailsSql = "SELECT * FROM user_details WHERE email='$email'";
        $userDetailsResult = $conn->query($userDetailsSql);

        if ($userDetailsResult->num_rows > 0) {
            $userDetailsRow = $userDetailsResult->fetch_assoc();

            $name = $userDetailsRow["name"];
            $mobile = $userDetailsRow["mobile"];
            $email = $userDetailsRow["email"];

            $items = $_POST["items"];
            $totalCost = $_POST["totalCost"];

            $sql = "INSERT INTO orders (name, mobile, email, items, total_cost) VALUES ('$name', '$mobile', '$email', '$items', '$totalCost')";
            
            if ($conn->query($sql) === TRUE) {
                $orderId = $conn->insert_id;
                $response = array('status' => 'success', 'orderId' => $orderId, 'amountToPay' => $totalCost);
                echo http_build_query($response);
            } else {
                $response = array('status' => 'error');
                echo http_build_query($response);
            }
        } else {
            $response = array('status' => 'error');
            echo http_build_query($response);
        }
    } else {
        $response = array('status' => 'error');
        echo http_build_query($response);
    }
}

$conn->close();
?>