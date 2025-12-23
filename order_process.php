<?php
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "pharmacy_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$medicine = $_POST['medicine'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO orders (full_name, email, medicine, quantity)
        VALUES ('$full_name', '$email', '$medicine', '$quantity')";


if ($conn->query($sql) === TRUE) {
    echo "Order placed successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
