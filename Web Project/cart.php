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
    <link rel="stylesheet" href="./styles/market.css">
    <link rel="stylesheet" href="./styles/cart.css">
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

    <div class="cart-head">
        <br><br>
        <h3>Your Cart:</h3>
    </div>

    <div class="foods">
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
                      echo "<div class='foodCard' onclick='showPopup(this)' >";
                      echo "<img src='".$row['fImage']."'/>";
                      echo "<p id='fcName'>".$row['fName']."</p>";


                     echo "<form method='post' action=''>";
                     echo "<input type='text' name='cID' value=\"".$row['CartID']." \"  hidden/>";
                      echo "<input type='submit' name='btnRemoveFromCart' value= 'Remove From Cart' id='btnAddToCart' />";
                      echo "</form>";

                      echo "<div class='fcNutrition'>";
                        echo "<p>".$row['calorie']." <br>Calories</p>";
                        echo "<p>".$row['carbs']."g <br>Carbs</p>";
                        echo "<p>".$row['protein']."g <br>Protein</p>";
                        echo "<p>".$row['fat']."g <br>Fat</p>";
                      echo "</div>";//end of fcNutrition
                      echo "</div>";//end for foodCard

                      //for Food Card popup onclick
                    echo "<div id='fc-popup'>";
                    echo "<p>Food: ".$row['fName']."</p>";
                    echo "<p>Description: ".$row['description']."</p>";
                    echo "<p>Ingredients: ".$row['ingredient']."</p>";
                    echo "<p>Carbs: ".$row['carbs']."g</p>";
                    echo "<p>Protein: ".$row['protein']."g</p>";
                    echo "<p>Fat: ".$row['fat']."g</p>";
                    echo "<p>Calories: ".$row['calorie']."</p>";
                    echo "</div>";//end for fc-moreinfo
                  }
                } 
            }
            $conn->close();
        ?>
        
        <div class="card-foot">
            <h3>Checkout: </h3>

            <button>Clear All</button>
            <a href="./checkout.php"><button>Checkout</button></a>
        </div>
        </div>

        <?php 
            if (isset($_POST['btnRemoveFromCart'])) {
                    
                    $fID = $_POST['cID'];
                    if(isset($_SESSION['cID'])){
                        $cID = $_SESSION['cID'];
                    }else{
                        echo "<script>alert('Please LogIn to Add to Cart')</script>";
                    }

                    include('./config.php');
                    include('./functions.php');

                    $cartID = $_POST['cID'];
            
                    
            
                    if ($conn->connect_error) {
                        die('Could not connect to the database.');
                    }
                    else {
                        $delete = "DELETE FROM cart WHERE CartID = $cartID";
            
                            if (mysqli_query($conn,$delete)) {
                                // exit(header( 'Location: ./login.php' ));
                                //echo "<script>alert('You Have Remove from Cart')</script>";
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
</body>
</html>