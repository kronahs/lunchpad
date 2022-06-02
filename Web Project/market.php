<?php 
session_start();

require('./functions.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunchpad Meals</title>

    <link rel="shortcut icon" href="./images/logo-trans.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./styles/market.css">
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
            // echo "<a href='./signup.php' class='cta'>".$_SESSION['email']."</a>";
            echo "<a href='./cart.php'><i class='fas fa-shopping-cart'>".getCartNumber()."</i></a>";
        }else{
            echo "<a href='./signup.php' class='cta'><button>SIGN UP</button></a>";
        } ?>
        <button id="menunav" onclick="showNav()">/ / /</button>
    </header>

    <div class="market">
    <!-- TODO: IMPLEMENT SORT AND FILTER -->
        <div class="sort"> 
            <div class="s-container">
            <p>Sort</p>
            <form action="" method="post">
                <table cellspacing="5" cellpadding="5">
                <tr>
                        <td><input type="radio" value="all" id="" name="sort"> All</td>
                    </tr>
                    <tr>
                        <td><input type="radio" value="lose weight" id="" name="sort"> Lose Weight</td>
                    </tr>
                    <tr>
                        <td><input type="radio" value="bodybuilding" id="" name="sort"> Bodybuilding</td>
                    </tr>
                    <tr>
                        <td><input type="radio" value="fasting" id="" name="sort"> Fasting</td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Apply" name="btnSort"></td>
                    </tr>
                </table>
            </form>
            </div>
        </div>

        <div class="foods">
        <?php 
            
            include('./config.php');
        
            if ($conn->connect_error) {
                die('Could not connect to the database.');
            }
            else {
                $login = getSorted(0);
                if(isset($_POST['btnSort'])){
                    if($_POST['sort'] == "lose weight"){
                        $login = getSorted(1);
                    }
                    else if($_POST['sort'] == "bodybuilding"){
                        $login = getSorted(2);
                    }
                    else if($_POST['sort'] == "fasting"){
                        $login = getSorted(3);
                    }
                    else if($_POST['sort'] == "all"){
                        $login = getSorted(0);
                    }
                    else{
                        $login = getSorted(0);
                    }
                }
                
                $result = $conn->query($login);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo "<div class='foodCard' onclick='showPopup(this)' >";
                      echo "<img src='".$row['fImage']."'/>";
                      echo "<p id='fcName'>".$row['fName']."</p>";
                    //   echo "<p>Ingredients: ".$row['ingredient']."</p>";

                     // echo "<p id='foodID'>ID: ".$row['fID']."</p>";
                    //  echo "<button id='btnAddToCart' onclick=\"addCart(".$row['fID'].")\">ADD TO CART</button>";
                     echo "<form method='post' action=''>";
                     echo "<input type='text' name='fID' value=\"".$row['fID']." \"  hidden/>";
                      echo "<input type='submit' name='btnAddToCart' value= 'Add TO CART' id='btnAddToCart' />";
                      echo "</form>";

                      
                      //for Food Card popup onclick
                    echo "<div id='fc-popup'>";
                    echo "<p>Food: ".$row['fName']."</p>";
                    echo "<p>Description: ".$row['description']."</p>";
                    echo "<p>Ingredients: ".$row['ingredient']."</p>";
                    echo "</div>";//end for fc-moreinfo

                      echo "<div class='fcNutrition'>";
                        echo "<p>".$row['calorie']." <br>Calories</p>";
                        echo "<p>".$row['carbs']."g <br>Carbs</p>";
                        echo "<p>".$row['protein']."g <br>Protein</p>";
                        echo "<p>".$row['fat']."g <br>Fat</p>";
                      echo "</div>";//end of fcNutrition
                      echo "</div>";//end for foodCard
                  }
                } 
            }
            $conn->close();
        ?>
        </div>
    </div>

    <div id="popup">

    </div>

<!-- 
    <script>
        function addCart(obj){
            alert(obj);
        }
    </script> -->


        <!-- adding food to cart table -->

        <?php 
            if (isset($_POST['btnAddToCart'])) {
                    
                    $fID = $_POST['fID'];
                    if(isset($_SESSION['cID'])){
                        $cID = $_SESSION['cID'];
                    }else{
                        echo "<script>alert('Please LogIn to Add to Cart')</script>";
                    }

                    require('./config.php');
            
                    if ($conn->connect_error) {
                        die('Could not connect to the database.');
                    }
                    else {
                        $insert = "call spAddCart($cID, $fID)";
            
                            if (mysqli_query($conn,$insert)) {
                                // exit(header( 'Location: ./login.php' ));
                                echo "<script>alert('You Have Added to Cart')</script>";
                            }
                            else {
                                echo "SQL Error: ".mysqli_error($conn);
                            }

                            //for the number of food the customer has pciked
                            getCartNumber();
                        }
                        $conn->close();
                    }
            else {
                echo "Submit button is not set";
            }
        
        ?>


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