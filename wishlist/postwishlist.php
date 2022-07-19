<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-volution";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

    if(isset($_SESSION['check']) && !empty($_SESSION['check']) ){
        $userid =  $_SESSION['passedid'];
    }

    else{
        $userid = $_POST['userid'];
        $_SESSION['passedid'] = 0;
    }

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    $sql = 'SELECT * from wishlist WHERE userid ='. $userid;
    //$sql = "SELECT * FROM wishlist where userid = " . $userid ;

    $result = $conn->query($sql); 
    if($result->num_rows == 0){
        $_SESSION['color'] = 0; 
        $_SESSION['quantity'] = 0;
        $_SESSION['product'] = 0;
        $_SESSION['price'] = 0;
        $_SESSION['productid'] = 0;
        $_SESSION['brand'] = 0;
        $_SESSION['stotal'] = 0;
        $_SESSION['wishid'] = 0;
        $_SESSION['n'] = $n; 
        header('Location: wishlist.php');
    }

    else{
          
    $n = 0;
    $color = array();
    $quantity = array();
    $image = array();
    $product = array();
    $price = array();
    $productid = array();
    $brand = array();
    $stotal = array();
    $wishid = array();

    while ($row = $result->fetch_assoc()) {
       
            $color[$n] = $row["color"];
            $quantity[$n] = $row["quantity"];
            $product[$n] =  $row["product"];
            $price[$n] =  $row["price"];
            $brand[$n] =  $row["brand"];
            $stotal[$n] =  $row["subtotal"];
            $wishid[$n] =  $row["wishlistid"];
            $productid[$n] =  $row["productid"];
            $n++;
    }

            $_SESSION['color'] = $color; 
            $_SESSION['quantity'] = $quantity;
            $_SESSION['product'] = $product;
            $_SESSION['price'] = $price;
            $_SESSION['productid'] = $productid;
            $_SESSION['brand'] = $brand;
            $_SESSION['stotal'] = $stotal;
            $_SESSION['wishid'] = $wishid;
            $_SESSION['n'] = $n; 
            header('Location: wishlist.php');
    }

    mysqli_free_result($result);
    mysqli_close($conn);

}
?>

  