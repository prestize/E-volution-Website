<?php
session_start();

$data = $_POST;

$brandid = $data['brandid'];
$product = $data['product'];
$type = $data['type'];
$price = $data['price'];
$overview = $data['overview'];
$warranty = $data['warranty'];
$location = $data['location'];
$lwh = $data['lwh'];
$seat = $data['seat'];
$torq = $data['torq'];
$feat = $data['feat'];
$color1 = $data['color1'];
$color2 = $data['color2'];
$color3 = $data['color3'];
$color4 = $data['color4'];
$broch = $data['broch'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-volution";

$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
else{

    $sql = 'INSERT INTO addproduct (brandID, model, type, price, overview, warranty, location, lwh, seat, torque, features, color1, color2, color3, color4, brochure) VALUES ("'. $brandid. '","'. $product . '","'. $type. '","'. $price .'","'. $overview . '",'. $warranty .',"'. $location .'","'. $lwh .'","'. $seat .'","'. $torq . '","'. $feat .'","'. $color1 .'","'. $color2 .'","'. $color3 . '","'. $color4. '","'. $broch . '")';
    $result = $conn->query($sql); 

   header('Location: seller-addproduct.html');
}


mysqli_close($conn);

?>