<?php
session_start();

$data = $_POST;

$idBuy = $data['idBuy'];
$carBuy = $data['carBuy'];
$colorBuy = $data['colorBuy'];
$quantityBuy = $data['quantityBuy'];
$nameBuy = $data['name'];
$emailBuy = $data['email'];
$phoneBuy = $data['phone'];
$prefBuy = $data['preference'];
$messageBuy = $data['message'];

$data = $_POST;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-volution";

$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
else{

    $sql = 'INSERT INTO orders (user_id, prod_id, name, email, phone, preference, message, color, quantity) VALUES ('.$idBuy.','.$carBuy.',"'.$nameBuy.'","'.$emailBuy.'",'.$phoneBuy.',"'.$prefBuy.'","'.$messageBuy.'","'.$colorBuy.'",'.$quantityBuy.')';;
    $result = $conn->query($sql); 
    $_SESSION['buyMessages'][] = "Thank you for transacting. You will be contacted by our agent in 1-3 days.";
    header('Location: product-page.php');
}


mysqli_close($conn);
?>