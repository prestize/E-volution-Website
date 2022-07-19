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
    <link rel="stylesheet" href="/homepage/styles.css" />
    <link rel="stylesheet" href="/shop-page/compare-page.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
  </head>

  <body  onload="defaultValue()">

  
      <form action="/homepage/logout.php" method="POST" id="logoutForm" name="logoutForm" hidden>
        <input type="number" value="0" name="logNum">
      </form>
     <script>

      
        var brandSelected = localStorage.getItem("brandCompare");
        var modelSelected = localStorage.getItem("modelCompare");
        function defaultValue(){
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
      
        if(brandSelected!=0){
            selectBrand1.value = brandSelected;
            selectBrand2.value = "title";
            changeModels1();
            selectModel1.value = modelSelected;
            changeDetails1();
            
            brandSelected = 0;
            modelSelected = 0;
            localStorage.setItem("brandCompare", brandSelected); 
            localStorage.setItem("modelCompare", modelSelected);
        }    
        
        else{
        brandSelected = 0;
        modelSelected = 0;
        selectBrand1.value = "title";
        selectBrand2.value = "title";
        }
            
        };
        
        
        function gotoProductPage(idToDisplay){
            if(idToDisplay!="#"){
            localStorage.setItem("idProd", idToDisplay);
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
    
    <section id="compare-page-header">
      <h2>Compare E-vehicles</h2>
      <p>Know which e-vehicle is more suited for you!</p>
    </section>
    
    <div class="compare-table">
      <!-- Font Awesome Icon Library -->
      <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      />

      <table>
        <tr>
          <th style="width: 20%"></th>
          <th><a href="#" id="title1" name="#" onClick = "gotoProductPage(this.name)">Vehicle1</a></th>
          <th><a href="#" id="title2" name="#" onClick = "gotoProductPage(this.name)">Vehicle2</a></th>
        </tr>
        <tr>
          <td>Brand</td>
          <td id="brand1">SELECT VEHICHLE #1</td>
          <td id="brand2">SELECT VEHICHLE #2</td>
        </tr>
        <tr>
          <td>Type</td>
          <td id="type1">SELECT VEHICHLE #1</td>
          <td id="type2">SELECT VEHICHLE #2</td>
        </tr>
        <tr>
          <td>Price</td>
          <td id="price1">SELECT VEHICHLE #1</td>
          <td id="price2">SELECT VEHICHLE #2</td>
        </tr>
        <tr>
          <td>User Rating</td>
          <td id="rating1">SELECT VEHICHLE #1</td>
          <td id="rating2">SELECT VEHICHLE #2</td>
        </tr>
        <tr>
          <td>Dimensions</td>
          <td id="dim1">SELECT VEHICHLE #1</td>
          <td id="dim2">SELECT VEHICHLE #2</td>
        </tr>
        <tr>
          <td>Seat Capacity</td>
          <td id="seat1">SELECT VEHICHLE #1</td>
          <td id="seat2">SELECT VEHICHLE #2</td>
        </tr>
        <tr>
          <td>Torque</td>
          <td id="torque1">SELECT VEHICHLE #1</td>
          <td id="torque2">SELECT VEHICHLE #2</td>
        </tr>
        <tr>
          <td>Warranty</td>
          <td id="warr1">SELECT VEHICHLE #1</td>
          <td id="warr2">SELECT VEHICHLE #2</td>
        </tr>
        <tr>
          <td>Features</td>
          <td id="features1">SELECT VEHICHLE #1</td>
          <td id="features2">SELECT VEHICHLE #2</td>
        </tr>
        <tr>
          <td>Brochure</td>
          <td>
            <a href="#" id="broch1" target="_blank">More...</a>
          </td>
          <td>
            <a href="#" id="broch2" target="_blank">More...</a>
          </td>
        </tr>
      </table>
    </div>

    <div class="compare-imgs">
      <div class="choice">
        <span>Vehicle 1</span>

        <label for="brand-names" class="dropbox">Brands</label>
        <select name="brand-names" id="brand-names1" onchange="changeModels1()" class="contents">
          <option value="title">Select a Brand:</option>
          <option value="ford">Ford</option>
          <option value="honda">Honda</option>
          <option value="hyundai">Hyundai</option>
          <option value="kia">Kia</option>
          <option value="mazda">Mazda</option>
          <option value="mitsubishi">Mitsubishi</option>
          <option value="nissan">Nissan</option>
          <option value="toyota">Toyota</option>
        </select>

        <label for="model-names" class="dropbox">Models</label>
        <select name="model-names" id="model-names1" onchange="changeDetails1()" class="contents">
       
        </select>
      </div>

      <div>
        <img src="https://i.imgur.com/VxhaWZ0.jpg" alt="" class="compare-img" id="imageDisplay1">
      </div>
      
    </div>

    <div class="compare-imgs2">
      <div class="choice">
        <span>Vehicle 1</span>

        <label for="brand-names" class="dropbox">Brands</label>
        <select name="brand-names" id="brand-names2" onchange="changeModels2()" class="contents">
          <option value="title">Select a Brand:</option>
          <option value="ford">Ford</option>
          <option value="honda">Honda</option>
          <option value="hyundai">Hyundai</option>
          <option value="kia">Kia</option>
          <option value="mazda">Mazda</option>
          <option value="mitsubishi">Mitsubishi</option>
          <option value="nissan">Nissan</option>
          <option value="toyota">Toyota</option>
        </select>
        
        <label for="model-names" class="dropbox">Models</label>
        <select name="model-names" id="model-names2" onchange="changeDetails2()" class="contents">
        </select>
      </div>

      <div>
        <img src="https://i.imgur.com/VxhaWZ0.jpg" alt="" class="compare-img" id="imageDisplay2">
      </div>
      
    </div>

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
        //variables
         var numOfProd = 17;
         var brand = ["nissan","toyota","toyota","toyota","mazda","honda","ford","kia","ford","hyundai","hyundai","hyundai","nissan","ford","kia","mitsubishi","kia"];
         var model = ["ARIYA","Camry 2.5 V HEV ","Corolla Altis 1.8 V Hybrid CVT","Corolla Cross 1.8 V Hybrid","CX-30","E","Escape SE Hybrid","EV6","F-150 Lightning Pro","Ioniq Electric Elite","Ioniq Hybrid Elite","Kona EV","LEAF","Mustang Mach-E","Niro EV","Outlander PHEV","Sorento PHEV"];
         var type = ["Fully Electric Vehicle","Hybrid Electric Vehicle","Hybrid Electric Vehicle","Hybrid Electric Vehicle","M Hybrid Electric Vehicle","Fully Electric Car","Hybrid Electric Vehicle","Fully Electric Vehicle","Fully Electic Vehicle","Fully Electric Vehicle","Hybrid Electric Vehicle","Fully Electric Vehicle","Fully Electric Vehicle","Fully Electric Vehicle","Fully Electric Vehicle","Plug-in Hybrid Electric Vehicle","Plug-in Hybrid Electric Vehicle"];
         var origPrice = ["1920000","2350000","1610000","1665000","1490000","1900000","1490000","2160000","3398000","1620000","1580000","2388000","2798000","2610000","1919520","2998000","2356576"];
         var comm = ["96000","117500","80500","83250","74500","95000","74500","108000","169900","81000","79000","119400","139900","130500","95976","149900","117828"];
         var disc = ["0","5000","0","0","10000","20000","0","0","0","10000","15000","0","7000","0","0","0","30000"];
         var warr = ["6","3","3","3","3","3","5","10","8","3","3","5","3","3","7","5","5"];
         var rating = ["4","5","3","4","5","5","5","2","4","5","3","5","3","4","4","5","3"];
         var img1 = ["https:\/\/i.imgur.com\/PL3SdDW.jpg","https:\/\/i.imgur.com\/DmAgw1O.jpg","https:\/\/i.imgur.com\/lw1HBzN.jpg","https:\/\/i.imgur.com\/ObmTqzW.jpg","https:\/\/i.imgur.com\/ZrLp0zp.jpg","https:\/\/i.imgur.com\/vNgrkLV.jpg","https:\/\/i.imgur.com\/vYjIgZQ.jpg","https:\/\/i.imgur.com\/b4DoF62.jpg","https:\/\/i.imgur.com\/MiGF3Uu.jpg","https:\/\/i.imgur.com\/tB5vvXF.jpg","https:\/\/i.imgur.com\/6zdYjKx.jpg","https:\/\/i.imgur.com\/jEayX7w.jpg","https:\/\/i.imgur.com\/FUKrjn1.jpg","https:\/\/i.imgur.com\/BABC2WO.jpg","https:\/\/i.imgur.com\/Wdh6NFC.jpg","https:\/\/i.imgur.com\/zSkECwI.jpg","https:\/\/i.imgur.com\/vOn9k7S.jpg"];
         var pdf = ["https:\/\/www-europe.nissan-cdn.net\/content\/dam\/Nissan\/gb\/brochures\/Vehicles\/Nissan_Ariya_UK.pdf","https:\/\/d3ggoe3aghc7um.cloudfront.net\/uploads\/vehicles\/38\/001_38_1639194784087_000.pdf","https:\/\/d3ggoe3aghc7um.cloudfront.net\/uploads\/vehicles\/2\/001_2_1632305816296_000.pdf","https:\/\/d3ggoe3aghc7um.cloudfront.net\/uploads\/vehicles\/27\/001_27_1646212394056_000.pdf","https:\/\/imgcdn.zigwheels.ph\/brochures\/21\/2169\/mazda-cx-30-317843.pdf","https:\/\/live.dealer-asset.co\/ie33\/product\/file\/New-Honda-e-Brochure-20YM.pdf","https:\/\/www.ford.com\/aemservices\/brand\/api\/nameplate\/brochure?region=US&make=Ford&model=Escape&year=2022","https:\/\/www.kia.com\/content\/dam\/kwcms\/kme\/uk\/en\/assets\/static\/utility\/brochure\/The%20Kia%20EV6%20-%20Your%20guide%20to%20electric%20driving.pdf","https:\/\/media.ford.com\/content\/dam\/fordmedia\/North%20America\/US\/product\/2022\/f-150-lightning\/pdf\/F-150_Lightning_Tech_Specs.pdf","https:\/\/www.hyundai.com\/content\/dam\/hyundai\/au\/en\/documents\/Hyundai_IONIQ_Brochure.pdf","https:\/\/www.hyundai.com\/content\/dam\/hyundai\/au\/en\/documents\/Hyundai_IONIQ_Brochure.pdf","https:\/\/www.hyundai.com\/content\/dam\/hyundai\/in\/en\/data\/brochure\/Hyundai_KONA_SUV_brochure.pdf","https:\/\/www-asia.nissan-cdn.net\/content\/dam\/Nissan\/ph\/vehicles\/LEAF\/LEAF%20Brochure.pdf","https:\/\/www.ford.com\/ntzlibs\/content\/dam\/bev\/us\/november-2020-updates\/install-specs-sheet\/21_MachE_online.pdf","https:\/\/www.kia.com\/content\/dam\/kwcms\/au\/en\/images\/pdf\/niro\/kia-niro-brochure.pdf","https:\/\/www.mitsubishi-motors.com.ph\/content\/dam\/mitsubishi-motors-ph\/images\/brochures\/Outlander-PHEV.pdf","https:\/\/www.kia.com\/content\/dam\/kia\/us\/brochures\/brochure_sorento_2022.pdf"];
         var idGet = ["116","102","101","100","108","107","110","106","109","113","112","114","115","111","104","103","105"];
         var features = ["Power Sliding Centre Console & Flexible Centre Storage with Tray Table.\r\nIntegrated Display Interface.\r\nVoice Controls.\r\nIntelligent Route Planner.","Superior driving and prestige riding meets Hybrid Electric Vehicle technology. Lead a new class of excellence that builds a great legacy for sustainability.\r\n\r\nThe Camry draws more attention than your average sedan with its captivating style and powerful stance.\r\n\r\nThe Camry\u2019s interior is smart and ergonomic in the most luxurious way. It's trimmed with top-quality materials \u2013 from the black and brown soft leather seats, to the door panels, even on the console box lid.\r\n","VVT-I, 4-Cylinder In-Line DOHC, 16 Valve + Electric Motor.\r\nContinuous Variable Transmission.\r\n7\" Color Multi-Information Display.\r\nElectronic Parking Brake (EPB) with Brake Hold.\r\nToyota Safety Sense.\r\nBi-Beam LED.\r\n","8-way Power Adjust Driver's seat.\r\n8\" with Apple Carplay + Android Auto + Smart Device Link (SDL).\r\nBi-beam LED Headlamps.\r\n12V Socket: 1 + Rear USB: 2 Accesory Outlets.\r\nRain-sensing Windshield Wiper.\r\nFront: 2 + Rear: 4 Clearance and Back Sonar.","MAZDA CONNECT.\r\nE-Skyactiv G M HYBRID ENGINE.\r\n2.0\/2.5L ENGINE.\r\nDrivetrain.","The instrument panel, which extends the full width of the interior, consists of five screens, including one dedicated 8.8 in (220 mm) instrument display in front of the driver and two large 12.3 in (310 mm) infotainment touchscreen displays flanked by two smaller 6 in (150 mm) displays for what Honda calls its Side Camera Mirror System.\r\nThe dual infotainment displays can independently run separate applications and are swappable; they support both Android Auto and Apple CarPlay.","17-inch alloy wheels.\r\nChrome exterior trim.\r\nKeyless ignition and entry.\r\n8-inch touchscreen.\r\nDual-zone automatic climate control.\r\nSix-speaker sound system.\r\nApple CarPlay and Android Auto compatibility.","Free seven-year Kia Connect (UVO).\r\nElectric Global Modular Platform (E-GMP).\r\nVehicle-to-load (V2L).\r\nVelour carpet mats.\r\n","Dual eMotor all-electric powertrain with standard four-wheel drive, Standard-Range Battery (426 HP \/ 775 LB-FT TQ) or Extended-Range Battery (563 HP \/ 775 LB-FT TQ).\nTargeted EPA-estimated EV Range of up to 230 Miles (Standard-Range Battery) and 320 Miles (Extended-Range Battery) with Level 2\/Level 3 Fast-Charging Capabilities.\nTargeted 10,000-pound Max Towing Capacity and 2,000-pounds Max Payload Capacity.","Hyundai SmartSense\u2122 1.\r\nRear View Monitor w\/ Parking Guidance (RVM w\/ PG).\r\nPaddle Shifters \u2013 regenerative braking control.\r\nSmart key with push button start.\r\nApple CarPlay\u2122 and Android\u2122.\r\nAuto compatibility 2.","Hyundai SmartSense\u21221.\r\nRear View Monitor w\/ Parking Guidance (RVM w\/ PG).\r\nParking Distance Warning - Reverse (PDW-R).\r\nTyre Pressure Monitoring System (TPMS).\r\nManual Speed Limit Assist (MSLA).\r\n7 airbag.","ABS with EBD.\r\nElectronic stability control (ESC).\r\nVehicle stability management (VSM).\r\nHill assist control (HAC).\r\nRear skid plate.\r\nSporty roof rails.\r\nTurn indicators on outside mirrors.\r\nPremium black interiors.\r\nLeather seats.\r\nLeather wrapped steering wheel.","110 kW AC synchronous electric motor.\r\ne-Pedal.\r\nAutomatic Emergency Braking with Pedestrian Detection.\r\nApple CarPlay\u00ae integration.\r\nAndroid Auto\u2122.","Fast-charging capability.\r\n19-inch wheels.\r\nBand & Olufsen sound system\r\nPanoramic sunroof.\r\nPower liftgate.","0-239 Miles of EPA-Estimated Range.\r\n201 Horsepower 291 lb.-ft. of torque Electric Drive Motor.\r\nDC Fast Charging capability.\r\nVoice-Command Navigation System w\/10.25-inch Touchscreen Display.\r\nHarmon Kardon\u00ae Premium Audio.\r\nApple CarPlay\u00ae & Android Auto\u2122.\r\nForward Collision-Avoidance Assist-Ped (FCA-Ped) & Forward Collision-Avoidance Assist-Cyc (FCA-Cyc).\r\nBlind-Spot Collision Warning (BCW).","8-Way Power Adjustable Driver Seat.\r\n8-Way Power Adjustable Passenger Seat.\r\n8.0\" Smartphone-link Display Audio (SDA).\r\nDC Fast Charging Capability.\r\nFAST-Key Entry System.\r\nForward Collision Mitigation (FCM) with Pedestrian Detection.\r\nHeated Power Side Mirrors.\r\nTwin Motor Super All-Wheel Control (S-AWC).","261 combined hp with an EPA-estimated 79 MPGe.\r\n460 miles range fully fueled, 32 miles all-electric range (fully charged)\r\nThe most passenger room and second-row legroom of any plug-in hybrid SUV available.\r\n"];
         var dim = ["4595mm x 1850mm x 2172mm","4460mm x 1825mm x 1620mm","4630mm x 1780mm x 1455mm","4460mm x 1825mm x 1620mm","4395mm x 1795mm x 1540mm","3894mm x 1753mm x 1512mm","4584mm x 1678mm x 1998mm","4680mm x 1880mm x 1550mm","5910mm x 2438mm x 2004mm","4470mm x 1820mm x 1475mm","4470mm x 1820mm x 1450mm","4180mm x 1800mm 1570mm","4490mm x 1788mm x 1540mm","4714mm x 1625mm x 1882mm","4375mm x 1805mm x 1570mm","4695mm x 1800mm x 1710mm","1694mm x 4800mm x 1900mm"];
         var seat = ["5","5","5","5","5","4","5","5","5","5","5","5","5","5","5","7","5"];
         var torque = ["300Nm","172 \/ 4000 Nm\/Rpm","142 \/ 3600 Nm\/Rpm","172 \/ 4000 Nm\/Rpm","200 \/ 4000 Nm\/Rpm","315 Nm","80 lb.-ft.","605 Nm","775 lb.-ft.","295Nm","147\/4000 Nm\/Rpm","395 Nm","320 Nm","317 lb.-ft.","395\/3600 Nm\/Rpm","199\/4500 Nm\/Rpm","258 lb.-ft. combined"];
        
        //select first vehicle
        var selectBrand1 = document.getElementById("brand-names1");
        var selectModel1 = document.getElementById("model-names1");
        
        function changeModels1() {
            var fordA1 = document.createElement("option");
            var fordB1 = document.createElement("option");
            var fordC1 = document.createElement("option");
            var hondaA1 = document.createElement("option");
            var hyundaiA1 = document.createElement("option");
            var hyundaiB1 = document.createElement("option");
            var hyundaiC1 = document.createElement("option");
            var kiaA1 = document.createElement("option");
            var kiaB1 = document.createElement("option");
            var kiaC1 = document.createElement("option");
            var mazdaA1 = document.createElement("option");
            var mitsubishiA1 = document.createElement("option");
            var nissanA1 = document.createElement("option");
            var nissanB1 = document.createElement("option");
            var toyotaA1 = document.createElement("option");
            var toyotaB1 = document.createElement("option");
            var toyotaC1 = document.createElement("option");
            var selectModelTitle = document.createElement("option");
            selectModelTitle.text = "Select a Model:";
            
            
            
            if(selectBrand1.value != "title"){
                document.getElementById("features1").style.textAlign = "left";
            }
            
            if(selectBrand1.value == "title"){
                selectModel1.innerText = null;
            }
            else if(selectBrand1.value == "ford"){
                selectModel1.innerText = null;
                selectModel1.add(selectModelTitle);
                fordA1.text = "F-150 Lightning Pro";
                fordA1.value = "109";
                selectModel1.add(fordA1);
                
                fordB1.text = "Escape SE Hybrid";
                fordB1.value = "110";
                selectModel1.add(fordB1);
                
                fordC1.text = "Mustang Mach-E";
                fordC1.value = "111";
                selectModel1.add(fordC1);
            }
            else if(selectBrand1.value == "honda"){
                selectModel1.innerText = null;
                selectModel1.add(selectModelTitle);
                hondaA1.text = "E";
                hondaA1.value = "107";
                selectModel1.add(hondaA1);
            }  
            else if(selectBrand1.value == "hyundai"){
                selectModel1.innerText = null;
                selectModel1.add(selectModelTitle);
                hyundaiA1.text = "Ioniq Hybrid Elite";
                hyundaiA1.value = "112";
                selectModel1.add(hyundaiA1);
                
                hyundaiB1.text = "Ioniq Electric Elite";
                hyundaiB1.value = "113";
                selectModel1.add(hyundaiB1);
                
                hyundaiC1.text = "Kona EV";
                hyundaiC1.value = "114";
                selectModel1.add(hyundaiC1);
            }
            else if(selectBrand1.value == "kia"){
                selectModel1.innerText = null;
                selectModel1.add(selectModelTitle);
                kiaA1.text = "Niro EV";
                kiaA1.value = "104";
                selectModel1.add(kiaA1);
                
                kiaB1.text = "Sorento PHEV";
                kiaB1.value = "105";
                selectModel1.add(kiaB1);
                
                kiaC1.text = "EV6";
                kiaC1.value = "106";
                selectModel1.add(kiaC1);
            }
            else if(selectBrand1.value == "mazda"){
                selectModel1.innerText = null;
                selectModel1.add(selectModelTitle);
                mazdaA1.text = "CX-30";
                mazdaA1.value = "108";
                selectModel1.add(mazdaA1);
            }  
            else if(selectBrand1.value == "mitsubishi"){
                selectModel1.innerText = null;
                selectModel1.add(selectModelTitle);
                mitsubishiA1.text = "Outlander PHEV";
                mitsubishiA1.value = "103";
                selectModel1.add(mitsubishiA1);
            }  
            else if(selectBrand1.value == "nissan"){
                selectModel1.innerText = null;
                selectModel1.add(selectModelTitle);
                nissanA1.text = "LEAF";
                nissanA1.value = "115";
                selectModel1.add(nissanA1);
                
                nissanB1.text = "ARIYA";
                nissanB1.value = "116";
                selectModel1.add(nissanB1);
            }
            else if(selectBrand1.value == "toyota"){
                selectModel1.innerText = null;
                selectModel1.add(selectModelTitle);
                toyotaA1.text = "Corolla Cross 1.8 V Hybrid";
                toyotaA1.value = "100";
                selectModel1.add(toyotaA1);
                
                toyotaB1.text = "Corolla Altis 1.8 V Hybrid CVT";
                toyotaB1.value = "101";
                selectModel1.add(toyotaB1);
                
                toyotaC1.text = "Camry 2.5 V HEV ";
                toyotaC1.value = "102";
                selectModel1.add(toyotaC1);
            }
        };
        
        //display second vehicle details
         function changeDetails1(){
             
            for(i=0;i<17;i++){
                if(selectModel1.value==idGet[i]){
                    document.getElementById('title1').innerHTML = model[i];
                    document.getElementById('title1').name = idGet[i];
                    document.getElementById('brand1').innerHTML = brand[i].toUpperCase();
                    document.getElementById('type1').innerHTML = type[i];
                    document.getElementById('rating1').innerHTML = rating[i];
                    document.getElementById('dim1').innerHTML = dim[i];
                    document.getElementById('seat1').innerHTML = seat[i];
                    document.getElementById('torque1').innerHTML = torque[i];
                    document.getElementById('warr1').innerHTML = warr[i] + " years warranty.";
                    document.getElementById('features1').innerHTML = features[i];
                    
                    var totalPrice = parseInt(origPrice[i]) + parseInt(comm[i]) - parseInt(disc[i]);
                    document.getElementById('price1').innerHTML = "₱" + totalPrice.toLocaleString();
                    
                    document.getElementById('broch1').href = pdf[i];
                    document.getElementById('imageDisplay1').src = img1[i];
                    
                }
                    
            };
            
                
        };
        
        //select second vehicle
        var selectBrand2 = document.getElementById("brand-names2");
        var selectModel2 = document.getElementById("model-names2");
        
        function changeModels2() {
            var fordA2 = document.createElement("option");
            var fordB2 = document.createElement("option");
            var fordC2 = document.createElement("option");
            var hondaA2 = document.createElement("option");
            var hyundaiA2 = document.createElement("option");
            var hyundaiB2 = document.createElement("option");
            var hyundaiC2 = document.createElement("option");
            var kiaA2 = document.createElement("option");
            var kiaB2 = document.createElement("option");
            var kiaC2 = document.createElement("option");
            var mazdaA2 = document.createElement("option");
            var mitsubishiA2 = document.createElement("option");
            var nissanA2 = document.createElement("option");
            var nissanB2 = document.createElement("option");
            var toyotaA2 = document.createElement("option");
            var toyotaB2 = document.createElement("option");
            var toyotaC2 = document.createElement("option");
            var selectModelTitle2 = document.createElement("option");
            selectModelTitle2.text = "Select a Model:";
            
            
            if(selectBrand2.value != "title"){
             document.getElementById("features2").style.textAlign = "left";
            }
            
            if(selectBrand2.value == "title"){
                selectModel2.innerText = null;
            }
            else if(selectBrand2.value == "ford"){
                selectModel2.innerText = null;
                selectModel2.add(selectModelTitle2);
                fordA2.text = "F-150 Lightning Pro";
                fordA2.value = "109";
                selectModel2.add(fordA2);
                
                fordB2.text = "Escape SE Hybrid";
                fordB2.value = "110";
                selectModel2.add(fordB2);
                
                fordC2.text = "Mustang Mach-E";
                fordC2.value = "111";
                selectModel2.add(fordC2);
            }
            else if(selectBrand2.value == "honda"){
                selectModel2.innerText = null;
                selectModel2.add(selectModelTitle2);
                hondaA2.text = "E";
                hondaA2.value = "107";
                selectModel2.add(hondaA2);
            }  
            else if(selectBrand2.value == "hyundai"){
                selectModel2.innerText = null;
                selectModel2.add(selectModelTitle2);
                hyundaiA2.text = "Ioniq Hybrid Elite";
                hyundaiA2.value = "112";
                selectModel2.add(hyundaiA2);
                
                hyundaiB2.text = "Ioniq Electric Elite";
                hyundaiB2.value = "113";
                selectModel2.add(hyundaiB2);
                
                hyundaiC2.text = "Kona EV";
                hyundaiC2.value = "114";
                selectModel2.add(hyundaiC2);
            }
            else if(selectBrand2.value == "kia"){
                selectModel2.innerText = null;
                selectModel2.add(selectModelTitle2);
                kiaA2.text = "Niro EV";
                kiaA2.value = "104";
                selectModel2.add(kiaA2);
                
                kiaB2.text = "Sorento PHEV";
                kiaB2.value = "105";
                selectModel2.add(kiaB2);
                
                kiaC2.text = "EV6";
                kiaC2.value = "106";
                selectModel2.add(kiaC2);
            }
            else if(selectBrand2.value == "mazda"){
                selectModel2.innerText = null;
                selectModel2.add(selectModelTitle2);
                mazdaA2.text = "CX-30";
                mazdaA2.value = "108";
                selectModel2.add(mazdaA2);
            }  
            else if(selectBrand2.value == "mitsubishi"){
                selectModel2.innerText = null;
                selectModel2.add(selectModelTitle2);
                mitsubishiA2.text = "Outlander PHEV";
                mitsubishiA2.value = "103";
                selectModel2.add(mitsubishiA2);
            }  
            else if(selectBrand2.value == "nissan"){
                selectModel2.innerText = null;
                selectModel2.add(selectModelTitle2);
                nissanA2.text = "LEAF";
                nissanA2.value = "115";
                selectModel2.add(nissanA2);
                
                nissanB2.text = "ARIYA";
                nissanB2.value = "116";
                selectModel2.add(nissanB2);
            }
            else if(selectBrand2.value == "toyota"){
                selectModel2.innerText = null;
                selectModel2.add(selectModelTitle2);
                toyotaA2.text = "Corolla Cross 1.8 V Hybrid";
                toyotaA2.value = "100";
                selectModel2.add(toyotaA2);
                
                toyotaB2.text = "Corolla Altis 1.8 V Hybrid CVT";
                toyotaB2.value = "101";
                selectModel2.add(toyotaB2);
                
                toyotaC2.text = "Camry 2.5 V HEV ";
                toyotaC2.value = "102";
                selectModel2.add(toyotaC2);
            }
        };
        
        //display first vehicle details
         function changeDetails2(){
             
            for(j=0;j<17;j++){
                if(selectModel2.value==idGet[j]){
                    document.getElementById('title2').innerHTML = model[j];
                    document.getElementById('title2').name = idGet[j];
                    document.getElementById('brand2').innerHTML = brand[j].toUpperCase();
                    document.getElementById('type2').innerHTML = type[j];
                    document.getElementById('rating2').innerHTML = rating[j];
                    document.getElementById('dim2').innerHTML = dim[j];
                    document.getElementById('seat2').innerHTML = seat[j];
                    document.getElementById('torque2').innerHTML = torque[j];
                    document.getElementById('warr2').innerHTML = warr[j] + " years warranty.";
                    document.getElementById('features2').innerHTML = features[j];
                    
                    var totalPrice2 = parseInt(origPrice[j]) + parseInt(comm[j]) - parseInt(disc[j]);
                    document.getElementById('price2').innerHTML = "₱" + totalPrice2.toLocaleString();
                    
                    document.getElementById('broch2').href = pdf[j];
                    document.getElementById('imageDisplay2').src = img1[j];
                    
                }
                    
            };
            
                
        };
        
    </script>
 
</html>
