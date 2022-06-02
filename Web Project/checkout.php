<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunchpad Meals</title>

    <link rel="shortcut icon" href="./images/logo-trans.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./styles/checkout.css">
    <script src="./script.js"></script>
    <script src="https://kit.fontawesome.com/11a3d123ff.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
        <a href="./index.php"><img src="./images/logo.jpg" alt="logo" width="150px" id="navImg"></a>
        <nav id="navlists">
            <ul class="navlinks" id="links">
                <li><a href="./meal.php">Meal Box</a></li>
                <li><a href="#">Pricing</a></li>
                <li><a href="#">Market</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </nav>
        <?php if(isset($_SESSION['cID'])){
            echo "<a href='./signup.php' class='cta'>".$_SESSION['email']."</a>";
        }else{
            echo "<a href='./signup.php' class='cta'><button>SIGN UP</button></a>";
        } ?>
        <button id="menunav" onclick="showNav()">/ / /</button>
    </header>

<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>

            <?php 
            
            include('./config.php');
        
            if ($conn->connect_error) {
                die('Could not connect to the database.');
            }
            else {
                $customer = "SELECT * FROM customer WHERE cID = ".$_SESSION['cID'];
                
                $result = $conn->query($customer);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    ?>
                                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" value=<?php echo $row['firstName']." ".$row['lastName']?>>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" value= <?php echo $row['email']?> >
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" value = <?php echo $row['address'] ?>>
            <label for="city"><i class="fa fa-institution"></i> Phone Number</label>
            <input type="text" id="city" name="phone" value=<?php echo $row['phoneNum'] ?>>
                    <?php
                  }
                } 
            }
            $conn->close();
        ?>


            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Submit" class="btn" name="">
      </form>
    </div>
  </div>

  <div class="col-25">
    <div class="container">
      <h4>Cart
      </h4>
      <?php 
            include('./config.php');

        
            if ($conn->connect_error) {
                die('Could not connect to the database.');
            }
            else {
                $cart = "SELECT * FROM food INNER JOIN cart ON cart.FoodId = food.fID  where CustomerID =".$_SESSION['cID'];
                $result = $conn->query($cart);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                   ?>
                    <p><?php echo $row['fName'] ?> <span class="price">ETB 300</span></p> <br>
                   <?php
                  }
                } 
            }
            $conn->close();
        ?>
      <!-- <p><a href="#">Product 1</a> <span class="price">$15</span></p>
      <p><a href="#">Product 2</a> <span class="price">$5</span></p>
      <p><a href="#">Product 3</a> <span class="price">$8</span></p>
      <p><a href="#">Product 4</a> <span class="price">$2</span></p> -->
      <hr>

      <?php 
            include('./config.php');
            include('./functions.php');

        
            if ($conn->connect_error) {
                die('Could not connect to the database.');
            }
            else {
                $total = getCartNumber() * 300;
            }
            $conn->close();
        ?>
      <p>Total <span class="price" style="color:black"><b>ETB <?php echo $total ?></b></span></p>
    </div>
  </div>
</div>


    
</body>
</html>