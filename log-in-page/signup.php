
<?php
session_start();

$data = $_POST;

if (empty($data['fname']) ||
    empty($data['lname']) ||
    empty($data['femail']) ||
    empty($data['phone']) ||
    empty($data['pass']) ||
    empty($data['confirm-pass'])) {
    $_SESSION['messages'][] = 'Please fill all required fields!';
    header('Location: register.php');
    exit;
}

if ($data['pass'] !== $data['confirm-pass']) {
   $_SESSION['messages'][] = 'Passwords should match!';
   header('Location: register.php');
    exit; 
}

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

$statement = $connection->prepare('SELECT * FROM users where email = :email');
if($statement){
    $statement->execute([
        ':email' => $data['femail']
    ]);

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($result)){
        $_SESSION['messages'][] = 'User with this email already exists.';
        header('Location: register.php');
        exit;
    }

}


$statement = $connection->prepare('INSERT INTO users (fname,lname,email,phone,userpass) VALUES(:fname,:lname,:email,:phone,:userpass)');
if($statement){
   $result = $statement->execute([
        ':fname' => $data['fname'],
        ':lname' => $data['lname'],
        ':email' => $data['femail'],
        ':phone' => $data['phone'],
        ':userpass' => $data['pass'],

    ]);
    if($result){
        /*
        $_SESSION['token'] = hash("sha256",uniqid());

        $email = $data['femail'];

        $message = sprintf(
            'Hi %s %s. Thank you for registering in E-Volution. Please confirm registration http://localhost/log-in-page/confirm.php%s',
                $data['fname'],
                $data['lname'],
                http_build_query([
                    'token' => $_SESSION['token'],
                    'email' => $email
                ])
        );

        $headers = 'From: evolutionvehicle@gmail.com';

        mail($email,'User Registration',$message,$headers);

`       */
        $_SESSION['messages'][] = 'Successfully registered. You can now Sign in.';
        header('Location: log-in.php');
        exit;
    }

}

?>