<?php
session_start();
if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])) {
  $loggedIn = $_SESSION['loggedin'];
}
else{
  $loggedIn = 0;
}

$brandID = $_SESSION['brandid'];

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
    $sql = "SELECT model, brand_id, product_id,type, orig_price, commission, discount, num_purchases, overview, warranty, products.rating, location, lwh, seat_capacity, torque, features, color1Name, color2Name, color3Name, color4Name, image1, image2, image3, image4, brochure, name FROM products INNER JOIN brands ON products.brand_id = brands.id WHERE brand_id=".$brandID;
    $result = $conn->query($sql); 
    $n = 0;
    $prod_id = array();
    $product_brand = array();
    $product_type = array();
    $product_model = array();
    $product_price = array();
    $product_comm = array();
    $product_disc = array();
    $product_numPurch = array();
    $product_overview = array();
    $product_warranty = array();
    $product_rating = array();
    $product_loc = array();
    $product_lwh = array();
    $product_seat = array();
    $product_torq = array();
    $product_features = array();
    $product_color1 = array();
    $product_color2 = array();
    $product_color3 = array();
    $product_color4 = array();
    $product_image1 = array();
    $product_image2 = array();
    $product_image3 = array();
    $product_image4 = array();
    $product_brochure = array();

    while ($row = $result->fetch_assoc()) {
      $prod_id[$n] = $row["product_id"];
      $product_brand[$n] = $row["name"];
      $product_model[$n] = $row["model"];
      $product_type[$n] = $row["type"];
      $product_price[$n] = $row["orig_price"];
      $product_comm[$n] = $row["commission"];
      $product_disc[$n] = $row["discount"];
      $product_numPurch[$n] = $row["num_purchases"];
      $product_overview[$n] = $row["overview"];
      $product_warranty[$n] = $row["warranty"];
      $product_rating[$n] = $row["rating"];
      $product_loc[$n] = $row["location"];
      $product_lwh[$n] = $row["lwh"];
      $product_seat[$n] = $row["seat_capacity"];
      $product_torq[$n] = $row["torque"];
      $product_features[$n] = $row["features"];
      $product_color1[$n] = $row["color1Name"];
      $product_color2[$n] = $row["color2Name"];
      $product_color3[$n] = $row["color3Name"];
      $product_color4[$n] = $row["color4Name"];
      $product_image1[$n] = $row["image1"];
      $product_image2[$n] = $row["image2"];
      $product_image3[$n] = $row["image3"];
      $product_image4[$n] = $row["image4"];
      $product_brochure[$n] = $row["brochure"];
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
  <body onload="setUser()">

  <form action="/homepage/logout.php" method="POST" id="logoutForm" name="logoutForm" hidden>
        <input type="number" value="0" name="logNum">
      </form>

    <script>
      function logoutUser(){
          document.logoutForm.submit();
      }
    </script>


    <script>

      function setUser(){
        var loggedinUser = <?php echo $loggedIn?>;
        var brandID = <?php echo $brandID; ?>;
        localStorage.setItem("brandID", brandID);
      };

    </script>
    
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
              <a href="/seller-page/seller-product.html" class="active">
                <i class="bx bxs-package icon" ></i>
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
              <a href="/seller-page/seller-orders.php">
                <i class='bx bx-spreadsheet icon'></i>
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

    <section class="home">
      <div class="text">Products</div>

      <div class="product-table">
        <table>
          <thead>
            <th>Model</th>
            <th>Brand</th>
            <th>Type</th>
            <th>Original<br>Price</th>
            <th>Commission</th>
            <th>Discount</th>
            <th>Number<br>of<br>Purchases</th>
            <th>Overview</th>
            <th>Warranty</th>
            <th>Rating</th>
            <th>Location</th>
            <th>L x W x H</th>
            <th>Seat Capacity</th>
            <th>Torque</th>
            <th>Features</th>
            <th>ColorName1</th>
            <th>ColorName2</th>
            <th>ColorName3</th>
            <th>ColorName4</th>
            <th>ImageColor1</th>
            <th>ImageColor2</th>
            <th>ImageColor3</th>
            <th>ImageColor4</th>
            <th>Brochure</th>
          </thead>
           <tbody id="productsDisplay">

          </tbody> 
        </table>
      </div>
    </section>


    <script>

         var numOfProd = <?php echo $n; ?>;
         var brand = <?php echo json_encode($product_brand); ?>;
         var prodid = <?php echo json_encode($prod_id); ?>;
         var model = <?php echo json_encode($product_model); ?>;
         var type = <?php echo json_encode($product_type); ?>;
         var origPrice = <?php echo json_encode($product_price); ?>;
         var comm = <?php echo json_encode($product_comm); ?>;
         var disc = <?php echo json_encode($product_disc); ?>;
         var numPurch = <?php echo json_encode($product_numPurch); ?>;
         var overview = <?php echo json_encode($product_overview); ?>;
         var warr = <?php echo json_encode($product_warranty); ?>;
         var rating = <?php echo json_encode($product_rating); ?>;
         var loc = <?php echo json_encode($product_loc); ?>;
         var lwh = <?php echo json_encode($product_lwh); ?>;
         var seat = <?php echo json_encode($product_seat); ?>;
         var torq = <?php echo json_encode($product_torq); ?>;
         var features = <?php echo json_encode($product_features); ?>;
         var col1 = <?php echo json_encode($product_color1); ?>;
         var col2 = <?php echo json_encode($product_color2); ?>;
         var col3 = <?php echo json_encode($product_color3); ?>;
         var col4 = <?php echo json_encode($product_color4); ?>;
         var img1 = <?php echo json_encode($product_image1); ?>;
         var img2 = <?php echo json_encode($product_image2); ?>;
         var img3 = <?php echo json_encode($product_image3); ?>;
         var img4 = <?php echo json_encode($product_image4); ?>;
         var brochure = <?php echo json_encode($product_brochure); ?>;

        
         function addRow(tableID) {
          
            // Get a reference to the table
            let table = document.getElementById(tableID);
            let tableRef = document.getElementById('productsDisplay');
            <?php $index=0;?>

            for(var i=0;i<numOfProd;i++){

            // Insert a row at the end of the table
            let newRow = tableRef.insertRow(i);

            // Insert a cell in the row
            let modelName = newRow.insertCell();

            // Append a text node to the cell
            let modelText = document.createTextNode(model[i]);
            modelName.appendChild(modelText);

            let brandName = newRow.insertCell();

            // Append a text node to the cell
            let brandText = document.createTextNode(brand[i].toUpperCase());
            brandName.appendChild(brandText);

            let typeName = newRow.insertCell();

            // Append a text node to the cell
            let typeText = document.createTextNode(type[i]);
            typeName.appendChild(typeText);

            let origName = newRow.insertCell();

            // Append a text node to the cell
            let origText = document.createTextNode("₱" + origPrice[i]);
            origName.appendChild(origText);

            let commName = newRow.insertCell();

            // Append a text node to the cell
            let commText = document.createTextNode("₱" + comm[i]);
            commName.appendChild(commText);

            let discName = newRow.insertCell();

            // Append a text node to the cell
            let discText = document.createTextNode("₱" + disc[i]);
            discName.appendChild(discText);

            let numPurchName = newRow.insertCell();

            // Append a text node to the cell
            let numPurchText = document.createTextNode(numPurch[i]);
            numPurchName.appendChild(numPurchText);

            let overviewName = newRow.insertCell();

            // Append a text node to the cell
            let overviewText = document.createTextNode(overview[i]);
            let pOverview = document.createElement('p');
            pOverview.appendChild(overviewText);
            overviewName.appendChild(pOverview);

            let warrName = newRow.insertCell();

            // Append a text node to the cell
            let warrText = document.createTextNode(warr[i]);
            warrName.appendChild(warrText);

            let ratingName = newRow.insertCell();

            // Append a text node to the cell
            let ratingText = document.createTextNode(rating[i]);
            ratingName.appendChild(ratingText);

            let locName = newRow.insertCell();

            // Append a text node to the cell
            let locText = document.createTextNode(loc[i]);
            locName.appendChild(locText);

            let lwhName = newRow.insertCell();

            // Append a text node to the cell
            let lwhText = document.createTextNode(lwh[i]);
            let pLWH = document.createElement('p');
            pLWH.appendChild(lwhText);
            lwhName.appendChild(pLWH);
            
            let seatName = newRow.insertCell();

            // Append a text node to the cell
            let seatText = document.createTextNode(seat[i]);
            seatName.appendChild(seatText);

            let torqName = newRow.insertCell();

            // Append a text node to the cell
            let torqText = document.createTextNode(torq[i]);
            torqName.appendChild(torqText);

            let featuresName = newRow.insertCell();

            // Append a text node to the cell
            let featuresText = document.createTextNode(features[i]);
            let pFeatures = document.createElement('p');
            pFeatures.appendChild(featuresText);
            featuresName.appendChild(pFeatures);


            let col1Name = newRow.insertCell();

            // Append a text node to the cell
            let col1Text = document.createTextNode(col1[i]);
            col1Name.appendChild(col1Text);

            let col2Name = newRow.insertCell();

            // Append a text node to the cell
            let col2Text = document.createTextNode(col2[i]);
            col2Name.appendChild(col2Text);

            let col3Name = newRow.insertCell();

            // Append a text node to the cell
            let col3Text = document.createTextNode(col3[i]);
            col3Name.appendChild(col3Text);

            let col4Name = newRow.insertCell();

            // Append a text node to the cell
            let col4Text = document.createTextNode(col4[i]);
            col4Name.appendChild(col4Text);
            
            let image1Name = newRow.insertCell();
            let div1 = document.createElement('div');
            div1.className = "imgDiv";
            let image1 = document.createElement('img');
            var link1 = img1[i];
            image1.src = link1;
            
            div1.appendChild(image1);
            image1Name.appendChild(div1);
            
            let image2Name = newRow.insertCell();
             var link2 = img2[i];
            
            if(link2==null){
                let image2Text = document.createTextNode("NULL");
                image2Name.appendChild(image2Text);
            }
            else{
                 let div2 = document.createElement('div');
                 div2.className = "imgDiv";
                 let image2 = document.createElement('img');
                 image2.src = link2;
                 div2.appendChild(image2);
                 image2Name.appendChild(div2);
            }
            
            let image3Name = newRow.insertCell();
            var link3 = img3[i];
            
            if(link3==null){
                let image3Text = document.createTextNode("NULL");
                image3Name.appendChild(image3Text);
            }
            else{
                 let div3 = document.createElement('div');
                 div3.className = "imgDiv";
                 let image3 = document.createElement('img');
                 image3.src = link3;
                 div3.appendChild(image3);
                 image3Name.appendChild(div3);
                
            }
            
            let image4Name = newRow.insertCell();
            var link4 = img4[i];
            
            if(link4==null){
                let image4Text = document.createTextNode("NULL");
                image4Name.appendChild(image4Text);
            }
            else{
                 let div4 = document.createElement('div');
                 div4.className = "imgDiv";
                 let image4 = document.createElement('img');
                 image4.src = link4;
                 div4.appendChild(image4);
                 image4Name.appendChild(div4);
                
            }
            
         
            
            let broch = newRow.insertCell();
            let brochText = document.createElement('a');
            brochText.href = brochure[i];
            brochText.innerHTML = "BROCHURE LINK";
            brochText.target = "_blank";
            brochText.style.color = "black";
            broch.appendChild(brochText);
            }

          }
            
            // Call addRow() with the table's ID
            addRow('prodTable');
      
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
