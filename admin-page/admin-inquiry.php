<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-volution";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
  $sql = "SELECT * FROM contact ";
  $result = $conn->query($sql); 
    $n = 0;
    $name = array();
    $email = array();
    $subject = array();
    $message = array();



    while ($row = $result->fetch_assoc()) {
    $name[$n] = $row["name"];
    $email[$n] = $row["email"];
    $subject[$n] = $row["subject"];
    $message[$n] = $row["message"];
    $n++;
    }


    mysqli_free_result($result);
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
              <a href="/admin-page/admin-inquiry.php" class="active">
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
              <a href="/admin-page/admin-users.php">
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
      <div class="text">Inquiries</div>

      <div class="inquiry-table">
        <table>
          <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
          </thead>
          <tbody  id="inquiryT">
      
          </tbody>
        </table>
      </div>
    </section>

    <script>
       let numOfContact = <?php echo $n; ?>;
      let name = <?php echo json_encode($name); ?>;
      let email = <?php echo json_encode($email); ?>;
      let subject = <?php echo json_encode($subject); ?>;
      let message = <?php echo json_encode($message); ?>;

      let tableRef = document.getElementById('inquiryT');
      function addRow() {
          for(var i=0;i<numOfContact;i++){
            let newRow = tableRef.insertRow(i);
            
            let nameCell = newRow.insertCell();
            nameCell.innerHTML = name[i];

            let emailCell = newRow.insertCell();
            emailCell.innerHTML = email[i];

            let subCell = newRow.insertCell();
            subCell.innerHTML = subject[i];

            let messCell = newRow.insertCell();
            messCell.innerHTML = message[i];
          }
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
