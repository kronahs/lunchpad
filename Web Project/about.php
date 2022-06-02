<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about Lunchpad</title>

    <link rel="shortcut icon" href="./images/logo-trans.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./styles/about.css">
    <link rel="stylesheet" href="./meal.css">
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
        </nav>
        <?php if(isset($_SESSION['cID'])){
            echo "<a href='./signup.php' class='cta'>".$_SESSION['email']."</a>";
        }else{
            echo "<a href='./signup.php' class='cta'><button>SIGN UP</button></a>";
        } ?>
        <button id="menunav" onclick="showNav()">/ / /</button>
    </header>


    <div class="hero" >
      <img src="./images/about-show-ep.jpg" alt="mealbox" width="100%" height="100%">
        <div class="ab-body">
            <table>
                <tr><td colspan="4"><h2 >Get to know Us</h2></td></tr>
                <tr>
                    <td><img src="./images/leadership.jpg" alt="mealbox" width="100%" height="100%"></td>
                    <td><img src="./images/career.jpg" alt="mealbox" width="100%" height="100%"></td>
                    <td><img src="./images/partnership.jpg" alt="mealbox" width="100%" height="100%"></td>
                    <td><img src="./images/press.jpg" alt="mealbox" width="100%" height="100%"></td>
                </tr>
                <tr>
          <td><h3 align="center">LEADERSHIP</h3><p>Our multicultural leaders have deep start-up and long years of exprience. </p></td>
          <td><h3 align="center">CAREERS</h3><p>We take greate pride in our preparation and delivery.Thanks to the hard work of our employees. </p></td>
          <td><h3 align="center">PARTNERSHIP</h3><p>From reserch,to event,to platform partnership we work with thought leaders to provide quality service.</p></td>
          <td><h3 align="center">PRESS</h3><p>We are recognized as a well reliable platform for food preparatin and delivery througn out the entire country.</p></td>
               </tr>
          </table>
        </div>
</div>
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