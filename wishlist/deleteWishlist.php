<?php
session_start();
    $data = $_POST;
    $_SESSION['passedid'] = $data['userid'];
    
    $dsn = 'mysql:dbname=e-volution;host=localhost';
    $dbUser = 'root';
    $dbPassword = '';
    
    try{
        $connection = new PDO($dsn,$dbUser,$dbPassword);
    }catch (PDOException $exception){
        $_SESSION['messages'][] = 'Connection Failed: ' . $exception ->getMessage();
        header('Location: register.php');
        exit;
    }
    
    $statement = $connection->prepare('DELETE FROM wishlist WHERE wishlistid = :wishid');
    if($statement){
        $result = $statement->execute([
        ':wishid' => $data['wishDelete']
        ]);
        header('Location: wishlist.php');
    }
    
    
?>