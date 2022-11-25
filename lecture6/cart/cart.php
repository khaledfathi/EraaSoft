<?php
session_start(); 
if($_SERVER['REQUEST_METHOD']==='POST'){
    if($_POST['local'] == '1'){
        foreach($_POST as $key=>$selected){
            unset($_SESSION['items'][$key]);
        }
        if (!count($_SESSION['items'])){
            unset($_SESSION['items']);
        }
    }elseif ($_POST['local']== '2'){
        unset($_SESSION['items']); 
    }else {
        $database = json_decode(file_get_contents('productsDatabase.json'), true);
        foreach ($database as $keyDB=> $productData){
            foreach($_POST as $keyPOST=> $selectedProduct){
                if ($keyDB == $keyPOST){
                    $_SESSION['items'][$keyPOST]=[
                        'product'=>$productData['name'] , 
                        'price'=>$productData['price']]; 
                }
            }
        }
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
    <form action="cart.php" method='post'>
            <?php 
            if (isset ($_SESSION['items'])){
                echo "
                    <table>
                        <thead>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Remove</th>
                        </thead>";
                $_SESSION['total']=0; 
                foreach($_SESSION['items'] as $key=>$row){
                echo '<tr>'.
                    '<td>'.$row['product'].'</td>'.
                    '<td>'.$row['price'].'</td>'.
                    '<td><input name='.$key.' type="checkbox"></td>'.
                    '</tr>';
                    $_SESSION['total']+=$row['price'];
                }
                echo '<tr class="total">
                    <td>Total</td>
                    <td>'.$_SESSION['total'].'</td>
                    </tr></table>';
                echo "<input type='hidden' id='local' name='local'>
                    <button id='deleteSelected'>Delete Selected</button>
                    <button id='deleteAll'>Delete All</button>
                    <button><a href='checkout.php'>Checkout<a></button>";
            }else{
                echo "<h3>Cart is empty</h3>
                    <button><a href='index.php' >Back to Shop</a></button>";
            }
        ?>
    </form>
    <script>
    const local  = document.querySelector('#local'); 
    const deleteSelected = document.querySelector('#deleteSelected'); 
    const deleteAll = document.querySelector('#deleteAll'); 
    deleteSelected.addEventListener('click' , ()=>{
       local.value= 1 ; 
    });
    deleteAll.addEventListener('click' , ()=>{
       local.value= 2 ; 
    }); 
</script>
</body>
</html>
