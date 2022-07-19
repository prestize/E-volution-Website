<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-volution";

$brandID = $_SESSION['brandid'];

if ($brandID!==0){

$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
else{

    $sql = 'SELECT * FROM orders INNER JOIN products ON orders.prod_id = products.product_id WHERE products.brand_id ='. $brandID;
    $result = $conn->query($sql); 
    $n=0;
    $orderNum = array();
    $userid = array();
    $prodid = array();
    $date = array();
    $name = array();
    $email = array();
    $phone = array();
    $pref = array();
    $message = array();
    $quantity = array();
    $color = array();
    $status = array();

    while ($row = $result->fetch_assoc()) {
      $orderNum[$n] = $row["orderNum"];
      $userid[$n] = $row["user_id"];
      $prodid[$n] = $row["prod_id"];
      $date[$n] = $row["orderedDate"];
      $name[$n] = $row["name"];
      $email[$n] = $row["email"];
      $phone[$n] = $row["phone"];
      $pref[$n] = $row["preference"];
      $message[$n] = $row["message"];
      $quantity[$n] = $row["quantity"];
      $color[$n] = $row["color"];
      $status[$n] = $row["status"];
      $n++;
    }
}


mysqli_close($conn);

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="/seller-page/seller-dashboard.css" />

    <!----===== Boxicons CSS ===== -->
    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <!--<title>Dashboard Sidebar Menu</title>-->
  </head>
  <body>
    <nav class="sidebar">
      <header>
        <div class="image-text">
          <span class="image">
            <!--<img src="logo.png" alt="">-->
          </span>

          <div class="text logo-text">
            <span class="name">E-Volution</span>
            <span class="profession">Merchant</span>
            <span>Dashboard</span>
          </div>
        </div>

        <i class="bx bx-chevron-right toggle"></i>
      </header>

      <div class="menu-bar">
        <div class="menu">
          <ul class="menu-links">
            <li class="nav-link">
              <a href="/seller-page/seller-product.php">
                <i class="bx bxs-package icon"></i>
                <span class="text nav-text">Products</span>
              </a>
            </li>

            <li class="nav-link">
              <a href="/seller-page/seller-addproduct.html">
                <i class="bx bx-folder-plus icon"></i>
                <span class="text nav-text">Add Products</span>
              </a>
            </li>

            <!-- <li class="nav-link">
              <a href="#">
                <i class="bx bx-edit-alt icon"></i>
                <span class="text nav-text">Edit Detail</span>
              </a>
            </li> -->

            <li class="nav-link">
              <a href="/seller-page/seller-orders.php" class="active">
                <i class="bx bx-spreadsheet icon"></i>
                <span class="text nav-text">Orders</span>
              </a>
            </li>

            <li class="nav-link">
              <a href="/seller-page/seller-employees.html">
                <i class="bx bx-id-card icon"></i>
                <span class="text nav-text">Employees</span>
              </a>
            </li>
          </ul>
        </div>

        <div class="bottom-content">
          <li class="">
            <a href="#" onclick="logoutUser()">
              <i class="bx bx-log-out icon"></i>
              <span class="text nav-text">Logout</span>
            </a>
          </li>
        </div>
      </div>
    </nav>

    <form action="/homepage/logout.php" method="POST" id="logoutForm" name="logoutForm" hidden>
        <input type="number" value="0" name="logNum">
      </form>

    <script>
      function logoutUser(){
          document.logoutForm.submit();
      }
    </script>

    <section class="home">
      <div class="text">Orders</div>

      <div class="order-table">
        <table class="table">
          <thead>
            <th>Order Number</th>  
            <th>User ID</th>
            <th>Product ID</th>
            <th>Status</th>
            <th>Color Variation</th>
            <th>Quantity</th>
            <th>Order Date</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Preference</th>
            <th>Message</th>
          </thead>
          <tbody id="orderRows">
          </tbody>
        </table>
      </div>
    </section>

    <script>
      let numOfOrder = <?php echo $n; ?>;
      let orderNum = <?php echo json_encode($orderNum); ?>;
      let userid = <?php echo json_encode($userid); ?>;
      let prodid = <?php echo json_encode($prodid); ?>;
      let date = <?php echo json_encode($date); ?>;
      let name = <?php echo json_encode($name); ?>;
      let email = <?php echo json_encode($email); ?>;
      let phone = <?php echo json_encode($phone); ?>;
      let pref = <?php echo json_encode($pref); ?>;
      let message = <?php echo json_encode($message); ?>;
      let quantity = <?php echo json_encode($quantity); ?>;
      let color = <?php echo json_encode($color); ?>;
      let status = <?php echo json_encode($status); ?>;

      let tableRef = document.getElementById('orderRows');
      function addRow() {
          for(var i=0;i<numOfOrder;i++){
              let newRow = tableRef.insertRow(i);
              newRow.id = "row" + i;

              let ordnum = newRow.insertCell();
              ordnum.innerHTML = orderNum[i];

              let usid = newRow.insertCell();
              usid.innerHTML = userid[i];

              let pid = newRow.insertCell();
              pid.innerHTML = prodid[i];

              let stat = newRow.insertCell();
              stat.id = "stat"+ i;
              stat.innerHTML = status[i];
              stat.style.color = "brown";

              let col = newRow.insertCell();
              col.innerHTML = color[i];

              let quant = newRow.insertCell();
              quant.innerHTML = quantity[i];

              let orddate = newRow.insertCell();
              orddate.innerHTML = date[i];

              let name1 = newRow.insertCell();
              name1.innerHTML = name[i];

              let email1 = newRow.insertCell();
              email1.innerHTML = email[i];

              let phone1 = newRow.insertCell();
              phone1.innerHTML = phone[i];

              let prefer = newRow.insertCell();
              prefer.innerHTML = pref[i];

              let mess = newRow.insertCell();
              let messp = document.createElement('p');
              messp.innerHTML = message[i];
              mess.appendChild(messp);
              
          };
      
    };
    addRow();
    </script>

    <script>
      const body = document.querySelector("body"),
        sidebar = body.querySelector("nav"),
        toggle = body.querySelector(".toggle"),
        searchBtn = body.querySelector(".search-box"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");

      toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
      });
    </script>
  </body>
</html>
