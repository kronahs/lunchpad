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


    <div class="hero">
        <img src="./images/mealbox.jpg" alt="mealbox" width="100%" height="100%">
        <div class="ontop">
            <div class="ml-component">
                <h2>CREATE ACCOUNT</h2>
                <div class="ml-head">
                </div>

                <!-- 1 meal = apprx 300 -->
                <div class="ml-body">
                    <form action="" method="POST">
                        <table border="1" cellspacing="5" cllpadding="5" id="tb">
                            <tr>
                                <td><label for="firstname">First-Name</label></td>
                                <td><input type="text" name="firstName" id="firstname"></td>
                            </tr>
                            <tr>
                                <td><label for="lastName">Last-Name</label></td>
                                <td><input type="text" name="lastName" id="lastName"></td>
                            </tr>
                            <tr>
                                <td><label for="email">Email</label></td>
                                <td><input type="email" name="email" id="email"></td>
                            </tr>
                            <tr>
                                <td><label for="address">Address</label></td>
                                <td><input type="text" name="address" id="address"></td>
                            </tr>
                            <tr>
                                <td><label for="phoneNum">Mobile Number</label></td>
                                <td><input type="text" name="phoneNum" id="phoneNum"></td>
                            </tr>
                            <tr>
                                <td><label for="username">Username</label></td>
                                <td><input type="text" name="username" id="username"></td>
                            </tr>
                            <tr>
                                <td><label for="password">Password</label></td>
                                <td><input type="password" name="password" id="password"></td>
                            </tr>
                            <tr>
                                <td><input type="reset" value="Clear"></td>
                                <td><input type="submit" value="SignUp" name="submit"></td>
                            </tr>
                        </table>
                    </form>
                    <a href="./login.php" style="color:white">LogIn</a>
                </div>
            </div>
        </div>

        <?php 
            if (isset($_POST['submit'])) {
                    
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $phoneNum = $_POST['phoneNum'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
            
                    include('./config.php');
            
                    if ($conn->connect_error) {
                        die('Could not connect to the database.');
                    }
                    else {
                        $insert = "call spSignUp('$firstName',' $lastName', '$email','$address', '$phoneNum', '$username', '$password')";
            
                            if (mysqli_query($conn,$insert)) {
                                exit(header( 'Location: ./login.php' ));
                            }
                            else {
                                echo "SQL Error";
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