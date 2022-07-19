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

    $sql = 'INSERT INTO contact (name,email,subject,message) VALUES ("'. $data['name'].'","'.$data['email'].'","'.$data['subject'].'","'.$data['message'].'")';
    $result = $conn->query($sql); 

    header('Location: contact.html');
}


mysqli_close($conn);



?>