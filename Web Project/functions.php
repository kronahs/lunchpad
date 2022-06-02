<?php 
function getCartNumber(){
    require('./config.php');
    $numberOfCart = "SELECT * FROM cart WHERE CustomerId =".$_SESSION['cID'];
    if ($result=mysqli_query($conn,$numberOfCart)) {
        $rowcount=mysqli_num_rows($result);
        return $rowcount;
    }else{
        return "SQL Error: ".mysqli_error($conn);
    }

}

function getSorted($num){
    if($num == 1||$num ==2||$num ==3){
        $login= "select * from food where cattegoryId = $num";
    }
    else{
        $login="select * from food";
    }
    return $login;
}

?>