<?php
session_start();
$_SESSION['loggedin'] = 0;

$data = $_POST;
$dsn = 'mysql:dbname=e-volution;host=localhost';
$dbUser = 'root';
$dbPassword = '';

try{
    $connection = new PDO($dsn,$dbUser,$dbPassword);
}catch (PDOException $exception){
    $_SESSION['messages'][] = 'Connection Failed: ' . $exception ->getMessage();
    header('Location: log-in.php');
    exit;
}
$email = $data['email'];
$password = $data['pass'];

$statement = $connection->prepare('SELECT * FROM users where email = :email');
$statement->execute([':email' => $email]);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $user = array_shift($result);
    
    if($user['email']=== $email && $user['userpass'] === $password){
        $loggedinID = $user['userid'];
        $_SESSION['loggedin'] = $loggedinID;
        
        if($user['userid'] === 1002 || $user['userid'] === 1001){
             header('Location: /admin-page/admin-inquiry.php');
             exit;
        }
        else if($user['userid'] <= 1010 && $user['userid'] >= 1003){
            $brandID = $user['brandid'];
            $_SESSION['brandid'] = $brandID;
            header('Location: /seller-page/seller-product.php');
            exit;
        }
        else{
            header('Location: /index.php');
            exit;
        }
       
    }
    else{
        $_SESSION['messages'][] = 'Incorrect email or password';
        header('Location: log-in.php');
        exit;
    }

?>