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
    <link rel="stylesheet" href="./styles/meal.css">
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
        <img src="./images/chef.jpg" alt="mealbox" width="100%" height="100%">
        <div class="ontop">
            <div class="ml-component">
                <h2>CHOOSE YOUR MEAL PLAN</h2>
                <div class="ml-head">
                </div>

                <!-- 1 meal = apprx 300 -->
                <div class="ml-body">
                   <div class="grd">
                       <h4>THE CHAMPION BOX</h4>
                       <h3>21 MEALS / WEEK</h3>
                       <p>ETB 6,000/ Meal Box</p>
                   </div>
                   <div class="grd">
                    <h4>THE ALL-IN BOX</h4>
                    <h3>18 MEALS / WEEK</h3>
                    <p>ETB 5,400/ Meal Box</p>
                </div>
                <div class="grd">
                    <h4>THE LIFESTYLE BOX</h4>
                    <h3>15 MEALS / WEEK</h3>
                    <p>ETB 4,500// Meal Box</p>
                </div>
                <div class="grd">
                    <h4>THE CHAMPION BOX</h4>
                    <h3>10 MEALS / WEEK</h3>
                    <p>ETB 3,000/ Meal Box</p>
                </div>
                <div class="grd">
                    <h4>THE CHAMPION BOX</h4>
                    <h3>7 MEALS / WEEK</h3>
                    <p>ETB 2,100/ Meal Box</p>
                </div>
                </div>
            </div>
        </div>
    </div>


<!-- footer -->
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