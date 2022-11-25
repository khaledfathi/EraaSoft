<?php 
session_start(); 
if(!isset($_SESSION['items'])){
    header('location: index.php'); 
}
if ($_SERVER['REQUEST_METHOD']==='POST'){
    echo "<h1>Your Order has been set <br>ThankYou</h1><button><a href='index.php'>Back To Shop</a></button>"; 
    unset ($_SESSION['items']); 
    die;
}elseif ($_SERVER['REQUEST_METHOD']==='GET'){
    if(!isset($_SESSION['items'])){
        header('location: index.php');
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div>
        <form action="checkout.php" method="post">
            <div>
                <label for="">Name</label>
                <input type="text">
            </div>
            <div>
                <label for="">Email</label>
                <input type="text">
            </div>
            <div>
                <label for="">Address</label>
                <input type="text">
            </div>
            <div>
                <label for="">Phone</label>
                <input type="text">
            </div>
            
            <div>
                <hr>
                <label for="">Content of</label>
                <table>
                    <thead>
                        <th>Product</th>
                        <th>Price</th>
                        <?php
                        foreach($_SESSION['items'] as $key=>$product){
                            echo "<tr>".
                                "<td>".$product['product']."</td>".
                                "<td>".$product['price']."</td><tr>";
                        }
                        ?>
                    </thead>
                </table>
            </div>
            <div>
                <label for="">Total Price <?php echo $_SESSION['total']?> L.E</label>
            </div>
            <input type="submit" value="Checkout">
        </form>
    </div>
</body>
</html>
