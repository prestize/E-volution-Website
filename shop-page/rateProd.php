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
    $sql = 'INSERT INTO ratings (prodID, rate, comment) VALUES ("'.$data['prod_id'].'","'.$data['rateNum'].'","'.$data['comment'].'")';
    $rslt = $conn->query($sql); 
    header('Location: orders.php');
}

mysqli_free_result($rslt);
mysqli_close($conn);
?>
