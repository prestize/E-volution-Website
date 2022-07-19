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
    $sql = "SELECT model, brand_id, seat_capacity, lwh, torque, features, product_id, type, orig_price, commission, discount, num_purchases, overview, warranty, products.rating, location, color1Name, color2Name, color3Name, color4Name, image1, image2, image3, image4, brochure, name FROM products INNER JOIN brands ON products.brand_id = brands.id ORDER BY model";
    $result = $conn->query($sql); 
    $n = 0;
    $product_id = array();
    $brand_id = array();
    $product_type = array();
    $product_brand = array();
    $product_model = array();
    $product_price = array();
    $product_comm = array();
    $product_disc = array();
    $product_numPurch = array();
    $product_overview = array();
    $product_warranty = array();
    $product_rating = array();
    $product_loc = array();
    $product_color1 = array();
    $product_color2 = array();
    $product_color3 = array();
    $product_color4 = array();
    $product_image1 = array();
    $product_image2 = array();
    $product_image3 = array();
    $product_image4 = array();
    $product_brochure = array();
    $product_lwh = array();
    $product_torq = array();
    $product_features = array();
    $product_seat = array();

    while ($row = $result->fetch_assoc()) {
      $product_brand[$n] = $row["name"];
      $brand_id[$n] = $row["brand_id"];
      $product_type[$n] = $row["type"];
      $product_model[$n] = $row["model"];
      $product_price[$n] = $row["orig_price"];
      $product_lwh[$n] = $row["lwh"];
      $product_torq[$n] = $row["torque"];
      $product_seat[$n] = $row["seat_capacity"];
      $product_features[$n] = $row["features"];
      $product_comm[$n] = $row["commission"];
      $product_disc[$n] = $row["discount"];
      $product_numPurch[$n] = $row["num_purchases"];
      $product_overview[$n] = $row["overview"];
      $product_warranty[$n] = $row["warranty"];
      $product_rating[$n] = $row["rating"];
      $product_loc[$n] = $row["location"];
      $product_color1[$n] = $row["color1Name"];
      $product_color2[$n] = $row["color2Name"];
      $product_color3[$n] = $row["color3Name"];
      $product_color4[$n] = $row["color4Name"];
      $product_image1[$n] = $row["image1"];
      $product_image2[$n] = $row["image2"];
      $product_image3[$n] = $row["image3"];
      $product_image4[$n] = $row["image4"];
      $product_brochure[$n] = $row["brochure"];
       $product_id[$n] = $row["product_id"];
      $n++;
    }


    mysqli_free_result($result);
          mysqli_close($conn);

  session_start();
  if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])) {
  $loggedIn = $_SESSION['loggedin'];
}
else{
  $loggedIn = 0;
}
}
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://kit.fontawesome.com/12e0ec36af.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/homepage/styles.css" />
    <link rel="stylesheet" href="/shop-page/modal/modal-style.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />
    <script src="/cart-page/script.js" async></script>
  </head>

  <body onload="setUser()">
  
              <form action="/homepage/logout.php" method="POST" id="logoutForm" name="logoutForm" hidden>
                <input type="number" value="0" name="logNum">
              </form>

            <script>
              let idProdNum = localStorage.getItem("idProd");
               console.log(idProdNum);  
              let numOfProd = 17;
              let brand = <?php echo json_encode($product_brand); ?>;
              let brand_id = <?php echo json_encode($brand_id); ?>;
              let model = <?php echo json_encode($product_model); ?>;
              let type = <?php echo json_encode($product_type); ?>;
              let origPrice = <?php echo json_encode($product_price); ?>;
              let comm = <?php echo json_encode($product_comm); ?>;
              let disc = <?php echo json_encode($product_disc); ?>;
              let numPurch = <?php echo json_encode($product_numPurch); ?>;
              let overview = <?php echo json_encode($product_overview); ?>;
              let warr = <?php echo json_encode($product_warranty); ?>;
              let rating = <?php echo json_encode($product_rating); ?>;
              let loc = <?php echo json_encode($product_loc); ?>;
              let lwh = <?php echo json_encode($product_lwh); ?>;
              let seat = <?php echo json_encode($product_seat); ?>;
              let torq = <?php echo json_encode($product_torq); ?>;
              let features = <?php echo json_encode($product_features); ?>;
              let col1 = <?php echo json_encode($product_color1); ?>;
              let col2 = <?php echo json_encode($product_color2); ?>;
              let col3 = <?php echo json_encode($product_color3); ?>;
              let col4 = <?php echo json_encode($product_color4); ?>;
              let img1 = <?php echo json_encode($product_image1); ?>;
              let img2 = <?php echo json_encode($product_image2); ?>;
              let img3 = <?php echo json_encode($product_image3); ?>;
              let img4 = <?php echo json_encode($product_image4); ?>;
              let pdf = <?php echo json_encode($product_brochure); ?>;
              let idGet = <?php echo json_encode($product_id); ?>;

            </script>
                
            <!-- The Modal -->
            <div id="myModal" class="modal">

            <!-- Modal content -->
            <div id="modal-content">
              <span id="close">&times;</span>
              <h3>Add to Wishlist</h3>
              <p id="modalCar">Brand Model</p>
              
              <form action="addWishlist.php" method="POST" id="wishlistModal" name="wishlistModal">
                <span>Choose Color:</span></br></br>
                <input type="number" name="carid" id="carid" hidden>
                <input type="number" name="userid2" id="userid2" hidden>
                <input type="number" name="priceSelected" id="priceSelected" hidden>
                <input type="text" name="prodName" id="prodName" hidden>
                <input type="text" name="brandName" id="brandName" hidden>
                <input type="radio" name="color" value="color1" id="color1" checked/>
                <label for="color1" id="lcolor1">White</label></br></br>
                <input type="radio" name="color" value="color2" id="color2" />
                <label for="color2" id="lcolor2">Black</label></br></br>
                <input type="radio" name="color" value="color3" id="color3"/>
                <label for="color3" id="lcolor3">Blue</label></br></br>
                <input type="radio" name="color" value="color4" id="color4" />
                <label for="color4" id="lcolor4">Green</label>
                <input type="number" name="quantity" id="quantity" min=1 value='1'></br>
                <input type="checkbox" name="confirm" id="confirm" required>
                <label for="confirm">Done.</label></br>
                
                <input type="submit" id="submitWish" value="Submit">
              </form>
            </div>

            </div>

            <script>
              let displaynum;
              for(var j=0;j<numOfProd;j++){
                  if(idProdNum==idGet[j]){
                      displaynum = j;
                  } 
              }

              var loggedinUser = localStorage.getItem("userLoggedIn");
              document.getElementById("userid2").setAttribute('value', loggedinUser);
              document.getElementById("carid").setAttribute('value', parseInt(idGet[displaynum]));

              var brandmodel = document.getElementById("modalCar");
              brandmodel.innerHTML = brand[displaynum].toUpperCase() + " " + model[displaynum];

              document.getElementById("prodName").value = model[displaynum];
              document.getElementById("brandName").value = brand[displaynum];
              var totalPrice = parseInt(origPrice[displaynum]) + parseInt(comm[displaynum]) - parseInt(disc[displaynum]);
              document.getElementById("priceSelected").value = totalPrice;
              document.getElementById("color1").value = col1[displaynum];
              document.getElementById("lcolor1").innerHTML = col1[displaynum];
                
              if(col2[displaynum]!=null){
                document.getElementById("color2").value = col2[displaynum];
                document.getElementById("lcolor2").innerHTML = col2[displaynum];
              }
              else{
                document.getElementById("color2").style.display = "none";
               document.getElementById("lcolor2").style.display = "none";
              }

              if(col3[displaynum]!=null){
                document.getElementById("color3").value = col3[displaynum];
                document.getElementById("lcolor3").innerHTML = col3[displaynum];
              }
              else{
                document.getElementById("color3").style.display = "none";
               document.getElementById("lcolor3").style.display = "none";
              }

              if(col4[displaynum]!=null){
                document.getElementById("color4").value = col4[displaynum];
                document.getElementById("lcolor4").innerHTML = col4[displaynum];
              }
              else{
                document.getElementById("color4").style.display = "none";
               document.getElementById("lcolor4").style.display = "none";
              }



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
            var isOpen = sessionStorage.getItem("isAddWishlist");
            if(isOpen == 1){
                // Get the modal
                var modal = document.getElementById("myModal");
                modal.style.display = "block";
                sessionStorage.removeItem("isAddWishlist");
            }
          

          </script>


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

            document.getElementById("add-wishlist").onclick = function () {
              document.getElementById("quantity").setAttribute('value', document.getElementById("quantityProd").value);
              var selectModal = document.getElementById("colorSelect");
              if(selectModal.value=="val1"){
                document.getElementById("color1").checked = "true";
              }
              else if(selectModal.value=="val2"){
                document.getElementById("color2").checked = "true";
              }
              else if(selectModal.value=="val3"){
                document.getElementById("color3").checked = "true";
              }
              else if(selectModal.value=="val4"){
                document.getElementById("color4").checked = "true";
              }
              document.getElementById("confirm").checked = "true";
              document.wishlistModal.submit();
            };
          }
        }



          // (A) GET FROM SESSION
        

    </script>
    
    <script>
            function compare(vbrandName){
              var brandCompare = vbrandName;
              localStorage.setItem("brandCompare", brandCompare);
              var modelCompare = idProdNum;
              localStorage.setItem("modelCompare", modelCompare);
              location.href = "/shop-page/compare-page.php";
            };
             function store(clicked_id){
               
                  // (A) VARIABLES TO PASS
                   var idProd = clicked_id;
                
                  // (B) SAVE TO LOCAL STORAGE
                  // (B1) FLAT STRING OR NUMBER
                  // LOCALSTORAGE.SETITEM("KEY", "VALUE");
                  localStorage.setItem("idProd", idProd);
                 
                  // (B2) ARRAY OR OBJECT
                  // LOCAL STORAGE CANNOT STORE ARRAY AND OBJECTS
                  // JSON ENCODE BEFORE STORING, CONVERT TO STRING
                  location.href = "/shop-page/product-page.php";
                  
            };
            
            function addWishlist(clicked_id){
              var loggedinUser = localStorage.getItem("userLoggedIn");
              if(loggedinUser==0){
                location.href = "/log-in-page/log-in.php";
              }
              else{
                var idProd = clicked_id;
                localStorage.setItem("idProd", idProd);
                var isAddWishlist = 1;
                sessionStorage.setItem("isAddWishlist", isAddWishlist);
                location.href = "/shop-page/product-page.php";
              }
            };
            
    </script>
    

    <section id="header">
    <img src="/logodark.png" alt="logo" class="logo">
      <div>
        <ul id="navbar">
          <li><a href="/index.php">Home</a></li>
          <li><a class="active" href="/shop-page/shop.html">Shop</a></li>
          <li><a  href="/blog-page/blog.html">Blog</a></li>
          <li><a href="#" id="signin">Sign In</a></li>
          <li><a href="/contact-page/contact.html">Contact</a></li>
          <li>
            <a href="#" id="wishlist"><i class="far fa-heart"></i></a>
          </li>
          <li>
            <a href="#" id="orders"><i class='bx bx-car'></i></a>
          </li>
        </ul>
      </div>
    </section>
    
    <section id="pro-details" class="section-p1">
        <div class="single-pro-image">
        <img
          
          width="100%"
          id="MainImg"
          alt=""
        />

        <div class="small-img-group"> 
        <div class="small-img-col">
            <img
             
              width="100%"
              class="small-img"
              alt=""
            />
          </div>

          <div class="small-img-col">
            <img
              
              width="100%"
              class="small-img"
              alt=""
            />
          </div>

          <div class="small-img-col">
            <img
              
              width="100%"
              class="small-img"
              alt=""
            />
          </div>
          
          <div class="small-img-col">
            <img
             
              width="100%"
              class="small-img"
              alt=""
            />
          </div>
        </div>
      </div>   
        

        <div class="single-pro-details">
        <div id="textHolder"></div>
        <h4 id="brandModel">Lorem Ipsum.</h4>
        <h2 id="price">$1,000,000</h2>
        <i id="locIcon" class="fa-solid fa-location-dot"></i>
        <h6 id="location">Lorem ipsum dolor sit.</h6>

        <select id="colorSelect" onchange="getOption()"></select>
        
        <input id="quantityProd" type="number" min="1" value="1" />
        <button class="normal check" onclick="openPopup()">
          Check Availability
        </button>
        <button class="normal check" id="compareBrandId" onclick="compare(this.id)">
          <a href="#" class="to-compare"
            >Compare Product</a
          >
        </button>
        <button id="add-wishlist"><i class="fal fa-heart"></i></button>
        <?php require_once 'buyMessage.php'; ?>
        <h4>Overview</h4>
        <div class="rating-sold">
        <div id="rating">
            <div class="star">
                <i class="fas fa-star" id="star1"></i>
                <i class="fas fa-star" id="star2"></i>
                <i class="fas fa-star" id="star3"></i>
                <i class="fas fa-star" id="star4"></i>
                <i class="fas fa-star" id="star5"></i>
            </div>
        </div>
          <div id="sold"></div>
        </div>
        <span id="overview">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur
          nobis aspernatur numquam maiores magnam. In, porro fugit incidunt
          blanditiis dolorum, nostrum consequuntur reprehenderit facere amet
          laboriosam iusto enim perferendis suscipit quas, itaque harum at non
          placeat. Amet, vitae? Aliquam sequi quibusdam cum quo deleniti, odio
          delectus maxime odit quisquam alias.
         </span>
         <a href="#" id="broch" target="_blank">More...</a>
      </div>
      
    </section>
    
    <section id="comment" style="padding: 60px 0;">
      <h5 style="text-align: center;padding: 10px;font-size: medium;color: #ae7c54;">Most recent comments</h5>
      <ul style="display: flex; justify-content: center;">
        <li style="border: solid;border-color: #218490;border-width: 2px; width: 300px;margin: 0 20px;list-style: none; padding: 10px; border-radius: 10px;height: 200px;display: grid;align-content: center;justify-content: center;">
          <p style="color: black;">It lacks in comfort on rough surface, nevertheless the overall quality is still good.</p>
          <h6 style="color: #13424c;">Nicolas Kramer</h6>
        </li>

        <li style="border: solid;border-color: #218490;border-width: 2px; width: 300px;margin: 0 20px;list-style: none; padding: 10px; border-radius: 10px;height: 200px;display: grid;align-content: center;justify-content: center;">
          <p style="color: black;">The safety features are great. Ride quality is far better than competition.</p>
          <h6 style="color: #13424c;">Conrad Villaceran</h6>
        </li>

        <li style="border: solid;border-color: #218490;border-width: 2px; width: 300px;margin: 0 20px;list-style: none; padding: 10px; border-radius: 10px;height: 200px;display: grid;align-content: center;justify-content: center;">
          <p style="color: black;">I like it and I'm satisfied. The quality is great, no problems encountered yet.</p>
          <h6 style="color: #13424c;">Mariel Navarra</h6>
        </li>
      </ul>
    </section>
    
    <section id="products1">
      <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>We know what you want</p>
        <div class="pro-container">
          <div class="pro">
              <div id="100" onClick="store(this.id)">
            <img src="https://i.imgur.com/ObmTqzW.jpg" alt="car 1">
            <div class="des">
              <span>Toyota</span>
              <h5>Corolla Cross 1.8 V Hybrid</h5>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h4>₱1,748,250</h4>
            </div>
             </div>
            <i class="fal fa-heart heart" onClick="addWishlist(this.id)" id="100"></i>
          </div>

          <div class="pro">
              <div id="102" onClick="store(this.id)">
            <img src="https://i.imgur.com/DmAgw1O.jpg" alt="car 2">
            <div class="des">
              <span>Toyota</span>
              <h5>Camry 2.5 V HEV</h5>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h4>₱2,462,500</h4>
            </div>
            </div>
            <i id="102" onClick="addWishlist(this.id)"class="fal fa-heart heart"></i>
          </div>

          <div class="pro">
              <div id="107" onClick="store(this.id)">
            <img src="https://i.imgur.com/vNgrkLV.jpg" alt="car 3">
            <div class="des">
              <span>Honda</span>
              <h5>E</h5>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h4>₱1,975,000</h4>
            </div>
            </div>
            <i id="107" onClick="addWishlist(this.id)" class="fal fa-heart heart"></i>
          </div>

          <div class="pro">
              <div id="113" onClick="store(this.id)">
            <img src="https://i.imgur.com/tB5vvXF.jpg" alt="car 4">
            <div class="des">
              <span>Hyundai</span>
              <h5>Ioniq Electric Elite</h5>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h4>₱1,691,000</h4>
            </div>
            </div>
            <i id="113" onClick="addWishlist(this.id)" class="fal fa-heart heart"></i>
          </div>
        </div>
      </section>
    </section>

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
    
    <script>
      var MainImg = document.getElementById("MainImg");
      var smallimg = document.getElementsByClassName("small-img");
      
      function getOption() {
        var selectedNum = document.getElementById('colorSelect').value;
        if(selectedNum == "val1"){
            MainImg.src = smallimg[0].src;
        }
        
        if(selectedNum == "val2"){
            MainImg.src = smallimg[1].src;
        }
        
        if(selectedNum == "val3"){
            MainImg.src = smallimg[2].src;
        }
        
        if(selectedNum == "val4"){
            MainImg.src = smallimg[3].src;
        }
    }
    
        
      smallimg[0].onclick = function () {
        MainImg.src = smallimg[0].src;
        document.getElementById('colorSelect').value = "val1";
      };

      smallimg[1].onclick = function () {
        MainImg.src = smallimg[1].src;
        document.getElementById('colorSelect').value = "val2";
      };

      smallimg[2].onclick = function () {
        MainImg.src = smallimg[2].src;
        document.getElementById('colorSelect').value = "val3";
      };

      smallimg[3].onclick = function () {
        MainImg.src = smallimg[3].src;
        document.getElementById('colorSelect').value = "val4";
      };
    </script>

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
          <form action="availability.php" autocomplete="off" method="POST">
          <button class="close" onclick="closeForm()">x</button>
            <h3 class="title">Contact us</h3>
            
            <div id ="labeltobuy">
            <input type="number" name="idBuy" id="idBuy" hidden>
            <input type="number" name="carBuy" id="carBuy" hidden>
            <label for="brand" id="buyBrand">Brand</label>
            <label for="model" id="buyModel">Model</label> </br>
            <label for="color" id="buyColor">Color</label>
            <input type="text" name="colorBuy" id="colorBuy" hidden>
            <label for="quantity" id="buyQuantity">Quantity</label>
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
              <textarea name="message" class="input"></textarea>
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

    <script src="/shop-page/modal/modal-script.js"></script>

    <script>


      let popup = document.getElementById("popup");

      function closeForm() {
        popup.classList.remove("open-popup");
      }
  

      function openPopup() {
        let loggedinUser = localStorage.getItem("userLoggedIn");
        console.log(loggedinUser);
        if(loggedinUser==0){
          location.href="/log-in-page/log-in.php";
        }
        else{
          
          document.getElementById("buyBrand").innerHTML = brand[displaynum].toUpperCase();
          document.getElementById("buyModel").innerHTML = model[displaynum];
          var selectAvail =document.getElementById("colorSelect");
          document.getElementById("buyColor").innerHTML = selectAvail.options[selectAvail.selectedIndex].innerHTML;
          document.getElementById("buyQuantity").innerHTML = document.getElementById("quantityProd").value;
          document.getElementById("carBuy").value = idProdNum;
          document.getElementById("idBuy").value = loggedinUser;
          document.getElementById("colorBuy").value = selectAvail.options[selectAvail.selectedIndex].innerHTML;
          document.getElementById("quantityBuy").value = document.getElementById("quantityProd").value;
          popup.classList.add("open-popup");
        }
      }
    </script>
    
     <script>
         for(i=0;i<numOfProd;i++){
             if(idProdNum==idGet[i]){
                 addDetails();
             } 
         }
         
          function addDetails() {
             //for compare
                var idCompare = document.getElementById('compareBrandId');
                idCompare.id = brand[i];
            //text
            var h4 = document.getElementById('brandModel');
            h4.innerHTML = brand[i].toUpperCase() + " " + model[i];
            
            var finalPrice = parseInt(origPrice[i]) +  parseInt(comm[i]) - parseInt(disc[i]);
            var h2 = document.getElementById('price');
            h2.innerHTML = "₱"+ finalPrice.toLocaleString();
            
            var h6 = document.getElementById('location');
            h6.innerHTML = loc[i];

            //add options
            var select = document.getElementById('colorSelect');
            
            var option = document.createElement("option");
            option.text = col1[i];
            option.value = "val1";
            select.add(option); 
            
             if(col2[i]!=null){
            var option2 = document.createElement("option");
            option2.text = col2[i];
            option2.value = "val2";
            select.add(option2); 
            }
            
            if(col3[i]!=null){
            var option3 = document.createElement("option");
            option3.text = col3[i];
            option3.value = "val3";
            select.add(option3); 
            }
            
            if(col4[i]!=null){
            var option4 = document.createElement("option");
            option4.text = col4[i];
            option4.value = "val4";
            select.add(option4); 
            }
            
            
            //rating star
                var ratingInt = parseInt(rating[i]);
              if(ratingInt==4){
                var star5 = document.getElementById('star5');
                star5.style.visibility = "hidden";
              }
              else if(ratingInt==3){
                var star5 = document.getElementById('star5');
                star5.style.visibility = "hidden";
                
                var star4 = document.getElementById('star4');
                star4.style.visibility = "hidden";
              }
              
              else if(ratingInt==2){
                var star5 = document.getElementById('star5');
                star5.style.visibility = "hidden";
                
                var star4 = document.getElementById('star4');
                star4.style.visibility = "hidden";
                
                var star3 = document.getElementById('star3');
                star3.style.visibility = "hidden";
              }
              
              else if(ratingInt==1){
                var star5 = document.getElementById('star5');
                star5.style.visibility = "hidden";
                
                var star4 = document.getElementById('star4');
                star4.style.visibility = "hidden";
                
                var star3 = document.getElementById('star3');
                star3.style.visibility = "hidden";
                
                var star2 = document.getElementById('star2');
                star2.style.visibility = "hidden";
              }
              
              else if (ratingInt=0){
                 var star5 = document.getElementById('star5');
                star5.style.visibility = "hidden";
                
                var star4 = document.getElementById('star4');
                star4.style.visibility = "hidden";
                
                var star3 = document.getElementById('star3');
                star3.style.visibility = "hidden";
                
                var star2 = document.getElementById('star2');
                star2.style.visibility = "hidden";
                
                var star1 = document.getElementById('star1');
                star1.style.visibility = "hidden";
                
                var ratingText = document.getElementById('rating');
                
                ratingText.innerHTML = "rating: no rating yet."
                
              }
              
                //sold
                var numSold = document.getElementById('sold');
                var numSoldText = document.createTextNode(numPurch[i] + " sold.");
                numSold.appendChild(numSoldText);
                
                //overview
                var oview = document.getElementById('overview');
                oview.innerHTML = overview[i];
                
                //link brochure
                var pdfLink = document.getElementById('broch');
                pdfLink.href = pdf[i];
                
                //change images
                var i1 = document.getElementById('MainImg');
                i1.src = img1[i];
                
                var i2 = document.getElementsByClassName('small-img');
                i2[0].src = img1[i];
                
                if(img2[i]!=null){
                i2[1].src = img2[i];
                }
                
                if(img3[i]!=null){
                i2[2].src = img3[i];
                }
                
                if(img4[i]!=null){
                i2[3].src = img4[i];
                }
                
          }
            
         
    </script>
</html>
