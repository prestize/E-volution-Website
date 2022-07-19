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

    $sql = 'INSERT INTO about (requestedText) VALUES ("'.$data['aboutText'].'")';
    $result = $conn->query($sql); 
    header('Location: admin-about.html');
}


mysqli_close($conn);
?>