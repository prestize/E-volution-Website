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
    $sql = 'SELECT * from wishlist WHERE color = "'.$data['color'].'" AND userid='.$data['userid2']. ' AND product ="'.$data['prodName'] .'"' ;

    $result = $conn->query($sql); 
    
    if($result->num_rows == 0){
        
        $sql = 'INSERT INTO wishlist (userid, productid, color, quantity, product, price, brand, subtotal) VALUES ('.$data['userid2']. ','. $data['carid']. ',"'. $data['color'].'",'.$data['quantity'].',"'.$data['prodName']. '",'.$data['priceSelected'].',"'.$data['brandName'].'",'.$data['quantity'] * $data['priceSelected'].')';
        $rslt = $conn->query($sql); 
        header('Location: product-page.php');
    }
    else{
        while ($row = $result->fetch_assoc()) {
            $beforeQuantity = $row['quantity'];
        }
        $sql = 'UPDATE wishlist SET quantity='. $beforeQuantity + $data['quantity'].' WHERE color = "'.$data['color'].'" AND userid='.$data['userid2']. ' AND product ="'.$data['prodName'] .'"' ;
        $rslt = $conn->query($sql); 
        header('Location: product-page.php');
    }
    mysqli_free_result($result);
}


mysqli_close($conn);
?>
