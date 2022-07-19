
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-volution";

$userid = $_SESSION['loggedin'];

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
  $sql = 'SELECT * from wishlist WHERE userid ='. $userid;
  $result = $conn->query($sql); 
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
    <script src="/wishlist-page/script.js" async></script>
  </head>

  <body onload="setUser()">
          <form action="/homepage/logout.php" method="POST" id="logoutForm" name="logoutForm" hidden>
                <input type="number" value="0" name="logNum">
              </form>

      <script> 
             let loggedinUser = localStorage.getItem("userLoggedIn");
        function setUser(){
         document.getElementById('userid').value = loggedinUser;
          

          document.getElementById('signin').onclick = function(){
              document.logoutForm.submit();
            };
          };
      </script>

    <section id="header">
    <img src="/logodark.png" alt="logo" class="logo">
      <div>
        <ul id="navbar">
          <li><a href="/index.php">Home</a></li>
          <li><a  href="/shop-page/shop.html">Shop</a></li>
          <li><a  href="/blog-page/blog.html">Blog</a></li>
          <li><a href="#" id="signin">Log Out</a></li>
          <li><a href="/contact-page/contact.html">Contact</a></li>
          <li>
            <a class="active" href="#" id="wishlist"><i class="far fa-heart"></i></a>
          </li>
          <li>
            <a href="/shop-page/orders.php" id="orders"><i class='bx bx-car'></i></a>
          </li>
        </ul>
      </div>
    </section>

    <section id="page-header" class="wishlist-header">
      <h2 class="about-h2">Wishlist</h2>
      <p class="about-p">Save it now. Buy it later.</p>
    </section>


    
    <div class="container" id="popup">
      <span class="big-circle"></span>
      <img src="/shop-page/imgs/shape.png" class="square" alt="" />
      <div class="form">
        <div class="contact-info">
          <h3 class="title">CONFIRM AVAILABILITY</h3>
          <p class="text">
            Fill in the form below to confirm availability of this product. Or
            if you would like, you can call us at (02)1234-5678
          </p>

          <div class="info">
            <div class="information">
              <img src="/shop-page/imgs/location.png" class="icon" alt="" />
              <p class="info-data">1016 Anonas, Sta. Mesa, Manila</p>
            </div>
            <div class="information">
              <img src="/shop-page/imgs/email.png" class="icon" alt="" />
              <p class="info-data">e-volutionshop.gmail.com</p>
            </div>
            <div class="information">
              <img src="/shop-page/imgs/phone.png" class="icon" alt="" />
              <p class="info-data">123-456-789</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <!-- On submit, send the form-data to the file name -->
          <form action="wishlistAvailability.php" autocomplete="off" method="POST">
          <button class="close" onclick="closeForm()">x</button>
            <h3 class="title">Contact us</h3>
            
            <div id ="labeltobuy">
            <input type="number" name="idBuy" id="idBuy" hidden>
            <input type="number" name="carBuy" id="carBuy" hidden>
            <input type="number" name="wishBuy" id="wishBuy" hidden>
            <label for="brand" id="buyBrand">Brand</label>
            <label for="model" id="buyModel">Model</label> </br>
            <label for="color" id="buyColor">Color: </label>
            <input type="text" name="colorBuy" id="colorBuy" hidden> </br>
            <label for="quantity" id="buyQuantity">Quantity: </label>
            <input type="text" name="quantityBuy" id="quantityBuy" hidden>
            </div>

            <div class="input-container">
              <input type="text" name="name" id="name" class="input" required/>
              <label for="">Full Name</label>
              <span>Full Name</span>
            </div>

            <div class="input-container">
              <input type="email" name="email" id="email" class="input" required />
              <label for="">Email</label>
              <span>Email</span>
            </div>

            <div class="input-container">
              <input type="text" name="phone" id="phone" class="input" required/>
              <label for="">Phone</label>
              <span>Phone</span>
            </div>

            <div class="radio-btn">
              <span>I prefer: </span>
              <input type="radio" name="preference" value="email" checked />
              <label for="email">Email</label>

              <input type="radio" name="preference" value="phone" />
              <label for="phone">Phone</label>

              <input type="radio" name="preference" value="text" />
              <label for="text">Text</label>
            </div>

            <!-- <div class="input-container">
                <select class="receiving-area" name="place" >
                  <option>Select Receiving Area</option>
                  <option>123 San Lorenzo, Makati</option>
                  <option>Sta. Mesa, Maynila</option>
                </select>
              </div> -->

            <div class="input-container textarea">
              <textarea name="message" class="input" required></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <input
              type="submit"
              value="Send"
              class="btn"
            />
          </form>
        </div>
      </div>
    </div>

    <section id="wishlist-items" class="section-p1">
    <?php require_once 'wishlistBuymessage.php'; ?>
      <table class="wishlist-table" id="wishlist-table" width="100%">
        <thead>
          <tr>
            <td>Remove</td>
            <td>Brand</td>
            <td>Product</td>
            <td>Color</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Subtotal</td>
            <td>Check Availability</td>
          </tr>
        </thead>
        <tbody id = "wishlistRows">
            
      </tbody>
      </table>
    </section>

    <script src="/shop-page/modal/modal-script.js"></script>

    <form action="deleteWishlist.php" method="POST" id="deleteWishItem" name="deleteWishItem">
      <input type="number" id="wishDelete" name="wishDelete" hidden>
      <input type="number" name="userid" id="userid" hidden>
    </form>

    <!-- The Modal -->
    <div id="wishModal" class="modal">

      <!-- Modal content -->
      <div id="wish-content">
        <span id="close">&times;</span>
        <h3>Are you sure you want to delete this item from your wishlist?</h3>
        <button id="yesDelete">Yes</button>
        <button id="noDelete">No</button>
       </div>
   </div>


    <script>
      
      function closeForm() {
        popup.classList.remove("open-popup");
      }
        document.getElementById("yesDelete").onclick = function (){
            window.deleteWishItem.submit();
        };

        document.getElementById("noDelete").onclick = function (){
          modal.style.display = "none";
        };


      var modal = document.getElementById("wishModal");
        

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
            let popup = document.getElementById("popup");
            let numOfWishlist = <?php echo $n; ?>;
            let prod = <?php echo json_encode($product); ?>;
            let color = <?php echo json_encode($color); ?>;
            let price = <?php echo json_encode($price); ?>;
            let quantity = <?php echo json_encode($quantity); ?>;
            let prodid = <?php echo json_encode($productid); ?>;
            let brand = <?php echo json_encode($brand); ?>;
            let stotal = <?php echo json_encode($stotal); ?>;
            let wishid = <?php echo json_encode($wishid); ?>;

            var tableRef = document.getElementById('wishlistRows');

            for(var i=0;i<parseInt(numOfWishlist);i++){
              
                  // Insert a row at the end of the table
                  let newRow = tableRef.insertRow(i);
                  newRow.id = ["row" + i];
                  let xIcon = newRow.insertCell();
                  let xDiv = document.createElement('div');
                  xDiv.style.width = "fit-content";
                  xDiv.style.height = "fit-content";
                  xDiv.id = wishid[i];
                  xDiv.style.margin = "auto";
                  xDiv.onmouseover = function(){xDiv.style.cursor = "pointer";}
                  xDiv.onclick = function(){
                    document.getElementById('wishDelete').value = this.id;
                    modal.style.display = "block";
                  };
                  xDiv.innerHTML = '<i class="fa fa-window-close" style="font-size:20px"></i>';
                  xIcon.appendChild(xDiv);

                  //brand 
                  let brandName = newRow.insertCell();
                  brandName.innerHTML = brand[i].toUpperCase();

                  //product
                  let prodName = newRow.insertCell();
                  let prodText = document.createTextNode(prod[i]);
                  prodName.appendChild(prodText);

                  //color
                  let colorName = newRow.insertCell();
                  colorName.onclick = function(){
                      console.log(this.innerHTML);
                  }; 
                  colorName.innerHTML = color[i];

                  //price
                  let priceName = newRow.insertCell();
                  priceInt = parseInt(price[i])
                  priceName.innerHTML = "₱" + priceInt.toLocaleString();

                    //quantity
                    let quantityName = newRow.insertCell();
                    quantityName.innerHTML = quantity[i];

                    //subtotal
                    let stotalName = newRow.insertCell();
                    stotalName.innerHTML = "₱" + parseInt(stotal[i]).toLocaleString();
         
                  
                  //button
                  let btn = newRow.insertCell();
                  btn.id = ["col" + i];
                  let buyButton = document.createElement('button');
                  buyButton.innerHTML = "Check Availability";
                  buyButton.id = prodid[i];
                  buyButton.onclick = function(){
                    var cells = document.getElementById(this.parentElement.parentElement.id).getElementsByTagName('td');
                    console.log(cells[3].innerHTML);
                    console.log(cells[5].innerHTML);
 
                    document.getElementById("buyBrand").innerHTML = cells[1].innerHTML.toUpperCase();
                    document.getElementById("buyModel").innerHTML = cells[2].innerHTML;
                    document.getElementById("buyColor").innerHTML = "Color: " + cells[3].innerHTML;
                    document.getElementById("buyQuantity").innerHTML = "Quantity: "+ cells[5].innerHTML;
                    document.getElementById("carBuy").value = this.id;
                    document.getElementById("wishBuy").value = cells[0].firstChild.id;
                    document.getElementById("idBuy").value = loggedinUser;
                    document.getElementById("colorBuy").value =cells[3].innerHTML;
                    document.getElementById("quantityBuy").value = parseInt(cells[5].innerHTML);
                    popup.classList.add("open-popup");
                  }; 
                  btn.appendChild(buyButton);


                              
                }

    </script>

    <!-- sample final look -->
    <!-- <section class="container content-section">
      <div class="wishlist-row">
          <span class="wishlist-image wishlist-header wishlist-column">IMAGE</span>
          <span class="wishlist-item wishlist-header wishlist-column">PRODUCT</span>
          <span class="wishlist-color wishlist-header wishlist-column">COLOR</span>
          <span class="wishlist-price wishlist-header wishlist-column">PRICE</span>
          <span class="wishlist-quantity wishlist-header wishlist-column">QUANTITY</span>
          <span class="wishlist-subtotal wishlist-header wishlist-column">SUBTOTAL</span>
      </div>
      <div class="wishlist-items">
      </div>
      <div class="wishlist-total">
          <strong class="wishlist-total-title">Total</strong>
          <span class="wishlist-total-price">$0</span>
      </div>
      <button class="btn btn-primary btn-purchase" type="button">PURCHASE</button>
  </section>  -->

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
        <a href="#" id="mywishlist">My Wishlist</a>
        <a href="/shop-page/orders.php" id="ordersfooter">Track My Order</a>
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

