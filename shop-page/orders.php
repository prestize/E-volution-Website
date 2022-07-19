<?php
session_start();
$loggedIn = $_SESSION['loggedin'];



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
    $sql='SELECT * FROM orders INNER JOIN products ON orders.prod_id = products.product_id  WHERE user_id='. $loggedIn;
    $result = $conn->query($sql); 
    $n = 0;
    $prod = array();
    $id = array();
    $date = array();
    $stat = array();
    $color = array();
    $pref = array();
    $quantity = array();

    while ($row = $result->fetch_assoc()) {
      $prod[$n] = $row["model"];
      $date[$n] = $row["orderedDate"];
      $color[$n] = $row["color"];
      $stat[$n] = $row["status"];
      $pref[$n] = $row["preference"];
      $quantity[$n] = $row["quantity"];
      $id[$n] = $row["prod_id"];
      $n++;
    }

  }

mysqli_free_result($result);
      mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Volution</title>
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <!----===== Boxicons CSS ===== -->
    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="/shop-page/modal/modal-style.css" />
    <link rel="stylesheet" href="/homepage/styles.css" />
  </head>

  <body onload="setUser()">
          <form action="/homepage/logout.php" method="POST" id="logoutForm" name="logoutForm" hidden>
                <input type="number" value="0" name="logNum">
              </form>


        <script>
        function setUser(){
          var loggedinUser = localStorage.getItem("userLoggedIn");
            
            if(loggedinUser==0 || loggedinUser == null){
              document.getElementById('wishlist').href = "/log-in-page/log-in.php";
              document.getElementById('mywishlist').href = "/log-in-page/log-in.php";
              document.getElementById('signin').href = "/log-in-page/log-in.php";
              document.getElementById('signinfooter').href = "/log-in-page/log-in.php";
              document.getElementById('orders').href ="/log-in-page/log-in.php";
            document.getElementById('ordersfooter').href = "/log-in-page/log-in.php";
              document.getElementById("add-wishlist").onclick = function () {
                          location.href = "/log-in-page/log-in.php";
                      };
            }
            else{
  
              document.getElementById('wishlist').href = "/wishlist/wishlist.php";
              document.getElementById('mywishlist').href = "/wishlist/wishlist.php";
              document.getElementById('signin').innerHTML = "Log Out";
              document.getElementById('signin').onclick = function(){
                document.logoutForm.submit();
              };
              document.getElementById('signinfooter').href = "/index.php";
              
            document.getElementById('orders').href = "/shop-page/orders.php";
            document.getElementById('ordersfooter').href = "/shop-page/orders.php";
          
            }
        };
      </script>
    <section id="header">
    <img src="/logodark.png" alt="logo" class="logo">
      <div>
        <ul id="navbar">
          <li><a href="/index.php">Home</a></li>
          <li><a href="/shop-page/shop.html">Shop</a></li>
          <li><a  href="/blog-page/blog.html">Blog</a></li>
          <li><a href="#" id="signin">Sign In</a></li>
          <li><a href="/contact-page/contact.html">Contact</a></li>
          <li>
            <a href="#" id="wishlist"><i class="far fa-heart"></i></a>
          </li>
          <li>
            <a href="#"  class="active" id="orders"><i class='bx bx-car'></i></a>
          </li>
        </ul>
      </div>
    </section>

    <section id="page-header" class="wishlist-header">
      <h2 class="about-h2">Orders</h2>
      <p class="about-p">Keep track of your orders.</p>
    </section>


    
    <section id="wishlist-items" class="section-p1">
      <table class="order-table" id="order-table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Ordered Date</th>
            <th>Status</th>
            <th>Color</th>
            <th>Quantity</th>
            <th>Preference</th>
            <th>Rate</th>
          </tr>
        </thead>
        <tbody id = "orderUserRows">
      </tbody>
      </table>
    </section>

           
            <!-- The Modal -->
            <div id="myModal" class="modal">

            <!-- Modal content -->
            <div id="modal-content">
              <span id="close">&times;</span>
              <h3>Rate the Product</h3>
              <form action="rateProd.php" method="POST">
                <input type="number" id="prod_id" name="prod_id" hidden>
                <label style="color: #ae7c54;font-weight: bold;" for="rateNum">Rating:</label>
                <input type="number" name="rateNum" id="rateNum" min="1" max="5" style="width: 50px;"><br><br>
                <label style="color: #ae7c54;font-weight: bold;" for="comment">Comment:</label><br>
                <textarea name="comment" id="" cols="30" rows="10"></textarea><br>
                <input type="submit" value="Submit" style="color: white;background: #218490;border: none;padding: 7px 15px;border-radius: 3px;margin-top: 10px;">
              </form>
        </div>
        </div>
    
    <script>
      var modal = document.getElementById("myModal");

        // Get the <span> element that closes the modal
        var span = document.getElementById("close");
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        } 
    </script>
              

    <script>
      let num = <?php echo $n; ?>;
      let prod = <?php echo json_encode($prod); ?>;
      let date = <?php echo json_encode($date); ?>;
      let color = <?php echo json_encode($color); ?>;
      let stat = <?php echo json_encode($stat); ?>;
      let pref = <?php echo json_encode($pref); ?>;
      let quantity = <?php echo json_encode($quantity); ?>;
      let id = <?php echo json_encode($id); ?>;


      let tableRef = document.getElementById('orderUserRows');
      function addRow() {
        for(var i=0;i<num;i++){
            let newRow = tableRef.insertRow(i);
            
            let prodCol = newRow.insertCell();
            prodCol.innerHTML = prod[i];

            let dateCol = newRow.insertCell();
            dateCol.innerHTML = date[i];

            let statCol = newRow.insertCell();
            statCol.innerHTML = stat[i];
            statCol.style.color ="brown";

            let colCol = newRow.insertCell();
            colCol.innerHTML = color[i];

            let quantCol = newRow.insertCell();
            quantCol.innerHTML = quantity[i];

            let prefCol = newRow.insertCell();
            prefCol.innerHTML = pref[i];

            let rateCol = newRow.insertCell();

            if(stat[i]!="COMPLETED"){
              rateCol.innerHTML = "You cannot rate this product yet."
            }
            else{
            let rateBtn = document.createElement('button');
            rateBtn.innerHTML = "Rate The Product";
            rateBtn.id = id[i];
            rateCol.appendChild(rateBtn);
            rateBtn.onclick = function(){
              document.getElementById('prod_id').value = this.id;
              modal.style.display = "block";
              
            };

            }
          }
      };

    addRow();
    </script>


    <section id="newsletter" class="section-p1 section-m1">
      <div class="newstext">
        <h4>Sign Up For Newsletters</h4>
        <p>
          Get E-mail updates about our latest shop and
          <span>special offers.</span>
        </p>
      </div>

      <div class="form">
        <input type="text" placeholder="Your email address" />
        <button class="normal">Sign Up</button>
      </div>
    </section>

    <footer class="section-p1">
      <div class="col">

        <img class="logo" src="/logo1.png" alt="">
        <h4>Contact</h4>
        <p><strong>Address:</strong> 1016 Anonas, Sta. Mesa, Maynila, Kalakhang Maynila</p>
        <p><strong>Phone:</strong> (+63) 9123456789/ (02) 987 6543</p>
        <p><strong>Hours:</strong> 10:00 - 18:00, Mon-Sat</p>

        <div class="follow">
          <h4>Follow Us</h4>
          <div class="icon">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-pinterest-p"></i>
            <i class="fab fa-youtube"></i>
          </div>
        </div>
      </div>

      <div class="col">
        <h4>About</h4>
        <a href="/about-page/about.html">About Us</a>
        <a href="/about-page/termsconditions.html">Terms and Conditions</a>
        <a href="/contact-page/contact.html">Contact Us</a>
      </div>

      <div class="col">
        <h4>My Account</h4>
        <a href="#" id="signinfooter">Sign In</a>
        <a href="/wishlist/wishlist.php" id="mywishlist">My Wishlist</a>
        <a href="#" id="ordersfooter">Track My Order</a>
        <a href="/about-page/help.html">Help</a>
      </div>

      <div class="col install">
        <h4>Install App</h4>
        <p>From App Store or Google Play</p>
        <div class="row">
          <img src="/homepage/imgs/apps.png" alt="apps">
        </div>
        <p>Secured Payment Gateways</p>
        <img src="/homepage/imgs/payments.png" alt="payments">
      </div>

      <div class="copyright">
        <p>BSCS 2-4, CS-Free Elective 2</p>
      </div>
    </footer>
  


  </body>
</html>

