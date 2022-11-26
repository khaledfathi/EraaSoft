<?php 
session_start(); 
if(!isset($_SESSION['items'])){
    header('location: index.php'); 
}

/*** FUNCTIONS ***/
//sanitizing 
function sanitizing ($request){
    foreach($request as $key=>$field){
        $request[$key]=trim(htmlentities(htmlspecialchars($field)));
    }
    return $request;
}
//validation
function isValid($request , $nameLength=3 , $phoneLenght=11){
    $valid =['state'=>true , 'error'=>'']; 
    if (empty ($request['name']) || 
        empty ($request['email']) || 
        empty ($request['address']) ||
        empty ($request['phone'])){
        $valid['state']=false; 
        $valid['error']='All Fields are required!';
    }elseif (strlen($request['name']) < $nameLength){
        $valid['state']=false; 
        $valid['error']="Name should be at least $nameLength characters";
    }elseif (!filter_var($request['email'] , FILTER_VALIDATE_EMAIL) ){
        $valid['state']=false; 
        $valid['error']="Invalid Email Address";
    }elseif (strlen($request['phone']) != 11 ){
        $valid['state']=false; 
        $valid['error']="Invalid Phone Number (Only 11 digits)";
    }
    return $valid; 
}

/*** SERVER ***/
if ($_SERVER['REQUEST_METHOD']==='POST'){
    $request = sanitizing($_POST) ;
    $valid = isValid($request); 
    if (!$valid['state']){
        $error = $valid['error'];
    }else {
        $orderOkHTML="<h1>Order has been set.</h1><br><table><thead>
               <th>Product</th>
               <th>Price</th>
            </thead>"; 
        foreach ($_SESSION['items'] as $product){
            $orderOkHTML.= "<tr>
                <td>".$product['product']."</td>". 
                "<td>".$product['price']."</td><tr>" ;
        }
        $orderOkHTML.= "</table><h4>With Total : ".$_SESSION['total'].
            " L.E</h4><br><hr>".
            "<h5>Shiping to : </h5>".
            "<p>Name :".$request['name']."</p>".
            "<p> Address : ".$request['address']."</p>".
            "<p>Email : ".$request['email']."</p>".
            "<p>phone : ".$request['phone']."</p>".
            "<hr><p>Thank you thank you for choosing our shop.</p>
            <button><a href='index.php'>Continue Shoping</a></button>
            </body></html>";
        unset ($_SESSION['items']); 
    }
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <?php if($orderOkHTML){echo $orderOkHTML; die;}?>
        <form class="checkout" action="checkout.php" method="post">
            <div>
                <label for="">Name</label>
                <input name="name" type="text">
            </div>
            <div>
                <label for="">Email</label>
                <input name="email" type="text">
            </div>
            <div>
                <label for="">Address</label>
                <input name="address" type="text">
            </div>
            <div>
                <label for="">Phone</label>
                <input name="phone" type="text">
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
            <?php if ($error){ echo "<p>$error</p>";} ?>
        </form>
    </div>
</body>
</html>
