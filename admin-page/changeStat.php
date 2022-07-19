<?php
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

    $sql = 'UPDATE orders SET status ="'.$data['statusChange'].'"WHERE orderNum ='.$data['orderID'];
    $result = $conn->query($sql); 
    header('Location: admin-order.php');
}


mysqli_close($conn);
?>