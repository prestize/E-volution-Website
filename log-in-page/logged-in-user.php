<?php
session_start();

if(empty($_SESSION['idUSer'])){
    return;
}

$messages = $_SESSION['idUser'];
unset($_SESSION['idUser']);
?>