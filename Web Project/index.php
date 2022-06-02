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
    <script src="./script.js"></script>
    <script src="https://kit.fontawesome.com/11a3d123ff.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
      <a href="./index.php"><img src="./images/logo.jpg" alt="logo" width="150px" id="navImg"></a>
        <nav id="navlists">
            <ul class="navlinks" id="links">
                <li><a href="./meal.php">Meal Box</a></li>
                <li><a href="./market.php">Market</a></li>
                <li><a href="./about.php">About</a></li>
            </ul>
        </nav>
        <?php if(isset($_SESSION['cID'])){
            echo "<a href='./signup.php' class='cta'>".$_SESSION['email']."</a>";
        }else{
            echo "<a href='./signup.php' class='cta'><button>SIGN UP</button></a>";
        } ?>
        <button id="menunav" onclick="showNav()">/ / /</button>
    </header>

    <div class="hero">
        <video autoplay width="500" height="300" loop class="main">
            <source src="./video/pexels-julia-m-cameron-8769000.mp4" type="video/mp4">
            Your browser does not support the video tag. 
          </video>
        <div class="ontop">
            <h2>GET YOUR MEAL PLAN NOW!</h2>
            <button id="herobtn">GET STARTED</button>
        </div>
    </div>

    <section class="minisection">
        <div class="content">
            <img src="./icons/box.png" alt="meal-boxes" width="200px">
            <p>Meal boxes</p>
        </div>
        <div class="content">
            <img src="./icons/fast-delivery.png" alt="meal-delivery" width="200px">
            <p>Quick Delivery</p>
        </div>
        <div class="content">
            <img src="./icons/food.png" alt="meal-customize" width="200px">
            <p>Customize Meal<br> Plans </p>
        </div>
    </section>

    <section class="howtoSection">
        <div class="container">
            <div class="left">
                <img src="./Art/undraw_selection_re_ycpo.png" alt="select meals" width="400px">
            </div>
            <div class="right">
                <h1>SELECT MEAL PLAN</h1>
                <p>We keep dinner interesting. From top-rated favorites and health-conscious options to Premium dishes and more, variety is always on the menu.</p>
            </div>
        </div>

        <div class="container">
            <div class="left">
                <h1>UNPACK YOUR BOX</h1>
                <p>We guarantee the freshness of all our ingredients and deliver them in an insulated box right to your door.</p>
            </div>
            <div class="right">
                <img src="./Art/undraw_Gift_box_re_vau4.png" alt="select meals" width="400px">
            </div>
        </div>

        <div class="container">
            <div class="left">
                <img src="./Art/undraw_Eating_together_re_ux62.png" alt="select meals" width="400px">
            </div>
            <div class="right">
                <h1>COOK AND CREATE</h1>
                <p>Follow our easy step-by-step recipes to learn new skills, try new tastes, and make your family amazing meals.</p>
            </div>
        </div>
    </section>


    <!-- Explaining Section -->
    <div class="explain">
        <img src="./images/knife.jpg" alt="knife with veg" width="500px" id="backImg">
        <div class="mealcontent">
            <h2>Whats in the box</h2>
            <div class="subcontent">
                <div class="core">
                    <img src="./icons/menu.png" alt="recipe-book">
                    <h3>Delicious, chef-designed recipes</h3>
                    <p>With step-by-step instructions that are quick, easy, and entertaining—and open you up to new things</p>
                </div>

                <div class="core">
                    <img src="./icons/food.png" alt="recipe-book">
                    <h3>Responsibly sourced, quality ingredients</h3>
                    <p>Like fresh produce, sustainable seafood, and exclusive spice blends, all packed with attention to the highest safety standards</p>
                </div>
                
                <div class="core">
                    <img src="./icons/healthy.png" alt="recipe-book">
                    <h3>Perfectly portioned amounts</h3>
                    <p>So your ingredients stay fresh and we help reduce food waste—and you have easy portion control</p>
                </div>
                
                <div class="core">
                    <img src="./icons/recycling-box.png" alt="recipe-book">
                    <h3>Recyclable ice packs and packaging</h3>
                    <p>Because we’re committed to limiting our environmental impact and helping you do the same</p>
                </div>
            </div>

            <button>Choose Your Plan</button>
        </div>
    </div>

    <div class="ft-container"></div>
    <footer>
      <!-- Footer main -->
      <section class="ft-main">
        <div class="ft-main-item">
          <h2 class="ft-title">Lunchpad</h2>
          <ul>
            <li><a href="#">Services</a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Customers</a></li>
            <li><a href="#">Careers</a></li>
          </ul>
        </div>
        <div class="ft-main-item">
          <h2 class="ft-title">Our Company</h2>
          <ul>
            <li><a href="#">Docs</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">eBooks</a></li>
            <li><a href="#">Webinars</a></li>
          </ul>
        </div>
        <div class="ft-main-item">
          <h2 class="ft-title">Contact Us</h2>
          <ul>
            <li><a href="#">Help</a></li>
            <li><a href="#">Sales</a></li>
          </ul>
        </div>
        <div class="ft-main-item">
          <h2 class="ft-title">Stay Updated</h2>
          <p>Get free updates before others do!</p>
          <form>
            <input type="email" name="email" placeholder="Enter email address">
            <input type="submit" value="Subscribe">
          </form>
        </div>
      </section>
    
      <!-- Footer social -->
      <section class="ft-social">
        <ul class="ft-social-list">
          <li><a href="#"><i class="fab fa-facebook"></i></a></li>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          <li><a href="#"><i class="fab fa-github"></i></a></li>
          <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
          <li><a href="#"><i class="fab fa-youtube"></i></a></li>
        </ul>
      </section>
    
      <!-- Footer legal -->
      <section class="ft-legal">
        <ul class="ft-legal-list">
          <li><a href="#">Terms &amp; Conditions</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li>&copy; LUNCH-PAD</li>
        </ul>
      </section>
    </footer>
</body>
</html>