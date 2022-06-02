<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Lunchpad</title>

    <link rel="shortcut icon" href="./images/logo-trans.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./styles/signup.css">
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


    <div class="hero">
        <img src="./images/mealbox.jpg" alt="mealbox" width="100%" height="100%">
        <div class="ontop">
            <div class="ml-component">
                <h2>LogIn</h2>
                <div class="ml-head">
                </div>

                <!-- 1 meal = apprx 300 -->
                <div class="ml-body">
                    <form action="" method="POST">
                        <table border="1" cellspacing="5" cllpadding="5" id="tb">
                            <tr>
                                <td><label for="email">Email</label></td>
                                <td><input type="email" name="email" id="email"></td>
                            </tr>
                            <tr>
                                <td><label for="password">Password</label></td>
                                <td><input type="password" name="password" id="password"></td>
                            </tr>
                            <tr>
                                <td><input type="reset" value="Clear"></td>
                                <td><input type="submit" value="LogIn" name="submit"></td>
                            </tr>
                        </table>
                    </form>
                    <a href="./signup.php" style="color:white">Create Account</a>
                </div>
            </div>
        </div>

        <?php 
            if (isset($_POST['submit'])) {
                    
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    
                    include('./config.php');
            
                    if ($conn->connect_error) {
                        die('Could not connect to the database.');
                    }
                    else {
                        $login = "call spLogIn('$email','$password')";
                        $result = $conn->query($login);

                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            $_SESSION['cID'] = $row["cID"];
                          }
                          $_SESSION['email'] = $email;
                        } else {
                          echo "<script>alert('You Dont Have an Account')</script>";
                        }
                        }
                        $conn->close();
                    }
            else {
                echo "Submit button is not set";
            }
        
        ?>
</body>

</html>