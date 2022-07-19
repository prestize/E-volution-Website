<?php
session_start();
$data = $_POST;
$_SESSION['loggedin'] = $data['logNum'];
header('Location: /index.php');
exit;
?>