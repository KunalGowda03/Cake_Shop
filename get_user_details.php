<?php
session_start();

// Replace these with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cake_shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $sql = "SELECT name, mobile FROM user_details WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = array('status' => 'success', 'name' => $row['name'], 'mobile' => $row['mobile'], 'email'=>$email);
        echo http_build_query($response);
    } else {
        $response = array('status' => 'error');
        echo http_build_query($response);
    }
} else {
    $response = array('status' => 'error');
    echo http_build_query($response);
}

$conn->close();

?>