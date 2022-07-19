<?php
session_start();
if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])) {
  $loggedIn = $_SESSION['loggedin'];
}
else{
  $loggedIn = 0;
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
    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/homepage/styles.css" />

  </head>
  <body onload="setUser()">

      <form action="/homepage/logout.php" method="POST" id="logoutForm" name="logoutForm" hidden>
        <input type="number" value="0" name="logNum">
      </form>
      <script>
          

        function setUser(){
          var loggedinUser = <?php echo $loggedIn?>;

          
          //local set
          localStorage.setItem("userLoggedIn", loggedinUser);
          
          loggedinUser = localStorage.getItem("userLoggedIn");
          
         
          if(loggedinUser==0){
            document.getElementById('wishlist').href = "/log-in-page/log-in.php";
            document.getElementById('mywishlist').href = "/log-in-page/log-in.php";
            document.getElementById('signin').href = "/log-in-page/log-in.php";
            document.getElementById('signinfooter').href = "/log-in-page/log-in.php";
            document.getElementById('orders').href ="/log-in-page/log-in.php";
            document.getElementById('ordersfooter').href = "/log-in-page/log-in.php";
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
          <li><a class="active" href="/index.php">Home</a></li>
          <li><a href="/shop-page/shop.html">Shop</a></li>
          <li><a href="/blog-page/blog.html">Blog</a></li>
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

    <section id="hero">
      <h4>E-VOLUTION</h4>
      <h2>Get ready</h2>
      <h1>For the future</h1>
      <p>Get your dream e-vehicle now.</p>
      <button onclick="window.location.href='/shop-page/shop.html';"><strong>Shop Now</strong></button>
    </section>

    <section id="features">
      <section id="feature" class="section-p1">
        <div class="fe-box">
          <img src="/homepage/imgs/features/free shipping.png" alt="free shipping" />
          <h6>Free Shipping</h6>
        </div>

        <div class="fe-box">
          <img src="/homepage/imgs/features/order online.png" alt="Online Order" />
          <h6>Online Order</h6>
        </div>

        <div class="fe-box">
          <img src="/homepage/imgs/features/save money.png" alt="Save Money" />
          <h6>Save Money</h6>
        </div>

        <div class="fe-box">
          <img src="/homepage/imgs/features/promote.png" alt="Promotions" />
          <h6>Promotions</h6>
        </div>

        <div class="fe-box">
          <img src="/homepage/imgs/features/selling.png" alt="Happy Sell" />
          <h6>Happy Sell</h6>
        </div>

        <div class="fe-box">
          <img src="/homepage/imgs/features/call.png" alt="F24/7Support" />
          <h6>24/7 Support</h6>
        </div>
      </section>
    </section>
    
    <script>
                  
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
    
    <section id="products1">
      <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>E-Volution's personal picks of the month</p>
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
          <i class="fal fa-heart heart" id="100" onClick="addWishlist(this.id)"></i>
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
            <i class="fal fa-heart heart" id="102" onClick="addWishlist(this.id)"></i>
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
         <i class="fal fa-heart heart" onClick="addWishlist(this.id)" id="107"></i>
          </div>

          <div class="pro">
              <div  id="108" onClick="store(this.id)">
            <img src="https://i.imgur.com/ZrLp0zp.jpg" alt="car 4">
            <div class="des">
              <span>Mazda</span>
              <h5>CX-30</h5>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h4>₱1,554,500</h4>
            </div>
            </div>
            <i class="fal fa-heart heart" onClick="addWishlist(this.id)" id="108"></i>
          </div>

          <div class="pro">
              <div  id="109" onClick="store(this.id)">
            <img src="https://i.imgur.com/MiGF3Uu.jpg" alt="car 5">
            <div class="des">
              <span>Ford</span>
              <h5>F-150 Lightning Pro</h5>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h4>₱3,567,900</h4>
            </div>
            </div>
            <i class="fal fa-heart heart" onClick="addWishlist(this.id)" id="109"></i>
          </div>

          <div class="pro">
              <div  id="111" onClick="store(this.id)">
            <img src="https://i.imgur.com/BABC2WO.jpg" alt="car 6">
            <div class="des">
              <span>Ford</span>
              <h5>Mustang Mach-E</h5>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h4>₱2,740,500</h4>
            </div>
            </div>
            <i class="fal fa-heart heart" onClick="addWishlist(this.id)"id="111"></i>
          </div>

          <div class="pro">
              <div id="113" onClick="store(this.id)">
            <img src="https://i.imgur.com/tB5vvXF.jpg" alt="car 7">
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
              <h4>₱1,753,000</h4>
            </div>
            </div>
            <i class="fal fa-heart heart" onClick="addWishlist(this.id)" id="113"></i>
          </div>

          <div class="pro">
              <div  id="116" onClick="store(this.id)">
            <img src="https://i.imgur.com/PL3SdDW.jpg" alt="car 8">
            <div class="des">
              <span>Nissan</span>
              <h5>ARIYA</h5>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h4>₱2,016,000</h4>
            </div>
            </div>
           <i class="fal fa-heart heart" onClick="addWishlist(this.id)" id="116"></i>
          </div>
        </div>
      </section>
    </section>

    <section id="banner" class="section-m1">
      <h4 style="color: #ae7c54;">Buy Your First Electric Vehicle Now</h4>
      <h2>Get discount on your first purchase.</h2>
      <button class="normal" onclick = "location.href = '/shop-page/shop.html' ">Explore More</button>
    </section>

    <section id="products1">
      <section id="product1" class="section-p1">
        <h2>On Sale</h2>
        <p>From our most trusted partners</p>
        <div class="pro-container">
          <div class="pro">
              <div  id="107" onClick="store(this.id)">
            <img src="https://i.imgur.com/vNgrkLV.jpg" alt="car 1">
            <div class="des">
              <span>Honda</span>
              <h5>E</h5>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h4>₱1,975,000</h4>
            </div>
            </div>
            <i class="fal fa-heart heart" onClick="addWishlist(this.id)" id="107"></i>
          </div>

          <div class="pro">
              <div id="108" onClick="store(this.id)">
            <img src="https://i.imgur.com/ZrLp0zp.jpg" alt="car 2">
            <div class="des">
              <span>Mazda</span>
              <h5>CX-30</h5>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h4>₱1,554,500</h4>
            </div>
            </div>
            <i class="fal fa-heart heart" onClick="addWishlist(this.id)" id="108"></i>
          </div>

          <div class="pro">
              <div  id="113" onClick="store(this.id)">
            <img src="https://i.imgur.com/tB5vvXF.jpg" alt="car 3">
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
           <i class="fal fa-heart heart" onClick="addWishlist(this.id)" id="113"></i>
          </div>

          <div class="pro">
              <div id="115" onClick="store(this.id)">
            <img src="https://i.imgur.com/FUKrjn1.jpg" alt="car 4">
            <div class="des">
              <span>Nissan</span>
              <h5>LEAF</h5>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h4>₱2,930,900</h4>
            </div>
            </div>
            <i class="fal fa-heart heart" onClick="addWishlist(this.id)" id="115"></i>
          </div>

          <div class="pro">
              <div id="105" onClick="store(this.id)">
            <img src="https://i.imgur.com/vOn9k7S.jpg" alt="car 5">
            <div class="des">
              <span>Kia</span>
              <h5>Sorento PHEV</h5>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h4>₱2,444,404</h4>
            </div>
            </div>
            <i class="fal fa-heart heart" onClick="addWishlist(this.id)" id="105"></i>
          </div>

          <div class="pro">
              <div id="112" onClick="store(this.id)">
            <img src="https://i.imgur.com/6zdYjKx.jpg" alt="car 6">
            <div class="des">
              <span>Hyundai</span>
              <h5>Ioniq Hybrid Elite</h5>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h4>₱1,644,000</h4>
            </div>
            </div>
            <i class="fal fa-heart heart" onClick="addWishlist(this.id)" id="112"></i>
          </div>

          <div class="pro">
              <div id="103" onClick="store(this.id)">
            <img src="https://i.imgur.com/zSkECwI.jpg" alt="car 7">
            <div class="des">
              <span>Mitsubishi</span>
              <h5>Outlander PHEV</h5>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h4>₱3,147,900</h4>
            </div>
            </div>
           <i class="fal fa-heart heart" onClick="addWishlist(this.id)" id="103"></i>
          </div>

          <div class="pro">
              <div id="102" onClick="store(this.id)">
            <img src="https://i.imgur.com/DmAgw1O.jpg" alt="car 8">
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
           <i class="fal fa-heart heart" onClick="addWishlist(this.id)" id="102"></i>
          </div>
        </div>
      </section>
    </section>

    <section id="sm-banner" class="section-p1">
      <div class="banner-box">
        <h4>Crazy deals</h4>
        <h2>Get additional bonuses</h2>
        <span>On newly released cars</span>
        <button class="white" onclick = "location.href = '/shop-page/shop.html' ">Learn More</button>
      </div>

      <div class="banner-box banner-box2">
        <h4>Bring the fight</h4>
        <h2>On the streets</h2>
        <span>Shop at E-Volution</span>
        <button class="white" onclick = "location.href = '/shop-page/shop.html' ">Collection</button>
      </div>
    </section>

    <section id="banner3">
      <div class="banner-box">
        <h2>SEASONAL SALE</h2>
        <h3>Summer Adventures - 2% OFF</h3>
      </div>

      <div class="banner-box banner-box2">
        <h2>SEASONAL SALE</h2>
        <h3>Summer Adventures - 2% OFF</h3>
      </div>

      <div class="banner-box banner-box3">
        <h2>SEASONAL SALE</h2>
        <h3>Summer Adventures - 2% OFF</h3>
      </div>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
      <div class="newstext">
        <h4>Sign Up For Newsletters</h4>
        <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
      </div>

      <div class="form">
        <input type="text" placeholder="Your email address">
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
</html>
