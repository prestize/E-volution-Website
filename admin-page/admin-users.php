<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-volution";



$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
else{

    $sql = 'SELECT * FROM users WHERE userid > 1010';
    $result = $conn->query($sql); 
    $n=0;
    $userid = array();
    $email = array();
    $phone = array();
    $fname = array();
    $lname = array();

    while ($row = $result->fetch_assoc()) {
      $userid[$n] = $row["userid"];
      $fname[$n] = $row["fname"];
      $lname[$n] = $row["lname"];
      $email[$n] = $row["email"];
      $phone[$n] = $row["phone"];
      $n++;
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
    <link rel="stylesheet" href="/admin-page/admin-dashboard.css" />

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
            <span class="profession">Admin</span>
            <span>Dashboard</span>
          </div>
        </div>

        <i class="bx bx-chevron-right toggle"></i>
      </header>

      <div class="menu-bar">
        <div class="menu">
          <ul class="menu-links">
            <li class="nav-link">
              <a href="/admin-page/admin-inquiry.php">
                <i class='bx bx-search-alt-2 icon'></i>
                <span class="text nav-text">Inquiries</span>
              </a>
            </li>
            
            <li class="nav-link">
              <a href="/admin-page/admin-order.php">
                <i class="bx bx-spreadsheet icon"></i>
                <span class="text nav-text">Orders</span>
              </a>
            </li>

            <li class="nav-link">
              <a href="/admin-page/admin-products.php">
                <i class="bx bxs-package icon" ></i>
                <span class="text nav-text">Products</span>
              </a>
            </li>

            <li class="nav-link">
              <a href="/admin-page/admin-users.php" class="active">
                <i class="bx bx-user icon"></i>
                <span class="text nav-text">Users</span>
              </a>
            </li>

            <li class="nav-link">
              <a href="/admin-page/admin-employees.html">
                <i class="bx bx-id-card icon"></i>
                <span class="text nav-text">Employees</span>
              </a>
            </li>

            <li class="nav-link">
              <a href="/admin-page/admin-blog.html">
                <i class='bx bxs-book-content icon' ></i>
                <span class="text nav-text">Blog Page</span>
              </a>
            </li>

            <li class="nav-link">
              <a href="/admin-page/admin-about.html">
                <i class='bx bx-info-circle icon'></i>
                <span class="text nav-text">About Page</span>
              </a>
            </li>

            <!-- <li class="nav-link">
              <a href="#">
                <i class="bx bx-edit-alt icon"></i>
                <span class="text nav-text">Edit Detail</span>
              </a>
            </li> -->

            <!-- <li class="nav-link">
              <a href="/admin-page/admin-contact.html">
                <i class='bx bx-phone-outgoing icon' ></i>
                <span class="text nav-text">Contact Page</span>
              </a>
            </li> -->
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
      <div class="text">Users</div>

      <div class="user-table">
        <table class="table">
          <thead>
            <th>UID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
          </thead>
        <tbody id="userRows">
        </tbody>
        </table>
      </div>
    </section>

    <script>
      let numOfOrder = <?php echo $n; ?>;
      let userid = <?php echo json_encode($userid); ?>;
      let fname = <?php echo json_encode($fname); ?>;
      let lname = <?php echo json_encode($lname); ?>;
      let email = <?php echo json_encode($email); ?>;
      let phone = <?php echo json_encode($phone); ?>;


      let tableRef = document.getElementById('userRows');
      function addRow() {
          for(var i=0;i<numOfOrder;i++){
              let newRow = tableRef.insertRow(i);

              let usid = newRow.insertCell();
              usid.innerHTML = userid[i];

              let fname1 = newRow.insertCell();
              fname1.innerHTML = fname[i];

              let lname1 = newRow.insertCell();
              lname1.innerHTML = lname[i];

              let email1 = newRow.insertCell();
              email1.innerHTML = email[i];

              let phone1 = newRow.insertCell();
              phone1.innerHTML = phone[i];
              
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
