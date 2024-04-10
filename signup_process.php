<?php
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

// Get user input from the signup form
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if the email already exists in the user_details table
$checkExistingEmail = "SELECT * FROM user_details WHERE email='$email'";
$result = $conn->query($checkExistingEmail);

if ($result->num_rows > 0) {
    // Email already exists, redirect to sign in page 
      echo "Account already exists with this email id. Go back and try to sign in.";
}
else{
// If email does not exist, proceed with registration
$sql = "INSERT INTO user_details (name, mobile, email, password) VALUES ('$name', '$mobile', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    // Registration successful, redirect to sign in page
    header("Location: signin.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>
