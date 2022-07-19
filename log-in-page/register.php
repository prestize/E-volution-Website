<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Volution | Sign Up</title>
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link rel="stylesheet" href="/homepage/styles.css" />
    <link rel="stylesheet" type="text/css" href="/log-in-page/designregister.css">
  </head>

  <body onload="document.FormName.reset();">
    <section id="header">
      <h1>E-VOLUTION</h1>
    </section>

    <section id="hero-register">
        <div class="content">
        <h3>Register</h3>
        <?php require_once 'messages.php'; ?>
        <form action="signup.php" method="POST" autocomplete="off" name="FormName">
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="femail" name="femail"><br>
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone"><br>
        <label for="pass">Password:</label><br>
        <input type="password" id="pass" name="pass"><br>
        <label for="confirm-pass">Confirm Password:</label><br>
        <input type="password" id="confirm-pass" name="confirm-pass"><br>
        <input type="submit" class="btn" value="Sign Up">
        </form>
        <p>Already have an account?  <a href="#">Sign In</a></p>
        </div>
    </section>

    <footer class="section-p1">
      <div class="col">
        <!-- <img class="logo" src="" alt=""> -->
        <h1>E-VOLUTION</h1>
        <h4>Contact</h4>
        <p><strong>Address:</strong>1016 Anonas, Sta. Mesa, Maynila, Kalakhang Maynila</p>
        <p><strong>Phone:</strong> (+63) 9123456789/ (02) 987 6543</p>
        <p><strong>Hours:</strong>10:00 - 18:00, Mon-Sat</p>

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
        <a href="#">About Us</a>
        <a href="/seller-page/seller-addproduct.html">Delivery Information</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms and Conditions</a>
        <a href="#">Contact Us</a>
      </div>

      <div class="col">
        <h4>My Account</h4>
        <a href="#">Sign In</a>
        <a href="#">View Cart</a>
        <a href="#">My Wishlist</a>
        <a href="#">Track My Order</a>
        <a href="#">Help</a>
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
