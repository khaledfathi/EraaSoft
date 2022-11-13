<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Product Page | GET</title>
    <style>
        table , td , th{ border: 1px solid black; padding:5px; text-align:center; border-collapse: collapse;};
    </style>
</head>
    <body>
        <?php
            $products = [
                ["product number 1",300,50],
                ["product number 2",250,1000],
                ["product number 3",30,1200],
                ["product number 4",1500,10],
                ["product number 5",450,300]
            ];
            $id = $_GET ['id'];
            if ($id==""){
                echo "<h1>ID is Empty</h1>";
            }else if ($id >0 && $id <= count($products)){
                echo "<h1>ID : ".$id."</h1>";
                echo "<table>
                        <thead>
                            <th>Name</th>
                            <th>Price</th>
                            <th>quantity</th>
                        </thead>
                        <tr>";            
                foreach ( $products[$id-1] as $cell)echo "<td>$cell</td>";
            }
        ?>
    </body>
</html>


